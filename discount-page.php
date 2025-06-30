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
if (isset($_SESSION['id'])) {
$buyer = $_SESSION['id'];
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>E-stores | Discount page</title>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/flickity.min.css">
    <link rel="stylesheet" href="assets/css/btn_scroll.css">
    <link rel="stylesheet" href="assets/css/cart.css">
      <link rel="stylesheet" href="assets/css/overlay.css">
         <link rel="stylesheet" href="mobile-view.css">
                    <link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <script src="assets/js/sweetalert.min.js"></script> 
  <script src="assets/js/jquery-1.11.3.min.js"></script>
<script src="assets/js/flickity.pkgd.min.js"></script>
<style type="text/css">
  

body{font-family: poppins;}

.active-link{ color:red;}



.popup{
background-color: rgba(248,248,248,0.3);  
background-color: rgba(248,248,248,0.3);  
position:fixed;
padding: 4px 8px !important;
top: 50%;
left: 50%;
transform: translate(-50%,-50%);
width: 350px;
padding:5px;
z-index: 99;
box-shadow: 0 5px 30px rgba(0,0,0,.30);
background: #fff;
display:none;
opacity:0;
transition: 0.3s;
text-align: center;
font-size: 14px !important;
font-family: poppins !important;

}

.popup.active{
display: block;
opacity: 1;
transition: 0.3s;
}

.close{

font-size: 14px;
position: absolute;
top: -6px;
left: 93%;
color:black;
cursor: pointer;
box-shadow: 0px 0px 5px rgba(0,0,0,0.5);
border-radius: 50%;
background-color: white;
z-index: 1;
}

.close:hover{
opacity: 0.6;
border: none;
outline: none;
 outline: none;
}

ul{
list-style-type:none;
}

ul li{
    
display:block;
margin:5px 10px;
}

ul li a{
color:darkgreen;
}

.wrap{

  padding: 20px;
}

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











.h6{

  font-size: 13px;
  font-weight: bold;
}

h1 img{

margin-left: 10px;

}

#think{
margin-left: 100px !important;

}

@media only screen and (max-width:797px){
#think{
margin-left: 30px !important;

}
}

@media only screen and (min-width:497px) and (max-width:797px){
#think{

font-size: 1rem;

}
}


@media only screen and (min-width:497px){
   
}


@media only screen and (max-width:767px){

.nav_login{

margin-left:40px !important;
font-weight: normal !important;

}


 h6 b{
        font-size:21px !important;
        width:60% !important;
    }

}


/*--------------------------------------------------------------
# compare button
--------------------------------------------------------------*/
.btn-compare{

  margin-left: -2px;
  cursor: pointer;
}

.hide{
  display: none;
  position: absolute;
  color: white ;
  background-color:rgba(0,0,0,0.6);
  margin-top: -23px;
  font-size: 12px;
  padding: 0px 3px;


}


.btn-hover:hover + .hide{

  display: block;




}

#button_navigation img{

  height: 15px;
}

.fa-cart-shopping{

  margin-top: -4px;
}





/*--------------------------------------------------------------
# view icon
--------------------------------------------------------------*/

#noviews{

position:relative;
top:45px;
left:0px;
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
left:-37px;
background-color: rgba(0,0,0,0.8);
color: white;
font-weight: bold;
padding: 7px;
z-index: ;
font-size: 11px;

}





/*--------------------------------------------------------------
# product discount
--------------------------------------------------------------*/


#discount{
background-color: rgba(255,195,50,0.4);
color: rgba(255,95,50,1);
border: 1px solid transparent transparent;
position:relative;
top:45px;
font-weight: bold;
padding:3px;
left: 80%;

font-size:13px;

} 


#share{

  height:14px;
  width: 15px;
}



.fa-cart-shopping{

font-size: 14px;


padding:3px;

}







.fa-check{

font-size: 12px;

color: white;

border:1px solid transparent;

border-radius: 50%;

background-color: darkgreen;
padding:3px;

}

/*--------------------------------------------------------------
# Navigation
--------------------------------------------------------------*/
.nav_signup{


border:1px solid none;
border-left:1px solid black;
border-left-color: rgba(192,192,192,1);
margin-left:0px;
color:black !important;

font-weight: normal !important;

}


/*--------------------------------------------------------------
# product list
--------------------------------------------------------------*/



#package{

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 10px;

width:240px;

display: inline-block;
margin:1em 1em;

}

@media only screen and (min-width:430px) and (max-width:498px){


#package{

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 10px;

width:210px;

display: inline-block;
margin:1em 1em;

}



}



@media only screen and (min-width:300px) and (max-width:325px){

#package{

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 1px;

width:10rem !important;

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


#head-h3{

font-size: 18px;

}


 .flickity-page-dots .dot{

  width:40px !important;
  height: 4px;
  margin: 0 !important;
  border-radius: 0 !important;
  display: none;
  
}


#icon_add{
position: absolute;
top: 10px !important;
right: 0px !important;
padding: 5px !important;
display: none;

}







.featured{

width: 100%;
padding: 0px;


}


.featured #package{

width: 10rem;
padding: 0px;
text-transform:capitalize !important;

}

#post{

  display: block;
}


}


@media only screen and (min-width:326px) and (max-width:365px){


#package{

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 1px;

width:9.8rem !important;

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


#head-h3{

font-size: 18px;

}


 .flickity-page-dots .dot{

  width:40px !important;
  height: 4px;
  margin: 0 !important;
  border-radius: 0 !important;
  display: none;
  
}


#icon_add{
position: absolute;
top: 10px !important;
right: 0px !important;
padding: 5px !important;
display: none;

}


.featured{

width: 100%;
padding: 0px;


}


.featured #package{

width: 10rem;
padding: 5px;


}


#post{

  display: block;
}

 .flickity-page-dots .dot{

  width:10px !important;
  height: 4px;
  margin: 0 !important;
  border-radius: 0 !important;
 
  

}


}





@media only screen and (min-width:366px) and (max-width:403px){


#package{

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 1px;

width:10.3rem !important;

display: inline-block;
margin:1em 0.10em !important;

}

.nav_login,.nav_signup{

margin-left:40px !important;
font-weight: normal !important;
display: none! important;

padding: 2px !important;

border:2px solid white !important;

}


#head-h3{

font-size: 18px;

}


 .flickity-page-dots .dot{

  width:10px !important;
  height: 4px;
  margin: 0 !important;
  border-radius: 0 !important;
  display: none;
  
}


#icon_add{
position: absolute;
top: 10px !important;
right: 0px !important;
padding: 5px !important;
display: none;

}







.featured{

width: 100%;
padding: 0px;


}


.featured #package{

width: 10rem;
padding: 0px;


}


#post{

  display: block;
}




}




@media only screen and (min-width:377px) and (max-width:390px){


#package{

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 1px;

width:10.3rem !important;

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

#think{

  font-size: 0.84rem !important;
}


 .flickity-page-dots .dot{

  width:10px !important;
  height: 4px;
  margin: 0 !important;
  border-radius: 0 !important;
 
  

}



}











@media only screen and (min-width:400px) and (max-width:414px){


#package{

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 1px;

width:11.6rem !important;

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



 .flickity-page-dots .dot{

  width:10px !important;
  height: 4px;
  margin: 0 !important;
  border-radius: 0 !important;
 
  

}











}




@media only screen and (min-width:300px) and (max-width:430px){


.section_search{
text-align: left !important;
}


.section_search span{

font-size: 12px;
position: relative;
left: -3px;

}


.section_search input[type=search] {

  font-size: 14px;
    width:160px !important;
    margin-left: 8px;

}



 .flickity-page-dots .dot{

  width:10px !important;
  height: 4px;
  margin: 0 !important;
  border-radius: 0 !important;
 
  

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



.nav_login,.nav_signup{

margin-left:40px !important;
font-weight: normal !important;
display: none! important;
padding: 2px !important;
border:2px solid white !important;


}






}


@media only screen and (max-width:415px){

#discount{
background-color: rgba(255,195,50,0.4);
color: rgba(255,95,50,1);
border: 1px solid transparent transparent;
position:relative;
top:45px;
font-weight: bold;
padding:3px;
left: 77% !important;


font-size:12px !important;

} 


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






















@media only screen and (min-width:499px) and (max-width:797px){


#package{

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 10px;

width:250px;

display: inline-block;
margin:1em 1em;

}



}








#coca_cola img{

  
width:100%;




}

@media only screen (max-width:498px){



#coca_cola{

  
width:100%;

display:none !important;


}

}
.discount_main{

  padding-top: 10px;

  margin-top: 15px;

  width: 100%;

  height: 50px;

  background-color: rgba(192,192,192,0.4);


  border:1px solid transparent;

  box-shadow: 0px 0px 5px rgba(0,0,0,0.3);

  text-align: center;
}


.discount_main p{ 
font-size: 13px;
}




.nav_login{
margin-left:80px;
color:black;
font-weight: normal !important;

}


/*--------------------------------------------------------------
# navigation bar mobile
--------------------------------------------------------------*/

@media only screen and (max-width:1200px){

.button_navigation{


font-size:12px;

cursor: pointer;

color:black !important;

padding:5px 0px;

margin-right:11px !important;

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


.category:hover{
color:white !important;
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
height: 15px;

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


/*--------------------------------------------------------------
# section product  mobile
--------------------------------------------------------------*/

@media only screen and (max-width:797px){


#package{

width:12.5em;



}


}


/*--------------------------------------------------------------
# product list
--------------------------------------------------------------*/


#priceitem{

font-family:Poppins;
font-weight: bold;
color:black;
opacity: 0.8;
text-transform:capitalize;
font-size:13px;
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

/*--------------------------------------------------------------
# footer
--------------------------------------------------------------*/

.footer h6{

  font-weight: bold;

  font-size: 16px;

  margin-bottom: 10px;
}

@media only screen and (min-width:497px) {


.footer h6{

  font-weight: bold;

  font-size: 23px !important;

  margin-bottom: 10px;
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

.footer{

  margin-top: 30px;
}




@media only screen and (max-width:1200px){

.button_navigation{

display: none;

}





}




</style>
</head>
<body>

<?php include 'nav.php'; ?>

<?php include 'overlay.php';?>

<div class="popup">
<a onclick="close" class='close'>&times;</a>    
</div>



 <div class="back-button-container">
        <a onclick='history.go(-1)' class="back-button"><i class='fa fa-chevron-left'></i></a>
    </div>


<br><br>
  <div class="nav-container container">

<a class="category" style="color: skyblue;" href="">Discount deals</a>


</div>


<br><br>

<div class="container">
<?php

$featured = mysqli_query($conn,"SELECT * FROM item_detail where sold = 0 and featured = 1 and used = 0 order by id desc");
if ($featured->num_rows>0) {  ?>
<h6><b style="color: white; background-color: rgba(0,70,90,0.8);padding: 5px;">Featured</b></h6><br>
<div class="assets_container featured container">
<?php
while ($getfeaturedProducts = mysqli_fetch_array($featured)) { $id = $getfeaturedProducts['id'];  ?>
<div class="package" style="border:1px solid rgba(0,0,0,0.1);margin-right:25px;padding:5px;">
<span style="padding:5px;text-transform:capitalize;" id="data_name"><?php echo$getfeaturedProducts['product_name']?></span><br>
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

<br><br>

<div class="discount_main">

<p>Discount deals</p>

</div>

<br><br>

<h6><b>Farm products on discount deals</b></h6>

<div class="item_images">



<?php


require 'engine/configure.php';
$condition = "SELECT * from item_detail where sold = 0 and product_category='farm products' and discount > 0 and used = 0 order by id desc";
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
$dollar = round($price/$dollar_rate);
if ($row['discount']>0) {

 echo "<span id='discount'>-".$row['discount']."%</span>";
 echo "<span class='' id='views'>".$row['views']." <i class='fa fa-eye'></i></span>";
}

       if ($row['discount']==0) {

 echo "<span class='' id='noviews'>".$row['views']." <i class='fa fa-eye'></i></span>";
}
   echo "<a href='product-details.php?id={$row['id']}&{$row['product_name']}&{$row['product_location']}&{$row['product_category']}&{$row['product_details']}' target='_blank'><div style=''><img loading='lazy' id='imgitem' width='' src=".$row['product_image'].">"." "."</div></a>";

echo"<span id=''><i class='fa-solid fa-check'></i>"."</span><br>";

 echo"<span style='float:right;color:white;border:1px solid transparent;background-color:rgba(0,0,0,0.5);font-size:10px;padding:2px;margin-top:-20px;' id=''>"."New"."</span>";

   if ($row['discount']>0) {
   $price = $row['product_price'];
  echo"<span style='text-decoration:line-through;' id='priceitem'>&#8358;".$price."</span> ";
  echo"<span id='priceitem'>&#8358;".round(( $row['product_price'])-($row['discount']/100 * $price))."</span><br>";
  echo"<span style='text-decoration:line-through;' id='priceitem'>$".round($price/$dollar_rate)."</span>";
   echo"<span id='priceitem'>$".round(($dollar)-($row['discount']/100 * $dollar))."</span><br>";



}
if ($row['discount']==0) {
echo"<span id='priceitem'>&#8358;".$price."</span> ";
echo" <span id='priceitem'>$".($price/$dollar_rate)." </span><br>";
}
echo "<span id='nameitem' style='' ><a target='_blank' href='product-details.php?id={$row['id']}&{$row['product_name']}&{$row['product_location']}&{$row['product_category']}&{$row['product_details']}'>".$row['product_name']."</a></span>"."<br>";

echo"<span id='locitem'>".$row['product_location'].""."</span><br>";

if (isset($_SESSION['id']) || isset($_SESSION['business_id']) || isset($_SESSION["sp_id"])) {

   if ($_SESSION['business_id']!=$row['user_id']) {
    
  echo"<span style='font-weight:normal;font-size:11px;' id='locitem'><a style='font-weight:normal;font-size:11px;'  id='{$row['id']}' class='btn-compare' >Compare</a></span>";
}
   }

else{
 
   echo"<a style='font-weight:normal;font-size:11px;' id='locitem' id='' disabled class='btn-hover' >Compare</a><span class='hide'>Please <a href='login.php?step=discount-page'>login</a> to use feature</span>";

}
echo"<a class='share' id='https://estores.ng/product-details.php?share ={$product_name}' onclick='share()' target='_blank' rel='noopener noreferrer'><img id='share' src='assets/icons/material-symbols_share.png'></a><br>";


  ?> 
                <?php


          echo"</div>";      
                
}
        ?>


</tbody></table>

</div>
</div>
<br><br>
<div class="container">
<h6><b style="">Hotel use on discount deals</b></h6>
<div class="item_images">
<?php
require 'engine/configure.php';
$condition = "SELECT * from item_detail where sold = 0 and product_category='hotel products' and discount > 0 and used = 0 order by id desc";
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
$dollar = round($price/$dollar_rate);
if ($row['discount']>0) {
echo "<span id='discount'>-".$row['discount']."%</span>";
echo "<span class='' id='views'>".$row['views']." <i class='fa fa-eye'></i></span>";
}

if ($row['discount']==0) {

 echo "<span class='' id='noviews'>".$row['views']." <i class='fa fa-eye'></i></span>";
}
   
echo "<a href='product-details.php?id={$row['id']}&{$row['product_name']}&{$row['product_location']}&{$row['product_category']}&{$row['product_details']}' target='_blank'><div style=''><img loading='lazy' id='imgitem' width='' src=".$row['product_image'].">"." "."</div></a>";

echo"<span id=''><i class='fa-solid fa-check'></i>"."</span><br>";
echo"<span style='float:right;color:white;border:1px solid transparent;background-color:rgba(0,0,0,0.5);font-size:10px;padding:2px;margin-top:-20px;' id=''>"."New"."</span>";

  if ($row['discount']>0) {


       $price = $row['product_price'];
echo"<span style='text-decoration:line-through;' id='priceitem'>&#8358;".$price."</span> ";
echo"<span id='priceitem'>&#8358;".round(( $row['product_price'])-($row['discount']/100 * $price))."</span><br>";
echo"<span style='text-decoration:line-through;' id='priceitem'>$".round($price/$dollar_rate)."</span>";
echo"<span id='priceitem'>$".round(($dollar)-($row['discount']/100 * $dollar))."</span><br>";



}

if ($row['discount']==0) {

echo"<span id='priceitem'>&#8358;".$price."</span> ";

echo" <span id='priceitem'>$".round($price/$dollar_rate)." </span><br>";


}

echo "<span id='nameitem' style='' ><a target='_blank' href='product-details.php?id={$row['id']}&{$row['product_name']}&{$row['product_location']}&{$row['product_category']}&{$row['product_details']}'>".$row['product_name']."</a></span>"."<br>";

 echo"<span id='locitem'>".$row['product_location'].""."</span><br>";


if (isset($_SESSION['id']) || isset($_SESSION['business_id'])  || isset($_SESSION["sp_id"])) {

   if ($row['user_id']!=$_SESSION['business_id']) {
    
  echo"<span style='font-weight:normal;font-size:11px;' id='locitem'><a style='font-weight:normal;font-size:11px;'  id='{$row['id']}' class='btn-compare' >Compare</a></span>";
}
   }

else{
 
   echo"<a style='font-weight:normal;font-size:11px;' id='locitem' id='' disabled class='btn-hover' >Compare</a><span class='hide'>Please <a href='login.php?step=discount-page'>login</a> to use feature</span>";

}

echo"<a class='share' id='https://estores.ng/product-details.php?share ={$product_name}' onclick='share()' target='_blank' rel='noopener noreferrer'><img id='share' src='assets/icons/material-symbols_share.png'></a><br>";


  ?> 
                <?php
echo"</div>";      
                
}
        ?>


</tbody></table>

</div>

<br><br>

<h6><b style="">Auto parts on discount deals</b></h6>

<div class="item_images">
<?php

require 'engine/configure.php';

$condition = "SELECT * from item_detail where sold = 0 and product_category='autoparts' and discount > 0 and used = 0 order by id desc";
$data = mysqli_query($conn,$condition);
$datafound = $data->num_rows;
 echo "<table><tbody id='mytable' class=''>";
while($row=mysqli_fetch_array($data))

        {        
            ?>
        <?php   

echo "<div id='package'>";
$price = $row['product_price'];
$product_name = $row['product_name'];
$dollar = round($price/$dollar_rate);
       if ($row['discount']>0) {
echo "<span id='discount'>-".$row['discount']."%</span>";
echo "<span class='' id='views'>".$row['views']." <i class='fa fa-eye'></i></span>";
}

       if ($row['discount']==0) {
echo "<span class='' id='noviews'>".$row['views']." <i class='fa fa-eye'></i></span>";
}
   
echo "<a href='product-details.php?id={$row['id']}&{$row['product_name']}&{$row['product_location']}&{$row['product_category']}&{$row['product_details']}' target='_blank'><div style=''><img loading='lazy' id='imgitem' width='' src=".$row['product_image'].">"." "."</div></a>";

echo"<span id=''><i class='fa-solid fa-check'></i>"."</span><br>";
echo"<span style='float:right;color:white;border:1px solid transparent;background-color:rgba(0,0,0,0.5);font-size:10px;padding:2px;margin-top:-20px;' id=''>"."New"."</span>";

if ($row['discount']>0) {
 $price = $row['product_price'];
 echo"<span style='text-decoration:line-through;' id='priceitem'>&#8358;".$price."</span> ";
  echo"<span id='priceitem'>&#8358;".round(( $row['product_price'])-($row['discount']/100 * $price))."</span><br>";
  echo"<span style='text-decoration:line-through;' id='priceitem'>$".round($price/$dollar_rate)."</span>";
 echo"<span id='priceitem'>$".round(($dollar)-($row['discount']/100 * $dollar))."</span><br>";



}

if ($row['discount']==0) {

echo"<span id='priceitem'>&#8358;".$price."</span> ";

echo" <span id='priceitem'>$".round($price/$dollar_rate)." </span><br>";

}

echo "<span id='nameitem' style='' ><a target='_blank' href='product-details.php?id={$row['id']}&{$row['product_name']}&{$row['product_location']}&{$row['product_category']}&{$row['product_details']}'>".$row['product_name']."</a></span>"."<br>";

 echo"<span id='locitem'>".$row['product_location'].""."</span><br>";


if (isset($_SESSION['id']) || isset($_SESSION['business_id'])  || isset($_SESSION["sp_id"])) {

   if ($row['user_id']!=$_SESSION['business_id']) {
    
  echo"<span style='font-weight:normal;font-size:11px;' id='locitem'><a style='font-weight:normal;font-size:11px;' id='{$row['id']}' class='btn-compare'>Compare</a></span>";
  }
}

else{
 
   echo"<a style='font-weight:normal;font-size:11px;' id='locitem' id='' disabled class='btn-hover' >Compare</a><span class='hide'>Please <a href='login.php?step=discount-page'>login</a> to use feature</span>";

}


echo"<a class='share' id='https://estores.ng/product-details.php?share ={$product_name}' onclick='share()' target='_blank' rel='noopener noreferrer'><img id='share' src='assets/icons/material-symbols_share.png'></a><br>";


  ?> 
                <?php


          echo"</div>";      
                
}
        ?>


</tbody></table>

</div>



<br><br>

<h6><b style="">Building materials on discount deals</b></h6>
<div class="item_images">
<?php
require 'engine/configure.php';
$condition = "SELECT * from item_detail where sold = 0 and product_category='building material' and discount > 0 and used = 0 order by id desc";
$data = mysqli_query($conn,$condition);
$datafound = $data->num_rows;
echo "<table><tbody id='mytable' class=''>";

        while($row=mysqli_fetch_array($data))

        {        
            ?>
        <?php   

echo "<div id='package'>";
$price = $row['product_price'];
$product_name = $row['product_name'];
$dollar = round($price/$dollar_rate);
if ($row['discount']>0) {
echo "<span id='discount'>-".$row['discount']."%</span>";
echo "<span class='' id='views'>".$row['views']." <i class='fa fa-eye'></i></span>";
}
if ($row['discount']==0) {
echo "<span class='' id='noviews'>".$row['views']." <i class='fa fa-eye'></i></span>";
}
   
echo "<a href='product-details.php.php?id={$row['id']}&{$row['product_name']}&{$row['product_location']}&{$row['product_category']}&{$row['product_details']}' target='_blank'><div style=''><img loading='lazy' id='imgitem' width='' src=".$row['product_image'].">"." "."</div></a>";
echo"<span id=''><i class='fa-solid fa-check'></i>"."</span><br>";
echo"<span style='float:right;color:white;border:1px solid transparent;background-color:rgba(0,0,0,0.5);font-size:10px;padding:2px;margin-top:-20px;' id=''>"."New"."</span>";

  if ($row['discount']>0) {
  $price = $row['product_price'];
  echo"<span style='text-decoration:line-through;' id='priceitem'>&#8358;".$price."</span> ";
  echo"<span id='priceitem'>&#8358;".round(( $row['product_price'])-($row['discount']/100 * $price))."</span><br>";
  echo"<span style='text-decoration:line-through;' id='priceitem'>$".round($price/$dollar_rate)."</span>";
  echo"<span id='priceitem'>$".round(($dollar)-($row['discount']/100 * $dollar))."</span><br>";
}
if ($row['discount']==0) {
echo"<span id='priceitem'>&#8358;".$price."</span> ";
echo" <span id='priceitem'>$".round($price/$dollar_rate)." </span><br>";


}
echo "<span id='nameitem' style='' ><a target='_blank' href='product-details.php.php?id={$row['id']}&{$row['product_name']}&{$row['product_location']}&{$row['product_category']}&{$row['product_details']}'>".$row['product_name']."</a></span>"."<br>";

echo"<span id='locitem'>".$row['product_location'].""."</span><br>";


if (isset($_SESSION['id']) || isset($_SESSION['business_id'])  || isset($_SESSION["sp_id"])) {
if ($row['user_id']!=$_SESSION['business_id']) {
    echo"<span><a style='font-weight:normal;font-size:11px;' id='{$row['id']}' class='btn-compare' >Compare</a></span>";
}
}

else{
 
   echo"<a style='font-weight:normal;font-size:11px;' id='locitem' id='' disabled class='btn-hover' >Compare</a><span class='hide'>Please <a href='login.php?step=discount-page'>login</a> to use feature</span>";
}

echo"<a class='share' id='https://estores.ng/product-details.php?share ={$product_name}' onclick='share()' target='_blank' rel='noopener noreferrer'><img id='share' src='assets/icons/material-symbols_share.png'></a><br>";

?> 
                <?php

    echo"</div>";      
                
}
        ?>


</tbody></table>

</div>

</div>

<!------------------------------------------footer--------------------------------------------------->

<?php

include 'footer.php';

?>

<input type="hidden" name="buyer" id="buyer" value="<?php echo$buyer?>">



<script type="text/javascript">
$('.numbering').load('engine/item-numbering.php');
$('.btn-compare').on('click',function() {
var id = $(this).attr('id');
var buyer =$('#buyer').val();
$(".loading-image").show();
$.ajax({
type:"POST",
url:"engine/compare-page.php",
data:{'id':id,'buyer':buyer},
success:function(data) {
$(".loading-image").hide();
window.location.href="compare-product.php?id="+id;
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


<script>

function share() {
    var url = $('.share').attr('id');
    var encodedUrl = encodeURIComponent(url);
    var facebookShare = "https://www.facebook.com/sharer/sharer.php?u=" + encodedUrl;
    var twitterShare = "https://twitter.com/intent/tweet?url=" + encodedUrl;
    var linkedinShare = "https://www.linkedin.com/shareArticle?url=" + encodedUrl;
    window.open(facebookShare, "_blank");
    window.open(twitterShare, "_blank");
    window.open(linkedinShare, "_blank");
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




<script src="assets/js/overlay.js"></script>

<!------------------------------------------btn-scroll--------------------------------------------------->

<a class="btn-down" onclick="topFunction()">&#8593;</a>

<script src="assets/js/scroll.js" ></script>



</body>
</html>