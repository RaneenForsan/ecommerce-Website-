<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    
   
 <?php
    include 'includes/header.php';
    include 'includes/connect.php';
    $id=$_GET['id'];
    $query="select * from admin where admin_id=$id";
    $result=mysqli_query($con,$query);
    $adminSet=mysqli_fetch_assoc($result);
    if(isset($_POST['submit'])){
     $email=$_POST['email'];       
     $password=$_POST['password'];       
     $fullname=$_POST['text']; 
     $admin_image = $_FILES['admin_image']['name'];
     $tmp_name = $_FILES['admin_image']['tmp_name'];
     $path = 'images/';
     move_uploaded_file($tmp_name,$path.$admin_image);   

     //open connection
        if(!$con){
            die("cant connect");
        }
        $query="update admin set admin_email='$email',admin_password='$password',admin_fullname='$fullname',admin_image='$admin_image' where admin_id ='$id'";
        mysqli_query($con,$query);
        if($query){
        header("location: admin.php");
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
  <br><br><br><br><form action="" method="post" enctype="multipart/form-data">
    <center><h1>Edit  Admins Info</h1></center>
    <br><label for="email">Admin Email</label>
    <input type="email" id="email" name="email" placeholder="Your Email" value="<?php echo $adminSet['admin_email']?>">

    <br><label for="password">Admin Password</label>
    <input type="password" id="password" name="password" placeholder="Admin Password" value="<?php echo $adminSet['admin_password']?>">

    <br><label for="text">Admin Full Name</label>
    <input type="text" id="text" name="text" placeholder="Admin Full name" value="<?php echo $adminSet['admin_fullname']?>">

    <br><label for="text">Admin image</label>
    <input type="file" id="image" name="admin_image" placeholder="Admin image">
  
    <input type="submit" value="Update" id="submit" style="background:#15317E" name="submit">
  </form>
    <br><br>

</div>

</body>
</html>