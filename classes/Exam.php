<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../lib/Session.php');
	
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php
	class Exam{
		private $db;
		private $fm;
		public function __construct(){
			$this ->db = new Database();
			$this ->fm = new Format();
		}

		
		public function addCTno($data){
			$userid   = $this ->fm -> validation($data['userid']);
			$ctname   = $this ->fm -> validation($data['ctname']);
			 $class_id   = $this ->fm -> validation($data['class_id']);
			if($userid == "" || $ctname == "" || $class_id == ""){
		    	$msg = "<span class='error'>fields must not be empty</span>";
				return $msg;
		    }	   
			$query = "INSERT INTO tbl_ct(userid,ctname,class_id) 
			VALUES('$userid', '$ctname','$class_id')";
			$inserted_row = $this ->db ->insert($query);

			if($inserted_row){
				$msg = "<span class='success'>Class Test title inserted successfully</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Class Test title   not inserted</span>";
				return $msg;
			}
		}
		
		public function getctTitle($class_id){
			$query = "SELECT * FROM tbl_ct WHERE class_id = '$class_id'" ; 
			$result = $this ->db ->select($query);
			return $result;
		}

		public function delCtTitle($id){
			$id = mysqli_real_escape_string($this ->db ->link, $id);
			$query = "DELETE FROM tbl_ct WHERE ct_id = '$id'";
			$deletedrow = $this ->db ->delete($query);		
		}
		public function getctNo($id){
			$id = mysqli_real_escape_string($this ->db ->link, $id);
			$query = "SELECT * FROM tbl_ct  WHERE ct_id = '$id'";
			$result = $this ->db ->select($query);
			return $result;	
		}
		public function getTotalRows(){
			$query = "SELECT * FROM tbl_ques";
			$result = $this ->db ->select($query);
			$totalrows = $result -> num_rows;
			return $totalrows;
		}
		public function getQuestions($id){
			$id = mysqli_real_escape_string($this ->db ->link, $id);
			$query = "SELECT * FROM tbl_ques  WHERE ct_id = '$id'";
			$result = $this ->db ->select($query);
			return $result;	
		}
		public function getfrstques($id){
			$query = "SELECT * FROM tbl_ques WHERE ct_id = '$id' ";
			$result = $this ->db ->select($query);
			
			$getfrstque = $result ->fetch_assoc();
			return $getfrstque;
		}
		public function getCrrntQuestion($qnumber){
			$query = "SELECT * FROM tbl_ques WHERE quesNo = '$qnumber'";
			$result = $this ->db ->select($query);
			$total = $result ->fetch_assoc();
			return $total;
		}
		public function getAnswer($qnumber){
			$query = "SELECT * FROM tbl_ans WHERE quesNo = '$qnumber'";
			$result = $this ->db ->select($query);
			return $result;
		}
		public function getProcess($data){
			$selectedAns = mysqli_real_escape_string($this ->db ->link, $data['ans']);
			$number = mysqli_real_escape_string($this ->db ->link, $data['number']);

			$next = $number + 1;

			if(!isset($_SESSION['score'])){
				$_SESSION['score'] = 0;
			}

			$total = $this ->getTotal();
			$right    = $this ->rightAns($number);

			if($right == $selectedAns){
				$_SESSION['score']++;
			}
			
			if($number == $total){
				echo '<script type="text/javascript">
				location.replace("final.php");
			  </script>';
				
				exit();
			}else{
				echo '<script type="text/javascript">
				location.replace("readyquiz.php?q=".$next);
			  </script>';
				
			}
		}
		private function getTotal(){
			$query = "SELECT * FROM tbl_ques";
			$result = $this ->db ->select($query);
			$totalrows = $result ->num_rows;
			return $totalrows;
		}

		private function rightAns($number){
			$query = "SELECT * FROM tbl_ans WHERE quesNo = '$number' AND rightAns = '2' ";
			$totalrows = $this ->db ->select($query) ->fetch_assoc();
			$result = $totalrows['id'];
			return $result;
		}
		public function delQues($id){
			$tables = array( "tbl_ans", "tbl_ques");

			foreach ($tables as $table) {
				$query = "DELETE FROM $table WHERE quesNo = '$id'";

				$deletedrow = $this ->db ->delete($query);
				}
		}
		public function addQuestion($data){
			$userid = mysqli_real_escape_string($this ->db ->link, $data['userid']);
			$class_id = mysqli_real_escape_string($this ->db ->link, $data['class_id']);
			$ct_id = mysqli_real_escape_string($this ->db ->link, $data['ct_id']);
			$ques = mysqli_real_escape_string($this ->db ->link, $data['ques']);
			$quesNo = mysqli_real_escape_string($this ->db ->link, $data['quesNo']);
			
			$ans = array();
			$ans[1] =$data['ans1'];
			$ans[2] =$data['ans2'];
			$ans[3] =$data['ans3'];
			$ans[4] =$data['ans4'];
			$rightAns =$data['rightAns'];
			$query = "INSERT INTO tbl_ques(userid,class_id,ct_id,quesNo, ques) VALUES('$userid','$class_id','$ct_id','$quesNo', '$ques')";
			$inserted_row = $this ->db ->insert($query);
			if($inserted_row){
				foreach ($ans as $key => $answer) {
					if($answer != ''){
						if($rightAns == $key){
							$rightquery = "INSERT INTO tbl_ans(class_id,ct_id,quesNo, rightAns, ans) VALUES('$class_id','$ct_id','$quesNo', '2', '$answer')";
						}else{
							$rightquery = "INSERT INTO tbl_ans(class_id,ct_id,quesNo, rightAns, ans) VALUES('$class_id','$ct_id','$quesNo', '1', '$answer')";
						}
						$inserted = $this ->db ->insert($rightquery);

						if($inserted){
							continue;
						}else{
							die('Error...');
						}
					}
				}

				$msg = "<span class='success'>Question added successfully</span>";
				return $msg;
			}
		}
		
		
	}
?>