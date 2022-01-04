<?php
 session_start();
require"topnav.php";?>
<?php include("header.php");
require"nav.php";?>
<?php require "db.php";


?>

<div class="container bybrand">
	<div class="text-center my-3 bg-light">
		<?php
		if(isset($_GET['brand_id'])){
	$q= intval( $_GET['brand_id']);

	$sql = "SELECT * FROM brand 
		where id = $q";
	$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo  "<h3 class='text-center bg-primary rounded p-1 my-2'>".$row["brand_name"]."</h3>";
  
}
   }
                ?>
	</div>
<div class="row">
	
<?php 
$limit = 4;
     	if (isset($_GET['page'])) {
     		$page = $_GET['page'];
     	}
     	else{
     		$page = 1;
     	}
        
     $offside = ($page-1) * $limit;
		$sql = "SELECT * FROM products p
		inner join brand b
		on p.brand_id = b.id
		where p.brand_id = $q
		ORDER BY product_id DESC LIMIT {$offside},{$limit} ";
			$result = $conn->query($sql);
			if($result->num_rows>0){
				while($row=$result->fetch_assoc()){?>
			<div class="col-md-3 col-sm-6 my-2 my-md-0">
			<form method="POST" action="../managecart.php">	
					<div class="card shadow">
						<div>	
						 
						<a href="<?php echo $GLOBALS['siteurl'];?>/details.php?detail=<?php echo $row["product_id"] ?>"><img src="<?php echo $row["image"] ?>" alt="image" class="img-fluid card-img-top p-2"></a>

						</div>
						<div class="card-body text-center">

							<h5 class="card-title"><?php echo $row["title"] ?></h5>
							<h6 class="card-title">Brand: <?php echo $row["brand_name"] ?></h6>
							<h5 class="price">
								<span class="price">Price:<?php echo $row["price"] ?></span>
							</h5>
							<button type="submit" name="Add_To_Cart" class="btn btn-info my-3">Add to cart <i class="fa fa-shopping-cart"></i></button>
									 					<input type="hidden" name="id" value="<?php echo $row['id'];?>">
                            <input type="hidden" name="Item_Name" value="<?php echo $row['title'];?>">
                            <input type="hidden" name="Price" value="<?php  echo $row['price'];?>">
                           
						</div>
					</div>
		</form>
	</div>
<?php }
}
else{
 echo "<div class=' text-center'> <h1>No product Yet</h1></div>";

} $conn->close();?> 

</div>
<div class="d-flex justify-content-center">
	<div class="pagination">
		<?php 
		require"db.php";
			$sq = "SELECT * FROM products p 
			inner join brand b
			on p.brand_id = b.id 
			WHERE p.brand_id = '$q'
			ORDER BY product_id DESC ";
			$re = mysqli_query($conn,$sq) or die("error");
			if (mysqli_num_rows($re)>0) {
				$total_records = mysqli_num_rows($re);
				$total_page = ceil($total_records/$limit);

				echo '<ul class="pagination">';
				if ($page>1) {
					echo '<li><a href="allproduct.php?page='.($page - 1).'">Prev</a></li>';
				}
				for ($i=1; $i<=$total_page; $i++) { 
					if ($i == $page) {
						$active = "active";
					}
					else{
						$active = "";
					}
					echo '<li class="'.$active.'"><a href="allproduct.php?page='.$i.'">'.$i.'</a></li>';
				}
				if ($total_page>$page) {
					echo '<li><a href="allproduct.php?page='.($page + 1).'">Next</a></li>';
				}
				echo '</ul>';
			}
		}
	      ?>
				
	</div>
</div>
<?php require"footer.php"; ?>
