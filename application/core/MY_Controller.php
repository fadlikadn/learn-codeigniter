<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class MY_Controller extends CI_Controller
{
	// Doctrine EntityManager
	public $em;

	protected $data = array();

	function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = 'CodeIgniter Application';

		$this->em = $this->doctrine->em;
	}

	// Render template view, using more than one template
	protected function render($the_view = NULL, $template = 'master')
	{
		if ($template == 'json' || $this->input->is_ajax_request()) 
		{
			header('Content-Type: application/json');
			echo json_encode($this->data);
		} 
		elseif (is_null($template)) 
		{
			$this->load->view($the_view, $this->data);
		}
		else 
		{
			$this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view, $this->data, TRUE);
			$this->load->view('templates/'.$template.'_view', $this->data);
		}
	}

	protected function render_library($the_view = NULL, $template = 'master_library')
	{
		if (is_null($template)) 
		{
			$this->load->view($the_view, $this->data);
		}
		else
		{
			$this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view, $this->data, TRUE);
			$this->load->view('templates/'.$template.'_view', $this->data);
		}
	}
}
