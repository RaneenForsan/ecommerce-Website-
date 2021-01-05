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
    $query="select * from category where cat_id=$id";
    $result=mysqli_query($con,$query);
    $adminSet=mysqli_fetch_assoc($result);
    if(isset($_POST['submit'])){
     $name=$_POST['name'];       
     $descr=$_POST['descrip']; 
      $admin_image = $_FILES['admin_image']['name'];
     $tmp_name = $_FILES['admin_image']['tmp_name'];
     $path = 'images/';
     move_uploaded_file($tmp_name,$path.$admin_image);
     //open connection
        if(!$con){
            die("cant connect");
        }
        
          $query="update category set cat_name='$name',cate_desc='$descr',cat_img='$admin_image' where cat_id  ='$id'";
        mysqli_query($con,$query);
        if($query){
        header("location: categorize.php");
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
    <center><h1>Manage Category</h1></center>
    <br><label for="name">Category Name</label>
    <input type="text" id="name" name="name" placeholder="Category name" value="<?php echo $adminSet['cat_name']?>">

    <br><label for="descrip">Category Description</label>
    <input type="text" id="descrip" name="descrip" placeholder="Category Description" 
    value="<?php echo $adminSet['cate_desc']?>">

    <br><label for="imgae">Category Image</label>
    <input type="file" id="text" name="admin_image" placeholder="Category image" value="<?php echo $adminSet['cat_img']?>">
  
    <input type="submit" value="Update Category" id="submit" style="background:#15317E" name="submit">
  </form>
    <br><br>

</div>
</body>
</html>