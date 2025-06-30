<?php session_start();

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
$myid = $_SESSION['id'];
}

if (!empty($_SESSION["business_id"])) {
$business_date = $_SESSION['business_date'];
$business_id = $_SESSION['business_id'];

}

if (!empty($_SESSION["sp_id"])) {
$sp_date = $_SESSION['sp_date'];
$sp_id = $_SESSION['sp_id'];

 }

?>


<!DOCTYPE html>
<html>
<head>
	<title>E-stores | Job Experience</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/flickity.min.css">
  <script src="assets/js/sweetalert.min.js"></script> 
  <script src="assets/js/jquery-1.11.3.min.js"></script>
<script src="assets/js/flickity.pkgd.min.js"></script>
<style type="text/css">

body{

  font-family: poppins;
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
}



@media only screen and (max-width:497px){


#user_name{

font-size: 13px !important;

}




}













#user_email{

position: relative;

left:17%;

top:-40px;

font-size: 13px !important;

}



@media only screen and (max-width:497px){



#user_email{


position: relative;

margin-left: 8px;

margin-top: -18px;

font-size: 12px !important;




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

  margin-left: 20px;

  position: relative;

  top: -40px;


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

<a href="Profile.php"><img src="assets/icons/icon-park-outline_add-pic.png"> Profile</a><br>


<a href="messages.php" ><i class="fa fa-envelope"></i> Messages</a><br>


<?php if (isset($_SESSION["sp_id"])) {
?>
<a href="services-provided.php">Service Provided</a><br>
<?php
 }
?>

<?php if (isset($_SESSION['business_id'])) {
 
 echo'<a  id="active" href="sold-history.php">Sold History</a><br>';
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
    

<img id="user_image" src="<?php echo $vendorImg;?>">

<span id="user_name"> <?php echo $_SESSION['business_name'];?></span><br>

<small style="" class="user_email" id="user_email"><?php echo $_SESSION['business_email'];?></small>

<?php

require 'engine/configure.php';
if (isset($_SESSION['business_id'])) {
$you = $_SESSION['business_id'];
$getnotification = mysqli_query($conn,"select * from vendor_notifications where recipient_id ='".htmlspecialchars($you)."'");
echo'<span class="bell">&nbsp; <i class="fa-solid fa-bell"></i><span class="notification">';
$countNotifications = $getnotification->num_rows;
if ($countNotifications>0) {
?>
<?php echo$countNotifications;?>
<?php    }  }  ?>
</span></span>

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



<table>

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


  <tbody>
  
   
    <tr>

   <td>ID4949494</td>

      <td>Bag of Rice</td>
 
      <td>11/20/2023</td>

  

      <td>Ezikel Munachimso</td>

      <td>20</td>

      <td><b style="color:red;">Pending</b></td>

        

           <td>$2,000</td>
    
          <td>Total Cost</td>


    </tr>

 <tr>

   <td>ID4949494</td>

      <td>Bag of Rice</td>
 
      <td>11/20/2023</td>

      <td>Ezikel Munachimso</td>

      <td>20</td>

      <td><b style="color:yellow;">Processings</b></td>

        

           <td>$2,000</td>
    
          <td>Total Cost</td>


    </tr>


 <tr>

   <td>ID4949494</td>

      <td>Bag of Rice</td>
 
      <td>11/20/2023</td>

      

      <td>Ezikel Munachimso</td>

      <td>20</td>

      <td><b style="color:green;">Delivered</b></td>

        

           <td>$2,000</td>
    
          <td>Total Cost</td>


    </tr>













  </tbody>
  



</table>

<div style="text-align: right;margin-right: 50px;">

<a class="btn btn-info" href="">Next <i class="fa fa-arrow-right"></i></a> page <b style="padding: 3px 9px; margin:0px 20px;background-color: rgba(192,192,292,0.4);">1</b> 20

</div>







  </div>



</div>

</div>












</body>
</html>