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

            <div class="container-fluid">
                <?php if (isset($_SESSION["alert"]) && $_SESSION["alert"] == true) : ?>
                    <div class="alert alert-success text-center " id="myAlert" style="color: black;">
                        Produk Berhasil Diubah
                    </div>
                    <?php $_SESSION["alert"] = [] ?>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-12 p-5">
                        <div class="card shadow ">
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
                                                <td class="actiontd"><a href="editproduct.php?product_id=<?php echo $row['product_id']; ?>" class="btn btn-primary">Edit</a></td>
                                                <td class="actiontd"><a href="lib/controller/hapusproduk.php?product_id=<?php echo $row["product_id"] ?>" class="btn btn-primary">Hapus</a></td>
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