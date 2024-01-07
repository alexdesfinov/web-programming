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
                            <h4>Pesanan</h4>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-borderless align-middle">
                                <thead class="text-center table-dark">
                                    <tr>
                                        <th>ORDER ID</th>
                                        <th>USER ID</th>
                                        <th>USER NAME</th>
                                        <th>PRODUK</th>
                                        <th>ALAMAT</th>
                                        <th>JUMLAH</th>
                                        <th>Total</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                <?php include("../functions/myFunction.php"); ?>
                                <?php $data = getData("SELECT * FROM orders"); ?>
                                <?php foreach ($data as $row) : ?>
                                    <tr class="text-center">
                                        <td><?php echo $row["order_id"]; ?></td>
                                        <td><?php echo $row["user_id"]; ?></td>
                                        <td><?php echo $row["name"]; ?></td>
                                        <td><?php echo $row["product"]; ?></td>
                                        <td><?php echo $row["address"]; ?></td>
                                        <td><?php echo $row["amount"]; ?></td>
                                        <td><?php echo $row["total"]; ?></td>
                                        <td class="d-flex justify-content-around">
                                            <a href="" class="btn btn-primary">EDIT</a>
                                            <a href="" class="btn btn-primary">EDIT</a>
                                        </td>
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