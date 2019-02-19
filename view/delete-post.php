<?php include_once '../model/model.php'; ?>
<?php 
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$model = new model();
		$doDeletePost = $model->deletePost($id);
		if ($doDeletePost == true) {
			header('Location:../view/admin-home-posts-index.php');
		}
		else {
			echo 'khong xoa duoc';
		}
	}

?>