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

	public function countAllPosts()
	{
		$sql = "select * from posts";
		return parent::querySelectAll($sql)->rowcount();
	}

	public function countAllCates()
	{
		$sql = "select * from categories";
		return parent::querySelectAll($sql)->rowcount();
	}

	public function countAllUsers()
	{
		$sql = "select * from users";
		return parent::querySelectAll($sql)->rowcount();
	}

	public function getOnePost($id)
	{
		$sql = "select * from posts where id ='$id' ";
		return parent::queryGetOne($sql);
	}

	public function getLastRecord()
	{
		$sql = "select * from posts ORDER BY id DESC LIMIT 1";
		return parent::querySelectAll($sql);
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

	public function addCate($name,$color)
	{	
		
		$sql = "insert into categories value (NULL,N'$name',N'$color')";
		return parent::queryExecSQL($sql);
	}

	public function editPost($title,$short_desc,$content,$nameImage,$cate_id,$id)
	{	
		
		if ($nameImage == null) {
			
			$sql = "update posts set title='$title',short_desc='$short_desc',content='$content',cate_id='$cate_id' where id = '$id'";
		}
		else {
			$sql = "update posts set title='$title',short_desc='$short_desc',content='$content',images ='$nameImage',cate_id='$cate_id' where id = '$id'";
		}
		
		return parent::queryExecSQL($sql);
	}

	public function editCate($name,$color,$id)
	{	
		
		$sql = "update categories set name='$name',color='$color' where id = '$id'";
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

	public function deletePost($id)
	{
		$sql = "delete from posts where id ='$id' ";
		return parent::queryExecSQL($sql);
	}

	public function deleteCate($id)
	{
		$sql = "delete from categories where id ='$id' ";
		return parent::queryExecSQL($sql);
	}

	public function getAllPostsFromCateId($cate_id)
	{
		$sql = "select * from posts where cate_id ='$cate_id' ";
		return parent::querySelectAll($sql);
	}

}

 ?>