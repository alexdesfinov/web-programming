<?php
	session_start();	
	if(!(isset($_SESSION['name'])&&isset($_SESSION['email'])))
	{
    	header('Location: register.php');
	}
	include "includes/dbconnect.php";
	$product_id=$_GET['product_id'];
	$user_id=$_SESSION['user_id'];
	

?>
<!DOCTYPE html>
<html>
	<?php include "includes/css_header.php" ?>
	<body style="background-image: url('images/bakery.jpeg');background-size: cover; background-position: center;">
		<?php include "includes/header_postlogin.php" ?>
		
		<div class="row">
			<div class="col-md-6">
				<h1 class="text text-white"><b>Terima Kasih Sudah Belanja Di De' Irma hobbies. Silahkan Tambahkan Ulasan Untuk Produk Ini.</b> </h1>
			</div>
			<div class="col-md-6">

				<form class="text-center" action="add_to_review.php" method="POST">
					<input type="hidden" name="product_id" value=" <?php echo $product_id; ?>">
					<label class="text text-white"><h3><b>Review Heading</b></h3></label>
					<input type="text" name="review_heading" class="form-control" placeholder="Tambahkan Judul"><br>
					<label class="text text-white"><h3><b>Review</b></h3></label>
					<input type="text" name="review_text" class="form-control" placeholder="Ulasan"><br>
					<input type="submit" value="Submit Review" class="btn btn-danger btn-lg">
				</form>
			</div>
		</div>
	</body>
</html>