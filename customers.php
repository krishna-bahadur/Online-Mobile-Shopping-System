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
    <h2 class="text-info">Customer Details</h2>
  </div>
  <div>
    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">SN</th>
      <th scope="col">Full Name</th>
      <th scope="col">Address</th>
      <th scope="col">Phone No</th>
      <th scope="col">Email</th>
      <th scope="col">Username</th>
      <th scope="col"></th>

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
    $sn=0;
    $sql = "SELECT * FROM customer_info ORDER BY customer_id DESC LIMIT {$offside},{$limit}";
        $result = $conn->query($sql);
        if($result->num_rows>0){
          while($row=$result->fetch_assoc()){
            $sn=$sn+1;?>
     
    <tr>
      <th scope="row"><?php echo $sn ?></th>
      <td><?php echo $row['name'] ?></td>
      <td><?php echo $row['address'] ?></td>
      <td><?php echo $row['phone'] ?></td>
      <td><?php echo $row['email'] ?></td>
      <td><?php echo $row['username'] ?></td>
      <td>
        <form method="post" action="vieworder.php">
          <input type="hidden" name="username" value="<?php echo $row['username'] ?>">
          <input type="submit" name="orderitem" class="btn btn-success" value="View Orders">
        </form>
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
      $sq = "SELECT * FROM customer_info";
      $re = mysqli_query($conn,$sq) or die("error");
      if (mysqli_num_rows($re)>0) {
        $total_records = mysqli_num_rows($re);
        $total_page = ceil($total_records/$limit);

        echo '<ul class="pagination">';
        if ($page>1) {
          echo '<li><a href="customers.php?page='.($page - 1).'">Prev</a></li>';
        }
        for ($i=1; $i<=$total_page; $i++) { 
          if ($i == $page) {
            $active = "active";
          }
          else{
            $active = "";
          }
          echo '<li class="'.$active.'"><a href="customers.php?page='.$i.'">'.$i.'</a></li>';
        }
        if ($total_page>$page) {
          echo '<li><a href="customers.php?page='.($page + 1).'">Next</a></li>';
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