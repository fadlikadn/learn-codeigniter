<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

// use Entities\Product as ProductModel;

class Product extends REST_Controller 
{

	function __construct()
	{
		parent::__construct();
	}


	public function index_get()
	{
		// echo $this->em->getConnection()->getDatabase();
		// echo $this->doctrine->em->getConnection()->getDatabase();

		if (!$this->get('id')) 
		{
			$qb = $this->em->createQueryBuilder()->from('Entities\Product', 't')
												->select('t.id', 't.name');
			$products = ($qb->getQuery()->getArrayResult());
			$this->response($products, 200);
		} 
		else 
		{
			$qb = $this->em->createQueryBuilder()->from('Entities\Product', 'p')
													->select('p.id', 'p.name')
													->where('p.id = :id')
													->orderBy('p.name', 'ASC')
													->setParameter('id', $this->get('id'));
			$products = ($qb->getQuery()->getArrayResult());
			$this->response($products, 200);
		}
			
	}

	public function index_post()
	{
		if (!$this->post('id')) 
		{
			// Insert Data
			$product = new Entities\Product();
		}
		else 
		{
			// Update Data
			$product = $this->em->find('Entities\Product', $this->post('id'));
		}

		if (!$this->post('name'))
		{
			$this->response(array('error' => 'User could not be found'), 404);
		} 
		else
		{
			$product->setName($this->post('name'));

			try {
				$this->em->persist($product);
				$this->em->flush();
				$this->response(array('id' => $product->getId(), 
										'name' => $product->getName()), 200);
			} catch (Exception $e) {
				$this->response(array('error' => 'User could not be processed'), 404);
			}	
		}
	}

	public function index_put(){}
	public function index_update(){}
	public function index_delete()
	{
		if (!$_POST['id']) 
		{
			$this->response(array('error' => 'User could not be processed'), 404);
		}
		else
		{
			$product = $this->em->find('Entities\Product', $_POST['id']);

			if ($product) 
			{
				$this->em->remove($product);
				$this->em->flush();
				$message = array('id' => $_POST['id'], 'message' => 'DELETED!');
				$this->response($message, 200);
			}
			else
			{
				$message = array('id' => $_POST['id'], 'error' => 'User not found!');
				$this->response($message, 404);
			}
		}
	}
}

/* End of file Product.php */
/* Location: ./application/controllers/api/Product.php */
