<?php session_start();
if (!isset($_SESSION["id"]) && !isset($_SESSION["business_id"]) && !isset($_SESSION["sp_id"] )) { 
echo"<script>location.href='login.php?step=messages'</script>";
exit();
}

if (isset($_SESSION["business_id"]) && isset($_SESSION["id"])) { 
echo"<script>location.href='messages.php'</script>";
exit();
}
date_default_timezone_set('Africa/Lagos');

date_default_timezone_get();
 ?>
<?php 


if (isset($_SESSION['sp_id'])) {
$you = $_SESSION['sp_email'];
$userId = $_SESSION['sp_id'];

}
if (isset($_SESSION['id'])) {
$you = $_SESSION['email'];
$userId = $_SESSION['id'];

}

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



td a{

  font-size: 0.7rem !important;
}
#refresh, .mark, #trash {

border:2px solid skyblue;

padding: 4px 10px;

margin: 0px 5px;

  color: skyblue !important;

  cursor: pointer;


}


@media only screen and (max-width:767px){


 .mark{

border:2px solid skyblue;

padding: 4px 10px;

margin: 0px 5px;

  color: skyblue !important;

  cursor: pointer;

  font-size: 0.55rem !important;
  
  display:none !important;


}

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



#inbox{

   width: 70%
}

@media only screen and (max-width:767px){

 #inbox{

   width:45%
}


}


#sender, #subject, #td_date{

opacity: 0.7;

}


#subject{

  width: 60%;
}


#td-action{

width: 80px; text-align: center;
}



#td-from{
width: 250px; text-align: center;
}



#td-subject{
 width: 450px; text-align: center;

}


#td-date{

width: 220px; text-align: center;


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



.btn-search{

  color: white !important;

  float: right;

  margin-top: -20px;

  display: none;
}


input[type=search]{

  font-size: 13px;

  margin:  20px 0px;
}


#messages_home .btn-primary, #messages_home .btn-trash{

font-size:0.8rem;

}




#messages_home .btn-primary{

border-right: 2px solid black;

}



#messages_home .btn-trash{

background-color: inherit;

border-right: 2px solid black;



color:black!;



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


.computer_details input{

font-size: 12px;
margin-left: 45px;

border:1px solid transparent;

box-shadow: 0px 0px 3px rgba(0,0,0,0.6);


}


.computer_details input:focus{

outline: 2px solid skyblue !important;
border:2px solid skyblue !important;


}

.computer_details label{

font-size: 12px;


}

input,textarea{

font-size: 12px;

}


input[type=text]{


  font-size: 12px !important;
}


input::placeholder{


  text-align: center;
}

#active{

  background-color:white;

  width: 100%;

}



@media only screen and (max-width:767px){

input::placeholder{


  text-align: left;
}

#date{

float:right;
margin-right: 31px;
font-size: 12px;
}


#battery{

  font-size: 11px;
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
}



@media only screen and (max-width:497px){


#user_name{

font-size: 14px !important;
text-transform:capitalize;

}




}

#user_email{

position: relative;

left:18%;

top:-37px;

font-size: 13px !important;

}



@media only screen and (max-width:497px){



#user_email{


position: relative;

margin-left: 29px !important;

margin-top: -18px;

font-size: 13px !important;




}



}




 select{

  font-size: 12px !important;
  margin-top: 10px;


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


#label{

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

  top: -56px;


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
}
?>


<?php if (isset($_SESSION['business_id'])) {

 echo'<a href="mylistings.php"> <img src="assets/icons/material-symbols_box-add-outline.png"> My listing</a><br>';

  }


?>  

<a href="profile.php"><img src="assets/icons/icon-park-outline_add-pic.png"> Profile</a><br>

<a id="active"><i class="fa fa-envelope"></i> Messages</a><br>

<?php if (isset($_SESSION["sp_id"])) {
?>
<a href="services-provided.php"><i class='fas fa-hard-hat'></i> Service Provided</a><br>

<a href="work-experience.php"><i class='fa fa-history'></i> Work Experience</a><br>

 <a href="order-history.php"><i class="fa fa-shopping-cart"></i> Order History</a><br>
<?php
 }
?>

<?php if (isset($_SESSION['business_id'])) {
 
 echo'<a href="sold-history.php">Sold History</a><br>';
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

 
<?php 

    //Check if user is a service provider
if (isset($_SESSION['sp_id'])) {

$sp_id =  $_SESSION['sp_id'];
$username =  "<a href='sp_details.php?sp_id=$sp_id'>".$_SESSION['sp_name']."</a>";
$useremail = $_SESSION['sp_email'];

}
    //Check if user is a buyer
if (isset($_SESSION['id'])) {
$username = $_SESSION['name'];
$useremail = $_SESSION['email'];



}
?>

  <h6 style="text-transform:capitalize;">Hello, <?php echo $username;?> </h6>

 

</div>

  <div class="col-md-6">


<?php

       //Check if user is a  service provider

if (isset($_SESSION['sp_id'])) {
require 'engine/configure.php';
$vendor = mysqli_query($conn,"select * from service_providers where sp_id = '$userId'");
if ($vendor) {
 while ($dataVendor = mysqli_fetch_array($vendor)) {
$vendorName = $dataVendor['sp_name'];
$vendorImg = $dataVendor['sp_img'];
 }
}
}
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
<img id="user_image" src="<?php echo $vendorImg;?>">
<span id="user_name"> <?php echo $username?></span><br>
<small style="" class="user_email" id="user_email"><?php echo $useremail;?></small>




<?php


require 'engine/configure.php';
if (isset($_SESSION['sp_id'])) {
$you_id = $_SESSION['sp_id'];
$getnotification = mysqli_query($conn,"select * from sp_notifications where recipient_id ='".htmlspecialchars($you_id)."'");
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
$you_id = $_SESSION['id'];
$getnotification = mysqli_query($conn,"select * from buyer_notifications where recipient_id ='".htmlspecialchars($you_id)."' and pending =0 ");
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





<script>

$(document).ready(function(){
$('.remove').click(function(){
if(confirm("Are you sure you want to delete this?"))
  {
var id = $(this).attr('id');
var rowElement =$(this).parent().parent();
$.ajax({
url:'engine/remove-received.php',
method:'POST',
data:{'id':id},
success:function(response)
     {
     if (response==1) {
       swal({
         
         text:"Message has been deleted",
         icon:"success",


       });

       rowElement.fadeOut('slow').remove();
} 

else{
swal({icon:"error",
  text:response
});

}
     }
     
    });
   }
   });
 
});

</script>




<script>

$(document).ready(function(){
 $('.removeSent').click(function(){
  if(confirm("Are you sure you want to delete this?"))
  {
   var id = $(this).attr('id');
var rowElement =$(this).parent().parent();
$.ajax({
     url:'engine/remove-sent.php',
     method:'POST',
     data:{id:id},

     success:function(response)
     {
     
      if (response==1) {
       swal({
         
         text:"Message has been deleted",
         icon:"success",


       });

       rowElement.fadeOut('slow').remove();
} 

else{

swal(response);

}


     }
     
    });
   }
   
  

 });
 
});

</script>

<script>

function openbar() {
 
 $("#overlay").toggle();  

}
    
</script>
</body>
</html>
