<?php session_start();?>
<?php 
include("header.php");
require"topnav.php"; 
require"nav.php"; 
?>
<?php require "db.php";?>
		 <?php
		  $q= intval( $_GET['detail']);
			$sql = "SELECT * FROM products p
				inner join brand b
				on p.brand_id = b.id
				where p.product_id = $q";
			$result = $conn->query($sql);

		if ($result->num_rows >0) {
		 while($row = $result->fetch_assoc()) {?>
	
	<div class="container details my-5" >
 	<div class="row ">
 		<div class="col-md-4 card p-0">
 			<img src="<?php echo $row['image'] ?>" class="rounded">
 		</div>
 		<div class="col-md-4 mt-4">
 			<div>
 				<h1 class="border shadow-lg p-2 mb-3 rounded"><u><?php echo $row['title'] ?></u></h1>
 			</div>
 			<div class="my-4">
 				<h5>Brand: <?php echo $row['brand_name'] ?></h5>
 			</div>
 			<div class="my-4">
 				<h5>Price: $<?php echo $row['price'] ?></h5>
 			</div>
 			<div>
			<form method="POST" action="managecart.php">
 				<?php if(isset($_SESSION['user'])){;?>
							<button type="submit" name="Add_To_Cart" class="btn btn-info my-3">Add to cart <i class="fa fa-shopping-cart"></i></button>
							<input type="hidden" name="id" value="<?php echo $row['id'];?>">
                            <input type="hidden" name="Item_Name" value="<?php echo $row['title'];?>">
                            <input type="hidden" name="Price" value="<?php  echo $row['price'];?>">
                            <?php
						} 
							else{?>
								<a href="<?php echo $GLOBALS['siteurl'] ?>/login.php" class="btn btn-info">Login</a>
							<?php
						
					}
							?>
						
				</form>
 			</div>
 		</div>
 		<div class="col-md-4 "></div>
 	</div>
 	<div class="row my-4">
 		<div class="col-md-8">
 			<h4>Specification:</h4>
 			<p>
 			<?php echo $row['specs'] ?>
 			</p>
 		</div>
 		
 	</div>
 	
 </div>
 <?php }
	}
?> 
<?php include("footer.php") ?>