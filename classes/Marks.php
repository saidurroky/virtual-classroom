<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../lib/Session.php');
	
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php
	class Marks{
		private $db;
		private $fm;
		public function __construct(){
			$this ->db = new Database();
			$this ->fm = new Format();
		}

		
		public function add_mark($data){
			$name   = $this ->fm -> validation($data['name']);
			$user_id   = $this ->fm -> validation($data['user_id']);
			$class_id   = $this ->fm -> validation($data['class_id']);
			$ct1   = $this ->fm -> validation($data['ct1']);
			$ct2   = $this ->fm -> validation($data['ct2']);
			$assignment   = $this ->fm -> validation($data['assignment']);
			$attendence   = $this ->fm -> validation($data['attendence']);
			$final   = $this ->fm -> validation($data['final']);
			

			if($user_id == "" || $assignment == "" || $final == "" || $ct1 == "" || $ct2 == "" || $attendence == "" ){
		    	$msg = "<span class='error'>fields must not be empty</span>";
				return $msg;
		    }

		   
			$query = "INSERT INTO tbl_marks(name,userid,class_id,ct1,ct2,assignment,attendence,final) 
			VALUES('$name', '$user_id','$class_id', '$ct1','$ct2','$assignment','$attendence','$final')";
			$inserted_row = $this ->db ->insert($query);

			if($inserted_row){

				$msg = "<span class='success'>Marks inserted successfully</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Marks not inserted</span>";
				return $msg;
			}
		}
		
		public function getmarks($class_id){
			$query = "SELECT * FROM tbl_marks WHERE class_id = '$class_id'" ; 
			$result = $this ->db ->select($query);
			return $result;
		}
		
		
		
	}
?>