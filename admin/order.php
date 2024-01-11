<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
}

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

            <?php if (isset($_SESSION["alert"]) && $_SESSION["alert"] == true) : ?>
                <div class="alert alert-success text-center " id="myAlert" style="color: black;">
                    Produk Berhasil Ditambahkan
                </div>
                <?php $_SESSION["alert"] = [] ?>
            <?php endif; ?>

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
                                                    <a href="lib/controller/selesaipesanan.php?order_id=<?php echo $row["order_id"] ?>" class="btn btn-primary">Selesai</a>
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

        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <?php include("lib/includes/script.php"); ?>
</body>

</html>