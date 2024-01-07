<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">De' Irma hobbies</a>
    <button class="navbar-toggler botrder-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="sidebar offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">De' Irma hobbies</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="show_cart_items.php">Keranjang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="show_wishlist_items.php">wishlist</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="show_order_items.php">Pesanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><?php echo $_SESSION["login"]; ?></a>
          </li>
          <div class="d-flex justify-content-center align-items-center gap-5 rounded-2 mx-5" >
            <a class="nav-link" href="logout.php">KELUAR</a>
          </div>
        </ul>
      </div>
    </div>
  </div>
</nav>