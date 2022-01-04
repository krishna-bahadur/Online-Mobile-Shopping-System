<?php $postdelete=intval($_GET['postdelete']); ?>
<?php 
require "db.php";
$sql ="DELETE FROM products
WHERE product_id = $postdelete";
$result=mysqli_query($conn, $sql);
if($result){?>
		<script type="text/javascript">
			alert("Post deleted successfully.");
			window.location="post.php";
		</script>
<?php  
}
 ?>
