<?php 
class database{
	public $conn;

	public function __construct()
	{
		$this->conn = new PDO('mysql:host=localhost;dbname=php2;charset=utf8','root','');
	}

	// lay tat ca ban ghi
	public function querySelectAll($sql)
	{
		return $this->conn->query($sql);
	}

	// lay 1 ban ghi
	public function queryGetOne($sql)
	{
		$one =  $this->conn->query($sql);
		return $one->fetch();
	}

	// thuc thi cau lenh them sua xoa
	public function queryExecSQL($sql)
	{
		$execSQL = $this->conn->prepare($sql);
		return $execSQL->execute();
	}



}


 ?>