<?php session_start();
include('header.php');
include('nav.php');?>
<?php require "db.php";?>
      <?php         
             $errors=$err="";
              if(isset($_POST['submit'])){
               $username = $_POST['username'];
               $password = md5($_POST['password']);

               if(empty($username) || empty($password)){
               	$err ="cannot be empty";
               }  
               else{             
	
              	$sql="SELECT * FROM customer_info WHERE username='$username' AND password='$password'";
                $result= $conn->query($sql);

                 if($rows=mysqli_num_rows($result)>0){
                  
                  $_SESSION['user']=$_POST['username'];
                  
                  	$url = "allproduct.php";
                  
                  header("Location:$url");
                  }
                else{
                $errors = "username or password is invalid.";
                }
              }
             }  
        ?>

<body>
	<div class="container py-4">
		<form class="col-md-4 login-wrap text-center py-3 offset-md-4" method="post" >
			<div>
			<img class="rounded-circle image-circle mb-3 w-50" src="image/logo.jpg">
			</div>

			<label for="name" class="form-label">Username</label>
			<input type="text" name="username" class="form-control" id="username">
		
			<label for="password" class="form-label mt-3 ">Password</label>
			<input type="password" name="password" class="form-control" id="password">


			<button class="btn btn-primary mt-3 btn-lg" type="submit" name="submit" onclick="return validation()">Login</button><br>
			<span class="error"><?php echo $errors;?></span>

			<h6 class="mt-3">Don't have account? <a href="signup.php">Signup now</a></h5>

		</form>
	</div>
</form>
</div>
<?php require"javascript.php"; ?>
<?php include('footer.php');?>