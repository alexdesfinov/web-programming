<?php
session_start();

include "functions/myFunction.php";
$product_id = $_GET['product_id'];
$user_id = $_SESSION['user_id'];

$query = "DELETE FROM `mangola`.`cart` WHERE `product_id` LIKE '$product_id' AND `user_id` LIKE '$user_id'";
if (mysqli_query($conn, $query)) {
	header('Location: show_cart_items.php?msg=1');
} else {
	header('Location: show_cart_items.php?msg=2');
}
