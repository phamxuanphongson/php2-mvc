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
			elseif (isset($_POST['login']) || isset($_POST['login-btn']) ) {
				include_once '../view/login.php';
			}
			elseif (isset($_POST['register']) || isset($_POST['register-btn']) ) {
				
		        include_once '../view/register.php';
		        
		      
			}
			else{
				include_once '../view/home.php';
			}

			
		}


	}

	$ctrl = new controller();
	$ctrl->call();


 ?>