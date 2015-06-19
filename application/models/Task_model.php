<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Class Task
*/
class Task_model extends CI_Model
{
	private $table_name;

	public function __construct()
	{
		parent::__construct();
		$this->table_name = 'task';
	}

	public function add($data)
	{
		$this->db->insert($this->table_name, $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function select()
	{
		$query = $this->db->get($this->table_name);
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		} else {
			return null;
		}
	}

	public function search($key, $value)
	{
		$this->db->like($key, $value);
		$query = $this->db->get($this->table_name);
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		} else {
			return null;
		}
	}

	public function update($key, $value, $data)
	{
		$this->db->where($key, $value);
		$this->db->update($this->table_name, $data);
		if ($this->db->affected_rows() >0) {
			return true;
		} else {
			return false;
		}
	}

	public function delete($key, $value)
	{
		$this->db->where($key, $value);
		$this->db->delete($this->table_name);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}

?>