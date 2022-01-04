<!DOCTYPE html>
<html>
<head>
	<?php  $GLOBALS['siteurl'] ="http://localhost/project";?>
	<?php 	$site="http://localhost/project"; ?>
	<title>Index</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['siteurl'];?>/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['siteurl'];?>/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['siteurl'];?>/fontawesome/font-awesome.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light p-0 dashboard">
	<h4 href="" class="navbar-brand"><i class="fa fa-dashboard mx-1"></i>DASHBOARD</h4>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
       <ul type="none" class="navbar-nav">
			<li class="nav-item">
				<a href="post.php" class="nav-link" ><i class="fa  fa-product-hunt mx-2"></i>Products</a>
			</li>
			<li class="nav-item">
				<a href="addpost.php" class="nav-link"><i class="fa fa-plus mx-2"></i>Add Post</a>
			</li>
			<li class="nav-item">
				<a href="addbrand.php" class="nav-link"><i class="fa fa-list-alt mx-2"></i>Categories</a>
			</li>
			<li class="nav-item">
				<a href="customers.php" class="nav-link"><i class="fa fa-user mx-2"></i>Customers</a>
			</li>
			<li class="nav-item">
				<a href="orders.php" class="nav-link"><i class="fa fa-shopping-cart mx-2"></i>Orders</a>
			</li>
			
			<li class="nav-item">
				<a href="logout.php?logout1" class="nav-link"><i class="fa fa-sign-out mx-2"></i>Logout</a>
			</li>
		</ul>
  </div>
</nav>
</body>
</html>