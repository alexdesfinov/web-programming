<?php
include "../../../functions/myFunction.php";

$product_id = $_GET['order_id'];

$query = "SELECT * FROM orders WHERE order_id = $product_id";
$sql = mysqli_query($conn, $query);

$data = mysqli_fetch_array($sql);

if (is_file("image/" . $data['foto']))
    unlink("image/" . $data['foto']);

$query2 = "DELETE FROM orders WHERE order_id = $product_id";
$sql2 = mysqli_query($conn, $query2);
if ($sql2) {
    header("location: ../../order.php");
} else {
    echo "Data Gagal di Hapus<a href='../../index.php'>Kembali</a>";
}
