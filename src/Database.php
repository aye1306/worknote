<?php 

class Database
{
	
	function DatabaseConfig()
	{
		$host = "localhost";
		$username = "root";
		$password = "";
		$databasename = "worksnotes";

		$con = mysqli_connect($host,$username,$password,$databasename);

		if ($con -> connect_errno) {
			echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
		  	exit();
		}else{
			//echo "connect";
		}

		return $con;

	}















}






