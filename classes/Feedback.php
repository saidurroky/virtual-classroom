<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../lib/Session.php');
	
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php
	class Feedback{
		private $db;
		private $fm;
		public function __construct(){
			$this ->db = new Database();
			$this ->fm = new Format();
		}

		
		public function addfeedback($data){
			$userid   = $this ->fm -> validation($data['userid']);
			$star   = $this ->fm -> validation($data['star']);
			$feedback   = $this ->fm -> validation($data['feedback']);
			$class_id   = $this ->fm -> validation($data['class_id']);
			if($userid == ""|| $star == "" || $feedback == "" || $class_id == "" ){
		    	$msg = "<span class='error'>fields must not be empty</span>";
				return $msg;
		    }

		   
			$query = "INSERT INTO tbl_feedback(userid,star,feedback,class_id) 
			VALUES('$userid', '$star', '$feedback','$class_id')";
			$inserted_row = $this ->db ->insert($query);

			if($inserted_row){

				$msg = "<span class='success'>feedback inserted successfully</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>feedback not inserted</span>";
				return $msg;
			}
		}
		
		public function getfeedback($class_id){
			$query = "SELECT * FROM tbl_feedback WHERE class_id = '$class_id'" ; 
			$result = $this ->db ->select($query);
			return $result;
		}
		
		public function getstudent(){
			$query = "SELECT * FROM tbl_user WHERE role = '2'" ; 
			$result = $this ->db ->select($query);
			return $result;
		}
		
		
	}
?>