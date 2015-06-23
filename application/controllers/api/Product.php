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
		// $this->em = $this->doctrine->em;
		echo $this->doctrine->em->getConnection()->getDatabase();
		
		if (!$this->post('name'))
		{
			$this->response(array('error' => 'User could not be found'), 404);
		} 
		else
		{
			$product = new Entities\Product();
			$product->setName($this->post('name'));
			// echo $product->getName();

			// echo $this->em->getConnection();

			$this->em->persist($product);
			$this->em->flush();

			// try {
			// 	$this->em->persist($product);
			// 	$this->em->flush();
			// } catch (Exception $e) {
			// 	$this->response(array('error' => 'User could not be processed'), 404);
			// }

			// $this->response($product, 200);
		}
	}

	public function index_put()
	{

	}

	public function index_update(){}
	public function index_delete(){}
}

/* End of file Product.php */
/* Location: ./application/controllers/api/Product.php */
