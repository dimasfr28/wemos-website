<?php
	
    $servername = "localhost";
	$username = "root";
	$password = "";
	$db="chatapp";
	$conn = mysqli_connect($servername, $username, $password,$db);

    $id_post=$_POST['id_post'];
	$nama=$_POST['nama'];
	$komen=$_POST['komen'];
	$tanggal=$_POST['12 ae'];
	$konfirmasi=$_POST['konfirmasi'];
	$sql = "INSERT INTO `tb_komen`( `id_comment`, `id_post`, `nama`, `pesan`, `kehadiran`, `tanggal_komen`) 
	VALUES ('','$id_post', '$nama','$komen','$konfirmasi','$tanggal')";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>