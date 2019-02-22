<?php session_start(); ?>
<?php 
	if (isset($_SESSION['auth'])) {
		session_destroy();
		header('Location:../index.php');
	} 
?>
