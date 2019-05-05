<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$response = array();

	$npm = $_POST['npm'];
	$nama = $_POST['nama'];
	$kelas = $_POST['kelas'];
	$sesi = $_POST['sesi'];

	require_once('dbConnect.php');

	$sql = "SELECT * FROM tbl_mhs WHERE npm='$npm'";
	$query = mysqli_query($con,$sql);
	$fetch = mysqli_fetch_array($query);
	if (isset($fetch)) {
		$response["value"] = 0;
		$response["message"] = "NPM Sudah Terdaftar";
		echo json_encode($response);
	}else{
		$sql = "INSERT INTO tbl_mhs VALUES('$npm','$nama','$kelas','$sesi')";
		$query = mysqli_query($con,$sql);
		if ($query > 0) {
			$response["value"] = 1;
			$response["message"] = "NPM '$npm' Berhasil Di Daftarkan";
			echo json_encode($response);
		}else{
			$response["value"] = 0;
			$response["message"] = "Gagal Mendaftarkan";
			echo json_encode($response);
		}
	}
	mysqli_close($con);
}else{
	$response["value"] = 0;
	$response["message"] = "Gagal Request Method";
	echo json_encode($response);
}




 ?>