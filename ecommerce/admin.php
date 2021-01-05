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
     $email=$_POST['email'];       
     $password=$_POST['password'];       
     $fullname=$_POST['text'];
     $admin_image = $_FILES['admin_image']['name'];
     $tmp_name = $_FILES['admin_image']['tmp_name'];
     $path = 'images/';
     move_uploaded_file($tmp_name, $path.$admin_image);

     //open connection
        if(!$con){
            die("cant connect");
        }
        $query="insert into admin(admin_email,admin_password,admin_fullname,admin_image)
                values('$email','$password','$fullname','$admin_image')";
       mysqli_query($con,$query);
       header("location:admin.php");
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
  <br><br><br><br><form action="admin.php" method="post" enctype="multipart/form-data">
    <center><h1>Manage Admins</h1></center>
    <br><label for="email">Admin Email</label>
    <input type="email" id="email" name="email" placeholder="Email Admin">

    <br><label for="password">Admin Password</label>
    <input type="password" id="password" name="password" placeholder="Admin Password">

    <br><label for="text">Admin Full Name</label>
    <input type="text" id="text" name="text" placeholder="Admin Full name">
    
     <br><label for="text">Admin image</label>
    <input type="file" id="image" name="admin_image" placeholder="Admin image">
  
    <input type="submit" value="Add Admin" id="submit" style="background:#15317E" name="submit">
  </form>
    <br><br>
<center><table cellpadding="3">
   <tr>
    <th>Admin ID</th>
    <th>Admin Email</th>
    <th>Admin Full name</th>
    <th>Admin image</th>
    <th>Delete</th>
    <th>Update</th>
    </tr> 
    <?php
    $query="select * from admin";
    $result=mysqli_query($con,$query);
   while($row=mysqli_fetch_assoc($result)){
       echo "<tr>";
       echo "<td>{$row['admin_id']}</td>";
       echo "<td>{$row['admin_email']}</td>";
       echo "<td>{$row['admin_fullname']}</td>";
       echo "<td><img src='images/{$row['admin_image']}' width='100' height='100'></td>";
       echo "<td><a href='edit_admin.php ?id={$row['admin_id']}' class='edit'>Edit</a></td>";
       echo "<td><a href='delete_admin.php?id={$row['admin_id']}'>Delete</a></td>";
   }
     ?>
</table>
</center>
</div>

</body>
</html>