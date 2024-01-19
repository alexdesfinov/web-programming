<?php

$conn = mysqli_connect("localhost", "root", "", "toko_kue");

if (isset($_POST["login"])) {

    $emailget = $_POST["email"];
    $passwordget = $_POST["password"];

    $result =  mysqli_query($conn, "SELECT * FROM users WHERE email = '$emailget'");

    if (mysqli_num_rows($result) === 1) {

        $row = mysqli_fetch_assoc($result);
        $name = $row["name"];
        $email = $row["email"];
        $password = $row["password"];
        $user_id = $row["user_id"];

        if ($password == $passwordget) {

            $_SESSION["login"] = $name;
            $_SESSION["user_id"] = $user_id;

            if ($email == "admin@mangola.com") {
                header("Location: admin/index.php");
                die;
            }

            header("Location: index.php");
        }

        $err1 = true;
    } elseif (mysqli_num_rows($result) === 0) {
        $err2 = true;
    }
}

if (isset($_POST["daftar"])) {

    $namaget = $_POST["nama"];
    $emailget = $_POST["email"];
    $passwordget = $_POST["password"];

    $result =  mysqli_query($conn, "SELECT * FROM users WHERE email = '$emailget'");

    if (mysqli_num_rows($result) === 0) {

        $daftar = mysqli_query($conn, "INSERT INTO users VALUES (NULL, '$namaget', '$emailget', '$passwordget')");

        if ($daftar) {

            $_SESSION["daftar"] = true;

            session_destroy();
        }
    } elseif (mysqli_num_rows($result) === 1) {
        $err3 = true;
    }
}

function getData($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);

    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
