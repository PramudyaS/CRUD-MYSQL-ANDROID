<?php 

require_once('dbConnect.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$response = array();

	$npm = $_POST['npm'];

	$sql = "DELETE FROM tbl_mhs WHERE npm = '$npm'";
	$query = mysqli_query($con,$sql);
	if ($query > 0) {
		$response['value'] = 1;
		$response['message'] = "Data Has Been Deleted";
		echo json_encode($response);
	}else{
		$response['value'] = 0;
		$response['message'] = "Oops ! Can't Delete Right Now";
		echo json_encode($response);
	}
	mysqli_close($con);
}



 ?>