<?php

class Board extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('board_m');
		$this->load->helper('url');
		$this->load->library('session');

	}

	public function get_board()
	{

		$data['posts'] = $this->board_m->list_board();
		$this->load->view('login/board.html',$data);
	}

	public function detail_board($board_num)
	{

		$data['post'] = $this->board_m->get_detail($board_num);
		$this->load->view('login/detail.html',$data);

	}

	public function delete($board_num)
	{

		$this->board_m->delete_text($board_num);

		redirect('http://localhost/web/board/get_board');
	}

	public function edit($board_num,$contents)
	{
		$board_num = $this->input->post('board_num');
		$contents = $this->input->post('contents');

		$this->board_m->edit_text($board_num, $contents);

		redirect('http://localhost/web/board/get_board');
	}

	public function new_update($board_num)
	{

		$data['post'] = $this->board_m->get_detail($board_num);
		$this->load->view('login/edit.html',$data);

	}


}
?>

