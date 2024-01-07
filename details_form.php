<?php
	session_start();	
	if(!isset($_SESSION["login"]))
	{
	  header('Location: login.php');
	}
	include "functions/myFunction.php";
	
	$product_id=$_GET['product_id'];
	$user_id=$_SESSION['user_id'];
	

?>
<link rel="stylesheet" href="css/incesdp.css">
<!DOCTYPE html>
<head>
<?php 
	include "includes/css_header.php";
	include "includes/header_postlogin.php";
	?>
</head>
<html>

	<body style="background-image: url('images/bakery.jpeg'); background-size: cover; background-position: center;">

	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

	
<div class="login">
  <h2 class="active"> Pesanan </h2> 

    <input type="text" class="text" >
     <span class="alamat">Alamat</span>

    <br>
    
    <br>

    <input type="number" class="text" >
    <span class="alamat">Jumlah Pesanan</span>
    <br>

    <a href="add_to_order.php?product_id=<?php echo $product_id?>" style="text-decoration: none;">
		<button class="signin">Pesan</button>
	</a>

</div>
	</body>
</html>