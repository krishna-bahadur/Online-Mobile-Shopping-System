<?php 
session_start();
if(isset($_SESSION['user'])){
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if(isset($_POST['Add_To_Cart']))
	{
		

		if(isset($_SESSION['cart']))
		{
			$myitem=array_column($_SESSION['cart'], 'Item_Name');
			if(in_array($_POST['Item_Name'], $myitem))
			{
				echo "<script>alert('Item Already added');
				window.location.href='allproduct.php';</script>";
			}
			else{
			$count = count($_SESSION['cart']);
			$_SESSION['cart'][$count]=array('id' =>$_POST['id'],'Item_Name' =>$_POST['Item_Name'], 'Price'=>$_POST['Price'] , 'Quantity'=>1);
			echo "<script>alert('Item added');
				window.location.href='allproduct.php';</script>";
			}

		}
		else
		{

			$_SESSION['cart'][0]=array('id' =>$_POST['id'],'Item_Name' =>$_POST['Item_Name'], 'Price'=>$_POST['Price'] ,'product_id'=>$_POST['id'], 'Quantity'=>1);
			echo "<script>alert('Item added');
				window.location.href='allproduct.php';</script>";
		}
		
		
	}

	if(isset($_POST['remove_item']))
	{
		foreach($_SESSION['cart'] as $key => $value) 
		{
			if($value['Item_Name']==$_POST['Item_Name'])
			{
			unset($_SESSION['cart'][$key]);
			$_SESSION['cart']=array_values($_SESSION['cart']);
			echo "<script>alert('Item Removed');
			window.location.href='mycart.php';</script>";
			}

		}
	}
	if(isset($_POST['mod_quantity']))
	{
		foreach($_SESSION['cart'] as $key => $value) 
		{
			if($value['Item_Name']==$_POST['Item_Name'])
			{
				$_SESSION['cart'][$key]['Quantity']=$_POST['mod_quantity'];
				echo "<script>window.location.href='mycart.php';</script>";
			}

		}

	}
}
}
else{
	header("location:login.php");
}
 ?>