<?php
session_start();

include("../functions/myFunction.php");

if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
}

if (isset($_POST["tambah"])) {

    $nama = $_POST["nama"];
    $harga = $_POST["harga"];
    $deskripsi = $_POST["deskripsi"];
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $path = "../images/" . $foto;

    if (move_uploaded_file($tmp, $path)) {
        $query = "INSERT INTO `products` (`product_id`, `product_name`, `product_price`,`product_description`,`product_image`) VALUES (NULL, '$nama','$harga','$deskripsi','$foto')";
        $sql = mysqli_query($conn, $query);
        if ($sql) {
            $_SESSION["alert"] = true;
        } else {
            echo "Maaf, Terjadi Kesalahan Saat Input Data";
            echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
        }
    } else {
        echo "Maaf, Gambar Gagal di Upload";
        echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
    }
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

            <div class="container-fluid px-5">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row my-5 p-3 rounded-3 shadows">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="nama">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Harga</label>
                                    <input type="number" class="form-control" name="harga">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Description</label>
                                    <textarea class="form-control" name="deskripsi"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Upload File</label>
                                    <input type="file" class="form-control" name="foto">
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary" name="tambah"> Add Product</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <?php include("lib/includes/script.php"); ?>
</body>

</html>