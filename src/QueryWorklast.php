<?php 
include('DAOwork.php');


$DAOwork = new DAOwork();
$user = $_GET['user_id'];
$result = array();
$result = $DAOwork->getLastwork($user);

echo json_encode($result);








