<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../lib/Session.php');
	
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php
	class Settings{
		private $db;
		private $fm;
		public function __construct(){
			$this ->db = new Database();
			$this ->fm = new Format();
		}

	
		
		public function get_student($code){
			$query = "SELECT * FROM tbl_joinclass WHERE classcode = '$code' AND status= '0' " ; 
			$result = $this ->db ->select($query);
			return $result;
		}
		public function get_all_student($code){
			$query = "SELECT * FROM tbl_joinclass WHERE classcode = '$code' AND status= '1' " ; 
			$result = $this ->db ->select($query);
			return $result;
		}
		public function acceptstudent($accptId){
			$query = "UPDATE tbl_joinclass SET status = '1'  WHERE jclass_id = '$accptId'";
			$updatedrow = $this ->db ->update($query);
		}
		public function declinestudent($declId){
			
			$query = "DELETE FROM tbl_joinclass WHERE jclass_id = '$declId'";
			$deletedrow = $this ->db ->delete($query);		
		}
		
	}
?>