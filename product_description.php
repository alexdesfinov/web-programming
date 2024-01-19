<?php
session_start();
?>

<!DOCTYPE html>
<html>
<?php

include("functions/myFunction.php");

include "includes/header.php";
?>

<body style="background-image: url('images/bakery.jpeg'); background-size: cover; background-position: center;">
	<?php
	if (isset($_SESSION['login'])) {
		include "includes/header_postlogin.php";
	} else {
		include "includes/header_prelogin.php";
	}

	$product_id = $_GET['product_id'];
	$query = "SELECT * FROM `products` WHERE `product_id` LIKE '$product_id'";
	$results = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($results);

	?>

	<div class="container" style="margin-top: 200px; margin-bottom: 100px; ">

		<?php if (isset($_GET['msg'])) : ?>
			<?php if ($_GET['msg'] == 1) : ?>
				<div class="alert alert-success  text-center" id="myAlert">
					Ditambahkan ke Keranjang
				</div>
			<?php elseif ($_GET['msg'] == 2) : ?>
				<div class="alert alert-warning  text-center" id="myAlert">
					Product Sudah Ada di Keranjang
				</div>
			<?php elseif ($_GET['msg'] == 11) : ?>
				<div class="alert alert-success text-center" id="myAlert">
					Ditambahkan ke Wishlist
				</div>
			<?php elseif ($_GET['msg'] == 22) : ?>
				<div class="alert alert-warning  text-center" id="myAlert">
					Product Sudah Ada di Wishlist
				</div>
			<?php else : ?>
				<div class="alert alert-danger text-center" id="myAlert">
					Terjadi Kesalahan
				</div>
			<?php endif; ?>
		<?php endif; ?>

		<div class="col-lg-12">
			<div class="card mb-3 rounded-3 border-0 shadow ">
				<div class="row g-0">
					<div class="col-md-4">
						<img src="images/<?php echo $row['product_image'] ?>" class="img-fluid object-fit-cover h-100 rounded-3 " alt="Procuct">
					</div>
					<div class="col-md-8 p-5">
						<div class="card-body">
							<h5 class="card-title mb-5  fw-bold textcolor text-uppercase "><?php echo $row['product_name'] ?></h5>
							<p class="card-text mb-5"><?php echo $row['product_description'] ?></p>
							<p class="card-text"><small class="text-body-secondary fw-bold ">Rp <?php echo number_format($row["product_price"], 0, ",", "."); ?></small></p>
						</div>
						<div class="card-footer d-flex align-items-end mt-auto bg-white">
							<?php if (isset($_SESSION["login"])) : ?>
								<a href="includes/controller/add_to_cart.php?product_id=<?php echo $product_id; ?>" class="btn cartcolor me-3"><i class="fa-solid fa-cart-shopping text-white"></i></a>
								<a href="includes/controller/add_to_wishlist.php?product_id=<?php echo $product_id; ?>" class="btn cartcolor me-3"><i class="fa-solid fa-heart text-white"></i></a>
							<?php else : ?>
								<a href="login.php" class="btn cartcolor me-3"><i class="fa-solid fa-cart-shopping text-white"></i></a>
								<a href="login.php" class="btn cartcolor me-3"><i class="fa-solid fa-heart text-white"></i></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include "includes/footer.php"; ?>
</body>

</html>