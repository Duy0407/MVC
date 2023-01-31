<?php
require_once 'controllers/Controller.php';
// require_once 'models/User.php';

class UserController extends Controller{
	public function login(){

		$this->content = $this->render("views/users/login.php");
		require_once 'views/layouts/main_login.php';
	}


	public function register(){
		echo "<pre>";
	    print_r($_POST);
	    echo "</pre>";

	    if (isset($_POST['register'])) {
	    	$username = $_POST['username'];
	    	$password = $_POST['password'];
	    	$confirm_password = $_POST['confirm_password'];

	    	if (empty($username) || empty($password) || empty($confirm_password)) {
	    		$this->error = "Không được bỏ trống các trường";
	    	}else if ($password != $confirm_password) {
	    		$this->error = "Mật khẩu phải trùng nhau";
	    	}

	    	if (empty($this->error)) {
	    		$user_model = new User();
	    		$is_exist_username = $user_model->isExisUsername($username);

	    		if ($is_exist_username) {
	    			$this->error = "Username này đã tồn tại";
	    		}else{
	    			$password = md5($password);
	    			// $is_register = $user_model->
	    		}
	    	}
	    }

	    $this->content = $this->render("views/users/register.php");
		require_once 'views/layouts/main_login.php';
	}
}


?>