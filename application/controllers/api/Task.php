<?php defined('BASEPATH') OR exit('No direct script access allowed');

include_once(APPPATH.'/libraries/REST_Controller.php');

/**
 * Task Controller API
 * 
 */
class Task extends REST_Controller
{
	
	function __construct()
	{
		// Construct our parent class
		parent::__construct();
		$this->load->model('task_model');
	}

	public function index_get()
	{
		if (!$this->get('id')) {
			$tasks = $this->task_model->select(); // return all record
		} else {
			$tasks = $this->task_model->search('id', $this->get('id')); // return a record based on id
		}

		if ($tasks) {
			$this->response($tasks, 200); // return success code if record exist
		} else {
			$this->response([], 404); // return empty
		}
	}

	public function index_post()
	{
		if (!$this->post('title')) {
			$this->response(array('error' => 'Missing post data: title'), 400);
		} else {
			$data = array(
				'title' => $this->post('title')
			);
		}

		// $task = $this->task_model->add($data);
		$this->db->insert('task', $data);
		// if ($task == true) {
		if ($this->db->insert_id() > 0) {
			$message = array(
				'id' => $this->db->insert_id(), 
				'title' => $this->post('title')
			);
			$this->response($message, 200);
		}
	}

	public function index_put()
	{
		if (!$this->put('title')) {
			$this->response(array('error' => 'Task title is required'), 400);
		}

		$data = array(
			'title' => $this->put('title'),
			'status' => $this->put('status')
		);
		// $this->task_model->update_task($this->put('id'), $data);
		$this->task_model->update('id', $this->put('id'), $data);
		$message = array('success' => $this->put('title').' Updated!');
		$this->response($message, 200);
	}

	public function index_delete($id = NULL)
	{
		if ($id == NULL) {
			$message = array('error' => 'Missing delete data: id');
			$this->response($message, 400);
		} else {
			// $this->task_model->delete_task($id);
			$this->task_model->delete('id', $id);
			$message = array('id' => $id, 'message' => 'DELETED!');
			$this->response($message, 200);
		}
	}

}