<?php
session_start();

include("functions/myFunction.php");

?>

<!DOCTYPE html>
<html>

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/6c9caea8d0.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="assets/css/style5.css">

    <link rel="stylesheet" href="assets/css/contact.css">

    <title>De' Irma hobbies | The home of cake</title>

</head>

<body>

    <?php
    if (isset($_SESSION["login"])) {
        include "includes/header_postlogin.php";
    } else {
        include "includes/header_prelogin.php";
    }
    ?>

    <div class="containerr" style="background-image: url('images/bakery.jpeg'); background-size: cover; background-position: center;">
        <span class="big-circle"></span>
        <img src="img/shape.png" class="square" alt="" />
        <div class="form">
            <div class="contact-info">
                <h3 class="title">Apa Kendala Mu</h3>
                <p class="text">
                    Jika ada kendala silhakan hubungi kami
                </p>

                <div class="info">
                    <div class="information">
                        <i class="fa-solid fa-map-location-dot me-3"></i>
                        <p>Padang, Sumbar, Sumatera Barat</p>
                    </div>
                    <div class="information">
                        <i class="fa-solid fa-envelope me-3"></i>
                        <p>deirmahobbies@gmail.com</p>
                    </div>
                    <div class="information">
                        <i class="fa-solid fa-phone me-3"></i>
                        <p>08234345453</p>
                    </div>
                </div>

                <div class="social-media">
                    <p>Hubungi kami dengan :</p>
                    <div class="social-icons">
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.instagram.com/deirmahobbies/">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="contact-form">
                <span class="circle one"></span>
                <span class="circle two"></span>

                <form action="index.html" autocomplete="off">
                    <h3 class="title">Hubungi Kami</h3>
                    <div class="input-container">
                        <input type="text" name="name" class="input" />
                        <label for="">Username</label>
                        <span>Username</span>
                    </div>
                    <div class="input-container">
                        <input type="email" name="email" class="input" />
                        <label for="">Email</label>
                        <span>Email</span>
                    </div>
                    <div class="input-container">
                        <input type="tel" name="phone" class="input" />
                        <label for="">Phone</label>
                        <span>Phone</span>
                    </div>
                    <div class="input-container textarea">
                        <textarea name="message" class="input"></textarea>
                        <label for="">Message</label>
                        <span>Message</span>
                    </div>
                    <input type="submit" value="Kirim" class="btnn" />
                </form>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>

</body>

</html>