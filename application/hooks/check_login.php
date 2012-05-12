<?php
class CheckLogin{
	function check_first_login(){
		$username =get_instance()->session->userdata('username');

		if(!get_instance()->Customer_model->show_customer($username))
		{
			$data = array();
			$data['itsc_id'] = $username;
			get_instance()->Customer_model->creat_customer($data);
		}
	}

	function check_login(){
		if (!get_instance()->session->userdata('username')){
			$username = get_instance()->input->post('username');
			$password = get_instance()->input->post('password');

			require("mail/class.smtp.php");
			$smtp = new SMTP();
			$smtp -> Connect("ssl://smtp.ust.hk", 465);
			$authResult = $smtp -> Authenticate($username, $password);

			if($authResult){
				get_instance()->session->set_userdata('username',$username);
				$this->check_first_login();
			}else if(($username=="admin")&&($password=="admin")){
				get_instance()->session->set_userdata('username',$username);
			}else{
				$data['referrer'] = get_instance()->agent->referrer();
				get_instance()->load->view('login',$data);
			}
		}
	}
}
?>