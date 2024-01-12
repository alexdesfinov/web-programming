<?php
session_start();
if (!isset($_SESSION["login"])) {
  header('Location: register.php');
}
include "functions/myFunction.php";
?>

<!DOCTYPE html>
<html>
<?php
include "includes/header.php";

if (isset($_SESSION["login"])) {
  include "includes/header_postlogin.php";
} else {
  include "includes/header_prelogin.php";
}
?>

<body style="background-image: url('images/bakery.jpeg'); background-size: cover; background-position: center; padding-top: 100px; ">

  <div class="container my-5 ">
    <div class="row">
      <?php
      // $product_id = $_GET['product_id'];
      $user_id = $_SESSION['user_id'];

      $query = "SELECT * FROM `cart` c JOIN `products` p ON c.`product_id`=p.`product_id` WHERE c.`user_id`=$user_id";
      $result = mysqli_query($conn, $query);
      ?>

      <?php if (isset($_GET['msg'])) : ?>
        <?php if ($_GET['msg'] == 1) : ?>
          <div class="alert alert-success  text-center" id="myAlert">
            Item Berhasil Dihapus
          </div>
        <?php elseif ($_GET['msg'] == 2) : ?>
          <div class="alert alert-warning  text-center" id="myAlert">
            Item Gagal Dihapus
          </div>
        <?php elseif ($_GET['msg'] == 11) : ?>
          <div class="alert alert-success text-center" id="myAlert">
            Item Berhasil Dipesan
          </div>
        <?php elseif ($_GET['msg'] == 22) : ?>
          <div class="alert alert-success text-center" id="myAlert">
            Item Berhasil Dipesan
          </div>
        <?php elseif ($_GET['msg'] == 33) : ?>
          <div class="alert alert-warning  text-center" id="myAlert">
            Ulasan Tidak bisa Ditambahkan
          </div>
        <?php else : ?>
          <div class="alert alert-danger text-center" id="myAlert">
            Terjadi Kesalahan
          </div>
        <?php endif; ?>
      <?php endif; ?>

      <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <div class="col-md-4 col-lg-4 col-xl-4 p-4 rounded-4 g-4 card">
          <div class="product-tab p-3 rounded-4 h-50">
            <img src="images/<?php echo $row['product_image']; ?>" class="img-size curve-edge object-fit-cover w-100 h-100 rounded-4 ">
          </div>
          <h3 class="text-center my-4"><b><?php echo $row['product_name']; ?></b></h3>
          <p class="text-justify my-4"><i><?php echo $row['product_description']; ?></i></p>
          <div class="row g-2 card-footer">
            <a href="product_description.php?product_id=<?php echo $row['product_id']; ?>" class="btn btn-block btn-success">Lihat Detail</a>
            <a href="details_form.php?product_id=<?php echo $row['product_id']; ?>&product_price=<?php echo $row['product_price']; ?>" class="btn btn-block btn-success">Pesan Sekarang</a>
            <a href="delete_from_cart.php?product_id=<?php echo $row['product_id']; ?>" class="btn btn-block btn-danger">Hapus Dari Keranjang</a>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>

  <?php include "includes/footer.php"; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="assets/js/script.js"></script>

</body>