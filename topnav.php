<?php 
$sitelogout="http://localhost/project";
if(isset($_SESSION['user'])){;?>
	<div class="container p-0">
	<div class="bg-secondary d-flex justify-content-end p-2">
		<span style="color: #fff;" class="mt-1">Welcome, <?php echo  $_SESSION['user']; ?></span>
		<a href="<?php 	echo $sitelogout; ?>/logout.php?logout" class="btn btn-danger mx-3">logout</a>
	</div>
</div>
	<?php
	}
	else{?>
		<div class="container p-0">
			<div class="bg-secondary d-flex justify-content-end p-2">
				<a href="<?php 	echo $sitelogout; ?>/login.php" class="btn btn-primary mx-3">Login</a>
				<a href="<?php 	echo $sitelogout; ?>/signup.php" class="btn btn-warning ">Signup</a>
			</div>
		</div>
	<?php
	}
 ?> 