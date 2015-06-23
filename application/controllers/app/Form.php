<?php defined('BASEPATH') OR exit('No direct script access allowed');

include_once(APPPATH.'core/MY_Controller.php');

/**
* JSON Form Controller.
* To demo process JSON in codeIgniter
*/
class Form extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('json_model');
	}

	/**
	 * Load view page
	 * @return [type] [description]
	 */
	public function index()
	{
		$this->load->view('view_form');
	}

	/**
	 * Fetch user data and convery data into json
	 * @return [type] [description]
	 */
	public function data_submitted() 
	{
		// Store user submitted data in array
		$data = array(
			'employee_name' => $this->input->post('emp_name'), 
			'employee_email' => $this->input->post('emp_email'),
			'employee_gender' => $this->input->post('select'),
			'employee_address' => $this->input->post('address'),
		);

		// Converting $data in json
		$json_data['emp_data'] = json_encode($data);

		// Send json encoded data to model
		$return = $this->json_model->insert_json_in_db($json_data);
		if ($return == true) {
			$data['result_msg'] = 'Json data successfully inserted into database!';
		} else {
			$data['result_msg'] = 'Please configure your database correctly';
		}

		// Load view to show message
		$this->load->view('view_form', $data);
	}



}



?>