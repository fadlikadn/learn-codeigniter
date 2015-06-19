<?php defined('BASEPATH') OR exit('No direct script access allowed');

include_once(APPPATH.'core/MY_Controller.php');

/**
* Template Controller
*/
class Template extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->render_library();
	}
}

?>