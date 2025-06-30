<?php session_start();
 require 'engine/configure.php';  
if(isset($_POST["submit"]))   {  
if(!empty($_POST["search"]))   {  
$query = str_replace(" ", "+", mysqli_real_escape_string($conn,$_POST["search"]));
header("location:search-process.php?search=" .htmlspecialchars($query)); 
 }  

 }  

 ?> 

<!DOCTYPE html>
<html>
<head>
    <title>E-stores | Wallet </title>
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



.nav_signup{


border:1px solid none;
border-left:1px solid white;
border-left-color: rgba(192,192,192,1);
margin-left:0px;



}

.nav_login{



margin-left:50px;

}

#think{
margin-left: 110px !important;

}

@media only screen and (max-width:797px){
#think{
margin-left: 30px !important;

}
}

@media only screen and (max-width:497px){
#think{
margin-left: 23px !important;
font-size: 1rem;

}
}



@media only screen and (max-width:497px){
#think{
margin-left: 23px !important;
font-size: 1rem;

}
}


/*--------------------------------------------------------------
# navigation bar mobile
--------------------------------------------------------------*/

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



.button_navigation:hover{

opacity: 0.8;

text-decoration: none;

color: white;

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

width: 310px;


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


/*--------------------------------------------------------------
# section cart 
--------------------------------------------------------------*/



.cart_header{

  color: skyblue;

  border: 1px solid rgba(192,192,192,0.5);

  border-radius: 50%;

  padding: 10px;

  font-size: 12px;
}


.cart_container {

  margin-top: 40px;
}



.button_shopping{

  color: white !important;

  font-size: 12px;
  padding: 8px;
}


small
{
  margin-top: 8px;
}




/*--------------------------------------------------------------
# section product 
--------------------------------------------------------------*/


#package{

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 10px;

width:240px;

display: inline-block;
margin:1em 1em;

}



/*--------------------------------------------------------------
# wallet style
--------------------------------------------------------------*/

.section_product h6{

  font-weight: bold;

  font-size: 32px;
}

@media only screen and (max-width:767px){

.section_product h6{

  font-weight: bold;

  font-size: 25px;
}

}


.section_product small{

  font-weight: bold;
  font-size: 18px;

}




.section_product {

 text-align: center;

 width: 50%;
}




.section_product  img{

width: 100%;
}

@media only screen and (max-width:767px){

.wallet_balance{

margin-top: -100px !important;
z-index: 1;
margin-left: 10px;

}

}

 .wallet_balance{

margin-top: -305px;
z-index: 1;
margin-left: 10px;

padding: 0px;

}


.menu_wallet{

border:1px solid rgba(0,0,0,0.3);

padding:10px 0px;



}




/*--------------------------------------------------------------
# section product  mobile
--------------------------------------------------------------*/

@media only screen and (max-width:797px){


#package{

width:12.5em;



}


}









/*--------------------------------------------------------------
# view icon
--------------------------------------------------------------*/

#noviews{

position:relative;
top:45px;
left:10px;
background-color: rgba(0,0,0,0.8);
color: white;
font-weight: bold;
padding: 7px;
z-index: ;
font-size:13px;

display: none;
}



 
#views{

position:relative;
top:45px;
left:-27px;
background-color: rgba(0,0,0,0.8);
color: white;
font-weight: bold;
padding: 7px;
z-index: ;
font-size: 13px;
display: none;
}



.count{position: relative;top:89%;left: 23%;padding:10px;color:white;font-weight: bold;border:1px solid transparent transparent transparent; background-color:rgba(0,0,0,0.8);z-index: 999;}



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

font-size:13px;

} 


/*--------------------------------------------------------------
# item details
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

/*--------------------------------------------------------------
# footer
--------------------------------------------------------------*/

.footer h6{

  font-weight: bold;

  font-size: 16px;

  margin-bottom: 10px;
}


.footer p{

  font-size: 13px;
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

.footer{

  margin-top: 30px;
}




@media only screen and (max-width:1200px){

.button_navigation{

display: none;

}


.open-btn{display: block !important;font-size: 16px; margin-top: -6px;color: black;}


}

</style>
</head>
<body>


<!------------------------------------------header--------------------------------------------------->

<h1 class="container">

<a style="background-color:;display: none;" class="button_navigation btn open-btn" id="open-btn" onclick="openform()" ><i class="fas fa-bars"></i></a>
<a href="index.php" class="button_navigation"  style="text-decoration: none;display:block !important;margin-top: -3px;"><img style="" align="" src="assets/icons/logo_e_stores.png" height="" width=""></a>


<!------------------------------------------Navigation bar--------------------------------------------------->

<div style="float: right;">
<input id="input_search" type="search" class="button_navigation form-control" placeholder="     Search product, brand and categories" name="search"><input id="btn-search" type="submit" class="button_navigation btn btn-primary" name="submit_search" value="Search">
<a class="button_navigation" style="display: block!important;" id="" >Think of it? Buy it here.</a>
<a href="service_providers.php" class="button_navigation" id="" ><img src="assets/icons/mdi_cart-outline-black.png"></a>
<a href="discount_deals.php" class="button_navigation" ><img style="color: black !important;" src="assets/icons/mdi_heart-outline-black.png"></a>
<?php if(!empty($_SESSION['id']) || !empty($_SESSION['business_id']) || !empty( $_SESSION["sp_id"])) 
 {
?>
<a href="profile.php" class="button_navigation" ><img src="assets/icons/user-black.png"></a>
<?php
 } 
?>
<?php if (empty($_SESSION['id']) && empty($_SESSION['business_id']) && empty( $_SESSION["sp_id"])) {
 
 ?> 

<span style="float: right;"><a href="login.php" class="button_navigation" style="text-decoration: none;font-weight: normal;">Login</a>
<a href="join-us.php" class="button_navigation" style="text-decoration: none;font-weight: normal;">Sign up</a></span></p>
<?php
} ?>

</div>
</h1>

<br>
<br>


<!------------------------------------------Cart--------------------------------------------------->

<div class="cart_container container">
<span class="cart_header">Wallet</span>
</div>

<br>






<!------------------------------------------Product--------------------------------------------------->

<div class="container section_product">
  


<img src="assets/img/wallet.png">

<div class="wallet_balance">

<div class="menu_wallet" >

<h6>NGN 100,000</h6>

<small>Your balance</small>

</div>


</div>


</div>

<br><br>



<!------------------------------------------footer--------------------------------------------------->

<?php

include 'footer.php';


?>

</body>
</html>