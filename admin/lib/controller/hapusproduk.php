<?php
include "../../../functions/myFunction.php";

$product_id = $_GET['product_id'];

$query = "SELECT * FROM products WHERE product_id = $product_id";
$sql = mysqli_query($conn, $query);

$data = mysqli_fetch_array($sql);

if (is_file("image/" . $data['foto']))
    unlink("image/" . $data['foto']);

$query2 = "DELETE FROM products WHERE product_id = $product_id";
$sql2 = mysqli_query($conn, $query2);
if ($sql2) {
    header("location: ../../product.php");
} else {
    echo "Data Gagal di Hapus<a href='../../index.php'>Kembali</a>";
}
