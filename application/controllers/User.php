<?php defined('BASEPATH') OR exit('No direct script access allowed');

include_once(APPPATH.'core/MY_Controller.php');

/**
* 
*/
class User extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index() 
	{

	}

	public function get_single($id) 
	{
		try {
			$user = $this->em->find('Entities\User', $id);
			return $user;
		} catch (Exception $err) {
			return NULL;
		}
	}

	/**
	 * Return list of records according to given start index and length
	 * @param Int $start the start index number for the result entity list
	 * @param Int $length Determines how many records to fetch
	 * @param Array $criteria specify where conditions
	 * @param String $orderby specify columns, in which data should be ordered
	 * @return type
	 */
	function get_by_range($start = 0, $length = 10, $criteria = NULL, $orderby = NULL)
	{
		try {
			return $this->em->getRepository("Entities\User")->findBy($criteria, $orderby, $length, $start);
		} catch (Exception $err) {
			return NULL;
		}
	}

	/**
	 * Return the number of records
	 * @return Int
	 */
	function get_count()
	{
		try {
			$query = $this->em->createQueryBuilder()
								->select("COUNT(a)")
								->from("Entities\User", "a")
								->getQuery();
			return $query->getSingleScalarResult();
		} catch (Exception $err) {
			return 0;
		}
	}

	/**
	 * Save contact message to database
	 * @param  array $contact_from
	 * @param  [type]
	 * @return bool
	 */
	function save_message($data, $id = NULL)
	{
		/**
		 * @var User $user
		 */
		if (empty($id)) 
		{
			$user = new Entities\User();
		}
		else 
		{
			$user = $this->get_single($id);
		}
		$user->setUsername($data["username"]);
		$user->setPassword($data["password"]);
		$user->setEmail($data["email"]);

		try {
			// save to database
			$this->em->persist($user);
			$this->em->flush();
		} catch (Exception $err) {
			return false;
		}
		return true;
	}

	/**
	 * Delete an Entity according to given (list of) id(s)
	 * @param  type $ids array/single
	 * @return [type]
	 */
	function delete_entities($ids) 
	{
		try {
			if (!is_array($ids)) {
				$ids = array($ids);
			}
			foreach ($ids as $id) {
				$entity = $this->em->getPartialReference("Entities\User", $id);
				$this->em->remove($entity);
			}
			$this->em->flush();
			return TRUE;
		} catch (Exception $err) {
			return FALSE;
		}
	}

	/**
	 * Get list of users
	 * @return [type] [description]
	 */
	function get_data()
	{
		
	}


}

?>