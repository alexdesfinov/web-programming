<?php 
	session_start();

	include("functions/myFunction.php");

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