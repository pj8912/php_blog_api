<?php
class Database{
	private $conn;
	private $host = 'localhost';
	private $uname = 'root';
	private $pwd = '';
	private  $dbname = 'myblog';

	public function connect(){
		$this->conn = null;
		try{
			$this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname,$this->uname, $this->pwd);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e){
			echo  "DB_ERR".$e->getMessage();
		}
		return $this->conn;
	}

}