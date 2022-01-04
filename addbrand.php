<?php 
session_start();
$dublicate_brand="";
if(isset($_SESSION['admin'])){;
  ?>
<div class="row no-gutters">
	<div class="col-sm-1">
		<?php
		require"dashboard1.php";
		?>
	</div>
	<div class="col-sm">
		<?php require "dashboard.php"; ?>
<?php  $errbrand=""; ?>
<?php 
if(isset($_POST['submit'])){
	$brand = $_POST['brand_name'];
	if(empty($brand)){
		$errbrand="Cannot be empty.";
	}
	else{
	require "db.php";
	$sel = "SELECT brand_name FROM brand WHERE brand_name = '$brand' ";
	$re = mysqli_query($conn,$sel);
	if($re->num_rows > 0){
		$errbrand = "Sorry ! Two same brand name";
	}
	else{
	$sql="INSERT INTO brand(brand_name) VALUES('$brand')";
	if($conn->query($sql)===TRUE){
		 header("location:addbrand.php");
}
else{
	"Error".$sql."<br>".$conn->error;
}
$conn->close();
}
}	
}
?>

<div class="container addbrand">
<div class="  row my-4 ">
	<div class="col-md-4 ">
		<h2 class="text-danger">Add Category:</h2>
		<form method="post" id="addpostform" action="">
			<div class="form-group">

				<label class="form-label mt-3"> Enter Category</label>
				<input class="form-control" type="text" name="brand_name" id="addbrand">
				<span class="error"><?php echo "$errbrand"; ?></span><br>

				<button type="submit" class="btn btn-block btn-primary my-3" 
				name="submit" onclick="return addbrand()">Add</button>

			</div> 
		 </form>
	</div>
	<div class="col-md d-flex justify-content-center">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Catrgories</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php require"db.php";
				
				$sql = "SELECT * FROM brand ORDER BY id DESC";
				$result = $conn->query($sql);
				if($result->num_rows>0){
					while($row=$result->fetch_assoc()){;?>
						<tr>
					<td><?php echo $row['brand_name'] ?></td>
					<td><a href="<?php echo $siteurl;?>/editbrand.php?editbrand=<?php echo $row["id"] ?>"><i class="fa fa-edit"></i></a></td>
					<td><a href="<?php echo $siteurl;?>/deletebrand.php?deletebrand=<?php echo $row["id"] ?>"><i class="fa fa-trash"></i></a></td>
				</tr>
					<?php }
				 
				}
				?>
			</tbody>
		</table>
	</div>
</div>
</div>
</div>
</div>
<?php require "javascript.php";?>
<?php require "footer.php";?>
<?php
}
else{
	header("location:admin-login.php");
}
?>


	

