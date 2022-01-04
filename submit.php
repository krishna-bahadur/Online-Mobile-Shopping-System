<?php require"header.php" ?>
<?php
session_start();
require"db.php";
if(isset($_SESSION['user'])){
if(isset($_SESSION['cart'])){
	if(isset($_POST['hidden'])){
	$r = $_POST['hidden'];
 require"config.php"; 
$token = $_POST['stripeToken'];
\Stripe\Stripe::setVerifySslCerts(false);
$data=Stripe\Charge::create(array(
	"amount"=> "$r"."00",
	"currency"=>"USD",
	"description"=>"Hamro Mobile House Payment",
	"source"=>$token
));
$date=date("Y/m/d");
$transaction_id= $data->id;
$status = "Pending";
foreach ($_SESSION['cart'] as $key => $value){
$sql="INSERT INTO order_details(tid,item_name, item_price,quantity,customer_name,date_of_order, order_status)
VALUES('$transaction_id','$value[Item_Name]','$value[Price]','$value[Quantity]','$_SESSION[user]','$date','$status')";
if($conn->query($sql)==TRUE){
echo "<script>alert('Purchase success');</script>";
header("location:bill.php");
$_SESSION['tat'] =  $_POST['hidden'];				 
}
else{
"Error".$sql."<br>".$conn->error;
}
}?>
	


		<?php
	}
	}
 }
require"javascript.php" ?>

 