<?php
include 'includes/header.php';
include 'includes/connect.php';
$query="delete from category where cat_id ={$_GET['id']}";
mysqli_query($con,$query);
header("location:categorize.php");
?>