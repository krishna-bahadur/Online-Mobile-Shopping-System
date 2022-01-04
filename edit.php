<?php 
session_start();
$title_err=$price_err=$spe_err=$image_err="";
if(isset($_SESSION['admin'])){?>
<div class="row">
	<div class="col-sm-1">
		<?php 	require"dashboard1.php" ?>
	</div>
	<div class="col-sm">
		<?php require"dashboard.php"; ?>
<?php $postid=intval($_GET['postid']); ?> 	


<!-- update post -->
<?php
include("db.php");
$sql = "SELECT * FROM products p
		inner join brand b
		on p.brand_id = b.id
		where p.product_id = $postid ";
			$result = $conn->query($sql);

if(isset($_POST['submit2'])){
	$title = $_POST['title'];
  $price = $_POST['price'];
  $specification = $_POST['specification'];
  $brand = $_POST['brand'];

  if(empty($title)){
    $title_err = "Title cannot be empty";
  }
  if(empty($price) || $price == 0){
    $price_err = "Price cannot be empty or Zero";
  }
  else{
    if($price < 0){
      $price_err = "Price cannot be in negetive";
    }
  }
  if(empty($image)){
    $image_err = "Image must be selected or previous Image will be updated";
  }
  if(empty($specification)){
    $spe_err = "Specification must be filled";
  }

  if($title_err=="" && $price_err==""  && $spe_err==""){

	if(empty($_FILES['file']['name'])){
		$name=$_POST['file'];
	}
	else{
  $name = $_FILES['file']['name'];
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
  $extensions_arr = array("jpg","jpeg","png","gif");

  if( in_array($imageFileType,$extensions_arr) ){
 
    $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
    $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;


    move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
  }
 }
while($row=$result->fetch_assoc()){
	
 if(empty($image)){
 	$image = $row['image'];
 }
}
 $query = "UPDATE products SET title='{$_POST["title"]}', image='{$image}', price='{$_POST["price"]}',specs='{$_POST["specification"]}', brand_id='{$_POST["brand"]}'
           WHERE product_id=$postid " ;
    $result=mysqli_query($conn,$query);
    if($result){;?>
		<script type="text/javascript">
			alert("Post updated successfully.");
			window.location="post.php";
		</script>

<?php
}
}
}
?>

<div class="container">
<div class="row my-4 addpost">
	<div class="col-md-4 offset-md-3">
		<h1><u>Edit posts</u></h1>
		<?php 
		require"db.php";
		
			if($result->num_rows>0){
				while($row=$result->fetch_assoc()){;?>
				
		<form method="post" action="" enctype="multipart/form-data">
			<div class="form-group">
				<label class="form-label mt-3">Title</label>
				<input type="text"  class="form-control" name="title" value="<?php echo $row['title']; ?> " id="title"> 
        <span class="error"><?php echo $title_err; ?></span><br>


				<label class="form-label mt-3">Price:</label>
				<input type="text" required class="form-control" name="price" value=" <?php echo $row['price']; ?> " id="price">
        <span class="error"><?php echo $price_err; ?></span><br>


				<label class="form-label mt-3">Select image to upload:</label>
    			  <input class="form-control" type="file" name="file">
    			  <input type="hidden" name="file" value="<?php echo $row['image']; ?>" id="image">
    			  <img src="<?php echo $row['image']; ?>" class="my-2" ><br>
        <span class="error"><?php echo $image_err; ?></span><br>

				

				<label class="form-label mt-3">Specification</label>
				<textarea class="form-control " name="specification" required id="specification">
					<?php echo $row['specs']; ?>
				</textarea>
        <span class="error"><?php echo $spe_err; ?></span><br>


				<label class="form-label mt-3">Brand</label>
			<select name="brand" >
		         <option value="<?php echo $row['id'];?>"><?php echo $row['brand_name']; ?></option>
       
          <?php 
          require"db.php";
          $sql1 = "SELECT * FROM brand";
		      $result1 = $conn->query($sql1);
		      if($result1->num_rows>0){
		        while($row1=$result1->fetch_assoc()){?>
		         <option value="<?php echo $row1['id'];?>"><?php echo $row1['brand_name']; ?></option>
		<?php } };?>
       
      </select>
      
				<button type="submits"  class="btn btn-block btn-primary my-3" 
				name="submit2" onclick="return updatepost()">Update Post</button> 
			</div> 
		 </form>
		 <?php
		}
	}
	$conn->close();
		 ?>
	</div>
</div>
</div>
<?php require"javascript.php"; ?>
<?php require"footer.php"; ?>

<?php
}
else{
	header("location:admin-login.php");

}
 ?>

