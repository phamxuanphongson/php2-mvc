<?php 
	include '../model/model.php';
	class controller{
		public $model;

		public function __construct()
		{
			$this->model = new model();
			
		}

		public function call()
		{	

			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				include_once '../view/post-detail.php';
			}
			elseif (isset($_POST['login-btn']) ) {
				include_once '../view/login.php';
			}
			elseif(isset($_POST['save-newpost-btn'])){
				include_once '../view/add-posts.php';
			}
			elseif (isset($_POST['save-editpost-btn'])) {
				include_once '../view/edit-post.php';
			}
			elseif (isset($_POST['save-newcate-btn'])) {
				include_once '../view/add-categories.php';
			}
			elseif (isset($_POST['save-editcate-btn'])) {
				include_once '../view/edit-categories.php';
			}
			elseif (isset($_POST['save-editads-btn'])) {
				include_once '../view/edit-ads.php';
			}
			elseif(isset($_GET['register'])){
				include_once '../view/register.php';
			}
			elseif (isset($_GET['categories'])) {
				$id = $_GET['categories'];
				include_once '../view/categories.php';
				
			}
			else{
				include_once '../view/home.php';
			}

			

		}
	}

	$ctrl = new controller();
	$ctrl->call();


 ?>