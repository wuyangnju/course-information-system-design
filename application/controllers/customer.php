<?php
class Customer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('food');
	}
	
	public function username()
	{
		echo $this->session->userdata('username');
	}

	public function info()
	{
		$id=$this->session->userdata('username');
		$data['customer'] = $this->Customer_model->show_customer($id);
		$this->load->view('header');
		$this->load->view('customer_info', $data);
		$this->load->view('footer');
		// Here we need to write a file named 'content'.
	}

	public function update(){
		//$id="jfang";
		$id=$this->session->userdata('username');
		$data = array(
			'cellphone_no'=>$this->input->post('cellphone_no'),
			'name'=>$this->input->post('name'),
			'address1'=>$this->input->post('address1_1')."_".$this->input->post('address1_2'),
			'address2'=>$this->input->post('address2_1')."_".$this->input->post('address2_2'),
			'address3'=>$this->input->post('address3_1')."_".$this->input->post('address3_2'),
			);
		// check whether the customer is in the database or not.
		$data1=$this->Customer_model->show_customer($id);
		if($data1)
		{
		$this->Customer_model->update_customer($id,$data);
		}else{
		$data['itsc_id'] = $id;
		$this->Customer_model->creat_customer($data);
		}
		redirect(base_url(), 'location', 301);
	}
}
?>