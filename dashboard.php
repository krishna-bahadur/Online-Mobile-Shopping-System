
<!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
<?php
 if(isset($_SESSION['admin'])){;?>
 	<div class="container">
 	<div class="row bg-secondary">
		 	<div class=" col-md d-flex justify-content-end p-2">
				<span style="color: #fff;" class="mt-1">Howdy, <?php echo  $_SESSION['admin']; ?> !</span>
			</div>
 		</div>
 	</div>
 	<?php
 	}
 ?>

  </body>
 </html>
 
 