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
                </form>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <?php include("lib/includes/script.php"); ?>
</body>

</html>