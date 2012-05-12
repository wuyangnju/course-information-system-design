<?php
class Shopping_cart_model extends CI_Model {
	var $shopping_cart_id = '';
	var $customer_id = '';
	var $food_id = '';
	var $food_amount = '';

	function add_item($data) {
		$this -> db -> where('customer_id', $data['customer_id']);
		$this -> db -> where('food_id', $data['food_id']);
		$query = $this -> db -> get('shopping_cart_item');
		if ($query -> num_rows() > 0) {
			$row = $query -> result();
			$row[0] -> food_amount = $row[0] -> food_amount + 1;
			$this -> db -> where('shopping_cart_id', $row[0] -> shopping_cart_id);
			$this -> db -> update('shopping_cart_item', $row[0]);
		} else {
			$this -> db -> insert('shopping_cart_item', $data);
		}
	}
	
	function minus_item($cust_id,$food_id){
		$this -> db -> where('customer_id', $cust_id);
		$this -> db -> where('food_id', $food_id);
		$query = $this -> db -> get('shopping_cart_item');
		if ($query -> num_rows() > 0) {
			$row = $query -> result();
			if($row[0]->food_amount>0){
			$row[0] -> food_amount = $row[0] -> food_amount - 1;
			$this -> db -> where('shopping_cart_id', $row[0] -> shopping_cart_id);
			$this -> db -> update('shopping_cart_item', $row[0]);
			}
		}
	}
	
	function get_shopping_cart_item($cust_id,$food_id){
		$this -> db -> where('customer_id',$cust_id);
		$this -> db -> where('food_id',$food_id);
		$query = $this->db -> get('shopping_cart_item');
		$row = $query->result();
		$this -> db -> where('food_id',$row[0]->food_id);
		$query1 = $this->db -> get('food');
		$row1 = $query1->result();
		$row[0]->total_price = $row1[0]->food_price*$row[0]->food_amount;
		return $row;
		
	}

	function get_shopping_cart($cust_id) {
		$this -> db -> select('food_id,food_amount');
		$this -> db -> where('customer_id', $cust_id);
		$query = $this -> db -> get('shopping_cart_item');
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
				$row -> total_price = $item[0] -> food_price * $row -> food_amount;
				$a[$i] = $row;
				$i++;
			}
			return $a;
		}else{
			return $a;
		}
	}
	
	function drop_item($cust_id,$food_id){
		$this -> db -> where('customer_id', $cust_id);
		$this -> db -> where('food_id', $food_id);
		$this -> db -> delete('shopping_cart_item');
	}
	
	function empty_cart($cust_id){
		$this -> db -> where('customer_id', $cust_id);
		$this -> db -> delete('shopping_cart_item');		
	}

}
?>