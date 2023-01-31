<?php 
require_once 'models/Model.php';
class User extends Model{
	public $id;
	public $username;
	public $password;

	public function isExisUsername($username){
		// + Tạo câu truy vấn dạng tham số
		$sql_select_one = "SELECT * FROM `users` WHERE `username` = :username";

		// + Tạo đối tượng truy vấn, prepare
		$obj_select_one = $this->connection->prepare($sql_select_one);

		// + Tạo mảng để truyền giá trị thật cho tham số trong câu truy vấn
		$arr_select = [
			':username' => $username
		];

		// + Thực thi đối tượng truy vấn execute
		$obj_select_one->execute($arr_select);

		// + Lấy mảng trả về fetch
		$user = $obj_select_one->fetch(PDO::FETCH_ASSOC);
		if (!empty($user)) {
			return TRUE;
		}

		return FALSE;


	}


	// public function register($username, $password){

	// }
}

?>