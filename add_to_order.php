<?php
	session_start();
	if(!isset($_SESSION["login"]))
  	{
    	header('Location: login.php');
  	}
	include "functions/myFunction.php";

	$product_id=$_GET['product_id'];
	$alamat = $_GET["alamat"];
	$jumlah = $_GET["jumlah"];
	$product_price= $_GET["product_price"];
	$user_id=$_SESSION['user_id'];

	$total = $jumlah * $product_price;

	$query1="SELECT * FROM `products` WHERE product_id LIKE '$product_id'";
	$result1=mysqli_query($conn,$query1);

	$query2="SELECT * FROM `users` WHERE user_id LIKE '$user_id'";
	$result2=mysqli_query($conn,$query2);
		
	if(mysqli_num_rows($result1)==1 || mysqli_num_rows($result2)==1) {

		$row1=mysqli_fetch_assoc($result1);
		$row2=mysqli_fetch_assoc($result2);

		$product = $row1["product_name"];
		$nama = $row2["name"];
		
		$run ="INSERT INTO `orders` (`order_id`, `user_id`, `name`,`product`,`address`,`amount`,`total`) VALUES (NULL, '$user_id','$nama','$product','$alamat','$jumlah','$total')";
		
		if(mysqli_query($conn,$run))
		{
			header('Location: show_cart_items.php?product_id='.$product_id.'&msg=22'); //redirect**

			$delete="DELETE FROM `cart` WHERE `cart`.`product_id` LIKE '$product_id' AND `cart`.`user_id` LIKE '$user_id'";
			mysqli_query($conn,$delete);
		}
		else
		{
			echo "error!";
		}
	}
	elseif(mysqli_num_rows($result1)==0)
	{
		header('Location: show_cart_items.php?product_id='.$product_id.'&msg=22');
	}
	else
	{
		echo "Some Error Occured";
	}
	
?>