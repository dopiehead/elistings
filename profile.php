<?php session_start();
require 'engine/configure.php';
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
  <link rel="stylesheet" href="assets/css/profile.css">
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


<div class="">
<div id="label">
<div id="messages_home" style="text-align: center;">
<div class="tab">
<a class="tablinks btn btn-primary"  id="defaultOpen" onclick="openCity(event,'London')">My profile</a>
<a class="tablinks btn btn-trash" onclick="openCity(event,'Paris')">Edit Profile</a>

</div>

</div>

<br>

<div id="London" class="tabcontent">

<table style="width: 100%;">
<thead>
<tr style="border-top: 2px solid rgba(192,192,192,0.4);border-bottom: 2px solid rgba(192,192,192,0.4);">
 <td style="padding:10px;" class="inbox" id="Home">Personal details</td>
</tr>
</thead>
</table>



<br><br>

 <small> <?= htmlspecialchars($username) ?></small><br>

<?php if (isset($_SESSION['business_id']) ) {
?>

<small> <?= htmlspecialchars($_SESSION['business_contact']) ?></small><br>
<small>Dial code +234</small><br>


<?php
}
?>

<small><?= htmlspecialchars($useremail) ?></small>

   <br>
   <i class="fa-solid fa-user-alt"></i><br>
<form id="editpage-form" method="post">

<input type="hidden" name="id" value="<?= htmlspecialchars($userId) ?>">
<input type="file" name="fileupload"><br><br>
<input type="submit" name="submit" id="submit" value="Change photo (Max 4MB)" class="btn btn-success " style="color: white;"><br>

</form>


</div>


<div id="Paris" class="tabcontent">

<h6>My profile</h6>

<?php
session_start(); // Always start session before using $_SESSION

require 'engine/configure.php'; // Assuming DB connection is here

$user_name = '';
$user_password = '';

// Check business user
if (isset($_SESSION['business_id'])) {
    $stmt = $conn->prepare("SELECT business_name, business_password FROM vendor_profile WHERE id = ?");
    $stmt->bind_param("i", $_SESSION['business_id']);
    $stmt->execute();
    $stmt->bind_result($user_name, $user_password);
    $stmt->fetch();
    $stmt->close();
}

// Check regular user
elseif (isset($_SESSION['id'])) {
    $stmt = $conn->prepare("SELECT user_name, user_password FROM user_profile WHERE id = ?");
    $stmt->bind_param("i", $_SESSION['id']);
    $stmt->execute();
    $stmt->bind_result($user_name, $user_password);
    $stmt->fetch();
    $stmt->close();
}
?>



<form id="editpage-details">
<?php if (!isset($_SESSION['business_id']) ) {
?>
<input type="text" id="first_name" name="first_name" placeholder="Full Name"><br>
<?php }
?>
<input type="hidden"  name="sid" value="<?= htmlspecialchars($userId) ?>">
<input type="hidden"  name="user_type" value="<?= htmlspecialchars($user_type) ?>">

<?php if (isset($_SESSION['business_id']) ) {
?>
<input id="business_name" name="business_name" type="text" class="form-control" value="<?= htmlspecialchars($_SESSION['business_name']) ?>" placeholder="Business Name"><br>

<?php }

?>
<input id="first_name"  type="password" name="password" placeholder="Password"><input id="first_name"  type="password" name="cpassword" placeholder="Confirm Password"><br>

<h6>Contact information</h6>

<?php $getthislink = mysqli_query($conn,"select * from user_information where sid = '".htmlspecialchars($userId)."' and user_type ='".htmlspecialchars($user_type)."' order by id desc limit 1"); if($getthislink->num_rows>0){
while($links = mysqli_fetch_array($getthislink)){ 
$whatsapp = $link['whatsapp'];   
}
  
} ?>

<input type="text" name="country" placeholder="Country" id="contact"><input type="text" name="contact" id="contact"  placeholder="Phone number">
<input type="text" name="whatsapp" id="whatsapp" placeholder="Whatsapp" value="<?php if(!empty($whatsapp)){echo$whatsapp;} ?>"><br>


<?php 
$email_address = $_SESSION['business_email'] ?? $_SESSION['email'];
?>

<input id="business_email" type="email" style="font-size:14px !important" name="" class="form-control" value="<?= htmlspecialchars($email_address) ?>" placeholder="Email Address"><br>
<h6> Address Details</h6><br>

<?php

require 'engine/connection.php';
$getStates = mysqli_query($con,"SELECT * from states_in_nigeria GROUP by state");
?>
<select name="location" class=" location address_details" id="location">
<option value="">Entire Nigeria</option>
<?php
while ($states = mysqli_fetch_array($getStates)) {
?>
<option value="<?= $states['state']?>"><?= htmlspecialchars($states['state']) ?></option>
<?php }?>

</select>

<span id='lg'></span>

<?php if (isset($_SESSION['business_id']) ) {
?>
<h6> About Your Organisation</h6><br>

<textarea style="border:1px solid transparent" class="form-control" name="about" placeholder="About Your Organization" wrap="physical"></textarea><br>
<textarea  style="border:1px solid transparent" class="form-control" name="services" placeholder="Services Your Organization Provides, ...." wrap="physical"></textarea><br>
<select name="business_category" id="business_category" class="form-control" style="text-transform: capitalize;">

<?php
$categories = ['Autoparts','Vehicles','Property','Building_materials','Mobile Phones & Tablets','Electronics','Home, Furniture & Appliances','Beauty & Personal Care','Fashion','Leisure & Activities','Jobs','Babies & Kids','Animals & Pets','Farm products','Commercial Equipment & Tools','Repair & Construction','hotel_products'];
foreach ($categories as $category) { ?>
  <option value="<?= htmlspecialchars($category)?>"><?= htmlspecialchars($category) ?></option>
<?php } ?>

</select><br>

<h6>Availability</h6><br>

<select name="days" id="time">
<option value="days">Days</option>
<?php 
$weekdays = ['monday','tuesday','wednesday','thursday','friday','saturday','sunday']; 
foreach ($weekdays as $weekday) {
  echo'<option value="'.$weekday.'">'.htmlspecialchars($weekday).'</option>';
}
?>
</select>   

<input id="time" type="text" name="opening_time" placeholder="Opening Time in :am/:pm">  <input id="time" type="text" name="closing_time" placeholder="Closing Time in :am/:pm"><br>
<?php

}

?>
<h6>Social Media</h6><br>

<?php $getthislink = mysqli_query($conn,"select * from user_information where sid = '".htmlspecialchars($userId)."' and user_type ='".htmlspecialchars($user_type)."' order by id desc limit 1"); if($getthislink->num_rows>0){
while($links = mysqli_fetch_array($getthislink)){ 
$facebook = $link['facebook'];   
$twitter = $link['twitter']; 
$linkedin = $link['linkedin']; 
$instagram= $link['instagram']; 
}  
} ?>

<input id="links" type="text" name="facebook" placeholder="Facebook" value="<?php if(!empty($facebook)){echo$facebook;} ?>">
<input id="links" type="text" name="twitter" placeholder="Twitter" value="<?php if(!empty($twitter)){echo$twitter;} ?>">
<input id="links" type="text" name="linkedin" placeholder="Linkedin " value="<?php if(!empty($linkedin)){echo$linkedin;} ?>">
<input id="links" type="text" name="instagram" placeholder="Instagram" value="<?php if(!empty($instagram)){echo$instagram;} ?>">
<br>
<div align="center" style="display: none;" class="loading-image" id="loading-image"><img id="loader" height="50" width="50" src="loading-image.GIF"></div>
<div class="container" style="text-align:left;font-size:0.9rem;">
<a class="btn btn-danger" onclick="cancel()">Cancel</a><a id="btn-submit" class="btn btn-success">Submit</a>



</div>

</form>

</div>
</div>
</div>
</div>
</div>
<script>
function openCity(evt, cityName) {
var i, tabcontent, tablinks;
tabcontent = document.getElementsByClassName("tabcontent");
for (i = 0; i < tabcontent.length; i++) {
tabcontent[i].style.display = "none";
 }
tablinks = document.getElementsByClassName("tablinks");
for (i = 0; i < tablinks.length; i++) {
 tablinks[i].className = tablinks[i].className.replace(" active", "");
 }
document.getElementById(cityName).style.display = "block";
evt.currentTarget.className += " active";
}
document.getElementById("defaultOpen").click();
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
<script src="assets/js/profile.js"></script>

</body>
</html>