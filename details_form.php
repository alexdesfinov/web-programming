<?php
session_start();
if (!isset($_SESSION["login"])) {
	header('Location: login.php');
}
include "functions/myFunction.php";

$product_id = $_GET['product_id'];
$product_price = $_GET["product_price"];
$user_id = $_SESSION['user_id'];


if (isset($_POST["pesan"])) {

	$alamat = $_POST["alamat"];
	$jumlah = $_POST["jumlah"];

	header("Location: add_to_order.php?product_id=$product_id&alamat=$alamat&jumlah=$jumlah&product_price=$product_price");
}

?>

<!DOCTYPE html>
<html>

<head>
	<?php
	include "includes/header.php";

	if (isset($_SESSION["login"])) {
		include "includes/header_postlogin.php";
	} else {
		include "includes/header_prelogin.php";
	}

	?>
	<!-- <link rel="stylesheet" href="css/incesdp.css"> -->
</head>

<body style="padding-top: 150px;">

	<form action="" method="post">
		<div class="container d-flex justify-content-center rounded-5 p-5" style="background-color: burlywood;">
			<div class="row text-center mx-0 p-4 pt-0" style="color: black;">
				<div class="container mb-4">
					<h2 class="text-center mb-4 ">PESANAN</h2>
				</div>
				<div class="container">
					<div class="row">
						<span class=" mb-3 ">Alamat</span>
						<textarea cols="30" rows="10" class="rounded-3" required name="alamat"></textarea>
					</div>
				</div>
				<div class="container">
					<div class="row my-5">
						<span class="mb-3">Jumlah Pesanan</span>
						<input type="number" class="text" required name="jumlah">
					</div>
				</div>
				<button type="submit" name="pesan" class="btn btn-primary w-100">Pesan</button>
			</div>
		</div>
	</form>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script src="assets/js/script.js"></script>

</body>

</html>