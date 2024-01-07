<?php 
  session_start();
  if(!(isset($_SESSION['name'])&&isset($_SESSION['email'])))
  {
    header('Location: register.php');
  }
  include "includes/dbconnect.php";
?>

<!DOCTYPE html>
<html>
  <?php include "includes/css_header.php";
        include "includes/header_postlogin.php";
   ?>
<body style="background-image: url('images/bakery.jpeg');background-size: cover; background-position: center;">
  

  <div class="container ">
        <!--All products with 3/12 parts each-->
    <div class="row">
      <?php 
        //$product_id=$_GET['product_id'];
        $user_id=$_SESSION['user_id'];

        $query="SELECT * FROM `wishlist` c JOIN `products` p ON c.`product_id`=p.`product_id` WHERE c.`user_id`=$user_id";
        $result=mysqli_query($connection,$query);
        if(isset($_GET['msg']))   //if page returned from delete_from_wishlist
        { 
            if ($_GET['msg']==1)
            {
              echo "<h4 class='text-center text-red'><i>Item Berhasil Dihapus</i></h4><br>";
            }
            elseif($_GET['msg']==2)
            {
              echo "<h4 class='text-center text-red'><i>Item Gagal Dihapus</i></h4>";
            }
            else
            {
              echo "Error! Try again.";
            }
        }
        while($row=mysqli_fetch_assoc($result))
        {
          echo '<div class="col-md-3">
                  <div class="product-tab">
                    <img src="images/'.$row['product_image'].'" class="img-size curve-edge">
                    <h3 class="text-center"><b>'.$row['product_name'].'</b></h3>
                    <p class="justify"><b><i> &nbsp&nbsp&nbsp&nbsp '.$row['product_description'].'</i></b></p>
                    <a href="product_description.php?product_id='.$row['product_id'].'" class="btn btn-block btn-success" >Lihat Detail</a>
                    <a href="add_to_cart.php?product_id='.$row['product_id'].'" class="btn btn-block btn-success" >Tambahkan ke Keranjang</a>
                    <a href="delete_from_wishlist.php?product_id='.$row['product_id'].'" class="btn btn-block btn-danger" >Hapus Dari Wishlist</a>

                  </div>
                </div>';
        }
?>