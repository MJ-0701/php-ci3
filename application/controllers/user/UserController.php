<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Content-Type: application/json");
class UserController extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> database();
	}

	public function getUser() {
		$query = $this -> db -> query('SELECT id,user_name FROM test_table');
		$userArr = [];
		foreach ($query -> result() as $row) {
			$userArr[] = $row;
		}
		echo json_encode($userArr, JSON_UNESCAPED_UNICODE);
		}

}
