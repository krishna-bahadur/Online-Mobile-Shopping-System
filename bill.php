<?php
session_start();
require"db.php";
require 'header.php';
if(isset($_SESSION['user'])){
	if(isset($_SESSION['cart'])){
		if(isset($_SESSION['tat'])){
$bill ="SELECT name,address FROM customer_info WHERE username='$_SESSION[user]'";
	$results=$conn->query($bill);
	if($results->num_rows >0){
		while($row = $results->fetch_assoc()){?>
			<div class="bill offset-md-3 my-5">
				<div class="one my-3 text-center">
					<h2 class="my-0">Hamro Mobile House</h2>
					<p class="my-0">Kathmandu,Nepal</p>
					<span>+977981740549</span>
				</div>
				<div class="d-flex">
					<div>
					 <p class="my-0"><b>Customer Name: </b><?php echo $row['name'] ?></p>
					 <p><b>Address: </b><?php echo $row['address'] ?></p>
					</div>
					<div class="date">
						<p><b>Date :</b><?php echo date("Y/m/d") ?></p>
					</div>
				</div>
				<?php
		}
	}
	?>		
				<div>
					<table class="table table-striped ">
						<thead class="table-dark">
							<tr>
								<th>Products Name</th>
								<th>Quantity</th>
								<th>Price</th>

							</tr>
						</thead>
						<tbody>
						<?php 
						foreach($_SESSION['cart'] as $key => $value){?>
							<tr>
								<td><?php echo $value['Item_Name']?></td>
								<td><?php echo $value['Quantity']?></td>
								<td><?php echo $value['Price']?></td>
							</tr>	
						<?php
						}
						?>
						</tbody>
					</table>
					<div class="totalamount">
						<h3 id="pay2" >TotalAmount $: <?php echo $_SESSION['tat'] ?></h3>
					</div>
					<div class="offset-md-5 mt-4">
						<?php 

						if(isset($_POST['home'])){
							unset($_SESSION['cart']);
							header("location:allproduct.php");
						}
						 ?>
						<form method="post" action="">
							<input type="submit" name="home" value="Go Home" class="btn btn-danger">
						</form>
					</div>
					<i class="mt-5">Please save or screenshot this bill !</i>

				</div>
			</div>
			<?php 

		}
	}
}
 require"javascript.php";
  ?>