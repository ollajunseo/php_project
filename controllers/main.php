<?php

class Main extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('regist_m');
		$this->load->library('session');


	}

	public function index()
	{
		$this->load->view("/login/main.html");
	}

	public function regist()
	{
		$this->load->view("login/sign.html");

	}


	public function regist_start()
	{
		$data = array(
			'mem_id' => $this->input->post('mem_id'),
			'mem_pass' => $this->input->post('mem_pass'),
			'mem_name' => $this->input->post('mem_name')
		);

		$result=$this->regist_m->regist_user($data);

		if ($result){
			redirect('http://localhost/web/login/loginpage');
		}

	}





}
?>
