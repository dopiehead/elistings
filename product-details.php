<?php session_start();

// Turn on error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'engine/configure.php';
require 'engine/get-dollar.php';
error_reporting(E_ALL ^ E_NOTICE);
time();
if (isset($_SESSION['business_id'])) {
$buyer = $_SESSION['business_id'];
$location = $_SESSION['business_address'];
}
if (isset($_SESSION['sp_id'])) {
$buyer = $_SESSION['sp_id'];
$location = $_SESSION['sp_location'];

}
if(isset($_SESSION['id'])) {
$buyer = $_SESSION['id'];
$location = $_SESSION['user_location'];
}	

?>

<?php
//get the id  
if (isset($_GET['id']) && !empty($_GET['id'])) {
$id = mysqli_escape_string($conn,$_GET['id']);
$get_product = mysqli_query($conn,"select * from item_detail where id = '".htmlspecialchars($id)."' and sold = 0");
$sql = "UPDATE item_detail SET views = views +1 where id ='$id'";
$query = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_array($get_product)) {
$product_ID = $row['id'];
$image = $row['product_image'];
$discount = $row['discount'];
$product_name = $row['product_name'];
$category = $row['product_category'];
$vendorId = $row['user_id'];
$price = $row['product_price'];
$dollar = round($price/$dollar_rate);
$product_date = $row['date'];
	}
	
}

?>

 <?php

$get_productVendor = mysqli_query($conn,"select * from vendor_profile where id = '".htmlspecialchars($vendorId)."'");
if ($get_productVendor->num_rows>0) {
while ($dataVendor = mysqli_fetch_array($get_productVendor)) {
$vendorImage = $dataVendor['business_image'];
$vendorName = $dataVendor['business_name'];
$vendorPhone = $dataVendor['business_contact'];
$vendorLocation = $dataVendor['business_address'];
$vendorEmail = $dataVendor['business_email'];
if ($dataVendor['verified']==1) {
 $vendorVerified = $dataVendor['verified'];
}
}
}
else{
$vendorImage = "No vendor found";
$vendorName = "No vendor found";
$vendorPhone = "No vender found";
$vendorLocation =  "No vender found";
$vendorEmail =  "No vender found";

	}


?>

<!DOCTYPE html>
<html>
<head>
  <title>Product details</title>
  <?php include("components/links.php") ?>
  <link rel="stylesheet" href="assets/css/product-details.css">

</head>
<body class='bg-white'>
<!------------------------------------------Header--------------------------------------------------->
<?php include 'components/header.php';  ?>

 <div class="back-button-container">
        <a onclick='history.go(-1)' class="back-button"><i class='fa fa-chevron-left'></i></a>
    </div>
<br>
<br>
<!-----------------------------------report form --------------------------------------->
<div id="popup">
<div class="container">
<h6 align="center" id="h6" style="">Report Box</h6><br>
<form style="" mehod="post" id="report-form" enctype="multipart/form-data"> 

      <br>

        <p style="text-transform: capitalize;font-weight: bold;"><?= htmlspecialchars($product_name);?></p>
        <input type="hidden"  name="product_name" value="<?= htmlspecialchars($product_name); ?>">
        <input type="hidden" name="vendor_email" placeholder="&#xF1fa; Email" value="<?= htmlspecialchars($vendorEmail)?>"  class="form-control" >
        <input type="email" style="font-family:arial,fontawesome;" name="sender_email" placeholder="&#xF1fa; Email" value=""  class="form-control"><br>
        <input type="hidden"  name="product_id" placeholder="Product Details" value="<?= htmlspecialchars($product_ID); ?>"  class="form-control">
        <textarea type="text" wrap="physical" name="issue" placeholder="Issue " rows="8" class="form-control"></textarea><br><br>
        <input type="submit" name="submit" id="submit" style="color: white;" class="btn btn-warning" value="Report ">

     </form>
     
   <a class="btn btn-danger" onclick="toggle()" id="close">&times;</a> 
    <br>
   </div>
</div>

<!-----------------------product image---------------------------------------->




          <div class="container">
          <div class="row">
                 <div class="col-md-8">
                      <div class="mySlides">

             <?php
             
             if(!empty($buyer)){
             $heart_like = mysqli_query($conn,"select * from heart_like where buyer ='$buyer' and itemid ='$id'");
              if ($heart_like->num_rows>0) {
                if ($_SESSION['business_id'] != $vendorId) {
	            echo"<span id='heart-liked' class='heart'><i class='fa fa-heart'></i></span>";
                                                                                               }
                else{echo"<span id='heart' class='heart'><i class='fa fa-heart'></i></span>";
            }

}

}
?>

<img style='height:400px !important;width:100%;' src="<?= htmlspecialchars($image)  ?>">
</div>

<!------------------------------------------Add to cart--------------------------------------------------->

<?php

if (isset($_GET['id'])) {
$id= mysqli_escape_string($conn,$_GET['id']);
$more= mysqli_query($conn,"SELECT *from picx where sid='".htmlspecialchars($id)."'");
while ($pic=mysqli_fetch_array($more)) {
if ($more->num_rows>0) {
echo"<div class='mySlides'><img style='height:400px !important;width:100%;' src=".$pic['pictures']."></div>";
}  
}
} 
 ?>	

<?php
$more= mysqli_query($conn,"SELECT *from picx where sid='".htmlspecialchars($id)."'");
if ($more->num_rows>0) {
echo'<a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>';
}
?>

<br>
<b style="font-size:1.2rem;">&#8358; <?php if ($discount>0) {  echo round($price - ($discount/100 * $price)); 
}else{echo "".$price. " ";}  ?></b>&nbsp;
<b style="font-size:1.2rem;">$<?php if ($discount>0) {  echo round(($dollar) - ($discount/100 * $dollar)); 
}else{echo ($dollar);}  ?></b><br>
<b id="product_name" style="color:rgba(255,165,65,1);"><?= htmlspecialchars($product_name);?></b><br>
Posted on <?= htmlspecialchars($product_date)?><br>
<address><?= htmlspecialchars($vendorLocation);?></address>



</div>


     <div class="col-md-4">
       <div class="row">
           <div class="col-md-6 col-6">
                 <span><img id="vendor_image" src="<?= htmlspecialchars($vendorImage);?>"></span><br>
               <i class="fa fa-envelope"></i><a id="vendor_email" href="mailto:<?= htmlspecialchars($vendorEmail);?>"> <?= htmlspecialchars($vendorEmail); ?></a>
                    <br>
            </div>

            <div style="position: relative;" class="col-md-6 col-6">
             <a class='text-dark text-decoration-none' href='merchant.php?id=<?= htmlspecialchars($vendorId) ?>'><span id="vendor_name"><?= htmlspecialchars($vendorName);?></span></a><br>
               <span><i class="fa-solid fa-phone"></i> <small><?= htmlspecialchars($vendorPhone);?></small></span><br>
                  <?php
                      if ($vendorVerified==1) {
        	               echo "<span id='verified'><span style='visibility:hidden'>1</span><i class='fa fa-check'></i></span><br><br>";}
                 ?>
               <span><a id="vendor_phone" href="tel:+234 <?= htmlspecialchars($vendorPhone);?>">Request a call</a></span>
	       	  </div>

        </div>


<br>

<div  class="housing_delivery">

<br>

<h6><b>Door delivery</b></h6>

<p style="font-size: 12.5px;">Lorem ipsum dolor sit amet consectetur. Non at vitae
sed augue sit cursus at. Mauris malesuada sed
metus enim varius laoreet.</p>


<h6><b>Pickup station</b></h6>

<p style="font-size: 12.5px;">Lorem ipsum dolor sit amet consectetur. Non at vitae
sed augue sit cursus at. Mauris malesuada sed
metus enim varius laoreet.</p>


<h6><b>Return policy</b></h6>

<p style="font-size: 12.5px;">Lorem ipsum dolor sit amet consectetur. Non at vitae
sed augue sit cursus at. Mauris malesuada sed
metus enim varius laoreet.</p>
</div>

<br>

<?php  

if (isset($_SESSION['business_id'])) {

if ($_SESSION['business_id']!= $vendorId) {

echo'<button name="itemId" id="'.$id.'"   class="form-control btn btn-info btn-add">Show</button>';
}

}

elseif (isset($_SESSION['id'])) {
echo'<button name="itemId" id="'.$id.'"   class="form-control btn btn-info btn-add">Show</button>';
}

elseif (isset($_SESSION['sp_id'])) {

echo'<button name="itemId" id="'.$id.'"   class="form-control btn btn-info btn-add">Show</button>';
}
else{
?>	

<a href="login.php?details=<?php echo urlencode($_SERVER['REQUEST_URI'])?>" class="form-control btn btn-info btn-add" style="text-decoration:none;color:white;">Login to continue</a>
<?php
}
 ?>

</div>

</div>

<br>

</div>



<!---------------------------------description------------------------------------------>


<div class="container">

<h6><b>Description</b></h6>

<p style="font-size: 12px;">Lorem ipsum dolor sit amet consectetur. Nec euismod nisi nisl sit laoreet. Metus aliquam maecenas rhoncus vulputate sed scelerisque proin faucibus. Penatibus facilisis et egestas egestas a cursus lectus dui. Enim in amet amet urna mi. Placerat suspendisse vitae aliquam sed amet vitae condimentum ipsum. Tristique id mollis donec. Lorem ipsum dolor sit amet consectetur. Nec euismod nisi nisl sit laoreet. Metus aliquam maecenas rhoncus vulputate sed scelerisque proin faucibus. Penatibus facilisis et egestas egestas a cursus lectus dui. Enim in amet amet urna mi. Placerat suspendisse vitae aliquam sed amet vitae condimentum ipsum. Tristique id mollis donec.</p>
<br>

<?php include("components/section-comment.php") ?>

<?php
if(isset($_SESSION['business_id'])){
if ($_SESSION['business_id'] != $vendorId) { ?>
<button class="btn-comment" onclick="toggle_comment()">Post comment</button>
<?php }  }
elseif(isset($_SESSION['id'])){ ?>
 <button class="btn-comment" onclick="toggle_comment()">Post comment</button>
<?php } else { ?>
 <button class="btn-comment" onclick="toggle_comment()">Post comment</button>
<?php } ?>   
</div>

<?php include("components/popup-comment.php") ?>

<!---------------------------------store address------------------------------------------>


<h6><b>Store Address</b></h6>
<br>
<div id="opening_hours" style="" class="row">
<div class="col-md-6">
<h6>Opening hours</h6>
<table style="width: 100%;">

	 <tbody>

	 <tr>

		<td>Monday</td>
		<td>10:00 - 15:00</td>
	 </tr>

	  <tr>

		<td>Tuesday</td>
		<td>10:00 - 15:00</td>
	 </tr>


 <tr>

		<td>Wednesday</td>
		<td>10:00 - 15:00</td>
	 </tr>


 <tr>

		<td>Thursday</td>
		<td>10:00 - 15:00</td>
	 </tr>


 <tr>

		<td>Friday</td>
		<td>10:00 - 15:00</td>
	 </tr>

</tbody>

</table>

</div>

<!------------------------------------------Discount deals--------------------------------------------------->
<div class="col-md-6">

	<br>
  <?php
$encodedLocation = isset($vendorLocation) ? urlencode($vendorLocation) : '';
?>
<iframe
    src="https://www.google.com/maps?q=<?= $encodedLocation ?>&output=embed"
    width="100%"
    height="300"
    style="border:0;"
    allowfullscreen=""
    loading="lazy"
    referrerpolicy="no-referrer-when-downgrade"
    onload="hideSpinner()">
</iframe>
</div>
</div>
<br>	

<!---------------------------------send request------------------------------------------>
<div id="popup-messaging">
    <a onclick="messaging()" id="close-messaging">&times;</a>
<h6 align="center" id="h6" style="">Send Request</h6><br>
<div class="container">

   <?php 
require 'engine/configure.php';   
if (isset($_GET['id'])) {
$id= mysqli_escape_string($conn,$_GET['id']);
$yty = mysqli_query($conn,"select *from item_detail where id='".htmlspecialchars($id)."'");
while ($row=mysqli_fetch_array($yty)) 
 {
  if ($yty) {
$productname=$row['product_name'];
$sid=$row['user_id'];
$pid=$row['id'];
 }

}
}
?>  
<form method="post" id="message-form" enctype="multipart/form-data"> 
<div style="text-transform: capitalize;" class="pxname">Product name: &nbsp; <?php echo$productname; ?></div>
<input type="hidden" name="has" value="0" placeholder="" class="form-control"><br>
<input type="hidden" name="is_sender_deleted" value="0">
<input type="hidden" name="itemid" value="<?php echo$pid;?>">
<input type="hidden" name="is_receiver_deleted" value="0">
<?php 
if(isset($_SESSION['business_email'])){
$business_email = $_SESSION['business_email']; 
$business_name = $_SESSION['business_name'];
echo'<input type="hidden" name="sentby" maxlength="21" class="form-control" style="font-family:arial,fontawesome;" placeholder="&#xF1fa; Email" value="'  .$business_email.'"><br>';
echo'<input type="hidden" maxlength="21" name="name" class="form-control" style="font-family:arial,fontawesome;"  placeholder="&#xF007; Name" value="'.$business_name.'">';
}
elseif (isset($_SESSION['sp_email'])){
 	$sp_email = $_SESSION['sp_email']; 
 	$sp_name = $_SESSION['sp_name'];
echo'<input type="hidden" name="sentby" maxlength="21" class="form-control" style="font-family:arial,fontawesome;" placeholder="&#xF1fa; Email" value=" '.$sp_email.'"><br>';
echo'<input type="hidden" maxlength="21" name="name" class="form-control" style="font-family:arial,fontawesome;"  placeholder="&#xF007; Name" value="'.$sp_name.'">';}

 elseif (isset($_SESSION['email'])){
 	$email = $_SESSION['email']; 
 	$name = $_SESSION['name'];
echo'<input type="hidden" name="sentby" maxlength="21" class="form-control" style="font-family:arial,fontawesome;" placeholder="&#xF1fa; Email" value="'.$email.'"><br>';
echo'<input type="hidden" maxlength="18" name="name" class="form-control" style="font-family:arial,fontawesome;"  placeholder="&#xF007; Name" value="'.$name.'">';}
else{
?>
<input type="text" name="sentby" maxlength="21" class="form-control" style="font-family:arial,fontawesome;" placeholder="&#xF1fa; Email" ><br>
<input type="text" maxlength="21" name="name" class="form-control" style="font-family:arial,fontawesome;"  placeholder="&#xF007; Name">
<?php
 }

?> 
<input type="hidden" name="sentto" value="<?php echo$vendorEmail ?>" placeholder="" class="form-control"><br>
<input type="hidden" name="subject" placeholder="Subject" value="<?php echo$productname; ?>" class="form-control">
<textarea type="text" wrap="physical" name="message" rows="6" placeholder="e.g phonenumber, price e.t.c" class="form-control"></textarea><br><br>
<div align="center"><input type="submit" name="submit" id="submit-message" style="color: white;padding:10px;" class="btn btn-warning form-control" value="Send"></div>
<div align="center" style="display: none;" id="loading-image"><img id="loader" height="50" width="80" src="loading-image.GIF"></div>
</form>
<br>
 

</div>
</div>
<h6 style="padding: 10px;"><span id="make_request"><a style="color: skyblue;" onclick="messaging()" class="btn">Make a request</a></span> <span id="report_abuse"><a style="color:white;"  onclick='toggle()' class="btn">Report abuse</a></span></h6>
<br>
<h6 style="font-weight: bold;text-transform: capitalize;"><?php echo $category?> on Discount deals</h6><br>
<div class="main">


<?php
require 'engine/configure.php';
$condition = "SELECT * from item_detail where sold = 0 and product_category='".htmlspecialchars($category)."' and discount > 0";
$data = mysqli_query($conn,$condition);
$datafound = $data->num_rows;
echo "<table><tbody id='mytable' class=''>";
        while($row=mysqli_fetch_array($data))

        {        
            ?>
        <?php   
echo "<div id='package'>";
$product_name = $row['product_name'];
$price = $row['product_price'];
if ($row['discount']>0) {
   echo "<span id='discount'>-".$row['discount']."%</span>";
   echo "<span class='' id='views'>".$row['views']." <i class='fa fa-eye'></i></span>";
}
 if ($row['discount']==0) {
echo "<span class='' id='noviews'>".$row['views']." <i class='fa fa-eye'></i></span>";
}
echo "<a href='product-details.php?id={$row['id']}&{$row['product_name']}&{$row['product_location']}&{$row['product_category']}&{$row['product_details']}' target='_blank'><div style=''><img loading='lazy' id='imgitem' width='' src=".$row['product_image'].">"." "."</div></a>";
echo"<span id=''><i class='fa-solid fa-check'></i>"."</span><br>";
echo"<span style='float:right;color:white;border:1px solid transparent;background-color:rgba(0,0,0,0.5);font-size:10px;padding:2px;margin-top:-20px;' id=''>".htmlspecialchars($row['product_condition'])."</span>";

if ($row['discount']>0) {
     $price = $row['product_price'];
     echo"<span class='text-danger' style='text-decoration:line-through;' id='priceitem'>&#8358;".$price."</span> ";
     echo"<span class='text-danger' id='priceitem'>&#8358;".round(( $row['product_price'])-($row['discount']/100 * $price))."</span><br>";

}
if ($row['discount']==0) {
    echo"<span id='priceitem'>&#8358;".$price."</span> ";
}
echo "<span id='nameitem' style='' ><a target='_blank' href='product-details.php?id={$row['id']}&{$row['product_name']}&{$row['product_location']}&{$row['product_category']}&{$row['product_details']}'>".$row['product_name']."</a></span>"."<br>";

echo"<span id='locitem'>".$row['product_location'].""."</span><br>";

if (isset($_SESSION['id'])  && isset($_SESSION['business_id'])) {

    if ($row['user_id']!=$_SESSION['business_id']) {   
      echo"<span style='font-weight:normal;font-size:11px;' id='locitem'><a style='font-weight:normal;' id='{$row['id']}' class='btn-compare fs-6' >Compare</a></span>";
}

  }
else{
$redirecturl =($_SERVER['REQUEST_URI']);
    echo"<a style='font-weight:normal;' id='locitem' id='' disabled class='btn-hover fs-6' >Compare</a><span class='hide'>Please <a href='login.php?details={$redirecturl}'>login</a> to use feature</span>";
}
echo"<a style='float:right;' class='share mr-2' id='https://estores.ng/product-details.php?share ={$product_name}' onclick='share()' target='_blank' rel='noopener noreferrer'><i id='share' class='fa fa-share-alt fa-2x'></i></a><br>";
  ?> <?php
 echo"</div>";      
               }
?>
</tbody></table>
</div>
<br>
</div>

<!------------------------------------------footer--------------------------------------------------->
<br>

<?php
include 'footer.php';
?>

<a class="btn-down" onclick="topFunction()">&#8593;</a>
<script src="assets/js/scroll.js"></script>
<script src="assets/js/product-details.js"></script>

</body>
</html>