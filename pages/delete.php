<?php
include "function.php";
$id = @$_GET['id'];

$sql = "SELECT * FROM tb_user WHERE id = '$id'";
$query = mysqli_query($conn, $sql);
$execute = mysqli_fetch_assoc($query);

$abc = "DELETE FROM tb_user WHERE id = '$id' ";
$query = mysqli_query($conn, $abc);

if ($query) {
    echo "<script>alert('Hapus Sukses..');</script>";
} else {
    echo "<script>alert('Hapus Gagal..');</script>";
}
?>
<meta http-equiv="refresh" content="0;url=settings.php" />