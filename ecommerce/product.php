<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="CSS/style.css">
</head>
<body>

 <?php
    include 'includes/connect.php';
    include 'includes/header.php';
    if(isset($_POST['submit'])){
    
    $catname=$_POST['category'];
    
     $con=mysqli_connect("localhost","root","","ecom6");
        if(!$con){
            die("cant connect");
        }
        
        
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
 $query=mysqli_query($con,"INSERT INTO product(product_name,product_des,product_Price,pro_image,qty,cat_id)
 VALUES('$product_name','$product_desc','$price','$admin_image','$qty','$category')");
                              
    }
    header("location: product.php");
    }
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
  <br><br><br><br>
    <form  method="POST" action="cozastore/product-detail.php" enctype="multipart/form-data">
    <center><h1>Manage Products</h1></center>
    <br><label for="name">Product Name</label>
    <input type="text" id="email" name="name" placeholder="Product Name">

    <br><label for="des">Product description</label>
    <input type="text" id="password" name="des" placeholder="Product Description">

    <br><label for="price">product_Price</label>
    <input type="text" id="text" name="price" placeholder="product Price">
  
    <br><label for="text">Product image</label>
    <input type="file" id="image" name="admin_image" placeholder="Admin image">
    
    
    <br><label for="category">Category name</label><br>
    <select name="category" id="category"  placeholder="Select Category">
      <?php  
        $query="select * from category";
        $result=mysqli_query($con,$query);
       while($row=mysqli_fetch_assoc($result)){
        $i=$row['cat_id'];
       echo "<option value='$i'>{$row['cat_name']}</option>";}
        ?>
       </select><br>
    
     <br><label for="image">Quantity</label>
    <input type="text" id="number" name="number" placeholder="product Quantity">
    
    
<input type="submit" value="Add Product" id="submit"  name="submit">
  </form>
    <br><br>
<center><table cellpadding="3">
   <tr>
    <th> pro-Name</th>
    <th> Describtion</th>
    <th> Price</th>
    <th> image</th>
    <th> Quantity</th>
    <th> ID</th>
    <th>cat-name</th>
    <th>Update</th>
    <th>Delete</th>
    </tr> 
    <?php
    $query="select * from  category,product where category.cat_id=product.cat_id";
    $result=mysqli_query($con,$query);
   while($row=mysqli_fetch_assoc($result)){
       echo "<tr>";
       echo "<td>{$row['product_name']}</td>";
       echo "<td>{$row['product_des']}</td>";
       echo "<td>{$row['product_Price']}</td>";
       echo "<td><img src='images/{$row['pro_image']}' width='150' height='150'></td>";
       echo "<td>{$row['qty']}</td>";
       echo "<td>{$row['cat_id']}</td>";  
       echo "<td>{$row['cat_name']}</td>";  
       echo "<td><a href='edit product.php ?id={$row['product_id']}' class='edit'>Edit</a></td>";
       echo "<td><a href='delete product.php?id={$row['product_id']}'>Delete</a></td>";
   }
     
 

       
     
  
     ?>
</table>
</center>
</div>

</body>
</html>