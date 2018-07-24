<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../lib/Session.php');
	
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php

class Shout{
	private $db;

	public function __construct(){
    $this->db = new Database();
    $this ->fm = new Format();
}



	public function getAllData(){

		$query="SELECT * FROM tbl_box ORDER BY id DESC";
		$result=$this->db->select($query);

		return $result;
	}

	public function addShout($data){

	$class_id   = $this ->fm -> validation($data['class_id']);
	$name   = $this ->fm -> validation($data['name']);
	$body   = $this ->fm -> validation($data['body']);
	
	date_default_timezone_set('Asia/Dhaka');

	
	$time = date('h:i:s',time());
	

	$query = "INSERT INTO tbl_box(class_id,name,body,time) VALUES('$class_id','$name','$body','$time')";
	$this->db->insert($query);
	 echo '<script type="text/javascript">
				location.replace("session.php");
			  </script>';
	}

	
}

?>