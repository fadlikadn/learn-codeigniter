<?php defined('BASEPATH') OR exit('No direct script access allowed');

include_once(APPPATH.'core/MY_Controller.php');

/**
* Product Controller Class
*/
class Product extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

	}

	public function addNew($name)
	{
		$product = new Entities\Product();
		$product->setName($name);

		try {
			$this->em->persist($product);
			$this->em->flush();
		} catch (Exception $e) {
			return false;
		}
		return true;
	}

	public function select()
	{
		$productRepository = $this->em->getRepository('Entities\Product');
		$products = $productRepository->findAll();

		foreach ($products as $product) {
			echo sprintf("-%s\n", $product->getName()."<br/>");
		}
	}

	public function find($id = null)
	{
		if (!is_null($id)) {
			$product = $this->em->find('Entities\Product', $id);

			if (is_null($product)) 
			{
				echo "No product found.\n";
			}
			else 
			{
				echo sprintf("-%s<br/>", $product->getName());
			}
		} else {
			echo "id not found";
		}
	}

	public function update($id = NULL)
	{
		if (!is_null($id)) {
			$product = $this->em->find('Entities\Product', $id);

			if (is_null($product)) {
				echo "Product $id does not exist.\n";
			} else {
				$product->setName("Daia");
				$this->em->flush();
			}
		} else {
			echo "id not found";
		}
	}


}

?>