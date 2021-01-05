<!DOCTYPE html>
<html>
<head>

</head>
<body>

      <?php

    include"../includes/connect.php";
         session_start();
          
         $id=$_GET['id'];
         //echo $id."<br>";
         foreach($_SESSION as $key=>$value){
         error_reporting(0);
           $total=$value["item_quantity"]*$value["item_Price"];
           $total2+=$total;

    }
     //echo  number_format($total2);
    
     $query="insert into orders(total,cust_id)
                values('$total2','$id')";
       mysqli_query($con,$query);

         ?>

    
    
    
    
    

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preview.colorlib.com/theme/cozastore/shoping-cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Dec 2020 07:27:18 GMT -->
<head>
<title>Shoping Cart</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/png" href="images/icons/favicon.png" />

<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">

<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">

<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">

<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">

<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">

<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body class="animsition">



<form class="bg0 p-t-75 p-b-85" action="" method="POST">
<div class="container">
<div class="row">
<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
<div class="m-l-25 m-r--38 m-lr-0-xl">
<div class="wrap-table-shopping-cart">
<table class="table-shopping-cart">
<tr class="table_head">
<th class="column-1">Product</th>
<th class="column-2"></th>
<th class="column-3">Price</th>
<th class="column-4">Quantity</th>
<th class="column-5">Total</th>
</tr>

    <?php
    
              
    include"../includes/connect.php";
    foreach(  $_SESSION as $key=>$value){
    $id=$_GET['id'];
   echo "<tr class='table_row'>";
   echo "<td class='column-1'>";
  
echo "<div class='how-itemcart1'>";
echo "<img src='../images/{$value['item_image']}' width='200' height='100'>";
echo "</div>";
echo "</td>";  
echo "<td class='column-2'>";
echo $value['item_name'];
 echo "</td>";
echo "<td class='column-3'>";
echo $value['item_Price']."<br>";
echo "</td>";
echo "<td class='column-4'>";
echo "<div class='wrap-num-product flex-w m-l-auto m-r-0'>";
echo "<div class='btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m'>";
echo "<i class='fs-16 zmdi zmdi-minus'></i>";
echo" </div>";
echo "<input class='mtext-104 cl3 txt-center num-product' type='number' name='num-product1' value={$value['item_quantity']}>";
echo "<div class='btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m'>";
echo "<i class='fs-16 zmdi zmdi-plus'></i>";
echo "</div>";
echo "</div>";
echo "</td>";
error_reporting(0);
$total=$value["item_quantity"]*$value["item_Price"];
$total2+=$total;
echo "<td class='column-5'>";
echo number_format($total);
echo "</td>";
}

echo "</tr>";
?>
</table>

</div>

</div>
</div>
<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
<h4 class="mtext-109 cl2 p-b-30">
Cart Totals
</h4>
<div class="flex-w flex-t p-t-27 p-b-33">
<div class="size-208">
 
<span class="mtext-101 cl2">
Order ID:
</span>
</div>
    
  <div class="size-209 p-t-1">
<span class="mtext-110 cl2">
   <?php
    $query="select * from orders ORDER by order_id DESC LIMIT 1";
    $result=mysqli_query($con,$query);
   while($row=mysqli_fetch_assoc($result)){
       echo "<p>{$row['order_id']}</p>";
       
   }
     ?>

    
</span>
</div> <br> 
    
    
    
    
<br><br><div class="size-208">
 
<span class="mtext-101 cl2">
Total:
</span>
</div>
<div class="size-209 p-t-1">
<span class="mtext-110 cl2">
 <?php
    $query="select * from orders ORDER by order_id DESC LIMIT 1";
    $result=mysqli_query($con,$query);
   while($row=mysqli_fetch_assoc($result)){
       echo "<p>{$row['total']}</p>";
       
   }
     ?>
    
</span>
</div>
</div>
<button type="submit" value="Proceed to Checkout"
        class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" name="btnbtn"><a href="index.php" style="color:#fff;">Back to home page</a></button>


</div>
</div>
</div>
</form>
    


<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

<script src="vendor/animsition/js/animsition.min.js"></script>

<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="vendor/select2/select2.min.js"></script>
<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>

<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>

<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>

<script src="js/main.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/cozastore/shoping-cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Dec 2020 07:27:18 GMT -->
</html>