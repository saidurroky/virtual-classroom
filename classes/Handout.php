<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../lib/Session.php');
	
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php
	class handout{
		private $db;
		private $fm;
		public function __construct(){
			$this ->db = new Database();
			$this ->fm = new Format();
		}

		
		public function addHandout($data){
			$userid   = $this ->fm -> validation($data['userid']);
			$handout   = $this ->fm -> validation($data['handout']);
			$class_id   = $this ->fm -> validation($data['class_id']);
			if($userid == "" || $handout == "" || $class_id == ""){
		    	$msg = "<span class='error'>fields must not be empty</span>";
				return $msg;
		    }

		   
			$query = "INSERT INTO tbl_handout(userid,handout,class_id) 
			VALUES('$userid', '$handout','$class_id')";
			$inserted_row = $this ->db ->insert($query);

			if($inserted_row){

				$msg = "<span class='success'>Handout inserted successfully</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Handout not inserted</span>";
				return $msg;
			}
		}
		
		public function gethandout($class_id){
			$query = "SELECT * FROM tbl_handout WHERE class_id = '$class_id'" ; 
			$result = $this ->db ->select($query);
			return $result;
		}
		
		
		public function delhandout($id){
			$id = mysqli_real_escape_string($this ->db ->link, $id);
			$query = "DELETE FROM tbl_handout WHERE handout_id = '$id'";
			$deletedrow = $this ->db ->delete($query);

			
		}
		
	}
?>