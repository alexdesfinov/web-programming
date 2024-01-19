<?php
session_start();
if (!isset($_SESSION["login"])) {
  header('Location: login.php');
}
include "functions/myFunction.php";
?>

<!DOCTYPE html>
<html>

<head>
  <?php
  include "includes/header.php";
  ?>
</head>

<body style="background-image: url('images/bakery.jpeg'); background-size: cover; background-position: center; padding-top: 100px;">

  <?php

  if (isset($_SESSION["login"])) {
    include "includes/header_postlogin.php";
  } else {
    include "includes/header_prelogin.php";
  }

  ?>

  <div class="container my-5 min-vh-100">
    <div class="row">
      <div class="col-md-12">
        <div class="card shadow ">
          <div class="card-header">
            <h4>Pesanan</h4>
          </div>
          <div class="card-body table-responsive">
            <table class="table table-borderless align-middle">
              <thead class="text-center table-dark">
                <tr>
                  <th>NAME</th>
                  <th>PRODUK</th>
                  <th>ALAMAT</th>
                  <th>JUMLAH</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                <?php $user_id = $_SESSION["user_id"] ?>
                <?php $data = getData("SELECT * FROM orders WHERE user_id LIKE $user_id"); ?>
                <?php foreach ($data as $row) : ?>
                  <tr class="text-center">
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["product"]; ?></td>
                    <td><?php echo $row["address"]; ?></td>
                    <td><?php echo $row["amount"]; ?></td>
                    <td><?php echo number_format($row["total"], 0, ",", "."); ?></td>
                  </tr>
                <?php endforeach; ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include "includes/footer.php"; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="assets/js/script.js"></script>

</body>

</html>