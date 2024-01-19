<?php
$user_id = $_SESSION['user_id'];

$datacart = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = $user_id");
$jumlahcart = mysqli_num_rows($datacart);

$datawish = mysqli_query($conn, "SELECT * FROM wishlist WHERE user_id = $user_id");
$jumlahwish = mysqli_num_rows($datawish);

?>

<nav av class="navbar navbar-expand-lg fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand me-auto" href="index.php"><img src="assets/images/logo.jpg" alt="Logo" style="width: 50px; border-radius: 25px; "></a>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">De Irma Hobbies</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link ms-lg-2" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ms-lg-2" href="shop.php">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ms-lg-2" href="contact.php">Contact</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="mx-3">
      <a class="btn position-relative border-0 " href="show_order_items.php">
        <i class="fa-solid fa-scroll"></i>
      </a>
      <a class="btn position-relative border-0 " href="show_cart_items.php">
        <i class="fa-solid fa-cart-shopping"></i>
        <span class="bgcolor position-absolute top-0 start-100 translate-middle badge"><?php echo $jumlahcart; ?></span>
      </a>
      <a class="btn position-relative border-0 " href="show_wishlist_items.php">
        <i class="fa-solid fa-heart"></i>
        <span class="bgcolor position-absolute top-0 start-100 translate-middle badge"><?php echo $jumlahwish; ?></span>
      </a>
    </div>
    <div class="px-3">
      <ul class="navbar-nav">
        <li class="text-capitalize">
          <?php echo $_SESSION["login"]; ?>
          <a href="logout.php"><i class="fa-solid fa-power-off ms-2 text-danger"></i></a>
        </li>
      </ul>
    </div>
    <button class="navbar-toggler p-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>