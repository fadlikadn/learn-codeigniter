<?php defined('BASEPATH') OR exit('No direct script access allowed');

include_once(APPPATH.'/libraries/REST_Controller.php');

/**
* 
*/
class User extends REST_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
	}

	/**
	 * Select data using data from CodeIgniter Model
	 * @return [type] [description]
	 */
	public function select_get()
	{
		// $userRepository = $this->em->getRepository('Entities\User');
		// $users = $userRepository->findAll();
		$users = $this->users_model->get_users();
		// $users = $this->em->findAll('Entities\User');
		// $productRepository = $this->em->getRepository('Entities\Product');
		// $products = $productRepository->findAll();

		// foreach ($products as $product) {
		// 	echo sprintf("-%s\n", $product->getName()."<br/>");
		// }
		
		if ($users) 
		{
			$this->response($users, 200);
		}
		else
		{
			$this->response(array('error' => 'Couldn\'t find any users!'), 404);
		}
	}


}

?>