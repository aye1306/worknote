<?php 

include('Database.php');
class DAOwork
{	
	private $db = null;
	private $conn = null;
	
	public function getLastwork($user_id){
		$db = new Database();
		$conn = $db->DatabaseConfig();
		$sql = "SELECT *,DATEDIFF(w_date,NOW()) d,HOUR(w_date) - (HOUR(NOW())+7) time FROM work,work_type \n".
			"WHERE u_id = ".$user_id." AND status = 1 AND work.w_type = work_type.wt_id ORDER BY status ASC,w_date ASC";
			$query = mysqli_query($conn,$sql) or die ("Error in query: $sql " . mysqli_error());

			$rows = array();
			$row = mysqli_num_rows($query);
			if($row <= 0){
				$rows = array('status' => 0);
			}else{
				while($r = mysqli_fetch_assoc($query)) {
					$rows = array('status' => 1,'result'=> $r);
				}
			}
			

			return $rows;
	}
} 