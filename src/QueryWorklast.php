<?php 
include('DAOwork.php');


$DAOwork = new DAOwork();

$result = array();
$result = $DAOwork->getLastwork();

echo json_encode($result);








