<?php
  session_start();
  
  include("functions/myFunction.php");
  
?>

<!DOCTYPE html>
<html>
<head>

  <?php 
    include "includes/css_header.php";

    if (isset($_SESSION["login"])) {
      include "includes/header_postlogin.php";
    } else {
      include "includes/header_prelogin.php";
    }
  ?>

</head>
<body style="background-image: url('images/bakery.jpeg'); background-size: cover; background-position: center;">
  

  <div class="container ">

    <?php if(isset($_SESSION["login"])) : ?>
      <h1 class="text text-white text-center font-80px margin-bottom50"> <b>Selamat Datang <?php echo $_SESSION["login"];?>! Mau Pesan Apa?</b></h1>
    <?php else : ?>
      <h1 class="text text-white text-center font-80px margin-bottom50"> <b>Selamat Datang! Mau Pesan Apa?</b></h1>
    <?php endif; ?>

    <div class="row" >
      
      <!--Bio-Section in 10/12 parts-->
      <div class="col-md-12">
        <div class="row">

          <div class="bio-tab">
            <div class="row">
              <div class="col-md-3">
                <img src="images/logo.jpg" class="img-size img-circle">
              </div>

              <div class="col-md-9 py-4 text-justify">
                <h1 class="text-center mb-4"> <b>Tentang De' Irma hobbies</b> </h1>
                <p class="p-3" ><b><i>De Irma hobbies merupakan umkm yang bergerak dibidang makanan yang menjual berbagai macam kue kering dan pizza dengan rasa yang memiliki cita rasa tersendiri, selain rasanya yang enak,makanan dibuat tanpa menggunakan bahan pengawet sehingga aman dikonsumsi diberbagai kalangan, menu - menu yang tersedia  bisa dijadikan hampers atau cocok disajikan dalam berbagai macam acara seperti lebaran, kumpul bersama keluarga dan acara lainnya  </i></b></p>  
              </div>
            </div>
          </div>
        </div>
      </div>
      </div><br><br>

    <!--All products with 3/12 parts each-->
    <div class="wrapper" style=" max-height: 1000px;
    border: 1px solid black;
    overflow-x: hidden;" >
    <div class="row row-cols-1 row-cols-md-4 g-4">
      <?php 
        $query="SELECT * FROM `products`";
        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($result))
        {?>
           <div class="col">
                <div class="card h-100" style="width: 18rem;">
                  <img src="images/<?php echo $row['product_image'];?> " class="card-img-top object-fit-cover" style="padding: 10px; height: 250px; border-radius: 25px; " >
                  <div class="card-body">
                    <h3 class="text-center card-title mb-4"><b><?php echo $row['product_name']; ?></b></h3>
                    <p class="justify card-text text-justify"><i></i><?php echo $row['product_description']; ?></p>
                  </div>
                  <div class="cardf card-footer text-center">
                    <b><a href="product_description.php?product_id=<?php echo $row["product_id"];?>&product_price=<?php echo $row["product_price"];?>" class="card-footer bg-transparent text-decoration-none" style="background-color:#B99470;">Lihat Rincian </a></b>
                  </div>
                </div>';
           </div> 
        <?php } ?>
    </div>
    </div>       

    <h2 class="text-center text-white" style="margin: 100px 0 50px 0;" ><b>Daftar Menu</b></h2>
    <div class="row row-cols-1 row-cols-md-4 g-5">
      
      <?php 
          $query1="SELECT * FROM `products`";
          $result1=mysqli_query($conn,$query);
          while($row1=mysqli_fetch_assoc($result1))
          {?>
            <div class="col">
              <a href="product_description.php?product_id=<?php echo $row["product_id"];?>&product_price=<?php echo $row["product_price"];?>" class="text-decoration-none" >
              <div class="smallcard card h-80" style="width: 15rem;">
                  <img src="images/<?php echo $row1['product_image'];?> " class="card-img-top object-fit-cover" style="padding: 10px; height: 150px; border-radius: 25px;" >
                  <div class="card-body">
                    <h5 class="text-center card-title mb-4"><b><?php echo $row1['product_name']; ?></b></h5>
                    <p class="justify card-text" style="margin-top: 20px;" ><b><i class="btn rounded-5" style="background-color: burlywood;" >Rp <?php echo number_format($row1["product_price"],0,",",".");; ?></i></b></p>
                  </div>
              </div>
              </a>
            </div> 
          <?php } ?>   
        
    </div>

    <?php include "includes/footer.php"; ?>
   
  <script src="../assets/js/core/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>

</body>
</html>