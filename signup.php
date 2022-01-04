<?php 
session_start(); 
include('header.php');include('nav.php');?>
<?php require"db.php"; ?>
<?php
$name_err=$address_err=$phone_err=$email_err=$username_err=$dublicate_username=$password_err="";
if(isset($_POST['submitbtn'])) {

	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone']; 
	$username = $_POST['username']; 
	$password = md5($_POST['password']);
	$email =$_POST['email'];


	if(empty($name)){
		$name_err="Name cannot be empty. ";
	}
	else{
		if(!preg_match("/^[a-zA-Z ]*$/",$name)){
			$name_err = "Only alphabets are allowed.";
		}
	}

	if(empty($address)){
		$address_err = "Address cannot be empty.";
	}
	else{
		if(!preg_match("/^[a-zA-Z ]*$/",$address)){
			$address_err = "Only contains alphabet";
		}
	}

	if(empty($phone)){
		$phone_err = "Phone no cannot be empty";
	}
	else{
		if(!preg_match('/^[0-9]{10}+$/', $phone)){
			$phone_err = "Phone no must be 10 digits number.";
		}
	}

	if(empty($email)){
		$email_err="Email cannot be empty.";
	}
	else{
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			$email_err="Inavlid format of email.";
		}
	}

	if(empty($username)){
		$username_err = "Username cannot be empty";
	}

	if(empty($_POST['password'])){
		$password_err = "Password cannot be empty.";
	}
	else{
		if(strlen($_POST['password']) <= 8){
			$password_err ="Password conatins 8 or more digit";
		}
	}

	

	if($name_err=="" && $address_err=="" && $phone_err=="" && $email_err=="" && $username_err=="" && $password_err==""){
	$sq = "SELECT username FROM customer_info WHERE username= '$username'";
		$check = $conn->query($sq);

	if ($check->num_rows > 0){
			$dublicate_username = "Username already taken";
		}			
		
		else{
		$sql = "INSERT INTO customer_info(name, address, phone, username, password,email) VALUES('$name','$address','$phone','$username','$password','$email')";	
	
		 if($conn->query($sql) == TRUE) {
  		header("location:login.php");
	}
	else {
  		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	}
}
}
		

?>

<body>
	<div class="container">
		<form name="signup" class="col-md-4 login-wrap text-center py-2 offset-md-4" method="post" action="">

			<div>
			<img class="rounded-circle image-circle mb-3 w-50" src="image/logo.jpg">
			</div>

			<label for="name" class="form-label">Name</label>
			<input type="text" name="name"  class="form-control" id="name">
			<span class="error"><?php echo $name_err; ?></span><br>

			<label for="address" class="form-label my-1">Address</label>
			<input type="text" name="address" class="form-control" id="address">
			<span class="error"><?php echo $address_err; ?></span><br>


			<label for="phone" class="form-label my-1 ">Phone</label>
			<input type="number" name="phone"  class="form-control"    id="mobile">
			<span class="error"><?php echo $phone_err; ?></span><br>


			<label for="email" class="form-label my-1 ">Email</label>
			<input type="text" name="email"  class="form-control"   id="email">
			<span class="error"><?php echo $email_err; ?></span><br>


			<label for="username" class="form-label my-1 ">Username</label>
			<input type="text" name="username"  class="form-control"  id="username">
			<span class="error"><?php echo $dublicate_username; ?></span>
			<span class="error"><?php echo $username_err; ?></span><br>


			<label for="password" class="form-label my-1 ">Password</label>
			<input type="password"  name="password" class="form-control"  id="password">
			 <span class="error"><?php echo $password_err ?></span><br>


			<button class="btn btn-primary mt-2 btn-lg" 
			 type="submit" name="submitbtn" onclick="return validate()">Login</button>
			<h6 class="mt-3">Already have account? <a href="login.php">Login now</a></h5>
		</form>
	</div>
</form>
</div>
<?php require"javascript.php"; ?> 
<?php require "footer.php"; ?>
