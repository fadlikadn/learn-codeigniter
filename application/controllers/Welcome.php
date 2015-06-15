<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// include_once(APPPATH.'core/Admin_Controller.php');
include_once(APPPATH.'core/MY_Controller.php');

class Welcome extends MY_Controller {

	function __construct() 
	{
		parent::__construct();
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// $this->load->view('welcome_message', $this->data);
		// parent::render();
		$this->render('homepage_view');
		// $this->render();
	}

	public function createNewUser() 
	{
		$user = new Entities\User;
		// $user->setUsername('fadlikadn');
		// $user->setPassword('mitrais');
		// $user->setEmail('fadlikadn@gmail.com');

		$user->setUsername('fauzan');
		$user->setPassword('ugm');
		$user->setEmail('fauzan@gmail.com');


		$this->em->persist($user);
		$this->em->flush();
	}
}
