<?php session_start();
require 'engine/configure.php';
require 'engine/get-dollar.php';
require 'engine/get-pound.php';
require 'engine/get-euro.php';
if (!isset($_SESSION["id"]) && !isset($_SESSION["business_id"]) && !isset($_SESSION["sp_id"] )) { 
echo"<script>location.href='login.php'</script>";
exit();
}
date_default_timezone_set('Africa/Lagos');
date_default_timezone_get();

$date = $_SESSION['date'] ?? $_SESSION['business_date'] ?? null;
$userId = $_SESSION['id'] ?? $_SESSION['business_id'] ?? null;
$you = $_SESSION['email'] ?? $_SESSION['business_email'] ?? null;
$user_type = "buyer" ?? "vendor" ?? "Guest";

?>

<!DOCTYPE html>
<html>
<head>
	<title>E-listings | Profile </title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/flickity.min.css">
  <link rel="stylesheet" href="assets/css/order-history.css">
  <link rel="stylesheet" href="assets/css/navigator.css">
  <link rel="stylesheet" href="assets/css/profile-section.css">
   <script src="assets/js/jquery-1.11.3.min.js"></script>
  <script src="assets/js/sweetalert.min.js"></script> 
 <script src="assets/js/flickity.pkgd.min.js"></script>

</head>
<body>


<!------------------------------------------overlay content--------------------------------------------------->

<a id="openbar" onclick="openbar()"><i class="fa fa-bars"></i></a>

<script>

function openbar() {
 
   $("#overlay").toggle();  
    
}
    
</script>

<div style="overflow: hidden;">

<div style="" class="  row">

  <div id="overlay" class="col-md-3">

    <?php include ("components/navigator.php") ?>

 </div>

<?php 
    //Check if user is a vendor
$username = $_SESSION['business_name'] ?? $_SESSION['name'];
$useremail = $_SESSION['business_email'] ??  $_SESSION['email'];

?>


  <div class="col-md-9">
<div class="container row"> 
   <div class="col-md-6">
     <br>
     <h6 style="text-transform:capitalize;">Hello, <?= htmlspecialchars($username);?></h6>
   </div>
   <div class="col-md-6">
    <?php
      require 'engine/configure.php';

       $vendorName = $vendorImg = null;
       $userId = null;
       $table = null;
       $columnPrefix = null;

// Determine user type and set table/column prefix
if (!empty($_SESSION['business_id'])) {
    $userId = $_SESSION['business_id'];
    $table = 'vendor_profile';
    $columnPrefix = 'business';
} elseif (!empty($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    $table = 'user_profile';
    $columnPrefix = 'user';
}

// Proceed if user type is set
if ($userId && $table && $columnPrefix) {
    $stmt = $conn->prepare("SELECT {$columnPrefix}_name, {$columnPrefix}_image FROM {$table} WHERE id = ?");
    $stmt->bind_param("i", $userId);

    if ($stmt->execute()) {
        $stmt->bind_result($vendorName, $vendorImg);
        $stmt->fetch();
    }

    $stmt->close();
}
?>


<div id="bom">

<div id="my">
<div style='gap:10px;' class="d-flex align-items-center">
<?php
$image_extension = ['jpg', 'jpeg', 'png'];
$showIcon = true;

if (!empty($vendorImg)) {
    $extension = strtolower(pathinfo($vendorImg, PATHINFO_EXTENSION));

    if (in_array($extension, $image_extension)) {
        $showIcon = false;
    }
}

if ($showIcon) {
    echo "<i style='font-size:80px;color:black;' class='fa fa-user-alt'></i>";
} else {
    echo '<img id="user_image" src="' . htmlspecialchars($vendorImg) . '" alt="User Image">';
}
?>

<div>

<div class="d-flex align-items-center justify-content-between">

<span id="user_name"> <?= htmlspecialchars($username)?></span>

<a href="vendor-notifications.php">
  <span class="bell"><i class="fa-solid fa-bell"></i>
      <span class="notification">
<?php
if (isset($_SESSION['business_id'])) {
$userId = $_SESSION['business_id'];
$getnotification = mysqli_query($conn,"select * from vendor_notifications where pending = 0 and  recipient_id ='".htmlspecialchars($userId)."'");

$countNotifications = $getnotification->num_rows;
if ($countNotifications>0) {
?>
<?php echo$countNotifications;?>
<?php    }  echo'</span>';} 

if (isset($_SESSION['id'])) {
$userId = $_SESSION['id'];
$getnotification = mysqli_query($conn,"select * from buyer_notifications where pending = 0 and  recipient_id ='".htmlspecialchars($userId)."'");
$countNotifications = $getnotification->num_rows;
if ($countNotifications>0) {
?>
<?php echo$countNotifications;?>
   <?php   } echo' </span>'; } ?>
   </span></a>

</div>

<small style="" class="user_email" id="user_email"><?= htmlspecialchars($useremail);?></small>

</div>

</div>

</div>

</div>

</div>

</div>

<div id="label">



<?php
require 'engine/configure.php';
$getorderlist = mysqli_query($conn,"select item_detail.id,item_detail.product_name,item_detail.product_location,item_detail.product_price,item_detail.product_image,item_detail.views,item_detail.discount,checkout.product_id,checkout.product_price,checkout.noofitem,checkout.buyer from item_detail,checkout where checkout.product_id=item_detail.id and checkout.buyer = '$userId'");
echo"<h6 style='text-align:center'><b>".$getorderlist->num_rows." Item(s)</b></h6>";
if($getorderlist){
?>


<div>


<div class='container'>
<?php
while ($data = mysqli_fetch_array($getorderlist)) {
echo "<div id='package'>";
$price = $data['product_price'];
$dollar = round($price/$dollar_rate,2);
if ($data['discount']>0) {
 echo "<span id='discount'>-".$data['discount']."%</span>";}
 if ($data['discount']==0) {
echo "<span class='' id='noviews'>".$data['views']." <i class='fa fa-eye'></i></span>";

}
   
?>


<a href='product-details.php?id=<?php echo$data["id"]?>' target='_blank'><img loading='lazy' id='imgitem' src="<?php echo $data['product_image']?>"></a>
<?php
            if ($data['discount']>0) {
       $price = $data['product_price'];
  echo"<span style='text-decoration:line-through;' id='priceitem'>&#8358;".$price."</span> ";
  echo"<span id='priceitem'>&#8358;".round(( $price)-($data['discount']/100 * $price))."</span><br>";
  echo"<span style='text-decoration:line-through;' id='priceitem'>$".round($dollar)."</span>";
  echo"<span id='priceitem'>$".round(($dollar)-($data['discount']/100 * $dollar))."</span><br>";
}


if ($data['discount']==0) {
echo"<span id='priceitem'>&#8358;".$price."</span> ";
echo" <span id='priceitem'>$".($dollar)." </span><br>";
}

echo "<span id='nameitem' style='' ><a target='_blank' href='product-details.php?id={$data['id']}'>".$data['product_name']."</a></span>"."<br>";
echo"<span id='locitem'>".$data['product_location'].""."</span><br>";

echo"</div>";
}
}

else{
    echo"<br><strong>You have no item in your order history</strong>";
}

 ?>

</div><br>

</div>

</div>


<div class="container">
 
<?php
require 'engine/configure.php';
echo"<br><h6><b> Wish List </b></h6>";
$getwishList = mysqli_query($conn,"select item_detail.id,item_detail.product_name,item_detail.product_location,item_detail.product_price,item_detail.product_image,item_detail.views,item_detail.discount,heart_like.buyer,heart_like.itemId from item_detail,heart_like where heart_like.itemId=item_detail.id and heart_like.buyer = '$userId'");

while ($datafound = mysqli_fetch_array($getwishList)) {
echo "<div id='package'>";
$price = $datafound['product_price'];
$dollar = round($price/$dollar_rate,2);
if ($datafound['discount']>0) {
 echo "<span id='discount'>-".$datafound['discount']."%</span>";}
 if ($datafound['discount']==0) {
echo "<span class='' id='noviews'>".$datafound['views']." <i class='fa fa-eye'></i></span>";

}
   
?>


<a href='product-details.php?id=<?php echo$datafound["id"]?>' target='_blank'><img loading='lazy' id='imgitem' src="<?php echo $datafound['product_image']?>"></a>
<?php
            if ($datafound['discount']>0) {


       $price = $datafound['product_price'];

  echo"<span style='text-decoration:line-through;' id='priceitem'>&#8358;".$price."</span> ";
  echo"<span id='priceitem'>&#8358;".round(( $price)-($datafound['discount']/100 * $price))."</span><br>";
  echo"<span style='text-decoration:line-through;' id='priceitem'>$".round($dollar)."</span>";
  echo"<span id='priceitem'>$".round(($dollar)-($datafound['discount']/100 * $dollar))."</span><br>";



}
if ($datafound['discount']==0) {
echo"<span id='priceitem'>&#8358;".$price."</span> ";
echo" <span id='priceitem'>$".($dollar)." </span><br>";


}

echo "<span id='nameitem' style='' ><a target='_blank' href='product-details.php?id={$datafound['id']}'>".$datafound['product_name']."</a></span>"."<br>";
echo"<span id='locitem'>".$datafound['product_location'].""."</span><br>";
 
}

 ?>




</div>



</div></div>




</div></div>


<script>

function openbar() {
 
 $("#overlay").toggle();  
    
}
    
</script>



<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/667aba429d7f358570d3336e/1i17mf66d';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

</body>
</html>