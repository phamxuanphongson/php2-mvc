<?php 
include 'db.php';
class model extends database{

	public function selectAll($nameTable)
	{
		$sql = "select * from $nameTable";
		return parent::querySelectAll($sql);
	}

	public function getOne($nameTable,$id)
	{
		$sql = "select * from $nameTable where id ='$id' ";
		return parent::queryGetOne($sql);
	}

	public function getMany($tableName,$where,$table_id)
	{
		$sql = "select * from $tableName where $where ='$table_id' ";
		return parent::querySelectAll($sql);
	}

	public function countAll($nameTable)
	{
		$sql = "select * from $nameTable";
		return parent::querySelectAll($sql)->rowcount();
	}

	public function getRecordsNWTOSL($nameTable,$where,$table_id,$orderBy,$sort,$limit)
	{
		$sql = "select * from $nameTable where $where = '$table_id' ORDER BY $orderBy $sort LIMIT $limit";
		return parent::querySelectAll($sql);
	}

	public function getRecordsNOSL($nameTable,$orderBy,$sort,$limit)
	{
		$sql = "select * from $nameTable ORDER BY $orderBy $sort LIMIT $limit";
		return parent::querySelectAll($sql);
	}

	public function getRecordsNOSLT($nameTable,$orderBy,$sort,$limit,$take)
	{
		$sql = "select * from $nameTable ORDER BY $orderBy $sort LIMIT $limit, $take";
		return parent::querySelectAll($sql);
	}

	public function delete($tableName,$id)
	{
		$sql = "delete from $tableName where id ='$id' ";
		return parent::queryExecSQL($sql);
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

	public function editAds($nameImage,$link,$id)
	{	
		if ($nameImage == null) {
			$sql = "update ads set link ='$link' where id = '$id'";
		}
		elseif ($link == null) {
			$sql = "update ads set images ='$nameImage' where id = '$id'";
		}
		else{
			$sql = "update ads set images='$nameImage',link='$link' where id = '$id'";
		}
		return parent::queryExecSQL($sql);
	}

	public function updateView($view,$id)
	{	
		
		$sql = "update posts set view='$view' where id = '$id'";
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