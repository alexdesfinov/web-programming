<?php 
if(isset($_SESSION["login"])) {
    header("Location: ../login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("includes/header.php"); ?>
</head>

<body class="g-sidenav-show  bg-gray-200">

    <?php include("includes/sidebar.php"); ?>
    
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">

        </nav>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Produk</h4>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-striped align-middle">
                                <thead class="text-center table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>NAMA</th>
                                        <th>HARGA</th>
                                        <th>IMAGE</th>
                                        <th colspan="2">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                <?php include("../functions/myFunction.php"); ?>
                                <?php $data = getData("SELECT * FROM products"); ?>
                                <?php foreach ($data as $row) : ?>
                                    <tr class="text-center">
                                        <td><?php echo $row["product_id"]; ?></td>
                                        <td><?php echo $row["product_name"]; ?></td>
                                        <td><?php echo $row["product_price"]; ?></td>
                                        <td><img src="../images/<?php echo $row["product_image"]; ?>" alt="" width="75" height="75"></td>
                                        <td class="actiontd"><a href="" class="btn btn-primary">Edit</a></td>
                                        <td class="actiontd"><a href="" class="btn btn-primary">Edit</a></td>
                                    </tr> 
                                <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <?php include("includes/footer.php"); ?>
        </div>
        
    </main>

  <script src="../assets/js/core/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>

</body>
</html>