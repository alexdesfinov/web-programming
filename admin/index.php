<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("includes/header.php"); ?>
</head>

<body class="g-sidenav-show  bg-gray-200">

    <?php include("includes/sidebar.php"); ?>
    
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">

        </nav>
        
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
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Harga</label>
                                    <input type="number" class="form-control">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Description</label>
                                    <textarea name="description" class="form-control"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Upload File</label>
                                    <input type="file" class="form-control">
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary"> Add Product</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div>
            <?php include("includes/footer.php"); ?>
        </div>
        
    </main>

  <script src="../assets/js/core/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>

</body>
</html>