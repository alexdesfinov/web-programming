<?php 
	session_start();

	include("functions/myFunction.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>

	<?php include("includes/css_header.php") ?>
	<link rel="stylesheet" href="css/login.css">


</head>
<body style="background-image: url('images/bakery.jpeg');background-size: cover; background-position: center;">
   
<?php if (isset($_SESSION["daftar"])) : ?>
	<div class="alert alert-success" id="myAlert">
		Daftar Berhasil
	</div>		
<?php endif; ?>

<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="" method="post">
			<h2>BUAT AKUN</h2>
			<span>atau gunakan email anda untuk mendaftar</span>
			<input type="text" placeholder="Nama" name="nama" required/>
			<input type="email" placeholder="Email" name="email" required/>
			<input type="password" placeholder="Kata Sandi" name="password" required/>
			<?php if(isset($err3)) :?>
			<span style="color: red; font-style: italic;" >User Sudah Ada</span>
			<?php endif ?>
			<button type="submit" name="daftar" class="mt-2"  >daftar</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="" method="post">
			<h2>MASUK</h2>
			<span>silahkan masukan email anda untuk masuk</span>
			<input type="email" placeholder="Email" name="email" required/>
			<input type="password" placeholder="Kata Sandi" name="password" required/>
			<?php if(isset($err1)) :?>
			<span style="color: red; font-style: italic;" >Password Salah</span>
			<?php elseif(isset($err2)) :?>
			<span style="color: red; font-style: italic;" >User Tidak Ada</span>
			<?php endif ?>
			<button type="submit" name="login" class="mt-2">Masuk</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h2>Selamat Datang Kembali!</h2>
				<p>Untuk Tetap Terhubung Dengan Kami Silahkan Masuk</p>
				<button class="ghost" id="signIn">Masuk</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h2>Hello, Teman!</h2>
				<p>Isi Data Anda dan Jelajahi Toko dengan Kami</p>
				<button class="ghost" id="signUp">Daftar</button>
			</div>
		</div>
	</div>
</div>



<script src="css/j.js"></script>

</body>
</html>