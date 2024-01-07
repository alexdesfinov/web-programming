<?php 

include "../../functions/myFunction.php";

$nobp = $_GET['nobp'];
$nama = $_POST['nama'];
$jekel = $_POST['jekel'];
$ttl = $_POST['ttl'];
$alamat = $_POST['alamat'];
$agama = $_POST['agama'];
$nohp = $_POST['nohp'];
$email = $_POST['email'];

if (isset($_POST['ubah_foto'])) {
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $fotobaru = date('dmYHis').$foto;
    $path = "image/".$fotobaru;

    if(move_uploaded_file($tmp, $path)){
        $query = "select * from mahasiswa where nobp ='".$nobp."'";
        $sql = mysqli_query($connect, $query);
        $data = mysqli_fetch_array($sql);

    if (is_file("image/".$data['foto']))
    unlink("image/".$data['foto']);
    
    $query = "update mahasiswa set nama='".$nama."', jekel='".$jekel."', ttl='".$ttl."', 
    alamat='".$alamat."', agama='".$agama."', nohp='".$nohp."', email='".$email."', foto='".$fotobaru."' where nobp='".$nobp."'";
	$sql = mysqli_query($connect, $query);
	if($sql){
		header("location: index.php");
	} else{
		echo "Maaf, Terjadi Kesalahan Saat Input Data";
		echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
    }
	}else{
		echo "Maaf, Gambar Gagal di Upload";
		echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
	}
}else {
    $query = "update mahasiswa set nama='".$nama."', jekel='".$jekel."', ttl='".$ttl."', 
    alamat='".$alamat."', agama='".$agama."', nohp='".$nohp."', email='".$email."' where nobp='".$nobp."'";
	$sql = mysqli_query($connect, $query);
	if($sql){
		header("location: index.php");
	} else{
		echo "Maaf, Terjadi Kesalahan Saat Input Data";
		echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
    }
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
        <?php if(isset($_SESSION["alert"])&&$_SESSION["alert"]==true): ?>
        <div class="alert alert-success text-center " id="myAlert" style="color: black;" >
            Produk Berhasil Ditambahkan
        </div>	
        <?php $_SESSION["alert"] = [] ?>
        <?php endif; ?>
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        </nav>
        <form action="" method="post" enctype="multipart/form-data">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Items</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="nama" >
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Harga</label>
                                    <input type="number" class="form-control" name="harga" >
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Description</label>
                                    <textarea class="form-control" name="deskripsi"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Upload File</label>
                                    <input type="file" class="form-control" name="foto" >
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary" name="tambah" > Add Product</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        
        <div>
            <?php include("includes/footer.php"); ?>
        </div>
        
    </main>

  <script src="../assets/js/core/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>

</body>
</html>