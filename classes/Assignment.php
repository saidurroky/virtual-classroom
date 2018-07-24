<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../lib/Session.php');
	
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php
	class Assignment{
		private $db;
		private $fm;
		public function __construct(){
			$this ->db = new Database();
			$this ->fm = new Format();
		}

		
		public function addAssignment($data){
			$userid   = $this ->fm -> validation($data['userid']);
			$asn_topic   = $this ->fm -> validation($data['asn_topic']);
			$deadline   = $this ->fm -> validation($data['deadline']);
			$class_id   = $this ->fm -> validation($data['class_id']);
			if($userid == "" || $asn_topic == "" || $deadline== "" || $class_id == ""){
		    	$msg = "<span class='error'>fields must not be empty</span>";
				return $msg;
		    }

		   
			$query = "INSERT INTO tbl_assignment(userid,asn_topic,deadline,class_id) 
			VALUES('$userid', '$asn_topic','$deadline','$class_id')";
			$inserted_row = $this ->db ->insert($query);

			if($inserted_row){

				$msg = "<span class='success'>Assignment topic inserted successfully</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Assignment topic not inserted</span>";
				return $msg;
			}
		}
		
		public function getassignment($class_id){
			$query = "SELECT * FROM tbl_assignment WHERE class_id = '$class_id'" ; 
			$result = $this ->db ->select($query);
			return $result;
		}
		public function get_singel_assignment($id){
			$query = "SELECT * FROM tbl_assignment WHERE assignment_id = '$id'" ; 
			$result = $this ->db ->select($query);
			return $result;
		}
		
		public function delassignment($id){
			$id = mysqli_real_escape_string($this ->db ->link, $id);
			$query = "DELETE FROM tbl_assignment WHERE assignment_id = '$id'";
			$deletedrow = $this ->db ->delete($query);		
		}
		
		public function addAssignmentReplay($data, $file){
			$userid   = $this ->fm -> validation($data['userid']);
			$assignment_id         = $this ->fm -> validation($data['assignment_id']);
			$asn_topic          = $this ->fm -> validation($data['asn_topic']);
			$replay_assignment          = $this ->fm -> validation($data['replay_assignment']);
			$class_id          = $this ->fm -> validation($data['class_id']);
			$name          = $this ->fm -> validation($data['name']);
			
			$userid  = mysqli_real_escape_string($this ->db ->link, $userid);
			$assignment_id        = mysqli_real_escape_string($this ->db ->link, $assignment_id);
			$asn_topic        = mysqli_real_escape_string($this ->db ->link, $asn_topic);
			$replay_assignment        = mysqli_real_escape_string($this ->db ->link, $replay_assignment);
			$class_id      = mysqli_real_escape_string($this ->db ->link, $class_id);
			$name          = mysqli_real_escape_string($this ->db ->link, $name);
			
			$permited  = array('jpg', 'jpeg', 'png', 'gif','doc','ppt','pdf','txt');
		    $file_name = $file['image']['name'];
		    $file_size = $file['image']['size'];
		    $file_temp = $file['image']['tmp_name'];

		    $div = explode('.', $file_name);
		    $file_ext = strtolower(end($div));
		    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
		    $uploaded_image = "uploads/".$unique_image;

		    if($userid == "" || $assignment_id == "" || $asn_topic =="" || $replay_assignment =="" || $class_id =="" || $name == ""){
		    	$msg = "<span class='error'>fields must not be empty</span>";
				return $msg;
		    }elseif ($file_size >1048567) {
		   	    echo "<span class='error'>Image Size should be less then 1MB!
		     </span>";
		    } elseif (in_array($file_ext, $permited) === false) {
		   	   echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
		    }else{
		    	move_uploaded_file($file_temp, $uploaded_image);

			 	$query = "INSERT INTO tbl_assignmentReplay(userid,assignment_id,asn_topic,replay_assignment,class_id,image,name) VALUES('$userid', '$assignment_id','$asn_topic','$replay_assignment','$class_id','$uploaded_image','$name')";
		   		$inserted_row = $this ->db ->insert($query);

				if($inserted_row){

					$msg = "<span class='success'>assignment inserted successfully</span>";
					return $msg;
				}else{
					$msg = "<span class='error'>assignment not inserted</span>";
					return $msg;
				}
		    }
		}
		
		public function get_assignment_response($id){
			$query = "SELECT * FROM tbl_assignmentReplay WHERE assignment_id = '$id'" ; 
			$result = $this ->db ->select($query);
			return $result;
		}
		public function get_singel_assignment_replay($id){
			$query = "SELECT * FROM tbl_assignmentReplay WHERE assignmentReplay_id = '$id'" ; 
			$result = $this ->db ->select($query);
			return $result;
		}
		
		public function singel_assignment_replay_mark($marks,$id){
			$marks = $this ->fm -> validation($marks);
			$marks = mysqli_real_escape_string($this ->db ->link, $marks);
			$id = mysqli_real_escape_string($this ->db ->link, $id);

			if(empty($marks)){

				$msg = "<span class='error'>Brand field must not be empty</span>";
				return $msg;
			}else{
				$query = "UPDATE tbl_assignmentReplay SET marks = '$marks' WHERE assignmentReplay_id = '$id'";
				$updatedrow = $this ->db ->update($query);

				if($updatedrow){

					$msg = "<span class='success'>marks added successfully</span>";
					return $msg;
				}else{
					$msg = "<span class='error'>marks not added</span>";
					return $msg;
				}
			}
		}
		
		
	}
?>