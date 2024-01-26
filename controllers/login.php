<?php

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('login_m');
		$this->load->library('session');
	}

	public function loginpage()
	{
		$this->load->view('login/login.html');
	}

	public function user_login()
	{
		$memid = $this->input->post('mem_id');
		$mempass  = $this->input->post('mem_pass');

		$result=$this->login_m->use_login($memid, $mempass);

		if ($result) {
			$session_data = array(
				'mem_id' => $result->mem_id,
				'mem_pass'=> $result->mem_pass,
				'logged_in'=> TRUE
			);

			$this->session->set_userdata($session_data);


			redirect('http://localhost/web/main');
		} else {
			echo "로그인 실패";
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('http://localhost/web/main');
	}
}
?>
