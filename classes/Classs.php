<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../lib/Session.php');
	
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php
	class classs{
		private $db;
		private $fm;
		public function __construct(){
			$this ->db = new Database();
			$this ->fm = new Format();
		}

		public function addClass($data){
			$userid   = $this ->fm -> validation($data['userid']);
			$classname   = $this ->fm -> validation($data['classname']);
			$coursename   = $this ->fm -> validation($data['coursename']);
			$coursecode   = $this ->fm -> validation($data['coursecode']);
			$classcode   =$this ->fm -> validation($data['classcode']);

			if($userid == "" || $classname == "" || $coursename == "" || $coursecode =="" || $classcode == ""){
		    	$msg = "<span class='error'>fields must not be empty</span>";
				return $msg;
		    }

		   
			$query = "INSERT INTO tbl_class(userid,classname,coursename,coursecode,classcode) 
			VALUES('$userid', '$classname', '$coursename', '$coursecode', '$classcode')";
			$inserted_row = $this ->db ->insert($query);

			if($inserted_row){

				$msg = "<span class='success'>Class data inserted successfully</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Class data not inserted</span>";
				return $msg;
			}
		    
		}

		public function joinClass($data){
			$userid   = $this ->fm -> validation($data['userid']);
			$name   = $this ->fm -> validation($data['name']);
			$classcode   = $this ->fm -> validation($data['classcode']);

			if($userid == "" ||$name == "" || $classcode == ""){
		    	$msg = "<span class='error'>fields must not be empty</span>";
				return $msg;
		    }

		   
			$query = "INSERT INTO tbl_joinclass(userid,name,classcode) 
			VALUES('$userid','$name', '$classcode')";
			$inserted_row = $this ->db ->insert($query);

			if($inserted_row){

				$msg = "<span class='success'>Class data inserted successfully</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Class data not inserted</span>";
				return $msg;
			}
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
		
		public function addDiscussion($data, $file){
			$userid   = $this ->fm -> validation($data['userid']);
			$body         = $this ->fm -> validation($data['body']);
			$title       = $this ->fm -> validation($data['title']);
			$class_id          = $this ->fm -> validation($data['class_id']);
			$name          = $this ->fm -> validation($data['name']);

			$userid  = mysqli_real_escape_string($this ->db ->link, $userid);
			$body        = mysqli_real_escape_string($this ->db ->link, $body);
			$title      = mysqli_real_escape_string($this ->db ->link, $title);
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

		    if($userid == "" || $body == "" || $title == "" || $class_id =="" || $name == ""){
		    	$msg = "<span class='error'>fields must not be empty</span>";
				return $msg;
		    }elseif ($file_size >1048567) {
		   	    echo "<span class='error'>Image Size should be less then 1MB!
		     </span>";
		    } elseif (in_array($file_ext, $permited) === false) {
		   	   echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
		    }else{
		    	move_uploaded_file($file_temp, $uploaded_image);

			 	$query = "INSERT INTO tbl_discussion(userid,body,title,class_id,image,name) VALUES('$userid', '$body', '$title', '$class_id','$uploaded_image','$name')";
		   		$inserted_row = $this ->db ->insert($query);

				if($inserted_row){

					$msg = "<span class='success'>Discussion inserted successfully</span>";
					return $msg;
				}else{
					$msg = "<span class='error'>Discussion not inserted</span>";
					return $msg;
				}
		    }
		}
		
		public function getDiscussionPost($class_id){
			$query = "SELECT * FROM tbl_discussion WHERE class_id = '$class_id'" ; 
			$result = $this ->db ->select($query);
			return $result;
		}
		public function dis_details($id){
		$query = "SELECT p.* , c.comment FROM tbl_discussion as p,tbl_dis_comment as c WHERE p.discussion_id = '$id' AND p.discussion_id = c.discussion_id";
			
			$result = $this ->db ->select($query);
			return $result;
		}
		public function classSession($id){
			
			$query = "SELECT * FROM tbl_class WHERE class_id = '$id'";
			$result = $this ->db ->select($query);
			if($result != false){
				$value = $result ->fetch_assoc();
				Session::set('class', true);
				Session::set('class_id', $value['class_id']);
				Session::set('classcode', $value['classcode']);
			}
		}
		
		public function addcomment($data){
			$userid   = $this ->fm -> validation($data['userid']);
			$comment         = $this ->fm -> validation($data['comment']);
			$name          = $this ->fm -> validation($data['name']);
			$discussion_id          = $this ->fm -> validation($data['discussion_id']);
			
			$userid  = mysqli_real_escape_string($this ->db ->link, $userid);
			$comment        = mysqli_real_escape_string($this ->db ->link, $comment);
			$name          = mysqli_real_escape_string($this ->db ->link, $name);
			$discussion_id          = mysqli_real_escape_string($this ->db ->link, $discussion_id);
			
			$query = "INSERT INTO tbl_dis_comment(userid,comment,name,discussion_id) VALUES('$userid', '$comment', '$name', '$discussion_id')";
			$inserted_row = $this ->db ->insert($query);

			if($inserted_row){

				$msg = "<span class='success'>comment inserted successfully</span>";
				return $msg;
			}else{
				$msg = "<span class='error'>Discussion not inserted</span>";
				return $msg;
			}
		}
		
		
	}
?>