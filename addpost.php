<?php 
$title_err=$price_err=$spe_err=$image_err="";
session_start();
if(isset($_SESSION['admin'])){;
  ?>
<div class="row no-gutters">
  <div class="col-sm-1">
    <?php
    require"dashboard1.php";
    ?>
  </div>
  <div class="col-sm">
    <?php require"dashboard.php"; ?>
<?php
include("db.php");
if(isset($_POST['submit1'])){
  $title = $_POST['title'];
  $price = $_POST['price'];
  $specification = $_POST['specification'];
  $brand = $_POST['brand'];

  if(empty($title)){
    $title_err = "Title cannot be empty";
  }
  if(empty($price)){
    $price_err = "Price cannot be empty";
  }
  else{
    if($price < 0){
      $price_err = "Price cannot be in negetive";
    }
  }
  if(empty($image)){
    $image_err = "Image must be selected";
  }
  if(empty($specification)){
    $spe_err = "Specification must be filled";
  }

  if($title_err=="" && $price_err==""  && $spe_err==""){

  $name = $_FILES['file']['name'];
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
 
    // Convert to base64 
    $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
    $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
    // Insert record
    
    $query = "INSERT INTO products(title,image,price,specs,brand_id) VALUES('".$_POST['title']."' ,'".$image."', '".$_POST['price']."', '".$_POST['specification']."', '".intval($_POST['brand'])."')";
    $result=mysqli_query($conn,$query);
    if($result){;?>
     <script type="text/javascript">
      alert("New Post added successfully.");
      window.location="post.php";
    </script>
    <?php
  }
    
    
    // Upload file
    move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
  }
}
}
 
?>
<div class="container">
<div class="row my-4 addpost">
  <div class="col-md-4 offset-md-3">
    <form method="post" action="" enctype="multipart/form-data">
      <div class="form-group">
        <label class="form-label mt-3">Title</label>
        <input type="text" class="form-control" name="title" id="title" > 
        <span class="error"><?php echo $title_err; ?></span><br>

        <label class="form-label mt-1">Price:</label>
        <input type="text" class="form-control" name="price" id="price">
        <span class="error"><?php echo $price_err; ?></span><br>

        <label class="form-label mt-1 ">Select image to upload:</label>
            <input class="form-control p-1" type="file" name="file" id="file">
        <span class="error"><?php echo $image_err; ?></span><br>

        

        <label class="form-label mt-3">Specification</label>
        <textarea class="form-control" name="specification" id="specification"></textarea>
        <span class="error"><?php echo $spe_err; ?></span><br>


        <label class="form-label mt-3">Brand</label>
      <select name="brand" id="brand">
       
          <?php $sql = "SELECT * FROM brand";
      $result = $conn->query($sql);
      if($result->num_rows>0){
        while($row=$result->fetch_assoc()){?>
         <option value="<?php echo $row['id'];?>"><?php echo $row['brand_name'];?></option>
<?php } };?>
       
      </select>
      
        <button type="submits" class="btn btn-block btn-primary my-3" 
        name="submit1" onclick="return addpost()">Add Post</button> 
      </div> 
     </form>
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
  ;?>
  <h1 class=> OOPS ! You are not login please login first.</h1>
  <a href="admin-login.php" class="btn btn-primary"><h2>Login Now</h2></a>
<?php
}
?>

 
