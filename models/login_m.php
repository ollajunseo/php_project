<?php

class Login_m extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function use_login($memid,$mempass)
	{
		$this->db->where('mem_id', $memid);
		$query = $this->db->get('members');

		if ($query->num_rows() == 1) {
			$result = $query->row();
			if ($mempass == $result->mem_pass) {
				return $result;
			}
		}




	}

}
?>
