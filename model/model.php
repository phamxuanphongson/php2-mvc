<?php 
include 'db.php';
class model extends database{


	public function selectAllPosts()
	{
		$sql = "select * from posts";
		return parent::querySelectAll($sql);
	}

	public function selectAllCates()
	{
		$sql = "select * from categories";
		return parent::querySelectAll($sql);
	}

	public function selectAllUsers()
	{
		$sql = "select * from users";
		return parent::querySelectAll($sql);
	}

	public function getOnePost($id)
	{
		$sql = "select * from posts where id ='$id' ";
		return parent::queryGetOne($sql);
	}

	public function get2LastRecords()
	{
		$sql = "select * from posts ORDER BY id DESC LIMIT 2";
		return parent::querySelectAll($sql);
	}

	public function get20LastRecords()
	{
		$sql = "select * from posts ORDER BY id DESC LIMIT 20";
		return parent::querySelectAll($sql);
	}

	public function get3LastRecordsAfter20Posts()
	{
		$sql = "select * from posts ORDER BY id DESC LIMIT 20, 3";
		return parent::querySelectAll($sql);
	}

	public function getOneCate($id)
	{
		$sql = "select * from categories where id ='$id' ";
		return parent::queryGetOne($sql);
	}

	public function addAccount($username,$password,$email)
	{
		$sql = "insert into users value (NULL,N'$username',N'$password',N'$email')";
		return parent::queryExecSQL($sql);
	}

	public function addPost($title,$short_desc,$content,$nameImage,$cate_id)
	{	
		
		$sql = "insert into posts value (NULL,N'$title',N'$short_desc',N'$content',N'$nameImage',N'$cate_id')";
		return parent::queryExecSQL($sql);
	}

	public function uploadImage($fileImage)
	{
		$fileImageName = $fileImage['name'];
		$imageTempName = $fileImage['tmp_name'];
		$storeAs = '../uploaded/images/';
		move_uploaded_file($imageTempName, $storeAs.$fileImageName);
		return $fileImageName;
	}


}

 ?>