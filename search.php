<?php session_start();require"topnav.php"; ?>
<?php require"header.php";require"nav.php"; ?>
<?php require"db.php"; ?>
<?php 
if(isset($_POST['searchsubmit'])){
	$search_value = $_POST['search'];
	if(empty($search_value)){
		echo "<script>alert('Empty');
		window.location.href='allproduct.php';</script>";
	}
	else{?>
	 <div class="container">
		<div class="row text-center py-4">
		<?php
		$search_sql = "SELECT * FROM products p
		inner join brand b
		on p.brand_id = b.id WHERE title  LIKE '%{$search_value}%' ";
		$search_result = mysqli_query($conn,$search_sql);
		if($search_result->num_rows > 0){
			while($row = $search_result->fetch_assoc()){?>
				<div class="col-md-3 col-sm-6  my-3">
				<form method="POST" action="managecart.php" >
					<div class="card shadow">
						<div>	
						 	<a href="<?php echo $GLOBALS['siteurl'];?>/details.php?detail=<?php echo $row["product_id"] ?>">
						 	<img src="<?php echo $row["image"] ?>" alt="image" class="img-fluid card-img-top p-2">
						 </a>
						</div>
						<div class="card-body">
							<h5 class="card-title"><?php echo $row["title"] ?></h5>
							<h6 class="card-title">Brand: <?php echo $row["brand_name"] ?></h6>
							<h5 class="price">
								<span class="price">Price:$<?php echo $row["price"] ?></span>
							</h5>
							<?php if(isset($_SESSION['user'])){;?>
									<button type="submit" name="Add_To_Cart" class="btn btn-info my-3">Add to cart <i class="fa fa-shopping-cart"></i></button>
									 <input type="hidden" name="id" value="<?php echo $row['product_id'];?>">
                            <input type="hidden" name="Item_Name" value="<?php echo $row['title'];?>">
                            <input type="hidden" name="Price" value="<?php  echo $row['price'];?>">

							<?php
						} 
							else{;?>
								<a href="login.php" class="btn btn-info">Login</a>
							<?php
						}
							?>
									
								
						</div>
					</div>
				</form>
			</div>
			<?php
				}
			}
		else
		{
			echo "<h2>No result found</h2>";
		}

		?>
	</div>
</div>
		<?php
	}
}

 ?>
<?php require"footer.php" ?>
