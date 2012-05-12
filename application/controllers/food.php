<?php
class Food extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('food');
	}

	public function gethotsale()
	{
		$data['food_list'] = $this->Food_model->get_hotsale();
		$data['title'] = "HotSales";
		$data['offer_period'] ="All Day";
		$this->load->view('header');
		$this->load->view('food_list', $data);
		$this->load->view('footer');
	}
	
	public function getbreakfast()
	{
		$data['food_list'] = $this->Food_model->get_breakfast();
		$data['title'] = "Breafast";
		$data['offer_period'] ="8:00am - 11:00am";
		$this->load->view('header');
		$this->load->view('food_list', $data);
		$this->load->view('footer');
	}
	
	public function getlunch()
	{
		$data['food_list'] = $this->Food_model->get_lunch();
		$data['title'] = "Lunch";
		$data['offer_period'] ="11:00am - 14:00pm";
		$this->load->view('header');
		$this->load->view('food_list', $data);
		$this->load->view('footer');
	}
	
	public function getsupper()
	{
		$data['food_list'] = $this->Food_model->get_supper();
		$data['title'] = "Supper";
		$data['offer_period'] ="16:00pm - 21:00pm";
		$this->load->view('header');
		$this->load->view('food_list', $data);
		$this->load->view('footer');
	}
}
?>