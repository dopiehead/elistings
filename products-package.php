<?php session_start();

if (isset($_GET['page']) && !empty($_GET['page'])) {
$page =$_GET['page'];
require 'engine/configure.php';
require 'engine/get-dollar.php';


}

?>

<?php
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
	<title>E-stores | <?php echo$page?></title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
         <link rel="stylesheet" href="assets/css/btn_scroll.css">
  <link rel="stylesheet" href="assets/css/flickity.min.css">
    <link rel="stylesheet" href="assets/css/overlay.css">
    <link rel="stylesheet" href="assets/css/cart.css">
             <link rel="stylesheet" href="mobile-view.css">
  <script src="assets/js/sweetalert.min.js"></script> 
  <script src="assets/js/jquery-1.11.3.min.js"></script>
<script src="assets/js/flickity.pkgd.min.js"></script>
<style type="text/css">

body{

	font-family: poppins;
}

.main .flickity-page-dots .dot{

  width:15px;
  height: 4px;
  margin: 0;
  border-radius: 0;
  
}

h1 img{

  margin-left: 10px;
}



.flickity-page-dots{
bottom: -35px;
}


 .flickity-page-dots .dot{

  width:20px !important;
  height: 6px;
  margin: 0 !important;
  border-radius: 0 !important;
  
}

@media only screen and (min-width:430px) and (max-width:767px){


 .flickity-page-dots .dot{

  width:15px !important;
  height: 4px;
  margin: 0 !important;
  border-radius: 0 !important;
  
}


}



.flickity-page-dots .dot.is-selected{

  background-color:rgba(255,165,50,1);
}






#data_price,#data_name{

  padding-left: 20px;
  font-size: 13px;
  text-transform: capitalize;
}



#assets_container .package  img{


width: 210px !important;
height: 180px !important;
float: right;

}




@media only screen and (max-width:497px){




#assets_container .package  img{


width: 100%;

height: 80px;


}


#assets_container .package{


display: inline-block;

margin-right: 20px !important;

border:1px solid rgba(0,70,90,0.1);

padding: 1px;

width:215px !important;


}






}


@media only screen and (min-width:498px) and (max-width:767px){

#assets_container .package  img{


width: 17em;

height: 80px;

}


#assets_container .package{


display: inline-block;

margin-right: 20px;

border:1px solid rgba(0,70,90,0.1);

padding: 1px;


}

}



#assets_container .package{


display: inline-block;

margin-right: 20px;

border:1px solid rgba(0,70,90,0.1);

padding: 1px;

width:100%;

}


#assets_container {

font-size: 10px;

width: 100%;

margin-top: 30px;

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





.open-btn{

}

#noviews{

position:relative;
top:45px;
left:10px;
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
left:-27px;
background-color: rgba(0,0,0,0.8);
color: white;
font-weight: bold;
padding: 7px;
z-index: ;
font-size: 11px;

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
left: 80%;

font-size:11px;

} 













.nav_signup{


border:1px solid none;
border-left:1px solid white;
border-left-color: rgba(192,192,192,1);
margin-left:0px;
font-weight: normal !important;



}

.nav_login{
margin-left:50px;

font-weight: normal !important;
}




#coca_cola img{
width:100%;
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
  text-transform: capitalize;
}


.discount_main p{ 
font-size: 13px;
}


h6{

	text-transform: capitalize;
}


/*--------------------------------------------------------------
# product list
--------------------------------------------------------------*/

@media only screen and (min-width:300px) and (max-width:375px){


#package{

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 1px;

width:10.3rem !important;

display: inline-block;
margin:1em 0.15em !important;

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

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 1px;

width:10.3rem !important;

display: inline-block;
margin:1em 0.4em !important;

}



#noviews{

position:relative;
top:45px;
left:15px;
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
left:-22px;
background-color: rgba(0,0,0,0.8);
color: white;
font-weight: bold;
padding: 7px;
z-index: ;
font-size: 11px;

}






.nav_login,.nav_signup{

margin-left:40px !important;
font-weight: normal !important;
display: none! important;

padding: 2px !important;

border:2px solid white !important;

}


 .flickity-page-dots .dot{

  width:13px !important;
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

 .flickity-page-dots .dot{

  width:15px !important;
  height: 4px;
  margin: 0 !important;
  border-radius: 0 !important;
  
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

 .flickity-page-dots .dot{

  width:10px !important;
  height: 4px;
  margin: 0 !important;
  border-radius: 0 !important;
  
}

}


@media only screen and (min-width:400px) and (max-width:414px){

 .flickity-page-dots .dot{

  width:15px !important;
  height: 4px;
  margin: 0 !important;
  border-radius: 0 !important;
  
}


}










#package{

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 0px;
width:240px;
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


 .flickity-page-dots .dot{

  width:10px !important;
  height: 4px;
  margin: 0 !important;
  border-radius: 0 !important;
  
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


 .flickity-page-dots .dot{

  width:10px !important;
  height: 4px;
  margin: 0 !important;
  border-radius: 0 !important;
  
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
height: 150px;
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


@media only screen and (max-width:767px){

.main  .flickity-page-dots .dot.is-selected{

  background-color:rgba(255,165,50,1);
}


.main .flickity-page-dots .dot{

  width:15px;
  height: 4px;
  margin: 0;
  border-radius: 0;
  
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
color: lightblue;

}

@media only screen and (max-width:767px){

#main  .flickity-page-dots .dot{

  width:10px;
  height: 4px;
  margin: 0;
  border-radius: 0;
  
}

}






/*--------------------------------------------------------------
# navigation bar img
--------------------------------------------------------------*/


.button_navigation img{

width: 20px;
height:15px;
margin-top: -3px;

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


#search_page{

  margin-left: -350px;
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





.category{

	margin-top: 15px;
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


@media only screen and (max-width:431px) and (max-width:480px){


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
}






</style>


</head>
<body>

<!------------------------------------------Header--------------------------------------------------->

<?php include 'nav.php';  ?>
<?php include 'overlay.php';?>

<br><br>
	<div class="nav-container container">
<a class="category" href=""><?php echo $page ?></a><a class="category" style="color: skyblue;display: none;" href="checkout-page.php">Check out</a>
</div>
<br><br>
<div class="container">

<?php
require 'engine/configure.php';
$featured = mysqli_query($conn,"SELECT * FROM item_detail where sold = 0 and featured = 1 order by id desc");
if ($featured->num_rows>0) { ?>
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
<p><?php echo$page ?></p>
</div>

<br>


<h6><b>Recommended product</b></h6>

<div class="item_images">



<?php


require 'engine/configure.php';
$condition = "SELECT * from packages ";
$data = mysqli_query($conn,$condition);
$datafound = $data->num_rows;
echo "<table><tbody id='mytable' class=''>";

        while($row=mysqli_fetch_array($data))

        {        
            ?>
        <?php   

echo "<div id='package'>";
$price = $row['p_price'];
$dollar = round($price/$dollar_rate);

 
            if ($row['discount']>0) {

 echo "<span id='discount'>-".$row['discount']."%</span>";
 echo "<span class='' id='views'>".$row['views']." <i class='fa fa-eye'></i></span>";
}
if ($row['discount']==0) {

echo "<span class='' id='noviews'>".$row['views']." <i class='fa fa-eye'></i></span>";
}
   
echo "<a href='product-details.php?id={$row['p_id']}&{$row['p_name']}' target='_blank'><div style=''><img loading='lazy' id='imgitem' width='' src=".$row['p_image'].">"." "."</div></a>";


if ($row['discount']>0) {
$price = $row['p_price'];

  echo"<span style='text-decoration:line-through;' id='priceitem'>&#8358;".$price."</span> ";

  echo"<span id='priceitem'>&#8358;".round(( $price)-($row['discount']/100 * $price))."</span><br>";

   echo"<span style='text-decoration:line-through;' id='priceitem'>$".round($dollar)."</span>";

   echo"<span id='priceitem'>$".round(($dollar)-($row['discount']/100 * $dollar))."</span><br>";



}



       if ($row['discount']==0) {



 echo"<span id='priceitem'>&#8358;".$price."</span> ";
echo" <span id='priceitem'>$".($dollar)." </span><br>";


}

echo "<span id='nameitem' style='' ><a target='_blank' href='product-details.php?id={$row['p_id']}&{$row['p_name']}&{$row['p_details']}'>".$row['p_name']."</a></span>"."<br>";




  ?> 
                <?php


          echo"</div>";      
                
}
        ?>


</tbody></table>

</div>


<br><br>




<h6><b><?php echo$page ?> on discount</b></h6>

<div class="item_images">



<?php


$condition = "SELECT * FROM packages WHERE discount > 0";
$data = mysqli_query($conn,$condition);
$datafound = $data->num_rows;
echo "<table><tbody id='mytable' class=''>";

        while($row=mysqli_fetch_array($data))

        {        
            ?>
        <?php   

echo "<div id='package'>";
$price = $row['p_price'];
$dollar = round($price/$dollar_rate);

 
            if ($row['discount']>0) {

 echo "<span id='discount'>-".$row['discount']."%</span>";
 echo "<span class='' id='views'>".$row['views']." <i class='fa fa-eye'></i></span>";
}

       if ($row['discount']==0) {
  echo "<span class='' id='noviews'>".$row['views']." <i class='fa fa-eye'></i></span>";
}
   
echo "<a href='product-details.php?id={$row['p_id']}&{$row['p_name']}&{$row['p_details']}' target='_blank'><div style=''><img loading='lazy' id='imgitem' width='' src=".$row['p_image'].">"." "."</div></a>";



    if ($row['discount']>0) {


       $price = $row['p_price'];
  echo"<span style='text-decoration:line-through;' id='priceitem'>&#8358;".$price."</span> ";
  echo"<span id='priceitem'>&#8358;".round(( $price)-($row['discount']/100 * $price))."</span><br>";
  echo"<span style='text-decoration:line-through;' id='priceitem'>$".round($dollar)."</span>";
  echo"<span id='priceitem'>$".round(($dollar)-($row['discount']/100 * $dollar))."</span><br>";



}



       if ($row['discount']==0) {



 echo"<span id='priceitem'>&#8358;".$price."</span> ";
 echo" <span id='priceitem'>$".($dollar)." </span><br>";
}


echo "<span id='nameitem' style='' ><a target='_blank' href='product-details.php?id={$row['p_id']}&{$row['p_name']}&{$row['p_details']}'>".$row['p_name']."</a></span>"."<br>";




  ?> 
                <?php


          echo"</div>";      
                
}
        ?>


</tbody></table>

</div>


<br><br>




<h6><b>Deals under 10, 000</b></h6>

<div class="item_images">



<?php


require 'engine/configure.php';

$condition = "SELECT * from packages where p_price < 10000";
$data = mysqli_query($conn,$condition);
$datafound = $data->num_rows;
echo "<table><tbody id='mytable' class=''>";

        while($row=mysqli_fetch_array($data))

        {        
            ?>
        <?php   

echo "<div id='package'>";
$price = $row['p_price'];
$dollar = round($price/$dollar_rate);

 
            if ($row['discount']>0) {

 echo "<span id='discount'>-".$row['discount']."%</span>";
 echo "<span class='' id='views'>".$row['views']." <i class='fa fa-eye'></i></span>";
}

       if ($row['discount']==0) {

 echo "<span class='' id='noviews'>".$row['views']." <i class='fa fa-eye'></i></span>";
}
   
echo "<a href='product-details.php?id={$row['p_id']}&{$row['p_name']}&{$row['p_details']}' target='_blank'><div style=''><img loading='lazy' id='imgitem' width='' src=".$row['p_image'].">"." "."</div></a>";





    if ($row['discount']>0) {


       $price = $row['product_price'];
   echo"<span style='text-decoration:line-through;' id='priceitem'>&#8358;".$price."</span> ";
   echo"<span id='priceitem'>&#8358;".round(( $price)-($row['discount']/100 * $price))."</span><br>";
   echo"<span style='text-decoration:line-through;' id='priceitem'>$".round($dollar)."</span>";
   echo"<span id='priceitem'>$".round(($dollar)-($row['discount']/100 * $dollar))."</span><br>";



}



       if ($row['discount']==0) {
echo"<span id='priceitem'>&#8358;".$price."</span> ";
 echo" <span id='priceitem'>$".($dollar)." </span><br>";


}






echo "<span id='nameitem' style='' ><a target='_blank' href='product-details.php?id={$row['p_id']}&{$row['p_name']}&{$row['p_details']}'>".$row['p_name']."</a></span>"."<br>";




  ?> 
                <?php


          echo"</div>";      
                
}
        ?>


</tbody></table>

</div>


<br><br>



















<h6 style="font-weight: bold;text-transform: capitalize;">Other deals</h6><br>


<div class="main">





<?php


require 'engine/configure.php';

$condition = "SELECT * from item_detail where sold = 0";


$data = mysqli_query($conn,$condition);

$datafound = $data->num_rows;

echo "<table><tbody id='mytable' class=''>";

        while($row=mysqli_fetch_array($data))

        {        
            ?>
        <?php   

echo "<div id='package'>";


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







    if ($row['discount']>0) {


       $price = $row['product_price'];

  echo"<span style='text-decoration:line-through;' id='priceitem'>&#8358;".$price."</span> ";

  echo"<span id='priceitem'>&#8358;".round(( $price)-($row['discount']/100 * $price))."</span><br>";

   echo"<span style='text-decoration:line-through;' id='priceitem'>$".round($dollar)."</span>";

   echo"<span id='priceitem'>$".round(($dollar)-($row['discount']/100 * $dollar))."</span><br>";



}



       if ($row['discount']==0) {



 echo"<span id='priceitem'>&#8358;".$price."</span> ";


 echo" <span id='priceitem'>$".($dollar)." </span><br>";


}






echo "<span id='nameitem' style='' ><a target='_blank' href='product-details.php?id={$row['id']}&{$row['product_name']}&{$row['product_location']}&{$row['product_category']}&{$row['product_details']}'>".$row['product_name']."</a></span>"."<br>";



    
    
  echo"<span id='locitem'>".$row['product_location'].""."</span><br>";





  ?> 
                <?php


          echo"</div>";      
                
}
        ?>


</tbody></table>



</div>







<br>
















</div>







<br>




<?php

include 'footer.php';


?>



<script>
$('.numbering').load('engine/item-numbering.php');  

$('.main').flickity({
 
   cellAlign: 'left',
  contain: true,
  autoPlay: 3000,
  fade:true,
  friction:0.52,

  wrapAround:true
 
});
</script>



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











<!------------------------------------------btn-scroll--------------------------------------------------->

<a class="btn-down" onclick="topFunction()">&#8593;</a>

<script src="assets/js/scroll.js" type="text/javascript"></script>

<script src="assets/js/overlay.js" type="text/javascript"></script>

</body>
</html>