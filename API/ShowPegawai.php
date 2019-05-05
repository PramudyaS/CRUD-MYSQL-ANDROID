<?php 
require 'connection.php';

$sql = "SELECT * FROM tbl_pegawai";
$data = mysqli_query($con,$sql);
$result = array();

while ($row = mysqli_fetch_array($data)) {
	array_push($result, array(
		"id"=>$row['id'],
		"name"=>$row['name'];
	));
}

echo json_encode(array('result'=>$result));

 ?>