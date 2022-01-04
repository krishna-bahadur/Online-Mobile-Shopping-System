<?php session_start();
if(isset($_SESSION['user'])){
require "topnav.php";
 require"header.php";
require"nav.php"; ?>
<div class="container">
	<div class="row">
		<div class="col-md-12 text-center border rounded bg-light my-4">
			<h2>My Cart</h2>
		</div>
		<div class="col-md-9 ">
			<table class="table">
				<thead class="text-center">
				<tr>
				  <th scope="col">SN</th>
				  <th scope="col">Item_Name</th>
				  <th scope="col">Price</th>
				  <th scope="col">Quantity</th>
				  <th scope="col">Total</th>
				  <th scope="col"></th>

				</tr>
				</thead>
				<tbody class="text-center">
					<?php 
					$sr=0;
					if(isset($_SESSION['cart'])){
						foreach ($_SESSION['cart'] as $key => $value) {
							$sr=$key+1;
							echo "
								<tr>
								<td>$sr</td>
								<td>$value[Item_Name]</td>
								<td>
								$value[Price]
								<input type='hidden' class='iprice' value='$value[Price]'>
								</td>
								<td>
								<form method='POST' action='managecart.php'>
									<input onchange='this.form.submit()' type='number' class='iquantity'  value='$value[Quantity]' min='1' max='10' name='mod_quantity'>
										<input type='hidden' name='Item_Name' value='$value[Item_Name]'>
									</form>
								</td>
								<td class='itotal'></td>

								<td>
									<form method='POST' action='managecart.php'>
									<button name='remove_item' class='btn btn-outline-danger btn-sm' >Remove</button>
									<input type='hidden' name='Item_Name' value='$value[Item_Name]'>
									</form>
								</td>
								</tr>";
								require"db.php";				
				
				}
			
				}
			
				?>

				</tbody>
			</table>
		</div>
		<div class="col-md-3">
			<div class="border rounded bg-light p-4">
				<h4>Grand Total: ($)</h4>

				<?php if(isset($_SESSION['cart']) && COUNT($_SESSION['cart']) > 0){ ?>
				<form method="post" action="StripePayement.php" class="form">
					<div class="form-check">
					<input type="hidden" id="pay" name="TotalAmount" >
					<h5 id="gtotal" class="text-center my-3"></h5>

										<button type="submit" name="make_purchase" class=" my-2 btn btn-primary btn-block">Make purchase</button>

										<?php 
										if(isset($_SESSION['cart'])){
										$_SESSION['url'] = $_SERVER['REQUEST_URI'];} ?>
				</form>
			<?php } 
			?>
			<a href="<?php echo $GLOBALS['siteurl'] ?>/allproduct.php" class="btn btn-info w-100">Add Items</a>
			</div>
		</div>
	</div>
</div>
<?php }
else{
	header("location:login.php");
} ?>
<?php 	require"javascript.php"; ?>
<?php 	require"footer.php" ?>

