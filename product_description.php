<html>
	<?php 
		session_start();

		include("functions/myFunction.php");
		
		if(!isset($_SESSION["login"])) {
			header("Location: login.php");
		}

  		include "includes/css_header.php";
	?>
	<body style="background-image: url('images/bakery.jpeg');background-size: cover; background-position: center;">
		<?php include "includes/header_postlogin.php"; 				
      	$product_id=$_GET['product_id'];
      	$query="SELECT * FROM `products` WHERE `product_id` LIKE '$product_id'";
      	$results=mysqli_query($conn,$query);
      	$row=mysqli_fetch_assoc($results);
      	
      	if(isset($_GET['msg']))
	    {	
	    	if ($_GET['msg']==1)
		    {
		    echo "<h4 class='text-center text-red'><i>Produk Ditambahkan ke Keranjang</i></h4><br>";
		    }
		    elseif($_GET['msg']==2)
		     {
		     	echo "<h4 class='text-center text-red'><i>Produk Kamu Sudah Ada Di Keranjang</i></h4><br>";
		     }
		   	elseif($_GET['msg']==11)
		   	{
				echo "<h4 class='text-center text-red'><i>Produk Ditambahkan ke Wishlist</i></h4><br>";
		  	}
		    elseif($_GET['msg']==22)
		    {
		    	echo "<h4 class='text-center text-red'><i>Produk Kamu Sudah Ada Di Wishlist</i></h4><br>";
		    }
		    else
		    {
		    	echo "<h4 class='text-center text-red'><i>Terjadi Kesalahan!</i></h4>";
		    }
		}
				echo '<div class="container">
			        	<div class="row padding30">  
			          		<div class="col-md-6">
			                	<div class="product-tab rounded-5 p-3">
				           	  		<img src="images/'.$row['product_image'].'" class="img-size-lg object-fit-cover" style="border-radius: 25px;" >
				            	</div>
					    	</div>
				      	   	<div class="col-md-6">
				      	   		<div class="product-tab p-3 rounded-4">
					                <h1 class="text-center mb-3"> '.$row['product_name'].'</h1>
					                <p class="text-justify" >'.$row['product_description'].'</p> 
									<p class="my-5" ><b>Price: Rp '.number_format($row["product_price"],0,",",".").'</b></p>
									<div class="container-fluid d-flex justify-content-around">
										<a href="add_to_cart.php?product_id='.$product_id.'" class="btnprod btn btn-lg">Keranjang</a>
										<a href="add_to_wishlist.php?product_id='.$product_id.'" class="btnprod btn btn-lg">Wishlist</a>
									</div>
				                </div>
				           	</div>
				        </div>
				    </div>';				
      	?>
      	<div class="row">
      		<div class="col-md-12">
      			<h1 class="text-center"> TOP REVIEWS</h1>
      		</div>
      	</div>
      	<div class="row">
      		
      			<?php
      				$query1="SELECT * FROM `reviews` r JOIN `users` u ON r.`user_id`=u.`user_id` WHERE r.`product_id` LIKE '$product_id'";
      				$result1=(mysqli_query($connection,$query1));
      				while($row1=mysqli_fetch_assoc($result1))
      				{
      					echo '<div class="col-md-6">
      							<div class="product-tab margin-left20"> 
      								<h4><b>'.$row1['review_heading'].'</b><br>
      								<small>By: '.$row1['name'].'</small> <br><br>
      								'.$row1['review_text'].' </h4>
      							</div>
      						  </div>';
      				}
      			?>
      		
      	</div>	
	</body>
</html>