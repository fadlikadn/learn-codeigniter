<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Example
 *
 * This is an example of a few basic user interaction methods you coudld use
 * all done with a hardcoded array.
 *
 * @package CodeIgniter
 * @subpackage Rest Server
 * @category Controller
 * @author Fadlika Dita Nurjanto
 * @link http://fadlikadn.wordpress.com
 */

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';

/**
* 
*/
class Widgets extends REST_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index_get($id = '') 
	{
		// Example data for testing
		$widgets = array(
					1 => array('id' => 1, 'name' => 'sprocket'),
					2 => array('id' => 2, 'name' => 'gear')
			);

		if (!$id) {
			$id = $this->get('id');
		}

		if (!$id) {
			if ($widgets) {
				$this->response($widgets, 200);
			} else {
				$this->response(array('error' => 'Couldnt find any widgets!'), 404);
			}
		}

		$widget = @$widgets[$id];

		if ($widget) {
			$this->response($widget, 200);
		} else {
			$this->response(array('error' => 'Widget could not be found'), 404);
		}
	}
}

?>