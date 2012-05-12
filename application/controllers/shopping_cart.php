<?php
class Shopping_cart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('food');
	}
	
	public function add(){
		//$id="jfang";
		$id=$this->session->userdata('username');
		$data = array(
			'customer_id'=>$id,
			'food_id'=>$this->input->post('food_id'),
			'food_amount'=>1
			);
		// add this item to shopping cart
		$this->Shopping_cart_model->add_item($data);
		echo $data['food_id'];
	}
	
	public function minus(){
		$id=$this->session->userdata('username');
		$food_id=$this->input->post('food_id');
		echo $food_id;
		$this->Shopping_cart_model->minus_item($id,$food_id);
	}
	
	public function getshopping_cart_item()
	{
		$id=$this->session->userdata('username');
		$food_id=$this->input->post('food_id');
		$data = $this->Shopping_cart_model->get_shopping_cart_item($id,$food_id);
		echo json_encode($data);
	}
	
	public function getshopping_cart_info()
	{
		$id=$this->session->userdata('username');
		echo json_encode($this->Shopping_cart_model->get_shopping_cart($id));
	}
	
	public function getshopping_cart()
	{
		$id=$this->session->userdata('username');
		$data['shopping_item'] = $this->Shopping_cart_model->get_shopping_cart($id);
		$this->load->view('header');
		$this->load->view('shopping_cart_info', $data);
		$this->load->view('footer');
	}
	
	public function drop(){
		$id=$this->session->userdata('username');
		$food_id=$this->input->post('food_id');
		echo $food_id;
		$this->Shopping_cart_model->drop_item($id,$food_id);
	}
	
}
?>