<?php $deletebrand=intval($_GET['deletebrand']); ?>
<?php 
require "db.php";
$sql ="DELETE  FROM brand
WHERE id = $deletebrand";
$result=mysqli_query($conn, $sql);
if($result===TRUE){?>
		<script type="text/javascript">
			alert("Category deleted successfully.");
			window.location="addbrand.php";
		</script>
<?php  
}
else{?>
<script type="text/javascript">
			alert("Some product are in this category so it cannot be deleted.");
			window.location="addbrand.php";
		</script>
<?php
}
?>

