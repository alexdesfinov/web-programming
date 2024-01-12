<?php
session_start();

include("../functions/myFunction.php");

if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
}

$product_id = $_GET['product_id'];
$data = getData("SELECT * FROM products WHERE product_id LIKE $product_id");

if (isset($_POST["edit"])) {

    $nama = $_POST["nama"];
    $harga = $_POST["harga"];
    $deskripsi = $_POST["deskripsi"];
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $path = "../images/" . $foto;

    if (move_uploaded_file($tmp, $path)) {
        $query = "SELECT * FROM products WHERE product_id = '" . $product_id . "'";
        $sql = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($sql);

        if (is_file("../image/" . $data['product_image']))
            unlink("../image/" . $data['product_image']);

        $query1 = "UPDATE products WHERE product_id LIKE $product_id SET product_name='" . $nama . "', product_price='" . $harga . "', product_description='" . $deskripsi . "', product_image='" . $foto . "'";
        $sql1 = mysqli_query($conn, $query1);
        if ($sql1) {
            header("location: index.php");
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

            <div class="container-fluid px-5">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row my-5 p-3 rounded-3 shadows">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="nama" value="<?php echo $data[0]["product_name"]; ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Harga</label>
                                    <input type="number" class="form-control" name="harga" value="<?php echo $data[0]["product_price"]; ?>">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Description</label>
                                    <textarea class="form-control" name="deskripsi"><?php echo $data[0]["product_description"]; ?></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Upload File</label>
                                    <input type="file" class="form-control" name="foto">
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary" name="edit">Edit</button>
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