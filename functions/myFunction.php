<?php 

$conn = mysqli_connect("localhost","root","","mangola");

if (isset($_POST["login"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $result =  mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

    if (mysqli_num_rows($result) === 1) {
            
        $row = mysqli_fetch_assoc($result);
        $name = $row["name"];
        $email = $row["email"];
        $user_id = $row["user_id"];

        $_SESSION["login"] = $name;
        $_SESSION["user_id"] = $user_id;

        if ($email == "admin@mangola.com") {
            header("Location: admin/index.php");
            die;
        }
        
        header("Location: index.php");


    } elseif (mysqli_num_rows($result) === 0) {

    } 
}

function getData($query) {
    global $conn;

    $result = mysqli_query($conn, $query);

    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows [] = $row;
    }
    return $rows;
}


?>