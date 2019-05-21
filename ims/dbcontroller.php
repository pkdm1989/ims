<?php
class DBController {
	private $host = "localhost";
	private $user = "kappsxyz_ims";
	private $password = "kappsxyz@007";
	private $database = "kappsxyz_ims";
	private $conn;
	
	function __construct($database) {
		$this->database = "kappsxyz_ims";//$database;
		$this->conn = $this->connectDB();
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
	
	function runQueryOnly($query) {
		$result = mysqli_query($this->conn,$query);
		return $result;
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		if($result) {
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
		}
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}
?>