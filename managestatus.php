<?php
session_start();
require"db.php";
require"header.php";
 if(isset($_SESSION['admin'])){
    if(isset($_GET['id'])){
 	$id = $_GET['id'];?>
 <div class="row">
  <div class="col-sm-1">
    <?php require"dashboard1.php"; ?>
  </div>
  <div class="col-sm">
    <?php require"dashboard.php" ?>
<div class="container">
  <div class="my-3">
    <h2 class="text-info">Manage Status</h2>
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
  
  	$sql = "SELECT * FROM order_details WHERE order_id='$id'";
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

	<div>
		<h2>No Order has been made by this customer.</h2>
	</div>
  	 
  <?php
	}

  ?>

  	
  </tbody>
</table>
  </div>
  <div>
    <?php if(isset($_POST['savestatus'])){
      $getstatus = $_POST['status'];
      $sqlsts = "UPDATE order_details SET order_status='$getstatus' WHERE order_id='$id'";
      $resultsts=$conn->query($sqlsts);
    if($resultsts == TRUE){;?>
    <script type="text/javascript">
      alert("Status updated successfully.");
      window.location="orders.php";
    </script>

<?php
  }
    } 
    ?>
    <h3>Select status:</h3>
    <form class="form" method="post">
      <label class="form-label">Choose:</label>
      <select class="form-select" name="status">
       <option selected>Pending</option>
      <option value="Cancel" >Cancel</option>
      <option value="Delivered">Delivered</option>
      </select>
      <input type="submit" name="savestatus" value="Save" class="btn btn-info">
    </form>

  </div>
</div>
</div>
</div> 
<?php

	}
}
?>