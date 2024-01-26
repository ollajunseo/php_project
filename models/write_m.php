<?php

class Write_m extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function push_write ($title, $contents, $writer)
	{
		$board_date = date('Y-m-d H:i:s');

		$write_data = array(
			'title' => $title,
			'contents' => $contents,
			'writer' => $writer,
			'board_date' => $board_date
		);
		$result = $this->db->insert('mem_board', $write_data);

		if ($result) {
			return true;
		}
	}


}
?>
