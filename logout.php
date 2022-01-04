<?php
session_start();
	if(isset($_GET['logout'])){
			unset($_SESSION['user']);
			unset($_SESSION['cart']);

		header("location:allproduct.php");
	}	
?>

<?php
session_start();
 if(isset($_GET['logout1'])){
		session_destroy();
		header("location:admin-login.php");
	}
	
	?>
