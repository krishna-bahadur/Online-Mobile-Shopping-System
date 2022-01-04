<?php
session_start();
 if(isset($_SESSION['admin'])){?>
<div class="row">
  <div class="col-sm-1">
    <?php require"dashboard1.php"; ?>
  </div>
  <div class="col-sm">
    <?php require"dashboard.php" ?>
<div class="container">
  <div class="my-3">
    <h2 class="text-info">Order_Items</h2>
  </div>
  <div>
    <table class="table table-bordered">
  <thead class="table-dark ">
    <tr>
      <th scope="col">Trasction_ID</th>
      <th scope="col">Product_name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Customer_Username</th>
      <th scope="col">Date_Of_Order</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>


    </tr>
  </thead>
  <tbody>
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
    $sql = "SELECT * FROM order_details LIMIT {$offside},{$limit}";
        $result = $conn->query($sql);
        if($result->num_rows>0){
          while($row=$result->fetch_assoc()){;?>
     
    <tr>
      <td><?php echo $row['tid'] ?></td>
      <td><?php echo $row['item_name'] ?></td>
      <td><?php echo $row['item_price'] ?></td>
      <td><?php echo $row['quantity'] ?></td>
      <td><?php echo $row['customer_name'] ?></td>
      <td><?php echo $row['date_of_order']?></td>
      <td><?php echo $row['order_status']?></td>
      <td>
        <a href="managestatus.php?id=<?php echo $row['order_id'] ?>" style="color:#fff;" class="btn btn-primary">Manage Status</a>
      </td>

   </tr>
<?php }
}
?>

  </tbody>
</table>
  </div>
</div>
  </div>
</div>
<div class="d-flex justify-content-center">
  <div class="pagination">
    <?php 
      $sq = "SELECT * FROM order_details";
      $re = mysqli_query($conn,$sq) or die("error");
      if (mysqli_num_rows($re)>0) {
        $total_records = mysqli_num_rows($re);
        $total_page = ceil($total_records/$limit);

        echo '<ul class="pagination">';
        if ($page>1) {
          echo '<li><a href="orders.php?page='.($page - 1).'">Prev</a></li>';
        }
        for ($i=1; $i<=$total_page; $i++) { 
          if ($i == $page) {
            $active = "active";
          }
          else{
            $active = "";
          }
          echo '<li class="'.$active.'"><a href="orders.php?page='.$i.'">'.$i.'</a></li>';
        }
        if ($total_page>$page) {
          echo '<li><a href="orders.php?page='.($page + 1).'">Next</a></li>';
        }
        echo '</ul>';
      }
        ?>
        
  </div>
</div>
<?php require"footer.php" ?>
<?php
}
else{;?>
  <h1 class=> OOPS ! You are not login Plese login first.</h1>
  <a href="admin-login.php" class="btn btn-primary"><h2>Login Now</h2></a>
<?php
}
?>