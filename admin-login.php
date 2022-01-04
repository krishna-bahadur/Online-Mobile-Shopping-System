<?php require"db.php"; $err=$errors=""; ?>
<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/font-awesome.min.css">
	<script type="text/javascript">
		function adminvalidation(){
			var username=document.getElementById('username');
			if(!username.value){
				alert("Username cannot be empty");
				username.focus();
				return false;
			}
			var password=document.getElementById('password');
			if(!password.value){
				alert("password cannot be empty");
				password.focus();
				return false;
			}
			else{
				return true;
			}
		}
	</script>
</head>
<body>

<?php 
if(isset($_POST['save'])){
	$username=$_POST['username'];
	$password=$_POST['password'];

	if(empty($username)||empty($password)){
		$err="username and password cannot be empty";
	}
	else{
		$sql="SELECT username, password FROM admin_info WHERE username='$username' AND password='$password'";
		$result=mysqli_query($conn,$sql);
		if($rows=mysqli_num_rows($result) > 0){
			
	        $_SESSION['admin']=$_POST['username'];
            header("location: post.php");
            }
            else{
                $errors = "username or password is invalid.";
            }
	}
	
}

 ?>

<div class="container py-2">
		<form class="col-md-4 login-wrap text-center py-3 offset-md-4" method="post" action="">
			<div>
			<img class="rounded-circle image-circle mb-3 w-50" src="image/logo.jpg">
			</div>

			<label for="name" class="form-label">Username</label>
			<input type="text" name="username" class="form-control" id="username">
			<span class="error"><?php echo $err; ?></span><br>
		
			<label for="password" class="form-label mt-1 ">Password</label>
			<input type="password" name="password" class="form-control" id="password">
			<span class="error"><?php echo $errors; ?></span>


			<button class="btn btn-primary mt-3 btn-lg" type="submit" name="save" onclick="return adminvalidation()">Login</button><br>
		</form>
	</div>
</body>
</html>