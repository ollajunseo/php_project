<?php

class Board_m extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function list_board()
	{
		$this->db->select('board_num, title, writer, board_date');
		$this->db->from('mem_board');
		$this->db->order_by('board_num', 'desc');

		$query = $this->db->get();

		return $query->result();
	}

	public function get_detail($board_num)
	{
		$this->db->select('board_num,title,contents, writer');
		$this->db->from('mem_board');
		$this->db->where('board_num', $board_num);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row();
		}else {
			return null;
		}

	}
	public function delete_text($board_num)
	{
		$this->db->where('board_num', $board_num);
		$this->db->delete('mem_board');
	}

	public function edit_text($board_num,$update_contents)
	{
		$update_data = array(
			'contents' => $update_contents
		);
		$this->db->where('board_num', $board_num);
		$this->db->update('mem_board', $update_data);
	}
}
?>
