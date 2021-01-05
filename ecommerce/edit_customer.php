<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    
   
 <?php
        include '../includes/header.php';
    include '../includes/connect.php';
    $id=$_GET['id'];
    $query="select * from customer where cust_id=$id";
    $result=mysqli_query($con,$query);
    $adminSet=mysqli_fetch_assoc($result);
    if(isset($_POST['submit'])){
    $name=$_POST['text'];       
     $email=$_POST['email'];       
     $password=$_POST['password'];       
     $mobile=$_POST['tel']; 
     $adress=$_POST['address']; 
     //open connection
        if(!$con){
            die("cant connect");
        }
        $query="update customer set cust_name='$name',cust_email='$email',	cust_pass='$password',cust_mobile='$mobile',cust_address='$adress' 
        where cust_id ='$id'";
        mysqli_query($con,$query);
        if($query){
        header("location: customer.php");
        exit;
    }}

  ?>
      
<div class="sidebar">
  <a class="active" href="#home">Dashboard</a><br>
  <a href="admin.php">Manage Admins</a>
  <a href="customer.php">Manage Customers</a>
  <a href="categorize.php">Manage Categorize</a>
  <a href="product.php">Manage Product</a>
        <a href="logout.php">Logout</a>

</div>
<div class="content">
  <br><br><br><br><form action="" method="post">
    <center><h1>Update Customer</h1></center>
    <br><label for="text">Customer Name</label>
    <input type="text" id="text" name="text" placeholder="Customer name" value="<?php echo $adminSet['cust_name']?>">

    <br><label for="email">Customer Email</label>
    <input type="email" id="email" name="email" placeholder="Customer Email" value="<?php echo $adminSet['cust_email']?>">
    
    
    <br><label for="password">Customer Password</label>
    <input type="password" id="password" name="password" placeholder="Customer Password" value="<?php echo $adminSet['cust_pass']?>">


    <br><label for="tel">Customer Phone</label>
    <input type="text" id="tel" name="tel" placeholder="079/1678554" value="<?php echo $adminSet['cust_mobile']?>">
    
    <br><label for="text">Customer Adress</label>
    <input type="text" id="text" name="address" placeholder="Customer name" value="<?php echo $adminSet['cust_address']?>">
    
    
    <input type="submit" value="Update Customer" id="submit" style="background:#15317E" name="submit">
  </form>
    <br><br>

</div>

</body>
</html>