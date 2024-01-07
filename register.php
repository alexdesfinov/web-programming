<!DOCTYPE html>
<html>

	<?php include "includes/css_header.php" ?>
	
    <body style="background-image: url('images/bakery.jpeg');background-size: cover; background-position: center;">
        
    <?php include "includes/header_prelogin.php" ?>

    	<div id="main_body" class="container">
            <?php 
                if(isset($_GET['msg']))
                {
                    if($_GET['msg']=='2')
                    {
                        echo "<h3 class='text-center text-white margin-top50'><i>Username Sudah Digunakan!</i></h3>";
                    }
                }
             ?>
    		<div class="row">
    			<div class="col-md-8 margin-top50">
    				<h2 class="text-white font-80px text-center"><b>WELCOME</b></h1>
                    <h2 class="text-white font-80px text-center"><b>De' Irma hobbies</b></h1>   				
    			</div>

    			<div class="col-md-4 margin-top50">
    				<h2 class="text-white text-center"> <b>Buat Akun</b> </h2>
    				<form class="form" action="register_user.php" method="POST">
                        <label class="text-white">Nama:</label>
                        <input type="Name" class="form-control" placeholder="Enter your Name" name="user_name" required><br>
    					<label class="text-white">Email:</label>
    					<input type="email" class="form-control" placeholder="Enter your Email" name="user_email" required><br>
    					<label class="text-white">Password:</label>
    					<input type="password" class="form-control" placeholder="Password" name="user_password" required><br>
    					<input type="submit" class="btn btn-danger btn-lg btn-block" value="Register" name=""><br>
    				</form>
    				<p class="text-white"><i>Sudah Ada Akun? <a href="index.php">Masuk Disini</a></i></p>
    			</div>
    		</div>
    	</div>
	</body>
</html>