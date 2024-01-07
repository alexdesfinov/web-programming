<?php
  session_start();

  include "includes/dbconnect.php";

  if(!isset($_SESSION["login"])){
    header('Location: index.php');
  }

?>

<!DOCTYPE html>
<html>
  <?php include "includes/css_header.php";
    if(($_SESSION['email']=="admin@mangola.com")) {
      include "includes/header_admin.php";
    }else {

    }

    include "includes/header_postlogin.php";

  ?>
  
<body style="background-image: url('images/bakery.jpeg'); background-size: cover; background-position: center;">
  

  <div class="container ">
    <h1 class="text text-white text-center font-80px margin-bottom50"> <b>Selamat Datang <?php echo $_SESSION['name']; ?>! Mau Pesan Apa?</b></h1>

    <div class="row">
      
      <!--Bio-Section in 10/12 parts-->
      <div class="col-md-12">
        <div class="row">

          <div class="bio-tab">
            <div class="row">
              <div class="col-md-4">
                <img src="images/logo.jpg" class="img-size img-circle">
              </div>

              <div class="col-md-8">
                <h1 class="text-center"> <b>Tentang De' Irma hobbies</b> </h1>
                <p>&nbsp&nbsp&nbsp&nbsp<b><i>De Irma hobbies merupakan umkm yang bergerak dibidang makanan yang menjual berbagai macam kue kering dan pizza dengan rasa yang memiliki cita rasa tersendiri, selain rasanya yang enak,makanan dibuat tanpa menggunakan bahan pengawet sehingga aman dikonsumsi diberbagai kalangan, menu - menu yang tersedia  bisa dijadikan hampers atau cocok disajikan dalam berbagai macam acara seperti lebaran, kumpul bersama keluarga dan acara lainnya  </i></b></p>  
              </div>
            </div>
          </div>
        </div>
      </div>
      </div><br><br>

    <!--All products with 3/12 parts each-->
    <div class="row">
      <?php 
        $query="SELECT * FROM `products`";
        $result=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($result))
        {
          echo '<div class="col-md-3">
                  <div class="product-tab">
                    <img src="images/'.$row['product_image'].'" class="img-size curve-edge">
                    <h3 class="text-center"><b>'.$row['product_name'].'</b></h3>
                    <p class="justify"><b><i> &nbsp&nbsp&nbsp&nbsp '.$row['product_description'].'</i></b></p>
                    <a href="product_description.php?product_id='.$row['product_id'].'" class="btn-lg btn-block btn-success" style="background-color:#B99470;"> Lihat Rincian </a>
                  </div>
                </div>';
        }
      ?>
             
    </div> <!--Products dispaly Ends-->
      <!--List of items in 2/12 parts-->

      <div class="container  d-flex justify-content-center">
      
        <h2 class="text-center text-white"><b>Daftar Menu</b></h2>
       
        <?php 
          $query1="SELECT * FROM `products`";
          $result1=mysqli_query($connection,$query);
          while($row1=mysqli_fetch_assoc($result1))
          {
            echo '<div class="col-md-3 my-5 mx-5">
                    <div class="row list hover-pink mx-5">
                      
                      <div class="col-md-5 mx-5">
                        <a href="product_description.php?product_id='.$row1['product_id'].'">
                        <img src="images/'.$row1['product_image'].'" class="img-size-xs">
                        </a>
                      </div>

                      <div class="col-md-5 mx-5">
                        <b>'.$row1['product_name'].'</br><br>
                        <small>Rp.'.$row1['product_price'].',00</small>
                      </div>

                    </div>            
                  </div>';
          }         
        ?>
     
      
    </div>
    <br><br><br><br><br><br><br>

    <?php include "includes/footer.php"; ?>
   
  </div>
</body>
</html>