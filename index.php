<?php 
	session_start();

	include("functions/myFunction.php");

	if (isset($_POST["login"])) {

		$email = $_POST["email"];
		$password = $_POST["password"];

		$result =  mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

		if (mysqli_num_rows($result) === 1) {
				
			$row = mysqli_fetch_assoc($result);
			$name = $row["name"];
			$email = $row["email"];

			$_SESSION["login"] = $name;

			if ($email == "admin@mangola.com") {
				header("Location: admin/index.php");
			}
			
			header("Location: products.php");


		} elseif (mysqli_num_rows($result) === 0) {

		} 
	}

?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" type="text/css" href="css/inces.css">
	
</head>
<body style="background-image: url('images/bakery.jpeg');background-size: cover; background-position: center;">
   
	

<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="" method="post">
			<h1>BUAT AKUN</h1>
			<span>atau gunakan email anda untuk mendaftar</span>
			<input type="text" placeholder="Nama" />
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Kata Sandi" />
			<button type="submit" name="daftar" >daftar</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="" method="post">
			<h1>MASUK</h1>
			<span>silahkan masukan email anda untuk masuk</span>
			<input type="email" placeholder="Email" name="email" />
			<input type="password" placeholder="Kata Sandi" name="password" />
			<button type="submit" name="login">Masuk</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Selamat Datang Kembali!</h1>
				<p>Untuk Tetap Terhubung Dengan Kami Silahkan Masuk</p>
				<button class="ghost" id="signIn">Masuk</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Teman!</h1>
				<p>Isi Data Anda dan Jelajahi Toko dengan Kami</p>
				<button class="ghost" id="signUp">Daftar</button>
			</div>
		</div>
	</div>
</div>



<script src="css/j.js"></script>

</body>
</html>