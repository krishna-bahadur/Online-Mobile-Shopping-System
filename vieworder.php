
<?php
session_start();
require"db.php";
 if(isset($_SESSION['admin'])){
 	if(isset($_POST['orderitem'])){
 	$name = $_POST['username'];?>
 <div class="row">
  <div class="col-sm-1">
    <?php require"dashboard1.php"; ?>
  </div>
  <div class="col-sm">
    <?php require"dashboard.php" ?>
<div class="container">
  <div class="my-3">
    <h2 class="text-info">Order Details of Customer '<?php echo $name ?>'</h2>
  </div>
  <div>
  	<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Transaction Id</th>
      <th scope="col">Product Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Date of order</th>
      <th scope="col">Status</th>

    </tr>

  </thead>
  <tbody>
  	<?php 
  
  	$sql = "SELECT * FROM order_details WHERE customer_name='$name'";
  	$results=$conn->query($sql);
	if($results->num_rows>0){
		while($row = $results->fetch_assoc()){?>
	<tr>
  	 <td><?php echo $row['tid'] ?></td>
      <td><?php echo $row['item_name'] ?></td>
      <td><?php echo $row['quantity'] ?></td>
      <td><?php echo $row['item_price'] ?></td>
      <td><?php echo $row['date_of_order']?></td>
      <td><?php echo $row['order_status']?></td>
      <td></td>
  	</tr>
  	 <?php
  	}
  }
  else{
  	?>

	

  	
  </tbody>
</table>
<div>
    <h2>No Order has been made by this customer.</h2>
  </div>
     
  <?php
  }

  ?>
  </div>
</div>
</div>
</div> 
<?php
	}
}
?>