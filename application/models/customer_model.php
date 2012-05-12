<?php
class Customer_model extends CI_Model{
	var $itsc_id='';
	var $cellphone_no='';
	var $name='';
	var $address1='';
	var $address2='';
	var $address3='';

	function get_all(){
		$query = $this->db->get('customer');
		return $query->result();
	}
	
	function show_customer($id){
 			$this->db->where('itsc_id', $id);
			$query = $this->db->get('customer');
			return $query->result();			
	}
	
	function update_customer($id,$data){
			$this->db->where('itsc_id', $id);
 			$this->db->update('customer', $data); 
	}
	function creat_customer($data){
			$this->db->insert('customer', $data); 
	}
}
?>