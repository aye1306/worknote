<?php 

include('Database.php');
class DAOwork
{	
	private $db = null;
	private $conn = null;
	private $result = array();

	public function getLastwork($user_id){
		$db = new Database();
		$conn = $db->DatabaseConfig();
		$sql = "SELECT *,DATEDIFF(w_date,NOW()) d,HOUR(w_date) - (HOUR(NOW())-2) time FROM work,work_type \n".
			"WHERE u_id = ".$user_id." AND status = 0 AND work.w_type = work_type.wt_id ORDER BY status ASC,w_date ASC";
			$query = mysqli_query($conn,$sql) or die ("Error in query: $sql " . mysqli_error());

			$return_arr = array();
			$row = mysqli_num_rows($query);

			if($row <= 0){
				$rows = array('status' => 0);
			}else{
				while($r = mysqli_fetch_assoc($query)) {
					$row_array['w_id'] = $r['w_id'];
					$row_array['w_name'] = $r['w_name'];
					$row_array['w_subject'] = $r['w_subject'];
					$row_array['w_type'] = $r['w_type'];
					$row_array['w_date'] = $r['w_date'];
					$row_array['w_des'] = $r['w_des'];
					$row_array['status'] = $r['status'];
					$row_array['u_id'] = $r['u_id'];
					$row_array['time_reg'] = $r['time_reg'];
					$row_array['time'] = $r['time'];
					$row_array['d'] = $r['d'];

					array_push($return_arr,$row_array);
				}
			}
			$result = array('status'=>1,'data'=>$return_arr);

			return $result;
	}

} 