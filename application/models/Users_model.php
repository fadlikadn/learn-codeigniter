<?php

/**
* 
*/
class Users_model extends CI_Model
{	
	function get_users()
	{
		// $this->db->where($where_arr);
		// $this->db->where(array('id' => 1, 'username' => 'fadlikadn'));
		$this->db->select('user_name, user_email');
		$query = $this->db->get('users');

		if ($query->num_rows() > 0) 
		{
			foreach ($query->result() as $row) 
			{
				$data[] = $row;
			}
			return $data;
		}
	}
}

