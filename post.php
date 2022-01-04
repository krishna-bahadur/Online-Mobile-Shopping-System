<?php 
session_start();
if(isset($_SESSION['admin'])){
?>
<div class="row">
	<div class="col-sm-1">
		<?php 	require"dashboard1.php" ?>
	</div>
	<div class="col-sm">
		<?php require"dashboard.php"; ?>
	<div class="container allpost">
	
	<div class="row my-3">
		<div class="col-md-4">
			<h2><u>All Posts</u></h2>
		</div>
		<div class="col-md-4 offset-md-4 d-flex justify-content-center">
			<a href="addpost.php" class="btn btn-danger rounded ">Add post</a>
		</div>
	</div>
	<div class="row">
		<table class="table table-bordered border-primary">
		  <thead class="table-dark">
		    <tr>
		      <th scope="col">S.N</th>
		      <th scope="col">IMAGE</th>
		      <th scope="col">TITLE</th>
		      <th scope="col">CATEGORIES</th>
		      <th scope="col">EDIT</th>
		      <th scope="col">DELETE</th>

		    </tr>
		  </thead>
		  <?php 
		  $limit = 15;
      if (isset($_GET['page'])) {
        $page = $_GET['page'];
      }
      else{
        $page = 1;
      }
        
     $offside = ($page-1) * $limit; 
		  require"db.php";
		  $sn=0;
		  	$sql = "SELECT * FROM products p 
		  	INNER JOIN brand b
		  	ON p.brand_id=b.id
		  	ORDER BY product_id DESC LIMIT {$offside},{$limit}";
      	  	$result = $conn->query($sql);
      		if($result->num_rows>0){
        	while($row=$result->fetch_assoc()){
        		$sn =$sn+1;?>
        		<tbody>
		    		<tr>
		     			 <th scope="row"><?php echo $sn; ?></th>
		     			 <td><a href="<?php echo $GLOBALS['siteurl'];?>/admin_details.php?detailid=<?php echo $row["product_id"] ?>"><img src="<?php echo $row['image'] ?>"></a></td>
		     			 <td><?php echo $row['title'] ?></td>
		      			 <td><?php echo $row['brand_name'] ?></td>
		     			 <td><a href="<?php echo $siteurl;?>/edit.php?postid=<?php echo $row['product_id'] ?>"><i class="fa fa-edit"></i></a></td>
		     			 <td><a href="<?php echo $siteurl;?>/deletepost.php?postdelete=<?php echo $row["product_id"] ?>"><i class="fa fa-trash"></i></a></td>
		    		</tr>
		   		</tbody>
		   		<?php
} 
}
else{
echo "<h1>No post added.</h1>";
}
?>		  
		</table>
	</div>
</div>
<div class="d-flex justify-content-center">
  <div class="pagination">
    <?php 
      $sq = "SELECT * FROM products";
      $re = mysqli_query($conn,$sq) or die("error");
      if (mysqli_num_rows($re)>0) {
        $total_records = mysqli_num_rows($re);
        $total_page = ceil($total_records/$limit);

        echo '<ul class="pagination">';
        if ($page>1) {
          echo '<li><a href="post.php?page='.($page - 1).'">Prev</a></li>';
        }
        for ($i=1; $i<=$total_page; $i++) { 
          if ($i == $page) {
            $active = "active";
          }
          else{
            $active = "";
          }
          echo '<li class="'.$active.'"><a href="post.php?page='.$i.'">'.$i.'</a></li>';
        }
        if ($total_page>$page) {
          echo '<li><a href="post.php?page='.($page + 1).'">Next</a></li>';
        }
        echo '</ul>';
      }
        ?>
        
  </div>
</div>
<?php require"footer.php";?>
<?php
	}
else{;?>
	<h1 class=> OOPS ! You are not login Plese login first.</h1>
	<a href="admin-login.php" class="btn btn-primary"><h2>Login Now</h2></a>
<?php
}
?>
</div>
</div>