<?php
include 'includes/header.php';
include 'includes/connect.php';
$query="delete from customer where cust_id={$_GET['id']}";
mysqli_query($con,$query);
header("location:customer.php");
?>