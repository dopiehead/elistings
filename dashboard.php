<?php session_start();


if (isset($_SESSION["admin_email"])) { 
  
echo"<script>location.href='admin.php'</script>";

}


if (!isset($_SESSION["id"]) && !isset($_SESSION["business_id"]) && !isset($_SESSION["sp_id"] )) { 
echo"<script>location.href='login.php'</script>";
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
$you = $_SESSION['sp_email'];
}
?>


<?php 

require 'engine/configure.php';

if(isset($_SESSION['business_id'])){
$getviews =  mysqli_query($conn,"select sum(views) as views from item_detail where user_id = '".htmlspecialchars($userId)."'");
}

if(isset($_SESSION['sp_id'])){
$getviews =  mysqli_query($conn,"select sum(views) as views from service_providers where sp_id = '".htmlspecialchars($userId)."'");
}

       while ($row = mysqli_fetch_array($getviews)) {

       $audience = round($row['views']/100);

       $percentage = 100 - ($audience);
         
       }
?>


<!DOCTYPE html>
<html>
<head>
	<title>E-stores | dashboard </title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/flickity.min.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="assets/js/sweetalert.min.js"></script> 
  <script src="assets/js/jquery-1.11.3.min.js"></script>
<script src="assets/js/flickity.pkgd.min.js"></script>

<style type="text/css">

body{

  font-family: poppins;
}


#discount{

  display: none;
}



#count{


color:white;
background-color: red;
border-radius: 50%;
padding:0px 5px !important;
font-weight: bold;
position: absolute;
right:;
margin-top: -5px;
font-size: 10px;
z-index: 1;

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


#views{

  display: none;
}

#user_image{

  height: 80px;

  width: 80px;

  border-radius: 50%;

  padding: 5px;

  border:2px solid skyblue;


}


#request{
display: inline-block;
width:187px;
background-color:#cce6ff;
margin-right:6px;
margin-bottom: 10px;
padding:7px;
border-radius: 15px;
}




@media only screen and (max-width:497px){

#request{
display: inline-block;
width:100%;
background-color:#cce6ff;
margin-right:6px;
margin-bottom: 10px;
padding:7px;
border-radius: 15px;
}



}





#request h6{

  color:blue;

  font-weight: bold;

  font-size: 14px;
}



@media only screen and (max-width:497px){


#request h6{

  color:blue;

  font-weight: bold;

  font-size: 18px;
}




}









#request p{



font-size: 21px;

color:blue;

font-weight: bold;


}


#request .fa-star{


  color:white;

 font-size:0.8rem;

 
}



#deals{

background-color: red;

border:1px solid transparent;

border-radius:50%;

padding:8px;


}


#listings{


background-color:green;

border:1px solid transparent;

border-radius:50%;

padding:8px;
}




 .fa-shopping-cart{color: white;background-color: green;border-radius: 50%;padding: 8px;font-size:13px; }
.fa-eye{color: white;background-color: rgba(192,192,192,0.7);border-radius: 50%;padding: 8px;}
.fa-share-alt{color: white;background-color:red;border-radius: 50%; padding: 8px;}
.fa-comments{color: white;background-color:skyblue;border-radius: 50%;padding: 8px;}





#bar-chart{
padding: 20px;

border:2px solid rgba(0,0,70,0.3);

margin-top: 25px;

border-radius: 15px;

}



#star{

  font-size:11px;

  color:blue;
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





 #label{

font-size: 12px;


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


margin-right: 25px;
font-size: 12px;
}


#battery{

  font-size: 11px;
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

font-size: 14px !important;
text-transform:capitalize;

}

#user_email{

position: relative;

left:23% !important;

top:-36px;

font-size: 13px !important;

}



}


#user_email{

position: relative;

left:17.5%;

top:-36px;

font-size: 13px !important;

}



@media only screen and (max-width:767px){



#user_email{


position: relative;

margin-left: 0px;

margin-top: -18px;

font-size: 13px !important;




}



}




 select{

  font-size: 12px !important;
  margin-top: 10px;


}

@media only screen  and (max-width:498px){

 select{

  font-size: 13px !important;
  margin-top: 10px;


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
# circle
--------------------------------------------------------------*/



#higher{

  margin-bottom: 10px;

  margin-top: 10px;

 color: skyblue !important;

  font-size: 25px;

  margin-left: 10px;
}






#high{

  margin-bottom: 10px;

  margin-top: 10px;

 color: rgba(192,192,192,0.6) !important;

  font-size: 25px;

  margin-left: 10px;
}



#highest{

  margin-bottom: 10px;

  margin-top: 10px;

 color: skyblue !important;

  font-size: 25px;

  margin-left: 10px;
}


@media only screen and (max-width:497px){




}


/*--------------------------------------------------------------
# pie chart
--------------------------------------------------------------*/


  .chart-container {
    position: relative;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    background: conic-gradient(
      red 0% 45%,
      green 45% 70%,
      lightblue 70% 90%,
      rgba(192,192,192,1) 90% 100%
    );
  }



  .chart-inner {
    position: absolute;
    top: 25px; /* Adjust to control the inner circle size */
    left: 25px; /* Adjust to control the inner circle size */
    width: 150px; /* Adjust to control the inner circle size */
    height: 150px; /* Adjust to control the inner circle size */
    border-radius: 50%;
    background-color:#f1f1f1;
  }

  
  .label {
    position: absolute;
    font-size: 14px;
    font-weight: bold;
  }
  .label.red { color: yellow; top: 5px; left: 110px; }
  .label.green { color: green; top: 110px; right: 5px; }
  .label.lightblue { color: lightblue; bottom: 5px; left: 45px; }
  .label.blue { color: blue; bottom: 60px; left: 5px; }










/*--------------------------------------------------------------
# progress circle
--------------------------------------------------------------*/




.progress-circle {
    position: relative;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background: conic-gradient(skyblue 0% <?php echo$audience."%" ?>, #ddd <?php echo$audience."%" ?> 100%);
}

.progress-circle::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 80%;
    height: 80%;
    background-color: #fff;
    border-radius: 50%;
    transform: translate(-50%, -50%);
}

.progress-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 14px;
    color: #333;
    text-align: center;
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


.active{
    
    display:none;
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



#cart{
background-color:none !important;
border-radius:none !important;
}


@media only screen and (max-width:497px){

#overlay a{
padding: 5px;
font-size:15px !important;
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

<div style="overflow-y: hidden;overflow: hidden;">

<div style="" class="  row">

<div id="overlay" class="col-md-3">

<div class="overlay-content">

<a href="index.php" class="button_home" ><img src="assets/icons/Vector.png"> Home<span id="date"><?php echo date("F d, Y");?></span></a><br>
<a id="active" href="" class="button_dashboard"><img src="assets/icons/round-dashboard.png"> Dashboard</a><br>

<?php 
if (isset($_SESSION['business_id'])) {
    

echo'<a href="postadvert.php"><img src="assets/icons/healthicons_person.png"> Post product<i class="fa fa-caret"></i> </a><br>';
echo'<a href="mylistings.php" > <img src="assets/icons/material-symbols_box-add-outline.png"> My listing</a><br>';

}
?>
<a href="profile.php"><img src="assets/icons/icon-park-outline_add-pic.png"> 

Profile</a><br>

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

<?php } else {?>




<a href="messages.php"><i class="fa fa-envelope"></i> Messages(<?php echo $inbox  ?>)</a><br>

<?php } ?>



<a href="order-history.php"><i id="cart" class="fa fa-shopping-cart" style="background:none;color:black;padding:0px;"></i> Order History</a><br>

<?php if (isset($_SESSION["sp_id"])) {
?>
<a href="services-provided.php"><i class='fas fa-hard-hat'></i> Service Provided</a><br>
<a href="work-experience.php"><i class='fa fa-history'></i> Work Experience</a><br>
<?php
 }
?>

<?php if (isset($_SESSION['business_id'])) {
 
 echo'<a href="sold-history.php"><i class="fa fa-history"></i> Sold History</a><br>';
}


?>






<hr>

<br>


<a href="logout.php" class="button_logout"><img src="assets/icons/icon-park_logout.png"> Logout</a>

<br><br><br>
</div>



 </div>




  <div class="col-md-9">

<div class="container">

<div class=" row"> 
  
  <div class="col-md-6">
 
<?php if (isset($_SESSION['business_id'])) {
    //Check if user is a vendor
 $username = $_SESSION['business_name'];

 $useremail = $_SESSION['business_email'];

}

    //Check if user is a service provider
if (isset($_SESSION['sp_id'])) {

  $sp_id = $_SESSION['sp_id'];

 $username = "<a style='text-decoration:none;color:black' href='sp_details.php?sp_id=$sp_id'>".$_SESSION['sp_name']."</a>";

 $useremail = $_SESSION['sp_email'];

}
    //Check if user is a buyer
if (isset($_SESSION['id'])) {

 $username = $_SESSION['name'];

 $useremail = $_SESSION['email'];



}
?>
<br>




  <h6>Overview</h6>

 

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
     ?>


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



<div class="">


    <div  id="label">

    <div class="row">
      
    <div class="col-md-8">
      
   
    <div id="request">

      <h6>Total request</h6>

      <p><?php echo$countNotifications?></p><br>

      <i id="deals" class="fa fa-star"></i>  <span id="star"><span style="color: red;"> -12.76</span> than last month</span>

    </div>
    
  <?php  if (isset($_SESSION['business_id'])) { ?>
 
 <div  id="request">
      
 <h6>Total listings</h6>
 <?php
 
 $get_listings = mysqli_query($conn,"select * from item_detail where user_id = '".$_SESSION['business_id']."' ");
 
 ?>
 
 
 

      <p><?php if($get_listings->num_rows>0){ echo $get_listings->num_rows;} else{echo"0";} ?></p><br>

      <i id="listings" class="fa fa-star"></i> <span id="star"><span style="color:green;"> +343</span> than last month</span>


    </div>

<?php
}
?> 




  <?php  if (isset($_SESSION['sp_id'])) { ?>
 
 <div  id="request">
      
 <h6>Total Jobs</h6>
 <?php
 
 $get_listings = mysqli_query($conn,"select * from work_experience where sp_id = '".$_SESSION['sp_id']."' ");
 
 ?>
 
 
 

      <p><?php if($get_listings->num_rows>0){ echo $get_listings->num_rows;} else{echo"0";} ?></p><br>

      <i id="listings" class="fa fa-star"></i> <span id="star"><span style="color:green;"> +343</span> than last month</span>


    </div>

<?php
}
?> 


    <div  id="request">
<?php

require 'engine/configure.php';
if (isset($_SESSION['id'])) {
$you = $_SESSION['id'];
$deals = mysqli_query($conn,"select * from buyer_notifications where recipient_id ='".htmlspecialchars($you)."' and pending = 0");
} 

if (isset($_SESSION['business_id'])) {
$you = $_SESSION['business_id'];
$deals = mysqli_query($conn,"select * from vendor_notifications where recipient_id ='".htmlspecialchars($you)."'and pending = 0");
} 

if (isset($_SESSION['sp_id'])) {
$you = $_SESSION['sp_id'];
$deals = mysqli_query($conn,"select * from sp_notifications where recipient_id ='".htmlspecialchars($you)."'and pending = 0");
} 

$donedeals = $deals->num_rows;
if ($donedeals>0) {
?>
<?php echo$donedeals;?>
   <?php   }  else{$donedeals="0";} ?>


       <h6>Done Deals</h6>

      <p><?php echo$donedeals?></p><br>

      <i id="deals" class="fa fa-star"></i>  <span id="star"><span style="color:red;"> -12.76</span> than last month</span>



    </div>
<?php

if(isset($_SESSION['business_id'])){

$getproduct = mysqli_query($conn, "SELECT user_id, product_name, product_price FROM item_detail WHERE user_id = '" . htmlspecialchars($_SESSION['business_id']) . "' AND sold = 0");

if ($getproduct->num_rows > 0) {
    $data = array(); // Initialize an array to store products

    while ($product = mysqli_fetch_array($getproduct, MYSQLI_ASSOC)) {
        // Build each product entry
        $entry = array(
            'product' => $product['product_name'],
            'sales' => (int)$product['product_price'] // assuming product_price is numeric
        );

        $data[] = $entry; // Add the product entry to the data array
    }

    // Convert PHP array to JSON format
    $json_data = json_encode($data);
    
 

  
}

}
?>



<?php

if (isset($_SESSION['sp_id'])) {


    // Prepare and execute SQL query
    $getproduct = mysqli_query($conn, "SELECT sp_id, title, charge FROM work_experience WHERE sp_id = '".$_SESSION['sp_id']."'");

    if ($getproduct) {
        if ($getproduct->num_rows > 0) {
            $data = array(); // Initialize an array to store products

            while ($product = mysqli_fetch_assoc($getproduct)) {
                // Build each product entry
                $entry = array(
                    'product' => $product['title'],
                    'sales' => (int)$product['charge'] // assuming charge is numeric
                );

                $data[] = $entry; // Add the product entry to the data array
            }

            // Convert PHP array to JSON format
            
            $json_data = json_encode($data);
            
        } else {
            echo json_encode(array('error' => 'No data found for sp_id'));
        }
    } else {
        echo json_encode(array('error' => 'Query failed: ' . mysqli_error($conn)));
    }

} // End of isset($_SESSION['sp_id']) check
?>







 <?php if(isset($_SESSION['business_id']) || isset($_SESSION['sp_id'])){?> 
<div id="bar-chart">

  <br>
  
<?php if($getproduct->num_rows > 0){ ?>
<h6><?php if(isset($_SESSION['business_id'])){echo"Sales Data";} else{echo "Work history";}?></h6>

            <canvas id="barChart" style="width:100%;max-width:800px"></canvas>
<?php } ?>

</div>
<?php } ?>

<br><br>
    </div>
    
 <?php if(isset($_SESSION['business_id']) || isset($_SESSION['sp_id'])){?> 

   <div class="col-md-4">
     
<div style="border:2px solid rgba(0,0,0,0.1);padding: 5px;border-radius: 10px;">
     <h6>Previous month performance</h6> 

      

<div class="chart-container">

 <?php 

if(!empty($_SESSION['business_id'])) {
 
 $cart = mysqli_query($conn,"select * from checkout where seller = '".$_SESSION['business_id']."'");
if ($cart->num_rows>0) { $added = round($cart->num_rows/100);
 } else{$added = 1;}

$views =  mysqli_query($conn,"select sum(views) as views from item_detail where user_id = '".$_SESSION['business_id']."'");
if ($views->num_rows>0) {
while ($myviews = mysqli_fetch_array($views)) {
  $perview = round($myviews['views']/100);
 } 
 
}

$reviews = mysqli_query($conn,"select seller_comment.product_name, item_detail.id,item_detail.user_id from seller_comment,item_detail where item_detail.user_id = '".$_SESSION['business_id']."'");
$perReviews =round($reviews->num_rows/100); 

$remainder = 100-($perview + $added + $perReviews);
}


if(!empty($_SESSION['sp_id'])) {
 
 
 $cart = mysqli_query($conn,"select * from work_experience where sp_id = '".$_SESSION['sp_id']."'");
if ($cart->num_rows>0) { $added = round($cart->num_rows/100);
 } else{$added = 1;}

$views =  mysqli_query($conn,"select sum(views) as views from service_providers where sp_id = '".$_SESSION['sp_id']."'");
if ($views->num_rows>0) {
while ($myviews = mysqli_fetch_array($views)) {
  $perview = round($myviews['views']/100);
 } 
 
}

$reviews = mysqli_query($conn,"select sp_comment.sp_id, service_providers.sp_id from sp_comment,service_providers where sp_comment.sp_id = '".$_SESSION['sp_id']."' and sp_comment.sp_id = service_providers.sp_id");
$perReviews =round($reviews->num_rows/100); 

$remainder = 100-($perview + $added + $perReviews);
}





 ?>    




<div class="chart-container">
<?php
// Example data (replace with your actual data retrieval logic)
$piedata = [
    ['category' => 'Added to cart', 'percentage' => $added],
    ['category' => 'Views', 'percentage' => $perview],
    ['category' => 'Shares', 'percentage' => $remainder],
    ['category' => ' Reviews', 'percentage' => $perReviews],
];

// Convert PHP array to JSON format
$json_Datapie = json_encode($piedata);
?>
<script>
var jsonDatapie = <?php echo $json_Datapie; ?>;
</script>


 <canvas id="pieChart"  style="width:100%;"></canvas>


 </div> 

</div>


<div class="row">
 <div class="col-md-6 col-6"><i class="fa fa-shopping-cart"></i><span style="font-size:13px;"> Added to cart</span></div>
 <div class="col-md-6 col-6"><i class="fa fa-eye"></i> <span style="font-size:13px;">Views</span></div>
<div class="col-md-6 col-6"><i class="fa fa-share-alt"></i><span style="font-size:13px;"> Shares</span></div>
<div class="col-md-6 col-6"><i class="fa fa-comments"></i><span style="font-size:13px;"> Reviews</span></div>
</div>




</div>

    </div>



    </div>




<br>

<div class="row">
  
<div class="col-md-4" id="audience">

<div style="border:2px solid rgba(0,0,0,0.1);padding: 5px;border-radius: 10px;">
  <h6><b>Reached Audience</b></h6><br>



 <span><i id="higher" class="fa fa-circle"></i><b><?php echo$audience ?>% audience</b></span>

<br>

 <span><i id="high" class="fa fa-circle"></i><b> <?php echo $percentage?> % audience</b></span>



<div class="progress-circle">

<span class="progress-text"> <?php $getQuery = mysqli_query($conn,"select * from messages where receiver_email = '".htmlspecialchars($useremail)."'"); 
$countmessages=$getQuery->num_rows;
if ($countmessages>0) {
 $percentage_progress = ($countmessages/100);
echo ($percentage_progress)."% Interaction" ;

}     ?></span>

</div>

</div>
<br>
</div>

<div class="col-md-4" id="target">

<div style="border:2px solid rgba(0,0,0,0.1);padding: 5px;border-radius: 10px;">

  <h6><b>Target</b></h6>

 <span>

<i id="highest" class="fa fa-circle"></i><b><?php echo round($perview) ?> % Target reached</b></span>
<?php 

$graphdata = array(
    array("label" => "January", "value" => 0),
    array("label" => "February", "value" => 0),
    array("label" => "March", "value" => 3),
    // More data...
);
$graphdata = json_encode($graphdata);

?>

<canvas id="myChart" width="400" height="400"></canvas>

<script>
    var cta = document.getElementById('myChart').getContext('2d');
    var $graphdata = <?php echo $graphdata; ?>;
    var labels = $graphdata.map(entry => entry.label);
    var values = $graphdata.map(entry => entry.value);
    var myChart = new Chart(cta, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Target ',
                data: values,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</div>
<br>
</div>

<div class="col-md-4">

<div style="border:2px solid rgba(0,0,0,0.1);padding: 5px;border-radius: 10px;">

  <h6 id="Engagements"><b>Engagements</b></h6><br>

<div class="progress-circle">

<span class="progress-text"><?php if(empty($percentage_progress)){$percentage_progress=0;}  $Engagements = ($percentage_progress + $countmessages); if($Engagements>0) {echo round($Engagements)/100;}else{echo "0";} ?>% Interaction</span>

</div>
    </div>


</div>

</div>



     </div>



  </div>



</div>

</div>

<?php } ?>





<script>
        // Access jsonData variable containing PHP JSON data
        var jsonData_pie = <?php echo $json_Datapie; ?>;

        // Prepare data for Chart.js
        var labels = jsonData_pie.map(function(item) {
            return item.category;
        });
        var data = jsonData_pie.map(function(item) {
            return item.percentage;
        });

        // Create a new pie chart
        var ptx = document.getElementById('pieChart').getContext('2d');
        var myPieChart = new Chart(ptx, {
            type: 'pie',
            data: {
                labels:,
                datasets: [{
                    label: 'Previous Month performance',
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw.toFixed(2) + '%';
                            }
                        }
                    }
                }
            }
        });
    </script>
    
    
    
<script>
        // Access jsonData variable containing PHP JSON data
        var jsonData = <?php echo $json_data; ?>;

        // Prepare data for Chart.js
        var labels = jsonData.map(function(item) {
            return item.product;
        });
        var data = jsonData.map(function(item) {
            return item.sales;
        });

        // Create a new bar chart
        var ctx = document.getElementById('barChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Sales Data',
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    
    
    
    
    
    
    

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