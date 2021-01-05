<?php
    include 'includes/header.php';

include 'includes/connect.php';
$id=$_GET['id'];
$query="delete from product where product_id ={$id}";
mysqli_query($con,$query);
header("location:product.php");
?>