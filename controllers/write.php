<?php

class Write extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('write_m');

	}

	public function writepage()
	{
		$this->load->view('login/write.html');
	}

	public function do_write()
	{
		$title = $this->input->post('title');
		$contents = $this->input->post('contents');
		$writer = $this->session->userdata('mem_id');

		$result = $this->write_m->push_write($title, $contents, $writer);

		if ($result) {
			redirect('http://localhost/web/board/get_board');
		}


	}

}
?>
