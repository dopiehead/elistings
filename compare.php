<?php session_start();
require 'engine/configure.php';
require 'engine/get-dollar.php';


if (!isset($_SESSION)) {
?>
<script type="text/javascript">
  window.location.href ='login.php';
</script>
<?php
}

if (isset($_SESSION['business_id'])) {
$buyer = $_SESSION['business_id'];
}
if (isset($_SESSION['sp_id'])) {
$buyer = $_SESSION['sp_id'];
}
if (isset($_SESSION['id'])) {
$buyer = $_SESSION['id'];
}?>




<!DOCTYPE html>
<html>
<head>
	<title>E-stores | Compare </title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/flickity.min.css">
   <link rel="stylesheet" href="assets/css/cart.css">
     <link rel="stylesheet" href="assets/css/overlay.css">
       <link rel="stylesheet" href="assets/css/btn_scroll.css">
                  <link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <script src="assets/js/sweetalert.min.js"></script> 
  <script src="assets/js/jquery-1.11.3.min.js"></script>
<script src="assets/js/flickity.pkgd.min.js"></script>
<style type="text/css">

body{

	font-family: poppins;
}





.back-button-container {
    position:absolute; /* Fixed position to stay at the top */
    top: 50px;
    left: 0;
    width: 100%;
    padding: 10px; /* Padding around the button */
    z-index: 1000; /* Ensure it's above other content */
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

font-size: 1rem;

}
}




.nav_signup{


border:1px solid none;
border-left:1px solid white;
border-left-color: rgba(192,192,192,1);
margin-left:0px;
font-weight: normal !important;



}

.nav_login{


font-weight: normal !important;
margin-left:50px;

}




#coca_cola img{

	
width:100%;


}


.discount_main{

	padding-top: 10px;

	margin-top: 15px;

	width: 100%;

	height: 30px;

	background-color: rgba(192,192,192,0.4);


	border:1px solid transparent;

	box-shadow: 0px 0px 5px rgba(0,0,0,0.3);

	text-align: center;

	text-transform: capitalize;
}


.discount_main p{ 
font-size: 13px;
margin-top: -5px;
}


h6{

	text-transform: capitalize;
}


/*--------------------------------------------------------------
# product list
--------------------------------------------------------------*/



.package{

  display: flex;

  align-items:flex-start;

  justify-content:space-around;

  width: 100%;

}



.package img{

  max-width: 80%;
  height: 150px;
}








.package a, .package span{

 
  min-width: 180px;
  font-size: 12px;
  color:black;




}

@media only screen and (max-width:497px){
.package img{

  max-width: 100%;
  height: 150px;
}


--------------------------------------------------------------*/



.package{

  display: flex;

  align-items: center;

  justify-content: center;

flex-direction: column;

  width: 100%;





}


.package a, .package span{

 
  min-width: 180px;
  font-size: 11px;
  color:black;




}




}




#info{


 padding-left: -100px;

 

}





.package figcaption{

 text-align: center;
}


.btn-success{

  box-shadow: 0px 2px 15px rgba(0,0,0,0.2);
}

#product_name{

  text-transform: capitalize;
}


/*--------------------------------------------------------------
# product list
--------------------------------------------------------------*/




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


.open-btn{display: block !important;color: black;}


}



</style>
</head>
<body>

<?php include 'nav.php'; ?>


 <div class="back-button-container">
        <a onclick='history.go(-1)' class="back-button"><i class='fa fa-chevron-left'></i></a>
    </div>

<?php include 'overlay.php'; ?>


<br><br>
	<div class="nav-container container">




<a class="category" href="">Compare product</a><a class="category" style="color: skyblue;display: none;" href="checkout-page?id=<?php echo urldecode($product_id)?>">Check out</a>


</div>

<br>

<div class="container discount_main">


	<p>Chicken</p>


</div>


<br><br>

<div class="package container">

<?php
require 'engine/configure.php';

$data =  mysqli_query($conn, "SELECT compare.product_id, compare.buyer_id,item_detail.id,  item_detail.product_name, item_detail.product_details, item_detail.product_location, item_detail.product_category, item_detail.product_price, item_detail.discount,  item_detail.product_image from compare,item_detail where compare.product_id =  item_detail.id AND compare.buyer_id = '".htmlspecialchars($buyer)."'");

if ($data) {

   $datafound = $data->num_rows;
  }
  //item product & styling
     
  

     ?>
    

<br>

<?php
      while($row=mysqli_fetch_array($data))
       {        
         

   echo"<div id ='info'>";

   $id = $row['id'];


    $price = $row['product_price'];
    $dollar = round($price/$dollar_rate);




    echo "<a href='product-details.php?id={$row['id']}&{$row['product_name']}&{$row['product_location']}&{$row['product_category']}&{$row['product_details']}' target='_blank'><img loading='lazy'  src=".$row['product_image'].">"." "."</a><br>";


  
       if ($row['discount']>0) {
            $price = $row['product_price'];
            echo"<span style='text-decoration:line-through;'>&#8358;".$price."</span> ";
            echo"<span>&#8358;".round(( $row['product_price'])-($row['discount']/100 * $price))."</span><br>";
            echo"<span style='text-decoration:line-throughf;'>$".round($price/$dollar_rate)."</span>";
            echo"<span >$".round(($dollar)-($row['discount']/100 * $dollar))."</span><br>";}



     if ($row['discount']==0) {
     echo"<span >&#8358;".$price."</span> ";
     echo"<span>$".round($price/$dollar_rate)." </span><br>";
}    



echo "<span id='product_name' ><a target='_blank' href='product-details.php?id={$row['id']}&{$row['product_name']}&{$row['product_location']}&{$row['product_category']}&{$row['product_details']}'>".$row['product_name']."</a></span>"."<br>";



     echo"<span >".$row['product_location'].""."</span><br>";
  echo"</div>";
   

                }   

        ?>



          
</div>

<br><br>
<div class="container"><a href="compare-product.php?id=<?php echo htmlspecialchars($id)?>" class="btn btn-success form-control"><i class="fa fa-plus"></i>Add more</a></div>


<br><br>


<?php

include 'footer.php';


?>


<!------------------------------------------btn-scroll--------------------------------------------------->

<a class="btn-down" onclick="topFunction()">&#8593;</a>

<script src="assets/js/scroll.js"></script>

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
  
  $('.numbering').load('engine/item-numbering.php');
</script>

<script src="assets/js/overlay.js"></script>

</body>
</html>