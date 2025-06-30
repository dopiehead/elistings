<?php session_start();?>

<?php session_start();
if(!isset($_SESSION['id']) && !isset($_SESSION['sp_id']) && !isset($_SESSION['business_id'])){echo"<script>window.location.href='login.php';</script>";}
?>

<!DOCTYPE html>
<html>
<head>
	<title>E-stores | Service provider details </title>
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
      <link rel="stylesheet" href="assets/css/overlay.css">
         <link rel="stylesheet" href="assets/css/btn_scroll.css">
           <link rel="stylesheet" href="assets/css/cart.css">
  <script src="assets/js/sweetalert.min.js"></script> 
  <script src="assets/js/jquery-1.11.3.min.js"></script>
<script src="assets/js/flickity.pkgd.min.js"></script>

<style type="text/css">

body{

	font-family: poppins;
}

.btn-danger{
margin-top:-3px !important;
color:white !important;

}


.btn-info{

color:white !important;
}


.fa-map-marker{
    color:green;
}


.loader{
    margin-left:10px;position:absolute;
    display:none;
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

#img_exp{

margin-right:10px;
width:180px !important;
height:100% !important;
}


#img{
  
  height:150px !important;  
    
}


.active-link{

	display: none;
}

.active-button{

display: none;

}

h1 img{

	margin-left: 10px;
}


h6{
    
    font-size:23px !important;
}


@media only screen and (max-width:767px){

.nav_login{

margin-left:40px !important;
font-weight: normal !important;

}

}




@media only screen and (min-width:430px) and (max-width:498px){

.nav_login,.nav_signup{

margin-left:40px !important;
font-weight: normal !important;
display: none! important;

padding: 2px !important;

border:2px solid white !important;

}

#product_image img{
 width: 100%;

 margin-left: 13px !important;

 height: 25rem;
	
}

.btn-success{

margin-left: 13px !important;

}


}

@media only screen and (min-width:325px) and (max-width:376px){

.nav_login,.nav_signup{

margin-left:40px !important;
font-weight: normal !important;
display: none! important;

padding: 2px !important;

border:2px solid white !important;

}


.category{

	margin:5px;

	margin-right: 4px;

	font-size: 13px;

	border:1px solid rgba(0,0,0,0.2);

	padding: 2px 10px;

	border-radius: 15px;

	text-transform: capitalize;

	color: black;

	text-decoration: none;


}



#product_image img{
 width: 100%;

 margin-left: 13px !important;

 height: 25rem;
	
}


.btn-success{
	
margin-left: 13px !important;

}

}


@media only screen and (min-width:377px) and (max-width:390px){


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

.category{

	margin:2px;

	margin-right:2px;

	font-size: 13px;

	border:1px solid rgba(0,0,0,0.2);

	padding: 3px 10px;

	border-radius: 15px;

	text-transform: capitalize;

	color: black;

	text-decoration: none;


}

#product_image img{
 width: 100%;

 margin-left: 13px !important;

 height: 25rem;
	
}

.btn-success{
	
margin-left: 13px !important;

}

}











@media only screen and (min-width:400px) and (max-width:414px){



.nav_login,.nav_signup{

margin-left:40px !important;
font-weight: normal !important;
display: none! important;

padding: 2px !important;

border:2px solid white !important;

}

.category{

	margin:2px !important;

	margin-right:2px !important;

	font-size: 13px;

	border:1px solid rgba(0,0,0,0.2);

	padding: 3px 10px;

	border-radius: 15px;

	text-transform: capitalize;

	color: black;

	text-decoration: none;
}


.btn-success{
	
margin-left: 13px !important;

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

}











@media only screen and (min-width:415px) and (max-width:430px){


.nav_login,.nav_signup{

margin-left:40px !important;
font-weight: normal !important;
display: none! important;
padding: 2px !important;
border:2px solid white !important;


}



.category{

	margin:2px !important;

	margin-right:2px !important;

	font-size: 13px;

	border:1px solid rgba(0,0,0,0.2);

	padding: 3px 10px;

	border-radius: 15px;

	text-transform: capitalize;

	color: black;

	text-decoration: none;


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



.category{

	margin:2px;

	margin-right:2px;

	font-size: 13px;

	border:1px solid rgba(0,0,0,0.2);

	padding: 3px 10px;

	border-radius: 15px;

	text-transform: capitalize;

	color: black;

	text-decoration: none;


}


#product_image img{
 width: 100%;

 margin-left: 13px !important;

 height: 25rem;
	
}

.btn-success{
	
margin-left: 13px !important;

}

}



.btn-drop{

	font-size: 13px;

	border:1px solid transparent;

	box-shadow: 0px 3px 8px 0px rgba(0,0,0,0.4);

	background-color: white;

	color:black;
}



.btn-drop:focus{

	outline:1px solid skyblue;
}

#think{
margin-left: 210px !important;

}

@media only screen and (max-width:797px){
#think{
margin-left: 30px !important;

}
}







.btn-success{

	color: white !important;
}


#add_photo{

	font-size: 0.8rem;

	
}


.fa-star{

	color:rgba(0,0,0,0.4);
}


.fa-plus{

  
  padding: 8px 14px;

  background-color: rgba(192,192,192,0.3);



}





#popup,#popupAbuse,.popPay{
background-color: rgba(248,248,248,0.3);  
background-color: rgba(248,248,248,0.3);  
position:fixed;
top: 50%;
left: 50%;
transform: translate(-50%,-50%);
width: 350px;
padding:5px;
z-index: 99;
box-shadow: 0 5px 30px rgba(0,0,0,.30);
background: #fff;
visibility:hidden;
opacity:0;
transition: 0.3s;

}

#popup.active,#popupAbuse.active,.popPay.active{
  
visibility: visible;
opacity: 1;
transition: 0.3s;

    }

#close,#closeAbuse,.closePay{

font-size: 12px;
color:white;
cursor: pointer;
float:right;



}



#close:hover, #close:focus,#closeAbuse#close:hover,#closeAbuse:focus,.closePay:hover,.closePay:focus{
opacity: 0.6;
border: none;
outline: none;
 outline: none;

}




#popup-comment{
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
visibility:hidden;
opacity:0;
transition: 0.3s;
text-align: center;
font-size: 13px !important;
font-family: poppins !important;

}



#popup.active,#popup-comment.active{
  
visibility: visible;
opacity: 1;
transition: 0.3s;

    }

#close,#close-comment,#closeAbuse{

font-size: 12px;
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
#close:hover, #close:focus, #close-comment:hover,#close-comment:focus,#closeAbuse:hover,#closeAbuse:focus{
opacity: 0.6;
border: none;
outline: none;
 outline: none;

}


#popup input,#popup textarea,#popup-comment input,#popup-comment textarea{

border:1px solid rgba(0,0,0,0.1);

box-shadow: 0px 0px 4px rgba(0,0,0,0.2);

margin: 10px 0px;

font-size: 0.9rem !important;



}


#btn-comment{

	text-transform: capitalize;
	font-family: poppins;
	color: white;
	box-shadow:0px 5px 8px rgba(0,0,0,0.3);
	border-radius:3px;
}

.btn-comment:hover,.btn-comment:focus{

outline: 3px solid skyblue;

}


input[type=submit]{

font-size: 12px;
cursor: pointer;
margin-right: 10px;
text-transform: capitalize;

}


.nav_signup{


border:1px solid none;
border-left:1px solid white;
border-left-color: rgba(192,192,192,1);
margin-left:0px;

}



.nav_login{

margin-left:80px;

}



.col-md-8 img{


width: 450px;

height: 70%;



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

font-size: 15px;

color: white;

border:1px solid transparent;

border-radius: 50%;

background-color: green;

padding:2px 8px;

margin-left:-10px;

}


.housing_delivery .btn-info, .housing_delivery .btn-success{

font-size: 12px;

}


.review{

	margin-right: 25px;

	width: 50%;


}




.review p{

	font-size: 13px;

	
}



.btn-primary{

	font-size: 13px;

	
}

@media only screen and (max-width:498px){

.btn-primary{

	font-size: 15px !important;
	
	margin-top:-2px !important;
	
	color:white !important;
	
	padding:10px;

	
}

}
.sp_review .flickity-page-dots{

 
  display:none !important;

  
}

.btn-primary{

	margin-top: 20px;
}


#sp_name{

	text-transform: capitalize !important;
}





#product_image{
 width: 100%;
	
}


#product_image img{
 width: 100%;

 height: 25rem;
	
}

.main img{

	width: 230px;

	height:150px;
}

.main a{

	color:black;
	font-size: 13px;
}

#menu_sp{

	margin-right: 20px;
}




#opening_hours{

	background-color:rgba(192,192,192,0.3);padding:20px;font-size:13px;
}


.housing_delivery{

padding: 10px;



}

.housing_delivery p{

font-size: 13px;

}



.extensions ul{

list-style-type: none;



}

.extensions ul li a{

color: black;

font-size: 12px;

}


.extensions ul li{

display: inline-block;

margin:30px;


}




@media only screen and (min-width:497px) and (max-width:767px){

.extensions ul li{

display: inline-block;

margin:15px;


}


}



@media only screen and (max-width:497px){

.extensions ul li{

display: inline-block;

margin:5px 5px;


}

.btn-danger{

font-size:13px;

}


}





.extensions .fa-check{


background-color: white;
color:black;

border-radius: 50%;

border:1px solid black;
padding:0px 4px;

}





@media only screen and (max-width:498px){

.housing_delivery h6{

font-size: 21px !important;

}
    
}




.housing_delivery h6{

font-size: 14px;

}


.p_bio{


	font-size: 12px;
}

#home_verified{

	float: left;
	font-size: 8px;
	margin-top: -20px;
	
}

#verified{
	background-color: green;
	padding:0px 40px;
	border-radius: 20px;
}


#menu_sp{

	text-transform: capitalize;
}


#store{


text-align: center;

background: linear-gradient(to top right, skyblue, white,skyblue);

color: black;

padding:65px 30px;

margin-top: 30px;


}


#store h6{

font-weight: bold;

color:black;



}

@media only screen and (max-width:498px){

#store h6,h6{

font-weight: bold;

color:black;

font-size:21px !imporant;



}

}


#store p{


font-size: 13px;


}








.btn-store{

	color: skyblue;

	background-color: white;

	border:1px solid skyblue;
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

@media only screen and (max-width:1200px){

.button_navigation{

display: none;

}





}



@media only screen and (max-width:767px){

.open-btn{display: block !important;color: black !important; margin-left: 20px;}


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
	justify-content: space-between;*/	}


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


@media only screen and(min-width:430px) and (max-width:480px){


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

margin-top: 2px !important; 
}


/*--------------------------------------------------------------
# menu navbar
--------------------------------------------------------------*/


#discount{

	direction: none;
}



#make_request{

font-weight: bold;

font-size: 14px;

color: skyblue;

padding: 10px 10px;


border:1px solid skyblue;


}




#report_abuse{

padding: 0px 10px;

color: white;

float: right;

background-color: rgba(255,140,60,0.9);

border:1px solid transparent;

font-weight: bold;

font-size: 14px;


}


/*--------------------------------------------------------------
# product listings
--------------------------------------------------------------*/



#package{

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 10px;

width:200px;


margin:1em 1em;

}

@media only screen and (max-width:498px){


#package{

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 10px;

width:130px;

display: inline-block;
margin:1em 1.5em;

}



}


@media only screen and (min-width:499px) and (max-width:797px){



#package{

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 10px;

width:200px;

display: inline-block;
margin:1em 1em;

}



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






.nav_signup{


border:1px solid none;
border-left:1px solid white;
border-left-color: rgba(192,192,192,1);
margin-left:0px;



}

@media only screen and (max-width:767px){


.nav_signup{

font-weight: normal;


}


}


.btn-success{

	cursor: pointer;
}



.nav_login{



margin-left:50px;

}


.main.flickity-prev-next-button {
  display: none;
}

    
.main .flickity-prev-next-button {
  display: none;
}
.flickity-button:disabled {

}    
  

@media only screen and (max-width:767px){

.main  .flickity-page-dots .dot.is-selected{

  background-color:rgba(255,165,50,1);
}
.main  .flickity-page-dots .dot{

  width:18px !important;
  height: 4px;
  margin: 0;
  border-radius: 0;


  
}

}





.main .flickity-page-dots{

 
  display: block;

   margin-top: 25px;
}


.main .flickity-page-dots .dot.is-selected{


background-color: skyblue;


}


.main  .flickity-page-dots .dot{

  width:80px;
  height: 4px;
  margin: 0;
  border-radius: 0;


  
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






</style>
</head>
<body>

<!------------------------------------------Header--------------------------------------------------->

<?php include 'nav.php';  ?>

<?php include 'overlay.php';?>

<br><br><br><br><br>


<?php
$product_id = $_SESSION['product'];
if(isset($_GET['reference'])){
require 'engine/configure.php';
$mypay = mysqli_query($conn,"UPDATE item_detail SET featured = 1 where id ='$product_id'");
if($mypay){
echo"payment was successful";
 ?>
<p>Please proceed to <a href="mylistings.php">profile page</a> to verify</p> 
     
<?php
unset($_SESSION['product']);
}

else{
    
  echo"Payment was unsuccessful";  
    
    
}


}


?>

<br><br><br><br><br><br>
<?php include 'footer.php'; ?>
</body>
</html>