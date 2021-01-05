<?php
include 'includes/header.php';
include 'includes/connect.php';
$query="delete from admin where admin_id={$_GET['id']}";
mysqli_query($con,$query);
header("location:admin.php");
?>