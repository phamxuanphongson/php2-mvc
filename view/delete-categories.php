<?php include_once '../model/model.php'; ?>
<?php 
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$model = new model();
		$doDeleteCate = $model->delete('categories',$id);
		if ($doDeleteCate == true) {
			header('Location:../view/admin-home-categories-index.php');
		}
		else {
			echo 'khong xoa duoc';
		}
	}

?>