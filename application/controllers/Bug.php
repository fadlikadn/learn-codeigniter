<?php defined('BASEPATH') OR exit('No direct script access allowed');

include_once(APPPATH.'core/MY_Controller.php');

/**
* Bug Controller Class
*/
class Bug extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

	}

	public function addNew($theReporterId, $theDefaultEngineerId, $productIdsArray)
	{
		$productIds = explode(",", $productIdsArray);

		$reporter = $this->em->find("Entities\User", $theReporterId);
		$engineer = $this->em->find("Entities\User", $theDefaultEngineerId);
		if (!$reporter || !$engineer) {
			echo "No reporter and/or engineer found for the input.<br/>";
			exit(1);
		}

		$bug = New Entities\Bug();
		$bug->setDescription("Something does not work!");
		$bug->setCreated(new DateTime("now"));
		$bug->setStatus("OPEN");

		foreach ($productIds as $productId) {
			$product = $this->em->find("Entities\Product", $productId);
			$bug->assignToProduct($product);
		}

		$bug->setReporter($reporter);
		$bug->setEngineer($engineer);

		$this->em->persist($bug);
		$this->em->flush();

		echo "You new Bug Id: ".$bug->getId()."<br/>";
	}

	public function select()
	{
		$dql = "SELECT b, e, r FROM Entities\Bug b JOIN b.engineer e JOIN b.reporter r ORDER BY b.created DESC";

		$query = $this->em->createQuery($dql);
		// $query->setMaxResults(30);
		$bugs = $query->getResult();
		echo "<br/><br/>";

		foreach ($bugs as $bug) {
			echo $bug->getDescription()." - ".$bug->getCreated()->format('d.m.Y')."<br/>";
			echo "     Reported by: ".$bug->getReporter()->getUsername()."<br/>";
			echo "     Assigned to: ".$bug->getEngineer()->getUsername()."<br/>";
			foreach ($bug->getProducts() as $product) {
				echo "     Platform: ".$product->getName()."<br/>";
			}
			echo "<br/>";
		}
	}

	public function select_repository()
	{
		$bugs = $this->em->getRepository('Entities\Bug')->getRecentBugs();

		echo "<br/>";
		foreach ($bugs as $bug) {
			echo $bug->getDescription()." - ".$bug->getCreated()->format('d.m.y')."<br/>";
			echo "     Reported by: ".$bug->getReporter()->getUsername()."<br/>";
			echo "     Assigned to: ".$bug->getEngineer()->getUsername()."<br/>";
			foreach ($bug->getProducts() as $product) {
				echo "     Platform: ".$product->getName()."<br/>";
			}
			echo "<br/>";
		}
	}

	public function select_array()
	{
		$dql = "SELECT b, e, r, p FROM Entities\Bug b JOIN b.engineer e".
				" JOIN b.reporter r JOIN b.products p ORDER BY b.created DESC";
		$query = $this->em->createQuery($dql);
		$bugs = $query->getArrayResult();
		echo "<br/><br/>";

		foreach ($bugs as $bug) {
			echo $bug['description']." - ".$bug['created']->format('d.m.Y')."<br/>";
			echo "     Reported by: ".$bug['reporter']['username']."<br/>";
			echo "     Assigned to: ".$bug['engineer']['username']."<br/>";
			foreach ($bug['products'] as $product) {
				echo "     Platform: ".$product['name']."<br/>";
			}
			echo "<br/>";
		}
	}

	public function find_id($id)
	{
		if (!is_null($id)) {
			$bug = $this->em->find("Entities\Bug", (int) $id);

			echo "Bug: ".$bug->getDescription()."<br/>";
			echo "Engineer: ".$bug->getEngineer()->getUsername()."<br/>";
		}
	}

	public function dashboard($id)
	{
		$dql = "SELECT b, e, r FROM Entities\Bug b JOIN b.engineer e JOIN b.reporter r ".
				"WHERE b.status = 'OPEN' AND (e.id = ?1 OR r.id = ?1) ORDER BY b.created DESC";

		$mybugs = $this->em->createQuery($dql)
							->setParameter(1, $id)
							->setMaxResults(15)
							->getResult();

		echo "You have created or assigned to ".count($mybugs)." open bugs:<br/><br/>";

		foreach ($mybugs as $bug) {
			echo $bug->getId()." - ".$bug->getDescription()."<br/>";
		}
	}

	public function numberbugs()
	{
		$dql = "SELECT p.id, p.name, count(b.id) AS openBugs FROM Entities\Bug b ".
				"JOIN b.products p WHERE b.status = 'OPEN' GROUP BY p.id";
		$productBugs = $this->em->createQuery($dql)->getScalarResult();

		foreach ($productBugs as $productBug) {
			echo $productBug['name']." has ".$productBug['openBugs']." 	open bugs!<br/>";
		}
	}

	public function close($id)
	{
		$bug = $this->em->find("Entities\Bug", (int) $id);
		$bug->close();

		$this->em->flush();
	}
}

?>