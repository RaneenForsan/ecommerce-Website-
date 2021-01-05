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
     $query="select * from product where product_id =$id";
     $result=mysqli_query($con,$query);
     $adminSet=mysqli_fetch_assoc($result);
    
    
    if(isset($_POST['submit'])){
$product_name=$_POST['name'];
$product_desc=$_POST['des'];
$price=$_POST['price'];
$qty=$_POST['number'];
$admin_image = $_FILES['admin_image']['name'];
$tmp_name = $_FILES['admin_image']['tmp_name'];
$path = 'images/';
     move_uploaded_file($tmp_name,$path.$admin_image);
if(!empty($_POST['category'])){
 $category=$_POST['category'];
     //open connection
        if(!$con){
            die("cant connect");
        }
        
         $query="update product set product_name='$product_name',product_des='$product_desc',product_Price='$price',
         pro_image='$admin_image',cat_id='$category',qty='$qty' where product_id ='$id'";
          mysqli_query($con,$query);
        if($query){
        header("location: product.php");
        exit;
    }}}

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
    <center><h1>Manage Products</h1></center>
    <br><label for="name">Product Name</label>
    <input type="text" id="email" name="name" placeholder="Product Name" value="<?php echo $adminSet['product_name']?>">

    <br><label for="des">Product description</label>
    <input type="text" id="password" name="des" placeholder="Product Description" value="<?php echo $adminSet['product_des']?>">

    <br><label for="price">product_Price</label>
    <input type="text" id="text" name="price" placeholder="product Price" value="<?php echo $adminSet['product_Price']?>">
    
  <br><label for="text">Product image</label>
    <input type="file" id="image" name="admin_image" placeholder="Admin image" value="<?php echo $adminSet['pro_image']?>">
    
    
    <br><label for="category">Category name</label><br>
<select name="category" id="category"  placeholder="Select Category" value="<?php echo $adminSet['cat_id']?>">
    <option value="0">Please Select</option>
      <?php
        $query="select * from category";
        $result=mysqli_query($con,$query);
        while($row=mysqli_fetch_assoc($result)){
        $i=$row['cat_id'];
       echo "<option value='$i'";
            if($adminSet['cat_id']==$row['cat_id']){
                echo "selected";
                echo">";
                echo $row['cat_name'];
                echo"</option>";

            }
            else{
                echo "<option value='$i'>";
                echo $row['cat_name'];
                 echo"</option>";

            }
       
       
       }
           
        ?>
       </select><br>
    
     <br><label for="image">Quantity</label>
    <input type="text" id="number" name="number" placeholder="product Quantity" value="<?php echo $adminSet['qty']?>">
    
<input type="submit" value="updtae Product" id="submit" style="background:#15317E" name="submit" >
  </form>

</div>
<!--value="<?php echo $adminSet['admin_email']?>"-->
</body>
</html>