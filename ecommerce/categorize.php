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
        
      $query="insert into category(cat_name,cate_desc,cat_img)
      values('$name','$descr','$admin_image')";
       mysqli_query($con,$query);
       header("location: categorize.php");
       exit;
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
  <br><br><br><br><form action="" method="post" enctype="multipart/form-data">
    <center><h1>Manage Category</h1></center>
    <br><label for="name">Category Name</label>
    <input type="text" id="name" name="name" placeholder="Category name">

    <br><label for="descrip">Category Description</label>
    <input type="text" id="descrip" name="descrip" placeholder="Category Description">

    <br><label for="text">Category image</label>
    <input type="file" id="image" name="admin_image" placeholder="Admin image">
  
    <input type="submit" value="Add Category" id="submit" style="background:#15317E" name="submit">
  </form>
    <br><br>
<center><table cellpadding="3">
   <tr>
    <th>Category ID</th>
    <th>Category Name</th>
    <th>Category description</th>
    <th>Category image</th>
    <th>Delete</th>
    <th>Update</th>
    </tr> 
    <?php
    $query="select * from category";
    $result=mysqli_query($con,$query);
   while($row=mysqli_fetch_assoc($result)){
       echo "<tr>";
       echo "<td>{$row['cat_id']}</td>";
       echo "<td>{$row['cat_name']}</td>";
       echo "<td>{$row['cate_desc']}</td>";
       echo "<td><img src='images/{$row['cat_img']}' width='200' height='200'></td>";
       echo "<td><a href='edit_category.php?id={$row['cat_id']}' class='edit'>Edit</a></td>";
       echo "<td><a href='delete_category.php?id={$row['cat_id']}'>Delete</a></td>";
   }
     ?>
</table>
</center>
</div>

</body>
</html>