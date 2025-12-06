<?php

session_start();
// session_unset();

if (isset($_SESSION["login"])) {
	header("Location: ../index.php");
	exit;
}


require '../pages/function.php';

if (isset($_POST["login"])) {

	$email = $_POST["email"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM tb_user WHERE email = '$email'");

	//cek username
	if (mysqli_num_rows($result) === 1) {

		//cek password
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])) {
			$_SESSION["login"] = $row;

			header("Location: index.php");
			exit;
		}
	} else {
		$error = true;
		if (isset($error)) {
			echo "<script>
				alert('password/username salah')
				</script>";
		}
	}
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Login | WEMOS</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">


	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="./style.css">

</head>

<body>
	<!-- partial:index.partial.html -->
	<div class="box-form">
		<div class="left">
			<div class="overlay">
				<h1>Login For WEMOS</h1>
				<p><b>Water Monitoring Control System</b></p>
				<span>
					<p>Contact to admin for get product</p>
					<a href="https://www.instagram.com/official_elite10/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
					<a href="https://mail.google.com/mail/u/0/?hl=en#inbox?compose=GTvVlcSGLCDjtNSqRpHbzBZkbQjdpbDDmhWhcDbqghGZfBfGNKRrzVpnCvZbVBdlmsTkTZHbfTGSD"><i class="fa fa-envelope" aria-hidden="true"></i> Contact by email</a>
				</span>
			</div>
		</div>


		<div class="right">
			<h5>Login</h5>
			<p>Don't have an account? <a href="https://mail.google.com/mail/u/0/?hl=en#inbox?compose=GTvVlcSGLCDjtNSqRpHbzBZkbQjdpbDDmhWhcDbqghGZfBfGNKRrzVpnCvZbVBdlmsTkTZHbfTGSD">Contact to admin</a> to get the product</p>
			<div class="inputs">
				<form method="POST" action="">
					<input type="text" placeholder="Email" id="email" name="email">
					<br>
					<input type="password" placeholder="password" id="password" name="password">
			</div>

			<br><br>

			<br>
			<button type="submit" name="login">Login</button>
			</form>
		</div>

	</div>
	<!-- partial -->

</body>

</html>