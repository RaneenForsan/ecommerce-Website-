<?php
include '../includes/connect.php';
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $query="select * from customer where cust_email='$email' and cust_pass='$password'";
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_assoc($result);
        header("location:order.php?id={$row['cust_id']}");
    }
    

?>
<link rel="stylesheet" href="../CSS/style.css">
<link rel="stylesheet" href="../CSS/css/bootstrap.css">
<div class="container">
<div class="row">
<div class="col-lg-3"></div>
<div class="col-lg-6">

<form class="form" method="POST" action="">

  <div class="form-group">
    <center><h3 style="color:lightgrey">User Login</h3></center><br>
    <?php
  if(isset($error)){
      echo "<div style='background:#FFDDDD;padding:8px;'>".$error."</div>";
  }
 ?>
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="pass" placeholder="Password" name="password">
  </div>
  <center><input type="submit" class="btn btn-primary" id="sub" value="Login" name="submit"></center><br>
</form>
    </div>
<div class="col-lg-3"></div>
</div>
</div>