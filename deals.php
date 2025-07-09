<?php  session_start();

 require 'engine/configure.php';  
 require 'engine/get-dollar.php';
if(isset($_POST["submit"]))   {  
if(!empty($_POST["search"]))   {  
$query = str_replace(" ", "+", mysqli_real_escape_string($conn,$_POST["search"]));
header("location:search-process.php?search=" .htmlspecialchars($query)); 
 }  

 }  

 ?>   
<?php



if (isset($_SESSION['business_id'])) {
$buyer = $_SESSION['business_id'];
}
if (isset($_SESSION['sp_id'])) {
$buyer = $_SESSION['sp_id'];
}
if(isset($_SESSION['id'])) {
$buyer = $_SESSION['id'];
} 

?>



<!DOCTYPE html>
<html>
<head>
  <title>E-stores | Deals </title>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/flickity.min.css">
  <link rel="stylesheet" href="assets/css/btn_scroll.css">
          <link rel="stylesheet" href="assets/css/overlay.css">
                     <link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="stylesheet" href="assets/css/cart.css">
  <script src="assets/js/sweetalert.min.js"></script> 
  <script src="assets/js/jquery-1.11.3.min.js"></script>
<script src="assets/js/flickity.pkgd.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.lazy.min.js"></script>


<style type="text/css">


/*--------------------------------------------------------------
# Body styles
--------------------------------------------------------------*/
  
body{
 
font-family: poppins;

}

.active-link{ color:red;}


.back-button-container {
    position:absolute; /* Fixed position to stay at the top */
    top: 50px;
    left: 0;
    width: 100%;
    padding: 10px; /* Padding around the button */
    z-index:; /* Ensure it's above other content */
}

.back-button {
    text-decoration: none;
    color: #333; /* Text color of the button */
    font-weight: bold;
    padding: 8px 12px;
    border: 1px solid white !important; /* Border style */
    border-radius: 4px; /* Rounded corners */
}

.back-button:hover {
    background-color: #333; /* Background color on hover */
    color: white !important; /* Text color on hover */
}






h1 img{
margin-left: 10px;

}

.alert-success{

  font-size: 12px;

    animation: fade 3s forwards;

    animation-delay:1s;

}


#think{
margin-left: 210px !important;

}

@media only screen and (max-width:797px){
#think{
margin-left: 30px !important;

}
}


@media only screen and (min-width:497px) and (max-width:797px){
#think{

font-size: 0.8rem;

}
}



@media only screen and (max-width:497px) {
    
h6{    
font-size:21px !important;  
}
}






#fadeOut{

    color:red;

  font-size:12px;

  animation: fade 3s forwards;

    animation-delay:1s;
  
}

.hide{
  display: none;
  position: absolute;
  color: white ;
  background-color:rgba(0,0,0,0.6) !important;
  margin-top:5px;
  font-size: 12px;
  padding: 0px 3px;
  text-align: center;
  right: 30px;
  margin-right: 30px;
  


}

.btn-hover{
  cursor: pointer;
}

.btn-hover:hover + .hide{

  display: block !important;
}



@keyframes fade{


0%{

  opacity: 1;
}


100%{

  opacity: 0;
}

}













#show_product a{ 

font-size:12px;
color: black;



}



.menu_sp{

  margin-right: 25px;
}


.service_providers{

  width: 100%;

  font-size: 13px !important;

  text-align: center;

}

.menu_sp img{

  width: 200px;

  height: 200px;

border-radius: 50%;
}


.menu_sp a{

 color: black;

}

.menu_sp a:hover{

opacity: 0.6;

text-decoration: none;

}





@media only screen and (max-width:767px){


.menu_sp img{

  width: 150px;

  height: 150px;

border-radius: 50%;
}


.menu_sp a{

 color: black;
 
 font-size:15px;
 
 text-transform:capitalize;

}




}





.flickity-page-dots{

 
  bottom: -35px;
}


 .flickity-page-dots .dot{

  width:100px !important;
  height: 6px;
  margin: 0 !important;
  border-radius: 0 !important;
  
}

@media only screen and (max-width:767px){


 .flickity-page-dots .dot{

  width:40px !important;
  height: 4px;
  margin: 0 !important;
  border-radius: 0 !important;
  
}


}



.flickity-page-dots .dot.is-selected{

  background-color:rgba(255,165,50,1);
}




.nav_login,.nav_signup{

font-weight: normal !important;
font-size: 13px;

}

.banner figcaption{

font-size: 12px;

}



.nav_signup{


border:1px solid none;
border-left:1px solid white;
border-left-color: rgba(192,192,192,1);
margin-left:0px;



}

.nav_login{



margin-left:50px;

}




#coca_cola img{

  
width:100%;


}


@media only screen (max-width:498px){



#coca_cola{

  
width:100%;

display:none !important;

padding:20px;


}

}




.discount_main{

  

  margin-top: 15px;

  width: 100%;

  height: 50px;

  background-color:white;


  border:1px solid transparent;


  text-transform: capitalize;
}




.discount_main .btn-success{

 
 margin-top: -33.5px;

 float: right; 

 font-size: 12px;

 margin-right: 1px;

 border-radius: 0px 15px 15px 0px;

}




.discount_main select{

 margin: 0px 10px;

 border:1px solid transparent;

 box-shadow: 0px 0px 4px rgba(0,0,0,0.3);

 font-size: 13px;

 font-weight: bold;

}


.discount_main select:focus{

outline: 2px solid skyblue;

}


.discount_main select:selected{

background-color: green;

}





@media only screen and (max-width:498px){

.discount_main .btn-success{

 
 margin-top: -37px;

 float: right; 

 font-size: 12px;

 margin-right: -4px;

 border-radius: 0px 15px 15px 0px;

}

}



@media only screen and (max-width:498px){

.discount_main { 



font-size: 10px;

text-align: left !important;


}

.nav_login, .nav_signup{
    
 display:none !important;   
}

}


.discount_main p{ 
font-size: 13px;
}



.discount_main input{ 

font-size: 13.5px;

border:1px solid transparent;

background-color:  rgba(0,0,0,0.1);

border-radius: 20px;


}







@media only screen and (max-width:498px){


.discount_main p{

font-size: 12px;


margin-top: -45px;




}



}






@media only screen and (max-width:498px){


.discount_main input{ 

font-size: 12px;

width:;

border:1px solid transparent;

box-shadow: 0px 0px 4px rgba(0,0,0,0.5);

margin:5px;

border-radius: 20px;


}


.discount_main input::placeholder{ 

text-align: center;


}





}





h6{

  text-transform: capitalize;
}





#coca_cola img{

  
width:100%;


}

@media only screen and (max-width:1200px){

.button_navigation{


font-size:12px;

cursor: pointer;

color:black;

padding:5px 0px;

margin-right:10px !important;

font-weight: bold;

}


}


/*--------------------------------------------------------------
# navigation bar 
--------------------------------------------------------------*/


.button_navigation{

font-family:poppins;

float:left;

font-size:13px;

cursor: pointer;

color:black;

padding:8px 1px;

margin-right:32px;

font-weight: bold;

}

@media only screen and (max-width:1200px){

.button_navigation{

display: none;

}





}

.button_navigation:hover{

opacity: 0.8;

text-decoration: none;



}


.nav-container{
  width: 100%;
  margin-top: 30px;
  /*display: flex;
  align-items: center;
  justify-content: space-between;*/ }


/*--------------------------------------------------------------
# anchor category
--------------------------------------------------------------*/

.category{

  margin:10px;

  margin-right: 10px;

  font-size: 12px;

  border:1px solid rgba(0,0,0,0.2);

  padding: 2px 10px;

  border-radius: 15px;

  text-transform: capitalize;

  color: black;

  text-decoration: none;


}


@media only screen and (max-width:480px){


.category{



  margin-right:5px;

  font-size: 12px;

  border:1px solid rgba(0,0,0,0.2);

  padding: 2px 10px;

  border-radius: 15px;

  text-transform: capitalize;

  color: black;

  text-decoration: none;


}





}





.category:hover{

  
background-color: skyblue;

color:white;

text-decoration: none;

transition: 0.3s ease-in-out;

}


.category nth-child(3){

  background-color: rgba(192,192,192,0.4);
}



/*--------------------------------------------------------------
# navigation bar img
--------------------------------------------------------------*/


.button_navigation img{

width: 20px;
height: 18px;

}


/*--------------------------------------------------------------
# navigation search bar
--------------------------------------------------------------*/


#input_search{

font-size: 12px;

border:1px solid transparent;
font-weight: normal;

background-color: rgba(192,192,192,0.5);
border-radius: 12px;

width: 390px;


}


/*--------------------------------------------------------------
# navigation search bar button
--------------------------------------------------------------*/


#btn-search{

  font-size: 10px;
  border-radius:0px 13px 13px 0px;
  margin-left: -80px;
  padding: 7px 8px;
  position: relative;
z-index: 9;
color: white !important;
}





.fa-check{

font-size: 12px;

color: white;

border:1px solid transparent;

border-radius: 50%;

background-color: darkgreen;
padding:3px;

}


.nav_signup{


border:1px solid none;
border-left:1px solid white;
border-left-color: rgba(192,192,192,1);
margin-left:0px;



}


@media only screen and (max-width:1200px){

.button_navigation{

display: none;

}





}



/*--------------------------------------------------------------
# menu
--------------------------------------------------------------*/

.menu{


  background-image: url(assets/img/mask_group.png);

  background-size: cover;

  padding: 30px;

  background-position: center;

  margin-top: 30px;
}

.menu p{

  font-size: 13px;
}


.menu h6, .menu h5{

  font-weight: bold;
}

.menu input,.menu select,.menu textarea{

  border:1px solid rgba(0,0,0,0.2);
  font-size: 13px;

  
}


.menu button{
font-size: 13px;

}





.menu_mini{


  background-color: white;

  opacity: 0.9;

  padding: 10px;
}


/*--------------------------------------------------------------
# offenders
--------------------------------------------------------------*/


/*--------------------------------------------------------------
# footer
--------------------------------------------------------------*/

.footer h6{

  font-weight: bold;

  font-size: 16px;

  margin-bottom: 10px;
}


@media only screen and (max-width:767px){
    
 .footer h6{

  font-weight: bold;

  font-size: 21px;

  margin-bottom: 10px;
}
 
  .footer p{

  font-size: 14px;
}  
    
}

.footer p{

  font-size: 14px;
}


.footer{
  padding: 10px 20px;

  background-color: rgba(192,192,192,0.5);
}


.footer img{

width: 140px;

}

.footer button{

  font-size: 13px;

  border:1px solid transparent;

  background-color: rgba(0,0,0,0.6);

  color: white;

  margin-bottom: 8px;


}


/*--------------------------------------------------------------
# assets
--------------------------------------------------------------*/

#data_price,#data_name{

  padding-left: 20px;
  font-size: 13px;
  text-transform: capitalize;
}


@media only screen and (min-width:326px) and (max-width:365px){



#assets_container .package {

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 1px;

width:9rem !important;

display: inline-block;
margin:1em 0.12em !important;



}

.row{
    
    margin-left:0px !important;
}


#assets_container .package img{

width: 70% !important;

}







.nav_login,.nav_signup{

margin-left:40px !important;
font-weight: normal !important;
display: none! important;

padding: 2px !important;

border:2px solid white !important;

}


small{
font-size: 0.8rem; 

}




}



@media only screen and (min-width:366px) and (max-width:390px){


#assets_container .package {

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 1px;

width:9.6rem !important;

display: inline-block;
margin:1em 0.1em !important;

}



#assets_container .package img{

width: 70% !important;

}







.nav_login,.nav_signup{

margin-left:40px !important;
font-weight: normal !important;
display: none! important;

padding: 2px !important;

border:2px solid white !important;

}


small{
font-size: 0.8rem; 

}






}






@media only screen and (min-width:300px) and (max-width:375px){



#noviews{

position:relative;
top:45px;
left:-5px !important;
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
left:-38px !important;
background-color: rgba(0,0,0,0.8);
color: white;
font-weight: bold;
padding: 7px;
z-index: ;
font-size: 11px;

}


#discount{
background-color: rgba(255,195,50,0.3);
color: rgba(255,95,50,1);
border: 1px solid transparent transparent;
position: relative;
top:38px;
font-weight: bold;
padding: 6px;
left:170px;
font-size:13px;

}



 .flickity-page-dots .dot{

  width:10px !important;
  height: 4px;
  margin: 0 !important;
  border-radius: 0 !important;
  margin-bottom: -10px;
  
}

small{

  font-size:0.8rem;
}

}

















@media only screen and (min-width:376px) and (max-width:390px){


#assets_container .package {

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 1px;

width:10rem !important;

display: inline-block;
margin:1em 0.1em !important;

}

.nav_login,.nav_signup{

margin-left:40px !important;
font-weight: normal !important;
display: none! important;

padding: 2px !important;

border:2px solid white !important;

display:none !important;

}


small{
font-size: 0.8rem; 

}




}





@media only screen and (min-width:415px) and (max-width:430px){


#assets_container .package {

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 1px;

width:11.2rem !important;

display: inline-block;
margin:1em 0.15em !important;

}


small{
font-size: 0.8rem; 

}


.nav_login,.nav_signup{

margin-left:40px !important;
font-weight: normal !important;
display: none! important;

padding: 2px !important;

border:2px solid white !important;

}

}


@media only screen and (min-width:415px) and (max-width:430px){
#data_price,#data_name{

  padding-left: 20px;
  font-size: 14px;
  text-transform: capitalize;
}

}



@media only screen and (min-width:400px) and (max-width:414px){


#assets_container .package {

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 1px;

width:10.8rem !important;

display: inline-block;
margin:1em 0.1em !important;

}

.nav_login,.nav_signup{

margin-left:40px !important;
font-weight: normal !important;
display: none! important;

padding: 2px !important;

border:2px solid white !important;

}


}







#assets_container .package  img{


width: 100%;
height: 150px;
float: right;

}



@media only screen and (min-width:275px) and (max-width:414px){


#assets_container  figure img{

width: 100%;

height: 350px;



}

#priceitem{
font-size:10px;

}



}



















@media only screen and (min-width:415px) and (max-width:497px){



#assets_container  figure img{

width: 100%;

height: 350px;



}





}






















@media only screen and (min-width:498px) and (max-width:767px){



#assets_container .package  img{


width: 100% !important;

height: 80px;


}


#assets_container .package{


display: inline-block;

width:170px !important;

margin:1em 1em;

border:1px solid rgba(0,70,90,0.1);

padding: 1px;


}


#assets_container  figure img{

width: 100%;

height: 350px;



}





}




#assets_container .package{


display: inline-block;

margin:1em 1em;

border:1px solid rgba(0,70,90,0.1);

padding: 1px;

width: 250px;


}







#assets_container {

font-size: 10px;

width: 100%;

margin-top: 30px;

}





#assets_container  figure img{

width: 100%;

height: 490px;



}


#assets_container {

position: relative;



}


#assets_container figcaption{

position: absolute;

top: 50%;

left: 0;

right: 0;

padding:3px 20px;

margin: auto;

color: black;

font-size: 12px;

border:1px solid transparent;

background-color: white;

border-radius: 10px;

text-align: center;



}











/*--------------------------------------------------------------
# Explore button
--------------------------------------------------------------*/
.btn-default{

  border:3px solid skyblue;
  border-radius: 5px;

  width: 50%;
  font-size: 13px;


 
}


/*--------------------------------------------------------------
# button search category
--------------------------------------------------------------*/





/*--------------------------------------------------------------
# category_list
--------------------------------------------------------------*/






/*--------------------------------------------------------------
# navigator sign up/ log in
--------------------------------------------------------------*/


.nav_signup{


border:1px solid none;
border-left:1px solid white;
border-left-color: rgba(192,192,192,1);
padding-left:8px;

}



/*--------------------------------------------------------------
# Background picture letters
--------------------------------------------------------------*/




/*--------------------------------------------------------------
# Background picture
--------------------------------------------------------------*/





/*--------------------------------------------------------------
# Background picture mobile
--------------------------------------------------------------*/




/*--------------------------------------------------------------
# icons gallery 
--------------------------------------------------------------*/








.banner figure{
  position: relative;
  float: right;
  margin-right: 50px;
  padding: 10px;
  
}

@media only screen and (max-width:767px){


.banner figure{

  
}

.banner figcaption{
  font-size: 10px !important;
  
}



}




figcaption a{

  text-decoration: none;
  color: black;
}




/*--------------------------------------------------------------
# items
--------------------------------------------------------------*/



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


#btn_explore{


  padding: 5px 4px;
  font-size: 12px;
  border:1px solid rgba(0,90,70,0.6);
  color: black;
}




/*--------------------------------------------------------------
# Carousel mobile
--------------------------------------------------------------*/

@media only screen and (max-width:767px){




.banner figcaption{

font-size: 12px;

}

  
}



/*--------------------------------------------------------------
# Navigation for mobile---desktop
--------------------------------------------------------------*/




/*--------------------------------------------------------------
# Navigation for mobile---phones
--------------------------------------------------------------*/


@media only screen  and (min-width:498px) and (max-width:767px){

.overlay #section_heart{
 
 display: flex!important;
align-items: flex-start;
justify-content: space-between;
width: 20%;
}


}




@media only screen and (max-width:767px){

#inputDeal{

  border-radius: 15px;
}


#discount_main .btn-info{

border-radius: 0px 0px 15px 15px;

}

}



/*--------------------------------------------------------------
# Navigation button/nav_bar
--------------------------------------------------------------*/







.btn-info{

float: right;
margin-top: -35px;
margin-right: 4px;
font-size: 12px;
border-radius: 0px 25px 25px 0px;


}







</style>
</head>
<body>

<?php include_once 'nav.php'; ?>

<?php include 'overlay.php';?>

 <div class="back-button-container">
        <a onclick='history.go(-1)' class="back-button"><i class='fa fa-chevron-left'></i></a>
    </div>


<br><br>
  <div class="nav-container container">

<a class="category" href="">Deals</a>


</div>
<br>

<br><br>
<div class="container">

<?php

$featured = mysqli_query($conn,"SELECT * FROM item_detail where sold = 0 and featured = 1  and used = 0 order by id desc");
if ($featured->num_rows>0) { $id = $getfeaturedProducts['product_name'];  ?>
<h6><b style="color: white; background-color: rgba(0,70,90,0.8);padding: 5px;">Featured</b></h6><br>
<div class="assets_container featured container">
<?php
while ($getfeaturedProducts = mysqli_fetch_array($featured)) { ?>
<div class="package" style="border:1px solid rgba(0,0,0,0.1);margin-right:25px;">
<span style="padding:5px;" id="data_name"><?php echo$getfeaturedProducts['product_name']?></span><br>
<span style="opacity: 0.5" id="data_price">From<br></span>
<span style="opacity: 0.5" id="data_price"> <?php echo$getfeaturedProducts['product_price']?></span>
<span style="opacity: 0.5" id="data_price"> <?php echo" $ ".round($getfeaturedProducts['product_price']/$dollar_rate)?></span><br>

<a href="product-details.php?id=<?php echo$id ?>"><img style="height: 150px; width:200px;" src='<?php echo$getfeaturedProducts['product_image']?>' ></a><br>
</div>
<?php } echo'</div>'; } else{   ?>
<div class="row">
<div id="coca_cola" class="col-md-6">
<img src="assets/img/coca_cola.png">
</div>
<div id="coca_cola" class="col-md-6">
<img src="assets/img/coca_cola.png">
</div>
<br>
</div>
<?php    }     ?>
<br>



<br>

<div class="discount_main">

<small>Choose search criteria</small>
 <select name="user_type" id="user_type">

  <option selected="" value="product">Items</option>
  <option value="service provider">Service providers</option>

 </select><br><br>

  <input type="text" name="search"  id="search"  class="form-control"  placeholder=".....I am looking for" style="position: relative;" required>

  

<?php

if (isset($_SESSION['id'])) {
echo'<button  id="submit" type="submit" name="submit" class="btn btn-success"  style="position: relative;">Submit</button>';
}
elseif (isset($_SESSION['business_id'])) {
 echo'<button  id="submit" type="submit" name="submit" class="btn btn-success" style="position: relative;">Submit</button>'; 
}
elseif (isset($_SESSION['sp_id'])) {
echo'<button  id="submit" type="submit" name="submit" class="btn btn-success" style="position: relative;">Submit</button>';
}
else{
?>  

<button class="btn btn-success btn-hover"  >Submit</button>
<?php
}

?>
 
<div class="hide"><a href="login.php?details=<?php echo urlencode($_SERVER['REQUEST_URI'])?>">Login</a> to continue</div>

  <div id="show_product"></div>

   <div id="error"></div>


</div>

<br>




<br>

<div style="position: relative;" class="">





<!------------------------------------------Categories & Details hotel--------------------------------------------------->

  
<div id="assets_container" style="width: 100%;" class="row">
  
  <div id="" class="col-md-3">

   <figure style="width: 100%;"> <img src="assets/img/category/hotel_use.png"><figcaption>Hotel use</figcaption></figure>

  </div>
    
    <div class="col-md-7">
      
<?php

$category_select_list = mysqli_query($conn,"select * from item_detail where product_category = 'hotel products' and used = 0");

while ($datafound = mysqli_fetch_array($category_select_list)) {

   $id = $datafound['id'];
 
?>

<div class="package">


    <div style="position: relative;top:0px;">

<span style="padding-top:5px;" id="data_name"><?php echo$datafound['product_name']?></span><br>


<span style="opacity: 0.5" id="data_price">From<br></span>

<span style="opacity: 0.5" id="data_price"> <?php echo$datafound['product_price']?></span>


<span style="opacity: 0.5" id="data_price"> <?php echo" $ ".round($datafound['product_price']/$dollar_rate)?></span><br>

<br>

</div>

 <a href="product-details.php?id=<?php echo$id ?>"><img class="lazy" src="https://via.placeholder.com/200" data-src="<?php echo$datafound['product_image']?>" ></a><br>


</div>

<?php

}


?>

</div>

    <div style="" class="col-md-2" style="">

      <a href="products.php?page=hotel products" style="position: absolute;top: 50%;font-size: 13px;text-align: center;" class="btn btn-default ">Explore</a>

    </div>

<br><br>
</div>









<!------------------------------------------Categories & Details farm products--------------------------------------------------->



<div id="assets_container" class="row">
  
  <div id="" class="col-md-3">

   <figure> <img src="assets/img/category/farm_product.png"><figcaption>Farm products</figcaption></figure>



  </div>
    
    <div class="col-md-7">
      
<?php

$category_select_list = mysqli_query($conn,"select * from item_detail where product_category = 'farm products' and used = 0");

while ($datafound = mysqli_fetch_array($category_select_list)) {

    $id = $datafound['id'];
 
?>




<div class="package">


    <div style="position: relative;top:0px;">

<span style="padding-top:5px;" id="data_name"><?php echo$datafound['product_name']?></span><br>


<span style="opacity: 0.5" id="data_price">From<br></span>

<span style="opacity: 0.5" id="data_price"> <?php echo$datafound['product_price']?></span>

<span style="opacity: 0.5" id="data_price"> <?php echo" $ ".round($datafound['product_price']/$dollar_rate)?></span><br>



</div>

 <a href="product-details.php?id=<?php echo$id ?>"><img class="lazy" src="https://via.placeholder.com/200" data-src="<?php echo$datafound['product_image']?>" ></a><br>


</div>

<?php

}


?>


</div>



    <div style="" class="col-md-2" style="">

      <a href="products.php?page=farm products" style="position: absolute;top: 50%;" class="btn btn-default ">Explore</a>


    <br>
    <br>
    </div>


</div>




<!------------------------------------------Categories & Details Building materials--------------------------------------------------->



<div id="assets_container" class="row">
  
  <div id="" class="col-md-3">

   <figure> <img src="assets/img/category/building_materials.png"><figcaption><a>Building materials</a></figcaption></figure>



  </div>
    
    <div class="col-md-7">
      
<?php

$category_select_list = mysqli_query($conn,"select * from item_detail where product_category = 'building material' and used = 0");

while ($datafound = mysqli_fetch_array($category_select_list)) {

  $id = $datafound['id'];
 
?>




<div class="package">


    <div style="position: relative;top:0px;">

<span style="padding-top:5px;" id="data_name"><?php echo$datafound['product_name']?></span><br>


<span style="opacity: 0.5" id="data_price">From<br></span>

<span style="opacity: 0.5" id="data_price"> <?php echo$datafound['product_price']?></span><br>

<span style="opacity: 0.5" id="data_price"> <?php echo" $ ".round($datafound['product_price']/$dollar_rate)?></span><br>





</div>

<a href="product-details.php?id=<?php echo$id ?>"><img class="lazy" src="https://via.placeholder.com/200" data-src="<?php echo$datafound['product_image']?>" ></a><br>


</div>

<?php

}


?>


</div>



    <div style="" class="col-md-2" style="">

      <a href="products.php?page=building material" style="position: absolute;top: 50%;" class="btn btn-default ">Explore</a>
<br><br>
    </div>

</div>






<!------------------------------------------Categories & auto parts--------------------------------------------------->



<div id="assets_container" class="row">
  
  <div id="" class="col-md-3">

   <figure> <img src="assets/img/category/auto.png"><figcaption><a>Auto parts</a></figcaption></figure>



  </div>
    
    <div class="col-md-7">
      
<?php

$category_select_list = mysqli_query($conn,"select * from item_detail where product_category = 'autoparts' and used = 0");

while ($datafound = mysqli_fetch_array($category_select_list)) {

  $id = $datafound['id'];

 
?>




<div class="package">


    <div style="position: relative;top:0px;">

<span style="padding-top:5px;" id="data_name"><?php echo$datafound['product_name']?></span><br>


<span style="opacity: 0.5" id="data_price">From<br></span>

<span style="opacity: 0.5" id="data_price"> <?php echo$datafound['product_price']?></span>

<span style="opacity: 0.5" id="data_price"> <?php echo" $ ".round($datafound['product_price']/$dollar_rate)?></span><br>

<br>





</div>

<a href="product-details.php?id=<?php echo$id ?>"><img class="lazy" src="https://via.placeholder.com/200" data-src="<?php echo$datafound['product_image']?>" ></a><br>


</div>

<?php

}


?>


</div>



    <div style="" class="col-md-2" style="">

      <a href='products.php?page=autoparts' style="position: absolute;top: 50%;" class="btn btn-default ">Explore</a>
<br><br><br>
    </div>

</div>
</div>

<!------------------------------------------End of Categories --------------------------------------------------->







<!------------------------------------------Footer menu--------------------------------------------------->


<!------------------------------------------Footer offenders--------------------------------------------------->
<br><br>


<h6><b>Service Providers</b></h6>

<br>


<div class="container service_providers">

<?php


$service_provider = mysqli_query($conn,"SELECT * from service_provider_category");
while ($row = mysqli_fetch_array($service_provider)) {
$sp_id = $row['id'];
$sp_speciality = $row['sp_speciality'];
echo"<div class='menu_sp'>";
echo"<a href='sp_speciality.php?sp_speciality=$sp_speciality'><img src=".$row['sp_category_img']."></a><br>";
echo"<a href='sp_speciality.php?sp_speciality=$sp_speciality'>". $row['sp_speciality']."</a><br>";
echo"</div>";

}
?>
<br>
</div>




<br><br><br>



</div>

</div>

<!------------------------------------------Footer--------------------------------------------------->

<?php

include 'footer.php';

?>
<script type="text/javascript">
function openform() {
  document.getElementById("myform").
  style.height="39%";
}

function closeform() {
  document.getElementById("myform").
  style.height="0%";
}
  

</script>

<script>
  

$('.service_providers').flickity({
 
  cellAlign: 'left',
  contain: true,
  autoPlay:true,
  fade:true,
  friction:0.52,
});
</script>


<script type="text/javascript">
$("img.").Lazy();
var instance = $("img.").data("plugin_lazy");
</script>



<script type="text/javascript">
$('.numbering').load('engine/item-numbering.php');
$('#submit').on('click',function (e) {
var search = $('#search').val();
var user_type = $('#user_type').val();
e.preventDefault();
$.ajax({
type: "POST",
url: "contain-engine.php",
data: {'user_type':user_type,'search':search},
cache:false,
contentType: "application/x-www-form-urlencoded",
success: function(response) {
 $('#show_product').html(response);
$('#search').val("");
}
});
});

</script>

<script>
  
$('.featured').flickity({
 cellAlign: 'left',
contain: true,
autoPlay:true,
freeScroll: true,
 friction:0.52,
wrapAround: true,
contain: true,
prevNextButtons: false,

});

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




<!------------------------------------------btn-scroll--------------------------------------------------->

<a class="btn-down" onclick="topFunction()">&#8593;</a>

<script src="assets/js/scroll.js" ></script>

<script src="assets/js/overlay.js" ></script>
</body>
</html>
