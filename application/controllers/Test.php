<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Content-Type: application/json");
class Test extends CI_Controller
{
	function __construct() {
		parent::__construct();
//		$this -> load -> database();
		$this -> load -> model('user_model');
	}


	public function get_name() {
//		$this -> load -> database();
		$query = $this -> db -> query('SELECT id,user_name FROM test_table');
//		$nameArr = [];
		$userArr = [];
		foreach ($query -> result() as $row) {
//			$nameArr[] = $row -> user_name;
			$userArr[] = $row;
		}
		echo json_encode($userArr, JSON_UNESCAPED_UNICODE);
	}

	public function get_user() {
		$data['query'] = $this -> user_model -> get_user();
		echo json_encode($data, JSON_UNESCAPED_UNICODE);

	}

	public function insert_user() {

		$write_data= array(
			'user_name' => $this -> input -> post('user_name', TRUE)
		);

		$result = $this -> user_model -> insert_entry($write_data);

	}

	public function insert_name() {
		$user_name = $this -> input -> post('user_name', TRUE);
		$this -> user_model -> insert_name($user_name);
	}

	public function update_user($id) { // post 매핑 해야됨. -> put 매핑 하면 'user_name' 값이 null 나옴. -> php는 기본적으로 put 메소드 지원이 안됨.
		$update_data = array(
			'user_name' => $this -> input -> post('user_name', TRUE)
		);
		$this -> user_model -> update_user($id, $update_data);
	}


	public function user_delete($id) {
		$this -> user_model -> delete_user($id);

	}

}
