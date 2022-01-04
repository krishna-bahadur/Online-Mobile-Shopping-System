<?php require"header.php";
session_start();
if(isset($_SESSION['admin'])){ ?>
<div class="row">
	<div class="col-sm-1"><?php require"dashboard1.php"; ?></div>
	<div class="col-sm"><?php require"dashboard.php"; ?>
		<?php require "db.php";?>
		 <?php
		  $q= intval( $_GET['detailid']);
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
 				<a href="<?php echo $siteurl;?>/edit.php?postid=<?php echo $row['product_id'] ?>"><i class="fa fa-edit btn btn-success "><span class="mx-2">Edit</span></i></a>
 			</div>
 			<div>
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
	</div>
</div>
<?php
 }
 else{
 	echo "<div class='container-fluid'>
 	<h1>Opps you are not login.</h1><br>
 	<a href='admin-login.php'>
 	<h2 class='btn btn-primary'>Login Now</h2>
 	</a>
 	</div>";
 }
 ?>