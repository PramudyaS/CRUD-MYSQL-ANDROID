<?php 

require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = $_POST['name'];
	$position = $_POST['position'];
	$sallary = $_POST['sallary'];

	$sql = "INSERT INTO tbl_pegawai VALUES('$name','$position','$sallary')";

	if ($sql > 0) {
		echo "Insert Pegawai Success";
	}else{
		echo "Fail To Insert Pegawai";
	}

}

 ?>