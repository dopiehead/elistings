<?php 
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if (isset($_GET['id'])) {

$userid=$_GET['id'];

require 'engine/configure.php';
require 'engine/get-dollar.php';
require 'engine/get-euro.php';
require 'engine/get-pound.php';

$merchant=mysqli_query($conn,"select * from vendor_profile where id='$userid'");

while ($row=mysqli_fetch_array($merchant)) {
  $myid = $row['id'];
  
  $name = $row['business_name'];
  
  $image = $row['business_image'];

  $date = $row['date'];

  $location = $row['business_address'];
  
  if($row['pay==1']){
  
    $phone = "<span style='color:lightgreen;'>Phone: &nbsp;".$row['business_contact']."</span>";
    
if (!empty($row['account_number']) || !empty($row['bank_name'])) {
    $account_number = !empty($row['account_number']) ? "<span>Account number: &nbsp;" . $row['account_number'] . "</span>" : "";
    $bank_name = !empty($row['bank_name']) ? "<span>Bank name: &nbsp;" . $row['bank_name'] . "</span>" : "";
    

}

    
}
}

}
?>

<!DOCTYPE html>
<html>
<head>
<title>Merchant</title>
 <?php include("components/links.php") ?>
   <link rel="stylesheet" href="assets/css/merchant.css">
</head>
<body class='bg-white'>
<?php include ('components/header.php'); ?>

<div class="main"></div>

<br>

<div class="container com">

<br>
<div id="com">
  <div id="cy">
</div></div>

<div class="container bg-secondary text-white rounded p-3" id="items">

<div class=" menu">

<div  class="text-center col-md-6 col-sm-6 col-xs-6" style="">
  <?= "<img class='imgProfile w-50 h-100' src=". htmlspecialchars($image)."><br>";
?>    
    
</div>

<div  style="" class="text-center col-md-6 col-sm-6 col-xs-6 menu-details">
 <?php

echo '<span class="text-white" style="font-size:14px;opacity:0.8;" >MemberID: &nbsp;Merchant 0'.htmlspecialchars($myid).'</span><br>';

echo "<span style='color:lightgreen;'>Name: &nbsp;". htmlspecialchars($name)."</span>";

// echo "<span style='color:white;'>location: &nbsp;". $location."</span><br>";

echo $phone;

echo $bank_name.":".$account_number;






echo "<div class='mt-2' style='font-size:14px;color:lightred;font-family:sans-serif'>Joined on: &nbsp;".$date."</div>";


?>   
 <div class="d-flex justify-content-center align-items-center mt-2">  
 <?php
 
 $reviews = mysqli_query($conn,"select seller_comment.product_name, item_detail.id,item_detail.user_id from seller_comment,item_detail where item_detail.user_id = '".$myid."'");
 $noOfreviews = $reviews->num_rows;

 echo"<br><span class='mr-4'>".$noOfreviews." <i class='fa fa-comments'></i></span>";
 
 
 ?>
 
<?php

$getviews =  mysqli_query($conn,"select sum(views) as views from item_detail where user_id = '".htmlspecialchars($myid)."'");
    while($data_views = mysqli_fetch_array($getviews)){
        echo"&nbsp; <span>".$data_views['views']." <i class='fa fa-eye'></i></span>";
    }
?>

</div> 


</div>    
    
   
</div>


</div></div>

<br>



<?php

require 'engine/configure.php';

list($count)=mysqli_fetch_array(mysqli_query($conn,"select count(*) from item_detail where user_id = '$myid' and sold = 0 and featured = 1"));
?>

<br><br>

<div  class=" container">

<h4  class="bg-secondary w-100 text-white" >
    <span>Paid Ad(s)</span>
    <span><?php echo $count." Item(s)";?></span>
</h4>
 
<br>


  
    
  <table>

<?php 

require 'engine/configure.php';


list($count)=mysqli_fetch_array(mysqli_query($conn,"select count(*) from item_detail where user_id = '$myid' and sold = 0 and featured=1"));
$result=mysqli_query($conn,"SELECT * FROM item_detail where user_id = '$myid' and sold = 0 and featured=1 order by id desc");
 $count = 0;
 
 echo"<div class='products'>";
 
echo "<table id='myTable'><tbody><tr><td>";

while($row=mysqli_fetch_array($result))

{        
   ?>
<?php   

echo "<div id='package'>";
$dollar = round($price/$dollar_rate);
$pound = round($price/$pound_rate);
$euro = round($price/$euro_rate);
$price = $row['product_price'];



echo"<span class='position-absolute d-flex justify-content-end text-warning mb-2'><i class='fa fa-crown'></i></span>";


if ($row['discount']>0) {
echo "<span id='discount'>-".$row['discount']."%</span>";

echo "<span class='' id='views'>".$row['views']." <i class='fa fa-eye'></i></span>";

}
if ($row['discount']==0) {
echo "<span class='' id='noviews'>".$row['views']." <i class='fa fa-eye'></i></span>";
}

echo "<a href='product-details.php?id={$row['id']}&{$row['product_name']}&{$row['product_location']}&{$row['product_category']}&{$row['product_details']}' target='_blank'><div style=''><img loading='lazy' id='imgitem'  src=".$row['product_image'].">"." "."</div></a>";

echo"<span id='fa-check'><i class='fa fa-check'></i></span>";
echo"<span class='ml-2 text-danger' id='new'>{$row['product_condition']}</span><br>";

   if ($row['discount']>0) {
   $price = $row['product_price'];
   echo"<span style='text-decoration:line-through;' id='priceitem'>&#8358;".$price."</span> ";
   echo"<span id='priceitem'>&#8358;".round(( $row['product_price'])-($row['discount']/100 * $price))."</span><br>";

}

if ($row['discount']==0) {
echo"<span id='priceitem'>&#8358;".$price."</span> ";
}

echo "<span id='nameitem' style='' ><a target='_blank' href='product-details.php?id={$row['id']}&{$row['product_name']}&{$row['product_location']}&{$row['product_category']}&{$row['product_details']}'>".$row['product_name']."</a></span>"."<br>";

echo"<span class='text-secondary ms-1 text-sm'>".$row['product_location'].""."</span><br>";

?>
<div class="text-center" style="display: none;" id="loading-image"><br><img id="loader" src="loading-image.GIF"></div>

<?php

echo"<span id='locitem'><a class='btn-compare' id='{$row['id']}'>Compare</a></span> &nbsp;<span id='locitem'><a class='text-danger' href='products.php'><i class='fa fa-cart-shopping'></i></a></span>&nbsp;<span id='locitem'><i class='fa fa-share'></i></span><br>";

?> 
       <?php

 echo"</div>";      
       
}   
?>

</td>
</tr>
</tbody>
</table>
 </div>   
  
  
    
</div>
  
</div>



<?php
require 'engine/configure.php';
list($count)=mysqli_fetch_array(mysqli_query($conn,"select count(*) from item_detail where user_id = '$myid' and sold = 0"));
?>

<br><br>

<div class=" container">

<h4   class="bg-secondary w-100 text-white">
    <span>Item(s) for Sale</span> 
    <span><?= htmlspecialchars($count)." Item(s)";?></span>
</h4>
 
<br>



<?php 

list($count)=mysqli_fetch_array(mysqli_query($conn,"select count(*) from item_detail where user_id = '$myid' and sold = 0"));
 $result=mysqli_query($conn,"SELECT * FROM item_detail where user_id = '$myid' and sold = 0 order by id desc");
 $count = 0;
 $datafound =  $result->num_rows;
echo "<table id='myTable'><tbody><tr><td>";
while($row=mysqli_fetch_array($result))
{        
   ?>
<?php   

echo "<div id='package'>";
$dollar = round($price/$dollar_rate);
$pound = round($price/$pound_rate);
$euro = round($price/$euro_rate);
$price = $row['product_price'];
if ($row['discount']>0) {
echo "<span id='discount'>-".htmlspecialchars($row['discount'])."%</span>";

echo "<span class='' id='views'>".htmlspecialchars($row['views'])." <i class='fa fa-eye'></i></span>";
}

if ($row['discount']==0) {
echo "<span class='' id='noviews'>".htmlspecialchars($row['views'])." <i class='fa fa-eye'></i></span>";
}

echo "<a href='product-details.php?id={$row['id']}&{$row['product_name']}&{$row['product_location']}&{$row['product_category']}&{$row['product_details']}' target='_blank'><div style=''><img loading='lazy' id='imgitem'  src=".$row['product_image'].">"." "."</div></a>";

echo"<span id='fa-check'><i class='fa fa-check'></i></span>";
echo"<span class='text-capitalize' id='new'>{$row['product_condition']}</span><br>";

   if ($row['discount']>0) {
   $price = $row['product_price'];
   echo"<span style='text-decoration:line-through;' id='priceitem'>&#8358;".$price."</span> ";
   echo"<span id='priceitem'>&#8358;".round(( $row['product_price'])-($row['discount']/100 * $price))."</span><br>";

}

if ($row['discount']==0) {
echo"<span id='priceitem'>&#8358;".htmlspecialchars($price)."</span> ";
}

echo "<span id='nameitem' style='' ><a target='_blank' href='product-details.php?id={$row['id']}&{$row['product_name']}&{$row['product_location']}&{$row['product_category']}&{$row['product_details']}'>".$row['product_name']."</a></span>"."<br>";

echo"<span class='text-secondary ms-1 text-sm'>".htmlspecialchars($row['product_location']).""."</span><br>";

?>
<div class="text-center" style="display: none;" id="loading-image"><br><img id="loader" src="loading-image.GIF"></div>

<?php

echo"<span id='locitem'><a class='btn-compare' id='{$row['id']}'>Compare</a></span> &nbsp;<span id='locitem'><a class='text-danger' href='products.php'><i class='fa fa-cart-shopping'></i></a></span>&nbsp;<span id='locitem'><i class='fa fa-share'></i></span><br>";

?> 
       <?php

 echo"</div>";      
       
}   
?>

</td>
</tr>
</tbody>
</table>
    
</div>
  
</div>


<?php

list($countx)=mysqli_fetch_array(mysqli_query($conn,"select count(*) from item_detail where user_id = '$myid' and sold = 1"));

?>

<br><br>
<div class=" container">

<h4 class="bg-secondary w-100 text-white">
    <span>Sold Item(s)</span>
    <span><?php echo $countx." Item(s)";?></span>
</h4><br>
 


<?php 

list($count)=mysqli_fetch_array(mysqli_query($conn,"select count(*) from item_detail where user_id = '$myid' and sold = 1"));
 $result=mysqli_query($conn,"SELECT * FROM item_detail where user_id = '$myid' and sold = 1 order by id desc");
 $count = 0;

echo "<table id='myTable'><tbody><tr><td>";

while($row=mysqli_fetch_array($result))

{        
   ?>
<?php   

echo "<div id='package'>";
$dollar = round($price/$dollar_rate);
$pound = round($price/$pound_rate);
$euro = round($price/$euro_rate);
$price = $row['product_price'];
if ($row['discount']>0) {
echo "<span id='discount'>-".$row['discount']."%</span>";

echo "<span class='' id='views'>".$row['views']." <i class='fa fa-eye'></i></span>";
}
if ($row['discount']==0) {
echo "<span class='' id='noviews'>".$row['views']." <i class='fa fa-eye'></i></span>";
}

echo "<a href='product-details.php?id={$row['id']}&{$row['product_name']}&{$row['product_location']}&{$row['product_category']}&{$row['product_details']}' target='_blank'><div style=''><img loading='lazy' id='imgitem'  src=".$row['product_image'].">"." "."</div></a>";

echo"<span id='fa-check'><i class='fa fa-check'></i></span>";
echo"<span class='text-capitalize' id='new'>{$row['product_condition']}</span><br>";

   if ($row['discount']>0) {
   $price = $row['product_price'];
   echo"<span style='text-decoration:line-through;' id='priceitem'>&#8358;".$price."</span> ";
   echo"<span id='priceitem'>&#8358;".round(( $row['product_price'])-($row['discount']/100 * $price))."</span><br>";
   
   
   echo"<span style='text-decoration:line-through;' id='priceitem'>$".round($price/$dollar_rate)."</span>";
      echo"<span style='text-decoration:line-through;' id='priceitem'>$".round($price/$euro_rate)."</span>";
         echo"<span style='text-decoration:line-through;' id='priceitem'>$".round($price/$pound_rate)."</span>";

}

if ($row['discount']==0) {
echo"<span id='priceitem'>&#8358;".$price."</span> ";
}

echo "<span id='nameitem' style='' ><a target='_blank' href='product-details.php?id={$row['id']}&{$row['product_name']}&{$row['product_location']}&{$row['product_category']}&{$row['product_details']}'>".$row['product_name']."</a></span>"."<br>";

echo"<span class='text-secondary ms-1 text-sm'>".$row['product_location'].""."</span><br>";

?>
<div class="text-center" style="display: none;" id="loading-image"><br><img id="loader" src="loading-image.GIF"></div>

<?php

echo"<span id='locitem'><a class='btn-compare' id='{$row['id']}'>Compare</a></span> &nbsp;<span id='locitem'><a class='text-danger' href='products.php'><i class='fa fa-cart-shopping'></i></a></span>&nbsp;<span id='locitem'><i class='fa fa-share'></i></span><br>";

?> 
       <?php

 echo"</div>";      
       
}   
?>

</td>
</tr>
</tbody>
</table>
  
</div>
  
</div>

<br><br>

</div></div>


</div>


</div>
</div>
</div>


<?php

include 'footer.php';


?>

<a class="btn-down" onclick="topFunction()">&#8593;</a>

<script src="assets/js/scroll.js" type="text/javascript"></script>

</body>

</html>




















</body>