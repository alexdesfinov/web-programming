<?php
  session_start();  
  if(!isset($_SESSION["login"]))
  {
    header('Location: login.php');
  }
  include "functions/myFunction.php";
?>

<!DOCTYPE html>
<html>
<head>
  <?php 
    include "includes/css_header.php";
  ?>
</head>
<body style="background-image: url('images/bakery.jpeg');background-size: cover; background-position: center;">

  <?php 
    include "includes/header_postlogin.php";
  ?>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
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
                  <td><?php echo $row["total"]; ?></td>
                </tr> 
                  <?php endforeach; ?>
                        
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>