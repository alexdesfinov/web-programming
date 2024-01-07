<?php 
	session_start();

	include("functions/myFunction.php");

	if (isset($_POST["login"])) {

		$email = $_POST["email"];
		$password = $_POST["password"];

		$result =  mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

		if (mysqli_num_rows($result) === 1) {
				
			$row = mysqli_fetch_assoc($result);
			$name = $row["name"];
			$email = $row["email"];

			$_SESSION["login"] = $name;

			if ($email == "admin@mangola.com") {
				header("Location: admin/index.php");
			}
				
			elseif (mysqli_num_rows($result) === 0) {
			var_dump("Eroorr");
			}
		}    
	}

?>

<!DOCTYPE html>
<html>

	<head>
		<?php include "includes/css_header.php" ?>
	</head>

	<body style="background-color:#2F3235 !important">

		<?php include "includes/header_prelogin.php" ?>

	  	<div id="main_body" class="container">
    		<div class="row">
    			<div class="col-md-8 margin-top50">
    				<h2 class="text-white font-80px text-center"><b>WELCOME</b></h1>
    				<h2 class="text-white font-80px text-center"><b>De' Irma hobbies</b></h1>
    			</div>

    			<div class="col-md-4 margin-top50">
    				<h2 class="text-white text-center"> <b>Silahkan Login</b> </h2>
    				<form class="form" action="" method="POST">
    					<label class="text-white">Email:</label>
    					<input type="email" class="form-control" placeholder="Enter your Email" name="email" required><br>
    					<label class="text-white">Password:</label>
    					<input type="password" class="form-control" placeholder="Password" name="password" required><br>
    					<input type="submit" class="btn btn-danger btn-lg btn-block" value="Login" name="login"><br>
    				</form>
    				<p class="text-white"><i>Belum Punya Akun? <a href="register.php">Register Disini</a></i></p>
    			</div>
    		</div>
    	</div>
	</body>
</html>