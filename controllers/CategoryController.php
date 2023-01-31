<?php 
require_once 'controllers/Controller.php';


class CategoryController extends Controller{
	public function index(){
		$this->content = $this->render("views/categories/index.php");
		require_once "views/layouts/main.php";
	}

	public function create(){

		$this->content = $this->render("views/categories/create.php");
		require_once "views/layouts/main.php";
	}
}


?>