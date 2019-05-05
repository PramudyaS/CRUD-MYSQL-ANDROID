<?php 

require_once('dbConnect.php');

if ($_SERVER['REQUEST_METHOD'] == "POST" ) {
		
		$search = $_POST['search'];
		$sql = "SELECT * FROM tbl_mhs WHERE nama LIKE '%$search%' ORDER BY nama ASC";
		$query = mysqli_query($con,$sql);
		$result = array();
		
		while ($data = mysqli_fetch_assoc($query)) {
			array_push($result,array('npm'=>$data['npm'],'nama'=>$data['nama'],'kelas'=>$data['kelas'],'sesi'=>$data['sesi']));
		}
		echo json_encode(array("value"=>1,"result"=>$result));
	
		mysqli_close($con);
}

 ?>