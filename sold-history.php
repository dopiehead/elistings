<?php session_start();

require 'engine/configure.php';
require 'engine/get-dollar.php';

if (!isset($_SESSION["id"]) && !isset($_SESSION["business_id"]) && !isset($_SESSION["sp_id"] )) { 
echo"<script>location.href='login.php'</script>";
exit();
}

if (!isset($_SESSION["business_id"])) { 
echo"<script>location.href='dashboafrd.php'</script>";
exit();
}
date_default_timezone_set('Africa/Lagos');
date_default_timezone_get();
?>




<?php 

if (isset($_SESSION["id"])) {
$date = $_SESSION['date'];
$myid = $_SESSION['id'];
}

if (isset($_SESSION["business_id"])) {
$business_date = $_SESSION['business_date'];
$business_id = $_SESSION['business_id'];

}

if (isset($_SESSION["sp_id"])) {
$sp_date = $_SESSION['sp_date'];
$sp_id = $_SESSION['sp_id'];

 }

?>














<!DOCTYPE html>
<html>
<head>
	<title>E-stores | Sold history</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
                  <link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="stylesheet" href="assets/css/flickity.min.css">
  <link rel="stylesheet" href="assets/css/flickity.min.css">
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


table{

 width: 100%;
  border-collapse: separate;
  border-spacing: 20px;
  
  margin-bottom: 50px;
  margin-top: 50px;
}


td{

  font-size: 0.9rem !important;
}

thead tr th{

  opacity: 0.4;
  font-weight: normal;


}


th{

border-bottom: 2px solid rgba(0,0,0,0.8) !important;
border-collapse: collapse;

}

#page_num{

color:green; 
    
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




#package{

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 10px;

width:200px;

display: inline-block;
margin:1em 1em;

}


#priceitem{

font-family:Poppins;
font-weight: bold;
color:black;
opacity: 0.8;
text-transform:capitalize;
font-size:14px;
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
margin-top:-24px;

border-radius:15px 15px 0px 0px;
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


@media only screen and (max-width:767px){

#package{

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.1);
padding: 8px;

width:160px;

display: inline-block;
margin:1em 1em;

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
margin-top:-24px;

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

float:right;
margin-right: 40px;
font-size: 12px;
}

}


div p{


  font-size: 12px;

  width: 100%;

  padding: 15px 30px;

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

text-transform:capitalize;
}



@media only screen and (max-width:497px){


#user_name{

font-size: 14px !important;

}




}


#user_email{

position: relative;

left:18%;

top:-36px;

font-size: 13px !important;

}



@media only screen and (max-width:497px){



#user_email{


position: relative;

margin-left: 33px !important;

margin-top: -21px;

font-size: 13px !important;




}



}




 select{

  font-size: 14px !important;
  margin-top: 10px;
  width: 30%;
  border:2px solid transparent;
  box-shadow: 0px 0px 6px rgba(0,0,0,0.4);
  padding: 5px;


}



 select:focus{

 
  border:2px solid skyblue;

  outline:2px solid skyblue;
  


}






@media only screen and (max-width:767px){






}


@media only screen  and (min-width:498px) and (max-width:767px){

#user_email{

position: relative;

left:22%;

top:-21px;

font-size: 12px !important;

}

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


label{

  font-size: 13px;

  background-color:rgba(240,240,240,0.9);

  padding: 20px 23px;

  width: 100%;
  margin-top: 30px;
}



#product input{

  width: 100%;

  
}
/*--------------------------------------------------------------
# overlay dashboard
--------------------------------------------------------------*/

#overlay{

display: block;
position:relative;
z-index: 300;
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

 #overlay{
    
  display:none;   
    
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

#overlay a{

font-size: 14px !important;
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

  margin-left: 45px;

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


<!------------------------------------------overlay content--------------------------------------------------->

<a id="openbar" onclick="openbar()"><i class="fa fa-bars"></i></a>

<div style="overflow: hidden;">

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

 <a href="order-history.php"><i class="fa fa-shopping-cart"></i> Order History</a><br>


<?php if (isset($_SESSION["sp_id"])) {
?>
<a href="services-provided.php"><i class="fas fa-hard-hat"></i> Service Provided</a><br>
<?php
 }
?>

<?php if (isset($_SESSION['business_id'])) {
 
 echo'<a  id="active" href="sold-history.php"><i class="fa fa-history"></i> Sold History</a><br>';
}


?>

<hr>

<br>


<a href="logout.php" class="button_logout"><img src="assets/icons/icon-park_logout.png"> Logout</a><br><br><br>

</div>




 </div>




  <div class="col-md-9">



<div class="container row"> 
  
  <div class="col-md-6">

<br>
  <h6 style="text-transform:capitalize;">Sold History</h6>

 

</div>

  <div class="col-md-6">

    <?php

    require 'engine/configure.php';
    
    $vendor = mysqli_query($conn,"select * from vendor_profile where id = '$business_id'");

    if ($vendor) {
     
     while ($dataVendor = mysqli_fetch_array($vendor)) {

      $vendorName = $dataVendor['business_name'];

      $vendorImg = $dataVendor['business_image'];

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

<span id="user_name"> <?php echo $_SESSION['business_name'];?></span><br>

<small style="" class="user_email" id="user_email"><?php echo $_SESSION['business_email'];?></small>

<?php

require 'engine/configure.php';
if (isset($_SESSION['business_id'])) {
$you = $_SESSION['business_id'];
$getnotification = mysqli_query($conn,"select * from vendor_notifications where pending = 0 and recipient_id ='".htmlspecialchars($you)."'");
echo'<a href="vendor-notification.php"><span class="bell">&nbsp; <i class="fa-solid fa-bell"></i><span class="notification">';
$countNotifications = $getnotification->num_rows;
if ($countNotifications>0) {
?>
<?php echo$countNotifications;?>
<?php    }  }  ?>
</span></span></a>

  </div>


</div>

<div class="container">

    
<select id="daily">


  <option value="daily">Daily</option>

   <option value="weekly">Weekly</option>

    <option value="monthly">Monthly</option>

     <option value="yearly">Year</option>



</select>

<br>

<?php

require 'engine/configure.php';
$num_per_page =8;
if (isset($_POST['page'])) {
 $page = $_POST['page'];
}
else{
$page = 1;  
}
$initial_page = ($page-1)*$num_per_page; 
$getsales = mysqli_query($conn,"select * from item_detail where user_id = '".$_SESSION['business_id']."'and sold=1 limit $initial_page,$num_per_page");

echo'<table class="table-responsive">

  <thead>


    <tr>
      
      <th>Order ID</th>

      <th>Product</th>
 
      <th>Order Date</th>

      <th>Receiver</th>

      <th>Quantity</th>

      <th>Status</th>
  <th>Price</th>
    
          <th>Total Cost</th>



  
  
    </tr>


  </thead>


  <tbody>';


if ($getsales) {
  while ($row=mysqli_fetch_array($getsales)) {
   

?>



   
    <tr>

      <?php 

      $id = $row['id'];

      $key = "987654";

      $encrypted = $id * $key;

       ?>

   <td><?php echo$encrypted ?></td>

      <td><?php echo$row['product_name']?></td>
 
      <td><?php echo$row['date']?></td>

  

      <td><?php echo"Ezikel Munachimso"?></td>

      <td><?php echo"20"?></td>

 

      

<?php if($row['sold']==1){echo'<td><b style="color:red;">Sold</b></td>';}

else{echo '<td><b style="color:green;">Available</b></td>';}?>
        

           <td><?php echo$row['product_price']?></td>
    
          <td><?php echo"Total Cost";?></td>


    </tr>

 





<?php
  
  }
}


?>

  </tbody>
  



</table>

<div style="text-align: right;margin-right: 50px;">


<?php
$radius=3;
$pageres = mysqli_query($conn,"select * from item_detail where user_id = '".$_SESSION['business_id']."'and sold=1");
$numpage = $pageres->num_rows;
$total_num_page =ceil($numpage/$num_per_page);
?>
<div align='center'>
<?php
echo "<br>";
if ($page>1) {
$previous = $page-1;
echo'<span id="page_num"><a href="sold-history?page=$previous" style="" class="btn-success prev" id="'.$previous.'">&lt;</a></span>';
}
for ($i=1; $i<=$total_num_page; $i++) { 
if(($i >= 1 && $i <= $radius) || ($i > $page - $radius && $i < $page + $radius) || ($i <= $total_num_page && $i > $total_num_page - $radius)) {
if($i == $page) {echo'<span id="page_num"><a  href="sold-history?page=$i" class="btn-success active-button" id="'.$i.'">'.$i.'</a></span>';}
  }
elseif($i == $page - $radius || $i == $page + $radius) {
 echo "... ";
}
elseif ($page==$i) {
}
else{
echo'<span id="page_num"><a href="sold-history?page=$i" class="btn-success" id="'.$i.'">'.$i.'</a></span>';
}
} 
if ($page<$total_num_page) {
$next = $page+1;
echo'<span id="page_num"><a href="sold-history?page=$next" style="" class="btn-success next" id="'.$next.'">&gt;</a></span>';

echo'<input type="hidden" id="user_type" value="service provider">';


}


?>

</div>







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




<script>

function openbar() {
 
 $("#overlay").toggle();  
    
}
    
</script>





</body>
</html>