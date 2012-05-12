<?php
    class Food_model extends CI_Model{
    	var $food_id='';
		var $food_name='';
		var $food_desc='';
		var $food_pic='';
		var $food_price='';
		var $available_time='';
		var $food_rate='';
		var $order_quantity='';
		
		function get_hotsale(){
			//show the first 5th favorite food of customers
			$this->db->order_by("order_quantity","desc");
			$query = $this->db->get('food',3);
			return $query->result();
		}
		
		function get_breakfast(){
 			$this->db->where('available_tag', '4');
			$this->db->or_where('available_tag', '5'); 
			$this->db->or_where('available_tag', '6');
			$this->db->or_where('available_tag', '7');  
			$query = $this->db->get('food');
			return $query->result();
			
		}
		
		function get_lunch(){
 			$this->db->where('available_tag', '2');
			$this->db->or_where('available_tag', '3'); 
			$this->db->or_where('available_tag', '6');
			$this->db->or_where('available_tag', '7');  
			$query = $this->db->get('food');
			return $query->result();
			
		}
		function get_supper(){
 			$this->db->where('available_tag', '1');
			$this->db->or_where('available_tag', '3'); 
			$this->db->or_where('available_tag', '5');
			$this->db->or_where('available_tag', '7');  
			$query = $this->db->get('food');
			return $query->result();
			
		}
		
		// Show detail information of one food
		function get_detail($id){
 			$this->db->where('food_id', $id);
			$query = $this->db->get('food');
			return $query->result();
			
		}
		
		//add a food into an order
		function connection_f_o($f_id,$o_id){
			
		}
		
		//create a food
		function new_food($f_id,$f_name,$f_price,$f_available_t,$f_available_tag){
			
		}
		
    }
?>