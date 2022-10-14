<?php

class User_model extends CI_Model {

	public $id;
	public $user_name;

	public function __construct() {
		parent::__construct();
		$this -> load -> database();
	}

	// C
	public function insert_entry($arrays) {

		$this -> db -> trans_start();
		$this -> db -> insert('test_table', $arrays);
		$this -> db -> trans_complete();

	}

	public function insert_name($name) {
		$this -> db -> trans_start();
		$sql = "INSERT INTO test_table(user_name) VALUES ('".$name."')";
		$this -> db -> query($sql);
		$this -> db -> trans_complete();
	}



	// R
	public function get_user(): array
	{
		$this -> db -> trans_off();
		$query = $this -> db -> query('SELECT id,user_name FROM test_table');
		$userArr = [];
		foreach ($query -> result() as $row) {
			$userArr[] = $row;
		}
		return $userArr;
	}

	// U
	public function update_user($id, $update_data) {

		$this -> db -> trans_start();
		$this -> db -> update('test_table', $update_data, array('id' => $id));
		$this -> db -> trans_complete();
	}

	// D
	public function delete_user($id) {
		$this -> db -> trans_start();
		$sql = "DELETE FROM test_table WHERE id = '".$id."'";
		$this -> db -> query($sql);
		$this -> db -> trans_complete();
}

}
