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
		$return_arr = array();

		if($row <= 0){
			$result = array('status' => 0);
		}else{

			while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
				$row_array['wt_id'] = $row['wt_id'];
				$row_array['wt_name'] = $row['wt_name'];
				$row_array['time_reg'] = $row['time_reg'];

				array_push($return_arr,$row_array);
			}
			
			$result = array('status'=>1,'data'=>$return_arr);
		}
		
		return $result;
	}
	










} //end class













