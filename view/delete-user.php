<?php include_once '../model/model.php'; ?>
<?php 
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$model = new model();
		$doDeleteUser = $model->delete('users',$id);
		if ($doDeleteUser == true) {
			header('Location:../view/admin-home-users-index.php');
		}
		else {
			echo 'khong xoa duoc';
		}
	}

?>