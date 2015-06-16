<?php

if (!defined("BASEPATH")) 
{
	exit("No direct script access allowed");
}

/**
* Controller Users Class
*/
class Users extends CI_Controller
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('users_model');
	}

	
	public function index()
	{
		// if you decided NOT to autoload the database library you would have to add this line: $this->load->library('database');
		$data["users"] = $this->users_model->get_users();

		$this->load->view("users_view", $data);
	}
}
