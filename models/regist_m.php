<?php

class Regist_m extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function regist_user($data)
	{
		return $this->db->insert('members', $data);
	}
}
?>
