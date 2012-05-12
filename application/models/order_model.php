<?php
class Order_model extends CI_Model{
    	var $order_id='';
		var $itsc_id='';
		var $order_time='';
		var $expected_time='';
		var $status='';
	
	function show_order($username){
		if($username=="admin")
		{//if it's administrator, return all the order.
			$query = $this->db->get('order');
			return $query->result();	
		}else{
			$this->db->where('itsc_id', $username);
			$query = $this->db->get('order');			
			return $query->result();
		}	
	}
	
	function show_order_detail($order_id){
			$this->db->select('food_id','amount_f','price');
			$this->db->where('order_id',$order_id);
			$query = $this->db->get('order_food');
			//then show information of food and drink through food_id and drink_id
			$a = array();
			$i = 0;
		if ($query -> num_rows() > 0) {
			foreach ($query->result() as $row) {
				$this -> db -> select('food_name,food_price');
				$this -> db -> where('food_id', $row -> food_id);
				$item = $this -> db -> get('food') -> result();
				//	var_dump($item);
				$row -> food_name = $item[0] -> food_name;
				$row -> food_price = $item[0] -> food_price;
				$a[$i] = $row;
				$i++;
			}
			return $a;
		}else{
			return $a;
		}
	}
	
	function change_status($username,$order_id){
			$this->db->where('order_id',$order_id);
			$query = $this -> db ->get('order')->result();
			if($username=="admin"){
				$query[0]->status = "delivered";
			}else{
				$query[0]->status = "recieved";
			}
			$this->db->where('order_id', $order_id);
 			$this->db->update('order', $query[0]); 
			return $query[0]->status;
	}

	function add_order($cust_id){
			date_default_timezone_set('Asia/Hong_Kong');			
			$time = getdate();
			$order_time = $time['year']."_".$time['mon']."_".$time['mday']."_".$time['hours']."_".$time['minutes']."_".$time['seconds'];			
			$expected_time=$time['year']."_".$time['mon']."_".$time['mday']."_".$this->input->post('expected_time');
			$a=array(
			"itsc_id"=>$cust_id,
			"order_time"=>$order_time,
			"expected_time"=>$expected_time,
			"status"=>"processing"
						);
			$this->db->insert('order',$a);
		//then return the order_id that is just generated.
			$id=$this->db->insert_id();
			return $id;			
	}
	
	function build_connection($cust_id,$order_id){
			$this->db->where('customer_id',$cust_id);
			$query = $this->db->get('shopping_cart_item');
			if($query -> num_rows()> 0){
				foreach($query->result() as $row){
					$this->db->select('food_price');
					$price=$this->db->get('food')->row();
					$data=array(
					'order_id'=>$order_id,
					'food_id'=>$row->food_id,
					'amount_f'=>$row->food_amount,
					'price'=>$row->food_amount*$price->food_price
					);
					$this->db->insert('order_food',$data);
				}
			}
	
		
			
	}
	
}
?>