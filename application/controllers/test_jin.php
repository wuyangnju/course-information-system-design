<?php
class Test_jin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('food');
	}
	
	public function add(){
		//$id="jfang";
		$id=$this->session->userdata('username');
		$data = array(
			'customer_id'=>"ldliu",
			'food_id'=>5,
			'food_amount'=>1
			);
		// add this item to shopping cart
		$this->Test_model->add_item($data);
	}
	
			public function getshopping_cart()
	{	$id="ldliu";
		$data['shopping_cart'] = $this->Test_model->get_shopping_cart($id);
		var_dump($data);
		//$this->load->view('shopping_cart', $data);
	}
}
?>