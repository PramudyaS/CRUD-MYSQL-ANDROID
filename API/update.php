<?php 
if ($_SERVER['REQUEST_METHOD'] ==  "POST") {
	require_once 'dbConnect.php';
	$response = array();

	$npm = $_POST['npm'];
	$nama = $_POST['nama'];
	$kelas = $_POST['kelas'];
	$sesi = $_POST['sesi'];

	$sql = "UPDATE tbl_mhs SET nama = '$nama',kelas = '$kelas',sesi = '$sesi' WHERE npm = '$npm'";
	$query = mysqli_query($con,$sql);
	if ($query > 0) {
		$response['value'] = 1;
		$response['message'] = "Data '$npm' Has Been Updated";
		echo json_encode($response);
		}else{
			$response['value'] = 0;
			$response['message'] = "Failed To Updated Data";
			echo json_encode($response);
		}
		mysqli_close($con);
}
 ?>