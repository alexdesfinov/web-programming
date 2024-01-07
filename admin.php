<!DOCTYPE html>
<html>
	<?php 
	session_start();
	if(!(isset($_SESSION['name'])&&isset($_SESSION['email'])))
  	{
    	header('Location: register.php');
  	}
	include "includes/css_header.php"; ?>
<body style="background-image: url('images/bakery.jpeg');background-size: cover; background-position: center;">
	<?php include "includes/header_admin.php"; ?>
	<div class="row margin-left20">

		<div class="col-md-12 text-center">
			<h1 class="font-20px text text-white text-center">Admin Pannel</h1>
		</div>
		<br><br><br>
		<a href="admin_orders.php" class="btn btn-lg btn-success margin-left20">Lihat Semua Pesanan</a>
		<br><br><br>
		<?php 
		if(isset($_GET['msg']))
        { 
          if ($_GET['msg']==1)
          {
            echo "<h3 class='text-center text-red'><i>Produk Berhasil Ditambahkan</i></h3><br>";
          }
          elseif ($_GET['msg']==2)
          {
            echo "<h3 class='text-center text-red'><i>Produk Gagal Ditambahkan</i></h3><br>";
          }
          elseif ($_GET['msg']==11)
          {
            echo "<h3 class='text-center text-red'><i>Produk Berhasil Dihapus<i></h3><br>";
          }
          elseif ($_GET['msg']==22)
          {
            echo "<h3 class='text-center text-red'><i>Produk Gagal Dihapus</i></h3><br>";
          }
        } 
        ?>
		<div class="row">
			<div class="col-md-6">
				<h1 class="font-20px text text-white text-center">Tambah Produk Baru</h1>
			</div>
			<div class="col-md-6">
				<form action="upload_product.php" method="POST" enctype="multipart/form-data">
					<label class="text text-white">Nama Produk</label>
					<input type="text" name="product_name" class="form-control"><br>
					<label class="text text-white">Harga Produk</label>
					<input type="number" name="product_price" class="form-control"><br>
					<label class="text text-white">Deskripsi Produk</label>
					<textarea name="product_description" class="form-control"></textarea><br>
					<label class="text text-white">Upload Gambar</label>
					<input type="file" name="image" class="form-control"><br>
					<input type="submit" value="Tambah Produk" class="btn btn-success btn-lg">
				</form>
			</div>
		</div>
		<br><br><br>
		<div class="row">
			<div class="col-md-6">
				<h1 class="font-20px text text-white text-center">Hapus Produk</h1>
			</div>
			<div class="col-md-6">
				<form action="delete_product.php" method="POST">
					<label class="text text-white">ID Produk</label>
					<input type="number" name="product_id" class="form-control"><br>
					<input type="submit" value="Hapus Produk" class="btn btn-success btn-lg">
				</form>
			</div>
		</div>
		
	</div>
</body>
</html>