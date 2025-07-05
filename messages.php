<?php session_start();
if (!isset($_SESSION["id"]) && !isset($_SESSION["business_id"]) && !isset($_SESSION["sp_id"] )) { 
echo"<script>location.href='login.php?step=messages'</script>";
exit();}

date_default_timezone_set('Africa/Lagos');
date_default_timezone_get();
 ?>
<?php 
if (isset($_SESSION['business_id'])) {
$you = $_SESSION['business_email'];
$userId = $_SESSION['business_id'];

}

if (isset($_SESSION['id'])) {
$you = $_SESSION['email'];
$userId = $_SESSION['id'];
}
require("engine/configure.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>E-stores | Messages </title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/flickity.min.css">
   <link rel="stylesheet" href="assets/css/messages.css">
   <link rel="stylesheet" href="assets/css/navigator.css">
   <link rel="stylesheet" href="assets/css/profile-section.css">
  <script src="assets/js/sweetalert.min.js"></script> 
  <script src="assets/js/jquery-1.11.3.min.js"></script>
<script src="assets/js/flickity.pkgd.min.js"></script>
<script src="assets/js/messages.js"></script>
</head>
<body>

<a id="openbar" onclick="openbar()"><i class="fa fa-bars"></i></a>

<!------------------------------------------overlay content--------------------------------------------------->

<div style="overflow: hidden;">

<div style="" class="  row">

<div id="overlay" class="overlay col-md-3">

    <?php include("components/navigator.php") ?>

 </div>

  <div class="col-md-9">

<div class="container row"> 
  
  <div class="col-md-6">

<br>

 
<?php 
    //Check if user is a vendor
$username = $_SESSION['business_name'] ??  $_SESSION['name'];
$useremail = $_SESSION['business_email'] ??  $_SESSION['email'];

?>
<h6 style="text-transform:capitalize;">Hello, <?= htmlspecialchars($username);?> </h6>

</div>

  <div class="col-md-6">

  <?php
    //Check if user is a vendor

if (isset($_SESSION['business_id'])) {
    require 'engine/configure.php';
    $vendor = mysqli_query($conn,"select * from vendor_profile where id = '$userId'");
    if ($vendor) {     
     while ($dataVendor = mysqli_fetch_array($vendor)) {
      $vendorName = $dataVendor['business_name'];
      $vendorImg = $dataVendor['business_image'];

     }

    }
}

if (isset($_SESSION['id'])) {
    $vendor = mysqli_query($conn,"select * from user_profile where id = '$userId'");
    if ($vendor) {
    while ($dataVendor = mysqli_fetch_array($vendor)) {
      $vendorName = $dataVendor['user_name'];
      $vendorImg = $dataVendor['user_image'];

     }

    }
}
     ?>

<div id="bom">

<div id="my">
<div style='gap:10px;' class="d-flex align-items-center">
<?php if (file_exists($vendorImg)) {
$extension = strtolower(pathinfo($vendorImg,PATHINFO_EXTENSION));
$image_extension  = array('jpg','jpeg','png');
if (!in_array($extension , $image_extension)) {
$vendorImg = "<i style='font-size:80px;color:black;' class='fa fa-user-alt'></i>";
echo$vendorImg; }
else{ ?>
<img id="user_image" src="<?= htmlspecialchars($vendorImg);?>">
<?php }  } 
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
<?php    }  echo'</span>';}  ?>


<?php

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
$limit = 2;  
$getQuery = "select * from messages where receiver_email = '$you' and is_receiver_deleted = 0 group by sender_email";    
$result = mysqli_query($conn, $getQuery);  
$total_rows = $result->num_rows;    
$total_pages = ceil ($total_rows / $limit);    
if (!isset ($_GET['page']) ) {  
$page_number = 1;  
} else {  
$page_number = $_GET['page'];  
 }    
$initial_page = ($page_number-1) * $limit;
$time = time();
$inbox="select *  from (
select * from messages where receiver_email = '$you' and is_receiver_deleted = 0 and has_read = 0 order by has_read asc limit 18446744073709551615) as sub group by sender_email limit $initial_page,$limit";
$in =mysqli_query($conn, $inbox);
$datafound=$in->num_rows;
?>
<table>
<thead>
<tr>
<th id="inbox">Inbox(<?php  echo$datafound ?>)</th>
<th><a href="" id="refresh">Refresh</a></th>
<th><a class="mark" >Mark as Read</a></th>
</tr>
</thead>
</table>
<br><br><br>
<?php
require 'engine/configure.php';
$limit = 2;  
$getQuery = "select * from messages where receiver_email = '$you' and is_receiver_deleted = 0 group by sender_email";    
$result = mysqli_query($conn, $getQuery);  
$total_rows = $result->num_rows;    
$total_pages = ceil ($total_rows / $limit);    
if (!isset ($_GET['page']) ) {  
$page_number = 1;  
} else {  
$page_number = $_GET['page'];  
}    
$initial_page = ($page_number-1) * $limit;
$time = time();
$inbox="select *  from (
select * from messages where receiver_email = '$you' and is_receiver_deleted = 0 order by has_read asc limit 18446744073709551615) as sub group by sender_email limit $initial_page,$limit";
$in =mysqli_query($conn, $inbox);
$datafound=$in->num_rows;
echo"<table><th><tr style='background-color:rgba(192,192,192,0.1);'>
<td id='td-action'>Action</td>
<td id='td-from'>From</td>
<td id='td-subject'>Subject</td>
<td id='td-date'>Date</td>
</tr>
</th>";
?>
</div>

<?php
while ($row=mysqli_fetch_array($in)) {
echo "<tbody><tr id='{$row['id']}' class='border_bottom'>";
echo "<td id='delete' style='width:; text-align: center;'>
<a style='color:red;' class='remove' name='' id='{$row['sender_email']}'><i class='fa fa-trash'></i></a>
</td>";
$user_name=$row['sender_email'];
$subject = $row['subject'];
$getUsercount = mysqli_query($conn,"select * from messages where sender_email = '$user_name' and receiver_email = '$you' and is_receiver_deleted = 0 and has_read = 0");
?>
<?php
if ($getUsercount->num_rows>0) {
$countgetuser = "<span class='numbering'>(".$getUsercount->num_rows.")</span> ";
}
else{
$countgetuser="";
 }

?>

<td id='from' style='width: ; text-align: center;'><a href='chat.php?user_name=<?php echo urlencode($user_name);?>'><?php echo substr($row['sender_email'],0,4);?></a><br></td>

<?php

 if ($row['has_read']==0) {
 ?>   
   <td id='message' style='text-align: center;font-weight:bold;font-size:14px;'><a style='text-align: center;font-weight:bold;font-size:13px;'  href='chat.php?user_name=<?php echo urlencode($user_name);?>' id='reply' onclick='' id='' class='reply'><?php echo$countgetuser."".$row['subject'];?></a></td>
 <?php
 echo "<td id='date' style=' text-align: center;'>".$row['date']."<br></td>";
 }
else {
?>
<td id='message' style='text-align: center;text-transform: capitalize;font-weight:normal;'><a href='chat.php?user_name=<?php echo urlencode($user_name);?>' style='font-size:13px;' onclick='' id='reply' class='reply'><?php echo$countgetuser."".$row['subject'];?></a></td>
<?php
echo "<td id='date' style=' text-align: center;'>".$row['date']."<br></td>";
}

}

?>
</tr></tbody>
</table>
 </div>
<?php 
if ($page_number>1) {
    echo '<a href = "messages.php?page=' . ($page_number-1) . '"> Prev </a>';  
}
for($page_number = 1; $page_number<= $total_pages; $page_number++) {  
if ($page_number==$total_pages) {
echo '<a class="active"  href = "messages.php?page=' . $page_number . '">' . $page_number . ' </a>'; 
}
else{
echo '<a href = "messages.php?page=' . $page_number . '">' . $page_number . ' </a>'; 
}
}  
if ($page_number<$total_pages) {
  $next = '<a  href = "messages.php?page=' . ($page_number+1) . '"> Next</a>';  
print_r($next);
}

?>

  </div>
</div>

</div>


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
