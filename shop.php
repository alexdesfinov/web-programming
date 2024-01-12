<?php
session_start();

include("functions/myFunction.php");

?>

<!DOCTYPE html>
<html>

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6c9caea8d0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style5.css">
    <title>De' Irma hobbies | The home of cake</title>

</head>

<body style="background-image: url('images/bakery.jpeg'); background-size: cover; background-position: center;">

    <?php
    if (isset($_SESSION["login"])) {
        include "includes/header_postlogin.php";
    } else {
        include "includes/header_prelogin.php";
    }
    ?>


    <!-- sidebar + content -->
    <section class="utama">
        <div class="container">
            <div class="row">
                <!-- content -->
                <div class="col-lg-12">
                    <div class="row">
                        <?php
                        $query = "SELECT * FROM `products`";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <div class="col-lg-3 col-md-4 col-sm-1 d-flex">
                                <div class="card w-100 my-2 shadow-2-strong rounded-3 shadow">
                                    <a href="product_description.php?product_id=<?php echo $row['product_id']; ?>">
                                        <div class="imgheight">
                                            <img src="images/<?php echo $row['product_image']; ?>" class="card-img-top object-fit-cover h-100 rounded-3" />
                                        </div>
                                    </a>
                                    <div class="card-body d-flex flex-column">
                                        <div class="d-flex flex-row mb-4">
                                            <h5 class="mb-1 me-1 fw-bold">Rp <?php echo number_format($row["product_price"], 0, ",", "."); ?></h5>
                                        </div>
                                        <p class="card-text"><?php echo $row['product_description']; ?></p>
                                        <div class="card-footer d-flex align-items-end mt-auto bg-white">
                                            <a href="includes/controller/add_to_cart.php?product_id=<?php echo $row['product_id']; ?>" class="btn cartcolor me-3"><i class="fa-solid fa-cart-shopping text-white"></i></a>
                                            <a href="#!" class="btn cartcolor "><i class="fas fa-heart fa-lg text-white"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                    <hr />

                    <!-- Pagination -->
                    <nav aria-label="Page navigation example" class="d-flex justify-content-center mt-3">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link text-warning " href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link text-warning" href="#">1</a></li>
                            <li class="page-item"><a class="page-link text-warning " href="#">2</a></li>
                            <li class="page-item"><a class="page-link text-warning " href="#">3</a></li>
                            <li class="page-item"><a class="page-link text-warning " href="#">4</a></li>
                            <li class="page-item"><a class="page-link text-warning " href="#">5</a></li>
                            <li class="page-item">
                                <a class="page-link text-warning " href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- Pagination -->
                </div>
            </div>
        </div>
    </section>
    <!-- sidebar + content -->

    <?php include "includes/footer.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>

</body>

</html>