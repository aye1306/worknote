<?php 

include('Database.php');

class function_all 
{
	private $db = null;
	private $con = null;
	private $result = array();


	public function login($user , $pass){
		$db = new Database();
		$con = $db->DatabaseConfig();

		$sql = sprintf("SELECT * FROM users WHERE username = '%s' AND password = '%s'",
		$con->escape_string($user),
		$con->escape_string(sha1($pass))
		);

		$query = mysqli_query($con,$sql) or die ("Error in query: $sql " . mysqli_error());
		$rows = mysqli_fetch_array($query,MYSQLI_ASSOC);
		$row = mysqli_num_rows($query);
		if ($row > 0) {
			$result = array("status"=>1,"user"=>$rows);
			return $result;
		}else{
			$result = array("status"=>0);
			return $result;
		}

	}


	public function register($email,$user,$password,$nickname)
	{	
		$db = new Database();
		$con = $db->DatabaseConfig();

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$result = array("status"=>"e");
			return $result;
		}else{
			$sql = "SELECT * FROM users WHERE username = '$user'";
			$query = mysqli_query($con , $sql) or die(mysqli_error($con) . "<br>$sql"); 

			//$result = mysqli_fetch_array($query,MYSQLI_ASSOC);

			if (mysqli_num_rows($query) > 0) {
				$result =  array("status"=> 1);
				return $result;
			}else{
				$sql = sprintf("INSERT INTO users(nickname,email,username,password) values ('%s','%s','%s','%s')",
					$con->escape_string($nickname),
					$con->escape_string($email),
					$con->escape_string($user),
					$con->escape_string(sha1($password))
				);
				$result = mysqli_query($con,$sql) or die ("Error in query: $sql " . mysqli_error());
				if ($result){
					$result = array("status"=>0);
					return $result;
				}
			}
		}
	}

	public function getwork_type()
	{
		$db = new Database();
		$con = $db->DatabaseConfig();

		$sql = "SELECT * FROM work_type";
		$query = mysqli_query($con,$sql) or die ("Error in query: $sql " . mysqli_error());

		$row = mysqli_num_rows($query);
		$wt_id = array();
		$wt_name = array();
		$time = array();
		if($row <= 0){
			$result = array('status' => 0);
		}else{
			
			while($r = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
				$wt_name[] = $r['wt_name'];
				$wt_id[] = $r['wt_id'];
				$time[] = $r['time_reg'];
			}
			$result = array('status'=>1,'wt_name'=>$wt_name,'wt_id'=>$wt_id,'time_reg'=>$time);
		}
		
		return $result;
	}
	










} //end class













