<?php
session_start();

include("functions/myFunction.php");

?>

<!DOCTYPE html>
<html>

<head>

  <?php

  include "includes/header.php";

  ?>

</head>

<body>

  <?php
  if (isset($_SESSION["login"])) {
    include "includes/header_postlogin.php";
  } else {
    include "includes/header_prelogin.php";
  }
  ?>

  <div class="container-fluid p-0 overflow-hidden ">

    <section class="top-banner" style="background: url('images/2.jpg');">
      <div class="container">
        <div class="row ">
          <div class="col-sm-6 text-wrap">
            <h1>DE IRMA HOBBIES</h1>
            <p>dadwasdwadadwaddwa</p>
          </div>
        </div>
      </div>
    </section>

    <!--All products with 3/12 parts each-->
    <section class="py-5">
      <div class="container">
        <div class="title text-center">
          <h2 class="position-relative fw-bold text-uppercase ">Top Product</h2>
        </div>

        <div class="collection-list mt-5 row gy-3">

          <?php
          $query = "SELECT * FROM `products`";
          $result = mysqli_query($conn, $query);
          while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-md-6 col-lg-4 col-xl-3 p-2">
              <a href="product_description.php?product_id=<?php echo $row['product_id']; ?>">
                <div class="collection-img position-relative h-75 rounded-3 cardd" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                  <img src="images/<?php echo $row['product_image']; ?> " alt="" class="card-img-top h-100 object-fit-cover rounded-3">
                  <span class="position-absolute bg-danger text-white d-flex align-items-center justify-content-center ">Top</span>
                </div>
              </a>
              <div class="text-center">
                <div class="rating mt-3">
                  <span class=""><i class="fa-solid fa-star"></i></span>
                  <span class=""><i class="fa-solid fa-star"></i></span>
                  <span class=""><i class="fa-solid fa-star"></i></span>
                  <span class=""><i class="fa-solid fa-star"></i></span>
                  <span class=""><i class="fa-solid fa-star"></i></span>
                </div>
                <p class="text-capitalize my-2"><?php echo $row['product_name']; ?></p>
              </div>
            </div>
          <?php } ?>

        </div>
      </div>
    </section>

    <?php include "includes/footer.php"; ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="assets/js/script.js"></script>

</body>

</html>