<?php 

session_start();
unset($_SESSION['']);

session_destroy();
echo "<script>alert('Anda Berhasil Logout');document.location='login/index.php'</script>";
