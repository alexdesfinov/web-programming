<?php

include "../functions/myFunction.php";

$data = mysqli_query($conn, "SELECT * FROM products");
$jumlah = mysqli_num_rows($data);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("lib/includes/head.php") ?>
    <title>Bootstap 5 Responsive Admin Dashboard</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php include("lib/includes/sidebar.php") ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <?php include("lib/includes/navbar.php") ?>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $jumlah; ?></h3>
                                <p class="fs-5">Products</p>
                            </div>
                            <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">65</h3>
                                <p class="fs-5">Sales</p>
                            </div>
                            <i class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">50</h3>
                                <p class="fs-5">Delivery</p>
                            </div>
                            <i class="fas fa-truck fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">%25</h3>
                                <p class="fs-5">Increase</p>
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>

                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Recent Orders</h3>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 p-5">
                                <div class="card shadow ">
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
                                                </tr>
                                            </thead>
                                            <tbody>

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
                                                    </tr>
                                                <?php endforeach; ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <?php include("lib/includes/script.php"); ?>
</body>

</html>