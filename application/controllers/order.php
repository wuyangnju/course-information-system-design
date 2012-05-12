<?php
class Order extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('food');
	}
    // public function showorder(){
    	// $session_user=$this->session->userdata('username');
		// $data['order'] = $this->Order_model->show_order($session_user);
		// $this->load->view('order_info', $data);
    // }
	
	public function new_order(){
		$session_user=$this->session->userdata('username');
		//generate a new order
		$order_id = $this->Order_model->add_order($session_user);
		//build connection between order and food
		$this->Order_model->build_connection($session_user,$order_id);
		//empty shopping cart of someone
		$this->Shopping_cart_model->empty_cart($session_user);
		
		// show_order()
		$data['order_history'] = $this->Order_model->show_order($session_user);
		$data['username']=$session_user;
		$this->load->view('header');
		$this->load->view('order', $data);
		$this->load->view('footer');
	}
	
	public function show_order(){
		$session_user=$this->session->userdata('username');
		$data['order_history'] = $this->Order_model->show_order($session_user);
		$data['username']=$session_user;
		$this->load->view('header');
		$this->load->view('order', $data);
		$this->load->view('footer');
	}
	
	public function change_status(){
		$session_user=$this->session->userdata('username');
		$order_id = $this->input->post('order_id');
		echo $this->Order_model->change_status($session_user,$order_id);
	}
	
}
?>