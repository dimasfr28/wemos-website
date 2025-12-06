<?php 


$conn = mysqli_connect("localhost", "root", "", "db_wemos");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result) ){
		$rows[] = $row;
	}
	return $rows;
 }


function inputdata($data){
	global $conn;

	$tanggal = strtolower(stripslashes($data["tanggal"]));
	$kembali = strtolower(stripslashes($data["kembali"]));
	$barang = strtolower(stripslashes($data["barang"]));
	$nama = strtolower(stripslashes($data["nama"]));
	$jurusan = strtolower(stripslashes($data["jurusan"]));
	$bukti = strtolower(stripslashes($data["bukti"]));
 	
	//cek bukti peminjaman
	$result = mysqli_query($conn, "SELECT bukti FROM peminjaman WHERE bukti = '$bukti'");
	if (mysqli_fetch_assoc($result)) {
		echo "<script>
		alert ('Harap Menyertakan Foto Bukti Peminjaman Setiap Kali Meminjam!');
		</script>";
		return false;
	}

	mysqli_query($conn, "INSERT INTO peminjaman VALUES('', '$tanggal', '$kembali', '$barang', '$nama', '$jurusan', '$bukti')");

	return mysqli_affected_rows($conn);

	
}


function registrasi($data){
	global $conn;

	$nama = $data["nama"];
    $email = strtolower(stripslashes($data["email"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
 	
	//cek username
	$result = mysqli_query($conn, "SELECT nama FROM tb_user WHERE nama = '$nama'");
	if (mysqli_fetch_assoc($result)) {
		echo "<script>
			alert ('user sudah terdaftar');
		</script>";
		return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);

	mysqli_query($conn, "INSERT INTO tb_user VALUES('', '$nama', '$email' ,'$password')");

	return mysqli_affected_rows($conn);
}
