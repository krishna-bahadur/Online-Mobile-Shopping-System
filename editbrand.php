
<?php
session_start();
if(isset($_SESSION['admin'])){ 
require"db.php";
$update_brand_err="";
$get_brand_id = $_GET['editbrand'];
?>
<div class="row">
  <div class="col-sm-2">
    <?php require"dashboard1.php"; ?>
  </div>
  <div class="col-sm-4 mt-4">
    <h2 class="my-3"><u class="text-danger">Update Category</u></h2>
    <?php
if(isset($_GET['editbrand'])){
  if(isset($_POST['updatebrand'])){
    $updated_value = $_POST['updated_brand_name'];
    if(empty($updated_value)){
      $update_brand_err = "Cann be empty";
    }
    else{
    $update_sql = "UPDATE brand SET brand_name = '$updated_value' WHERE id='$get_brand_id'";
    $update_result = mysqli_query($conn, $update_sql);
    if($update_result == TRUE){
      echo "<script type='text/javascript'>
      alert('Category updated successfully.');
      window.location='addbrand.php';
    </script>";
    }
  }
}

  $edit_brand = "SELECT * FROM brand WHERE id='$get_brand_id'";
  $result_edit_brand = mysqli_query($conn, $edit_brand);
  if($result_edit_brand->num_rows > 0){
    while($row=$result_edit_brand->fetch_assoc()){?>
      <form method="post" id="addpostform" action="">
      <div class="form-group">

        <label class="form-label mt-3"> Enter Category</label>
        <input class="form-control" type="text" name="updated_brand_name" value="<?php echo $row['brand_name'] ?>" id="editbrand">
        <span class="error"><?php echo $update_brand_err; ?></span><br>
      

        <button type="submit" class="btn btn-block btn-primary my-3" 
        name="updatebrand" onclick="return editbrand()">Update</button>
      </div> 
     </form>
    <?php }
  }
}
?>
  </div>
</div>
<?php require"javascript.php" ?>
<?php
}
else{
  header("location:admin-login.php");
 }
 ?>
