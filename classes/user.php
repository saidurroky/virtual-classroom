<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../lib/Session.php');
	
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php
	class user{
		private $db;
		private $fm;
		public function __construct(){
			$this ->db = new Database();
			$this ->fm = new Format();
		}

		public function userRegistration($data){
			$fname   = $this ->fm -> validation($data['fname']);
			$lname   = $this ->fm -> validation($data['lname']);
			$email   = $this ->fm -> validation($data['email']);
			$pass   = $this ->fm -> validation(md5($data['password']));
			$role   =$this ->fm -> validation($data['role']);

			if($fname == "" || $lname == "" || $email == "" || $pass =="" || $role == ""){
		    	$msg = "<span class='error'>fields must not be empty</span>";
				return $msg;
		    }

		    $mailquery = "SELECT * FROM tbl_user WHERE email = '$email' limit 1";

		    $mailchk = $this ->db ->select($mailquery);

		    if($mailchk !=false){
		    	$msg = "<span class='error'>Email already exists</span>";
				return $msg;
		    }else{
		    	$query = "INSERT INTO tbl_user(fname,lname,email,password,role) 
		    	VALUES('$fname', '$lname', '$email', '$pass', '$role')";
		   		$inserted_row = $this ->db ->insert($query);

				if($inserted_row){

					$msg = "<span class='success'>User data inserted successfully</span>";
					return $msg;
				}else{
					$msg = "<span class='error'>User data not inserted</span>";
					return $msg;
				}
		    }
		}

		public function userLogin($data){
			$email   = $this ->fm -> validation($data['email']);
			$pass   = $this ->fm -> validation(md5($data['password']));

			$query = "SELECT * FROM tbl_user WHERE email = '$email' AND password = '$pass'";
			$result = $this ->db ->select($query);
			if($result != false){
				$value = $result ->fetch_assoc();
				Session::set('userLogin', true);
				Session::set('id', $value['id']);
				Session::set('fname', $value['fname']);
				Session::set('role', $value['role']);
				echo '<script type="text/javascript">
				location.replace("index.php");
			  </script>';

			}else{
				$msg = "<span class='error'>fields must not be empty</span>";
				return $msg;
			}
		}

		public function getAllClass($id){
			$query = "SELECT c.*,j.status FROM tbl_class as c,tbl_joinclass as j WHERE c.userid = '$id' OR j.status = '1' ";
			$result = $this ->db ->select($query);
			return $result;
			
		}

		public function getclass_id($id){
			$query = "SELECT * FROM tbl_class WHERE userid = '$id'";
			$result = $this ->db ->select($query);
			return $result;
		}
	}
?>