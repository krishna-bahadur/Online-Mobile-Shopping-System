<div class="container px-0">
	<div class="header container">
	<div class="row no-gutters align-items-center">
    <div class="col-6">
      <div class="d-flex">
        <img src="<?php echo $siteurl;?>/image/pic.png" class="image">
      <h3 class="text-danger pt-4">Hamro Mobile House</h3>
      </div>
    </div>
      <div class="col-md-6  p-0">
      <div class="search_btn">
        <form method="post" action="search.php" class="form">
        <input type="text" name="search" class="form-control d-flex" placeholder="Search for products">
      <button type="submit" name="searchsubmit" class="btn btn-primary" >Search</button>
      </form>
      </div>
    </div>

 </div>	
</div>

	<nav class="navbar navbar-expand-sm navbar-light menu p-0">
 		<button class="navbar-toggler bg-light" data-toggle="collapse" data-target="#krishna">
 			<span class="navbar-toggler-icon"></span>
 		</button>
 		<div class="collapse navbar-collapse" id="krishna">
 		<ul class="navbar-nav menubar">
  <li class="nav-item">
          <a href="<?php echo $siteurl;?>/allproduct.php" class="nav-link fa fa-home"></a>
        </li>       
      <?php 
      require"db.php";
        $sql = "SELECT * FROM brand";
        $result = $conn->query($sql);
        if($result->num_rows>0){
        while($row=$result->fetch_assoc()){;?>
          <li class="nav-item">
          <a href="http://localhost/project/bybrand.php/?brand_id=<?php echo $row["id"]; ?>" class="nav-link"><?php echo $row["brand_name"]; ?></a>
          </li>
  <?php }
}
else{
  echo"No Brand added";
}
$conn->close();
?>
<li class="nav-item">
          <a href="<?php echo $GLOBALS['siteurl']?>/refund.php" class="nav-link">Refund_policy</a>
        </li> 
 	</ul>
 </div>

<div class="mx-4">
      <?php 

      $count=0;
      if(isset($_SESSION['cart']))
      {
        $count=count($_SESSION['cart']);
      }

       ?>
      <a href="<?php  echo $GLOBALS['siteurl'] ?>/mycart.php" class="fa fa-shopping-cart"> (<?php echo $count; ?>)</a>
    </div>

 </nav>
 </div>
