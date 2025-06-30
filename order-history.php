<?php session_start();
require 'engine/configure.php';
require 'engine/get-dollar.php';
if (!isset($_SESSION["business_id"]) && !isset($_SESSION["id"]) && !isset($_SESSION["sp_id"])) { 
echo"<script>location.href='dashboard.php'</script>";
exit();
}
date_default_timezone_set('Africa/Lagos');
date_default_timezone_get();
?>

<?php 
if (!empty($_SESSION["id"])) {
$date = $_SESSION['date'];
$userId = $_SESSION['id'];
$you = $_SESSION['email'] ;
}

if (!empty($_SESSION["business_id"])) {
$business_date = $_SESSION['business_date'];
$userId = $_SESSION['business_id'];
$you = $_SESSION['business_email'] ;
}

if (!empty($_SESSION["sp_id"])) {
$sp_date = $_SESSION['sp_date'];
$userId = $_SESSION['sp_id'];
$you = $_SESSION['sp_email'] ;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>E-stores | Order History </title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/flickity.min.css">
               <link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="stylesheet" href="assets/css/flickity.min.css">
      <link rel="stylesheet" href="mobile-view.css">
  <script src="assets/js/sweetalert.min.js"></script> 
  <script src="assets/js/jquery-1.11.3.min.js"></script>
<script src="assets/js/flickity.pkgd.min.js"></script>
<style type="text/css">

body{

  font-family: poppins;
}

@media only screen and (max-width:497px){
 
 #overlay{
    
  display:none;   
    
}

}


#openbar{
 
 display:none;   
    
}

@media only screen and (max-width:497px){

#openbar{
 
 
 display:block;  
 
 z-index:9;
 
 margin-left:10px;
 
 margin-top:5px;
    
}
}







.category{

  text-transform: capitalize;
}


.notification{

color:white;
background-color: red;
padding:0px 8px;
border-radius:50%;
margin-top:-5px;
font-size:10px;
position: absolute;
}


/*--------------------------------------------------------------
# view icon
--------------------------------------------------------------*/

#noviews{

position:relative;
top:45px;
left:7px;
background-color: rgba(0,0,0,0.8);
color: white;
font-weight: bold;
padding: 7px;
z-index: ;
font-size:11px;


}



 
#views{

position:relative;
top:45px;
left:-28px;
background-color: rgba(0,0,0,0.8);
color: white;
font-weight: bold;
padding: 7px;
z-index: ;
font-size: 11px;

}



#count{


color:white;
background-color: red;
border-radius: 50%;
padding:0px 6px;
font-weight: bold;
position: absolute;
right:;
margin-top: -5px;
font-size: 10px;
z-index: 1;

}



/*--------------------------------------------------------------
# discount styles
--------------------------------------------------------------*/

#discount{
background-color: rgba(255,195,50,0.4);
color: rgba(255,95,50,1);
border: 1px solid transparent transparent;
position:relative;
top:40px;
font-weight: bold;
padding:3px;
left: 75%;

font-size:11px;

} 



.btn-info{
  font-size: 12px;
}


@media only screen and (max-width:497px){

.btn-info{
  font-size: 14px;
  padding:3px 8px;
}


}

.loader{
  width:50px;
  height:50px;
}

/*--------------------------------------------------------------
# user picture
--------------------------------------------------------------*/


#user_image{

  height: 80px;

  width: 80px;

  border-radius: 50%;

  padding: 5px;

  border:2px solid skyblue;


}


@media only screen and (max-width:497px){


#user_image{

  height: 90px;

  width: 90px;

 


}


}


.simple{

color:white !important;

}


#addx,.addx{

color:white !important;
font-family:poppins;
cursor: pointer;
font-size: 13px !important;
background:#17a2b8;
border:none; 
padding:8px;
margin: 1px 3px 1px 3px;
box-shadow:0px 2px 8px rgba(0,40,90,0.6);
border-radius:5px; 


}

#addx:hover,.addx:hover,#addx:focus,.addx:focus,{

  opacity: 0.6 !important;
  background-color: rgba(0,0,0,0.4);
}


/*--------------------------------------------------------------
#iitem container
--------------------------------------------------------------*/



#package{

background-color:white !important;padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
width:200px;
display: inline-block;
margin:1em 1em;

}

#close-popup{

  float:right;
  color:white;
  font-size: 18px !important;
  cursor: pointer;
  box-shadow: 0px 0px 5px rgba(0,0,0,0.4);
  padding: 0px 7px;
  border-radius: 50%;
  background-color:black;
  background-color:black;
}



.edit{

  
  font-size: 13px;
  color: white !important;
  cursor: pointer;
  z-index:;
  position: absolute;
  background-color:#17a2b8;
  padding: 2px 5px;



}


#header_edit{

border-bottom: 2px solid rgba(0,0,0,0.2);
padding: 10px;
font-weight: bold;
color: #17a2b8;
font-size: 13px;


}







/*--------------------------------------------------------------
# Edit popup
--------------------------------------------------------------*/


.edit-page{
background-color: white;  
background-color: white;  
position:fixed;
top: 50%;
left: 50%;
transform: translate(-50%,-50%);
width: 600px;
height:500px;
padding:5px;
z-index:1;
box-shadow: 0 5px 30px rgba(0,0,0,.30);
transition: 0.3s;
display: none;
font-size:0.8em !important;

}




.edit-page input[type=text]{

  border:1px solid transparent;
  box-shadow: 0px 0px 4px rgba(0,0,0,0.5);
}


#interactions{

  margin-top: 50%;

  box-shadow: 0px 8px 5px rgba(0,0,0,0.7);

  padding:3px;

  font-size: 12px;


}



#myview,#myshare,#myheart{
  color:white !important;
  background-color: skyblue !important;
  padding:2px 5px;
}



@media only screen and (max-width:497px){

.edit-page{
top: 40%;
width: 390px !important;
height: 530px;
font-size: 13px !important;
z-index: 999;


}


}





#close{

font-size: 12px;
position: absolute;
top: 15px;
left: 93%;
color:white;
cursor: pointer;



}
#close:hover, #close:focus{
opacity: 0.6;
border: none;
outline: none;
 outline: none;

}



#wrap.active{

background-color: rgba(0,0,0,0.6);

}


#wrap {

overflow-y: hidden;overflow: hidden;

}


/*--------------------------------------------------------------
# Item details
--------------------------------------------------------------*/



#priceitem{

font-family:Poppins;
font-weight: bold;
color:black;
opacity: 0.8;
text-transform:capitalize;
font-size:12px;
padding:10px;
position: relative;
margin-bottom: 8px;


}



#conitem,#locitem,#catitem{
font-size:12px;
font-family:poppins;
color: rgba(0,0,0,0.9);
padding:10px;
width:100%;

font-weight: bold;
text-transform: capitalize;


}


#imgitem{
height: 120px;
width:100%;

}

#nameitem a{
  font-size:12px;
  font-weight:normal;
  padding-left:10px;
  text-transform:capitalize;
  color: rgba(0,0,0,0.4);
  padding-top: 8px;

 word-wrap:break-word;
 text-align:center;
  font-family:poppins;  
}


@media only screen and (min-width:300px) and (max-width:375px){


#package{

background-color:white;padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 1px;

width:10rem !important;

display: inline-block;
margin:1em 0.1em !important;

}



#noviews{

position:relative;
top:45px;
left:2px !important;
background-color: rgba(0,0,0,0.8);
color: white;
font-weight: bold;
padding: 7px;
z-index: ;
font-size:11px;


}



 
#views{

position:relative;
top:45px;
left:-31px !important;
background-color: rgba(0,0,0,0.8);
color: white;
font-weight: bold;
padding: 7px;
z-index: ;
font-size: 11px;

}





 .flickity-page-dots .dot{

  width:10px !important;
  height: 4px;
  margin: 0 !important;
  border-radius: 0 !important;
  
}



}






@media only screen and (min-width:376px) and (max-width:390px){


#package{

background-color:white;padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 1px;

width:10rem !important;

display: inline-block;
margin:1em 0.4em !important;

}

.nav_login,.nav_signup{

margin-left:40px !important;
font-weight: normal !important;
display: none! important;

padding: 2px !important;

border:2px solid white !important;

}


 .flickity-page-dots .dot{

  width:15px !important;
  height: 4px;
  margin: 0 !important;
  border-radius: 0 !important;
  
}


#noviews{

position:relative;
top:45px;
left:8px;
background-color: rgba(0,0,0,0.8);
color: white;
font-weight: bold;
padding: 3px;
z-index: ;
font-size:11px;

}



 
#views{

position:relative;
top:45px;
left:-33px !important;
background-color: rgba(0,0,0,0.8);
color: white;
font-weight: bold;
padding: 3px;
z-index: ;
font-size: 11px;

}


}




}





@media only screen and (min-width:415px) and (max-width:430px){


#package{

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 1px;

width:12rem !important;

display: inline-block;
margin:1em 0.15em !important;

}

 .flickity-page-dots .dot{

  width:15px !important;
  height: 4px;
  margin: 0 !important;
  border-radius: 0 !important;
  
}


@media only screen and (max-width:415px){

#noviews{

position:relative;
top:45px;
left:5px;
background-color: rgba(0,0,0,0.8);
color: white;
font-weight: bold;
padding: 3px;
z-index: ;
font-size:11px;

}



 
#views{

position:relative;
top:45px;
left:-35px !important;
background-color: rgba(0,0,0,0.8);
color: white;
font-weight: bold;
padding: 3px;
z-index: ;
font-size: 11px;

}


}



}







@media only screen and (min-width:400px) and (max-width:414px){


#package{

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 1px;

width:11.2rem !important;

display: inline-block;
margin:1em 0.15em !important;

}

.nav_login,.nav_signup{

margin-left:40px !important;
font-weight: normal !important;
display: none! important;

padding: 2px !important;

border:2px solid white !important;

}


}


@media only screen and (min-width:400px) and (max-width:414px){

 .flickity-page-dots .dot{

  width:15px !important;
  height: 4px;
  margin: 0 !important;
  border-radius: 0 !important;
  
}

@media only screen and (max-width:415px){

#noviews{

position:relative;
top:45px;
left:5px;
background-color: rgba(0,0,0,0.8);
color: white;
font-weight: bold;
padding: 3px;
z-index: ;
font-size:11px;

}



 
#views{

position:relative;
top:45px;
left:-35px !important;
background-color: rgba(0,0,0,0.8);
color: white;
font-weight: bold;
padding: 3px;
z-index: ;
font-size: 11px;

}


}


}



#package{

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 0px;
width:190px;
display: inline-block;
margin:1em 1em;

}



@media only screen and (min-width:430px) and (max-width:498px){


#package{

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 0px;
width:200px;
display: inline-block;
margin:1em 1em;

}



}


@media only screen and (min-width:499px) and (max-width:797px){


#package{

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 0px;

width:200px;

display: inline-block;
margin:1em 1.2em;

}



}




@media only screen and (min-width:430px) and (max-width:497px){

#package{

background-color:white;padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.1);
padding: 8px;

width:198px;

display: inline-block;
margin:1em 1em;
z-index: 1;

}




@media only screen and (min-width:497px) and (max-width:767px){

#package{

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.1);
padding: 8px;

width:198px;

display: inline-block;
margin:1em 1em;

}

}






#priceitem{

font-family:Poppins;
font-weight: bold;

text-transform:capitalize;
font-size:14px;
padding:10px;
position: relative;



}
#conitem,#locitem,#catitem{

padding: 8px;
}

#imgitem{

height: 120px;
width:100%;


border-radius:15px 15px 0px 0px;
}

#nameitem a{
  font-size:12px;
  font-weight:normal;
  padding-left:10px;
  text-transform:capitalize;
  color: rgba(0,0,0,0.4);

 word-wrap:break-word;
 text-align:center;
  font-family:poppins;  
}







}












#date{

float: right;margin-right: 13px;
}


#active{

  background-color:white;

  width: 100%;

}



@media only screen and (max-width:767px){


#date{


margin-right: 25px;
font-size: 12px;

}



#battery{

  font-size: 11px;
}

}


div p{


  font-size: 12px;

  width: 100%;

  padding: 10px 30px;

  margin-top: 25px;

  border:1px solid rgba(225,225,285,0.8);


  background-color: rgba(225,225,285,0.8);
}








@media only screen and (max-width:468px){


input::placeholder{


  text-align:left;
}

}







#user_name{
position: relative;

font-weight: bold;

font-size: 14px !important;

margin-top: -30px;
}



@media only screen and (max-width:497px){


#user_name{

font-size: 15px !important;

text-transform:capitalize;

}

#user_email{



left:26% !important;

top:-37px;

font-size: 13px !important;

}




}


#user_email{

position: relative;

left:18%;

top:-38px;

font-size: 13px !important;

}



@media only screen and (max-width:767px){



#user_email{


position: relative;

margin-left: 8px;

margin-top: -18px;

font-size: 13px !important;




}



}




 select{

  font-size: 12px !important;
  margin-top: 10px;


}








.col-md-6{


  margin-top: 10px;

}



.col-md-6 h6{

  font-weight: bold;

  font-size: 15px;
}


.col-md-9 h6{

  font-weight: bold;
}


#label{

  font-size: 14px;

  background-color:rgba(240,240,240,0.9);

  padding: 20px 23px;

  width: 100%;
  margin-top: 30px;
}



/*--------------------------------------------------------------
# overlay dashboard
--------------------------------------------------------------*/

#overlay{

display: block;
position:relative;
z-index:1;
width: 100%;
background-color:skyblue;

}


.overlay-content{
position:relative;
top: 28px;
width: 100%;
text-align:left;
margin-left: 20px;
}

#overlay a{
padding: 5px;
font-size:13px;
color:black !important;
display: block;
text-transform: capitalize;
font-weight:normal;
 font-family:poppins;
transition: 0.3s;
}

@media only screen and (max-width:497px){

#overlay a{
padding: 5px;
font-size:14px !important;
color:black !important;
display: block;
text-transform: capitalize;
font-weight:normal;
 font-family:poppins;
transition: 0.3s;
}

#overlay {  display:none;  

}

}


.overlay a:hover,.overlay a:focus{
  opacity: 0.5;
  text-decoration: none;
}

#overlay hr{

  border:2px solid rgba(0,0,0,0.6);

  width: 40%;

  position: absolute;

  left: 0% !important;

  margin-top: 10px;



}


@media only screen and (max-width:767px){


#overlay{

  overflow-x:hidden;
  overflow-y:hidden;



}


#overlay hr{

 width: 20%;



}


}





@media only screen and (max-width:468px){


#overlay{

  overflow-x:hidden;
  overflow-y:hidden;
}


#overlay hr{

 width: 20%;



}




}



@media only screen and (max-width:767px){

#overlay img{

  width: 12px;

  height: 11px;
}


.fa-envelope{

  color: black;

  font-size: 12px;

}



}






.fa-envelope{

  color: black;

}


.fa-bell{

  font-size: 21px;

}


.bell{

  margin-left: 41px;

  position: relative;

  top: -53px;


}





.button_dashboard{

  margin-top: 10px;
}

.button_logout{

  margin-top: 10px;
}

.button_logout:hover{

  text-decoration: none;

  color:red;
}

</style>
</head>
<body>


<a id="openbar" onclick="openbar()"><i class="fa fa-bars"></i></a>

<!------------------------------------------overlay content--------------------------------------------------->

<div id="wrap">
<div style="" class="  row">
<div id="overlay" class="col-md-3">
<div class="overlay-content">
<a href="index.php" class="button_home" ><img src="assets/icons/Vector.png"> Home<span id="date"><?php echo date("F d, Y");?></span></a><br>
<a href="dashboard.php" class="button_dashboard"><img src="assets/icons/round-dashboard.png"> Dashboard</a><br>

    
<?php 
if (isset($_SESSION['business_id'])) {

echo'<a href="postadvert.php"><img src="assets/icons/healthicons_person.png"> Post product<i class="fa fa-caret"></i> </a><br>';
echo'<a href="mylistings.php"> <img src="assets/icons/material-symbols_box-add-outline.png"> My listing</a><br>';

}
?>
  
  <a href="profile.php"><img src="assets/icons/icon-park-outline_add-pic.png"> Profile</a><br>
  
  
  <?php 
require 'engine/configure.php';
$getQuery = "select * from messages where receiver_email = '$you' and is_receiver_deleted = 0 group by sender_email"; 
$messages = mysqli_query($conn,$getQuery); 
if($messages->num_rows>0){ $inbox =$messages->num_rows;
}
else{
$inbox=0;
} ?>



 <?php  if(isset($_SESSION['sp_id'])){ ?>       

<a href="messages-sp.php"><i class="fa fa-envelope"></i> Messages(<?php echo $inbox  ?>)</a><br>

<?php } else { ?>

<a href="messages.php"><i class="fa fa-envelope"></i> Messages(<?php echo $inbox  ?>)</a><br>

<?php } ?>
  <a id='active' href="order-history.php"><i class="fa fa-shopping-cart"></i> Order History</a><br>

<?php if (isset($_SESSION["sp_id"])) {
?>
<a href="services-provided.php"><i class='fa fa-hard-hat'></i> Service Provided</a><br>

<a href="work-experience.php"><i class='fa fa-history'></i> Work experience</a><br>
<?php
 }
?>

<?php if (isset($_SESSION['business_id'])) {
 echo'<a href="sold-history.php"><i class="fa fa-history"></i>  Sold History </a><br>';
}?>
 <hr>
 <br>
<a href="logout.php" class="button_logout"><img src="assets/icons/icon-park_logout.png"> Logout</a><br><br>
</div>
</div>
<div class="col-md-9">
<div class="container row"> 
  <div class="col-md-6">
<?php if (isset($_SESSION['business_id'])) {
    //Check if user is a vendor
 $username = $_SESSION['business_name'];
$useremail = $_SESSION['business_email'];
}
//Check if user is a service provider
if (isset($_SESSION['sp_id'])) {
$username = $_SESSION['sp_name'];
$useremail = $_SESSION['sp_email'];
}
    //Check if user is a buyer
if (isset($_SESSION['id'])) {
$username = $_SESSION['name'];
$useremail = $_SESSION['email'];
}
?>

      <br>

      <h6>Order History</h6>

 

     </div>

     <div class="col-md-6">

     
    <?php
    //Check if user is a vendor

if (isset($_SESSION['business_id'])) {
 require 'engine/configure.php';
    $vendor = mysqli_query($conn,"select * from vendor_profile where id = '".htmlspecialchars($userId)."'");
if ($vendor) {
while ($dataVendor = mysqli_fetch_array($vendor)) {
$vendorName = $dataVendor['business_name'];
$vendorImg = $dataVendor['business_image'];}}}?>
<?php
//Check if user is a  service provider
if (isset($_SESSION['sp_id'])) {
require 'engine/configure.php';
  $vendor = mysqli_query($conn,"select * from service_providers where sp_id = '$userId'");
if ($vendor) {
 while ($dataVendor = mysqli_fetch_array($vendor)) {
$vendorName = $dataVendor['sp_name'];
$vendorImg = $dataVendor['sp_img'];}}}
?>
<?php
//Check if user is a  buyer
if (isset($_SESSION['id'])) {
require 'engine/configure.php';
$vendor = mysqli_query($conn,"select * from user_profile where id = '$userId'");
if ($vendor) {
while ($dataVendor = mysqli_fetch_array($vendor)) {
$vendorName = $dataVendor['user_name'];
$vendorImg = $dataVendor['user_image'];

     }

    }
}
     ?>

<?php if (file_exists($vendorImg)) {
$extension = strtolower(pathinfo($vendorImg,PATHINFO_EXTENSION));
$image_extension  = array('jpg','jpeg','png');
if (!in_array($extension , $image_extension)) {
$vendorImg = "<i style='font-size:20px;color:black;' class='fa fa-user-alt'></i>";
echo$vendorImg; }
else{ ?>
<img id="user_image" src="<?php echo $vendorImg;?>">
<?php }  } 
?>
<span id="user_name"> <?php echo $username?></span><br>
<small style="" class="user_email" id="user_email"><?php echo $useremail;?></small>

<?php

require 'engine/configure.php';
if (isset($_SESSION['business_id'])) {
$you = $_SESSION['business_id'];
$getnotification = mysqli_query($conn,"select * from vendor_notifications where pending=0 and recipient_id ='".htmlspecialchars($you)."'");
echo'<a href="vendor-notification.php"><span class="bell">&nbsp; <i class="fa-solid fa-bell"></i>';
$countNotifications = $getnotification->num_rows;
if ($countNotifications>0) {
?>
<span class="notification"><?php echo$countNotifications;?>
<?php    }  }  ?>
</span></span></a>

<?php

require 'engine/configure.php';
if (isset($_SESSION['sp_id'])) {
$you = $_SESSION['sp_id'];
$getnotification = mysqli_query($conn,"select * from sp_notifications where pending=0 and recipient_id ='".htmlspecialchars($you)."'");
echo'<a href="sp_notifications.php"><span class="bell">&nbsp; <i class="fa-solid fa-bell"><span class="notification">';
$countNotifications = $getnotification->num_rows;
if ($countNotifications>0) {
?>
<?php echo$countNotifications;?>
   <?php   }  } ?>
</span></i></span></a>



<?php

require 'engine/configure.php';
if (isset($_SESSION['id'])) {
$you = $_SESSION['id'];
$getnotification = mysqli_query($conn,"select * from buyer_notifications where pending=0 and recipient_id ='".htmlspecialchars($you)."'");
echo'<a href="buyer-notifications.php"><span class="bell">&nbsp; <i class="fa-solid fa-bell"><span class="notification">';
$countNotifications = $getnotification->num_rows;
if ($countNotifications>0) {
?>
<?php echo$countNotifications;?>
   <?php   }  } ?>

   </span></i></span></a>
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