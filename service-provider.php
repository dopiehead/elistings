<?php session_start();
require 'engine/configure.php';
$sp =mysqli_query($conn,"SELECT * from service_providers where sp_verified =1"); 
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
	<title>E-stores | Service provider </title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
                <link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="stylesheet" href="assets/css/flickity.min.css">
    <link rel="stylesheet" href="assets/css/btn_scroll.css">
  <link rel="stylesheet" href="assets/css/cart.css">
  <link rel="stylesheet" href="assets/css/overlay.css">
   <script src="assets/js/sweetalert.min.js"></script> 
  <script src="assets/js/jquery-1.11.3.min.js"></script>
<script src="assets/js/flickity.pkgd.min.js"></script>
<style type="text/css">

body{font-family: poppins;}

h1 img{

  margin-left: 10px;
}

.active-link{ color:red}


.back-button-container {
    position:absolute; /* Fixed position to stay at the top */
    top: 40px;
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






#think{
margin-left: 210px !important;

}

@media only screen and (max-width:497px){
#think{
margin-left: 30px !important;

font-size: 0.8rem;
}

h6{
    
  font-size:1rem !important;  
    
}

}


@media only screen and (min-width:497px) and (max-width:797px){
#think{
margin-left: 30px !important;



}




}












@media only screen and (max-width:767px){

.nav_login{

margin-left:40px !important;
font-weight: normal !important;

}

}











@media only screen and (min-width:325px) and (max-width:376px){


#menu_sp_vulcanizer{

background-color:white;padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 1px;

width:10.4rem !important;

display: inline-block;
margin:1em 0.1em !important;

}


.nav_login,.nav_signup{


font-weight: normal !important;
display: none! important;



}








}







#loading-image{

width:90px;

height: 90px;

margin: 120px 180px;


}

.categoryName{
text-transform: capitalize;
font-size: 13px;
}


#head_popular{

background-color: rgba(0,70,90,0.8) !important;
color: white;
padding: 15px !important;

}

/*--------------------------------------------------------------
# pagination buttons
--------------------------------------------------------------*/


#page_num{
text-decoration: none;
color:black;
margin-right:8px;



}

.btn-success{

background-color: white;
box-shadow:0px 0px 2px rgba(0,70,90,0.7);
border:none;
padding: 8px;
color: rgba(0,70,90,0.9) !important;
cursor: pointer;

}

.prev,.next{
background-color: white;
box-shadow:0px 0px 2px rgba(0,70,90,0.7);
border:none;
padding:6px;
font-weight: bold;
cursor: pointer;
font-size:18px;  
}


.prev:focus,.prev:hover,.next:hover,.next:focus{
color: white !important;
box-shadow:0px 0px 2px rgba(0,70,90,0.7);
border:none;
padding:8px;

cursor: pointer;  
}





.btn-success:hover,.btn-success:focus{

background-color: rgba(0,70,90,0.7);
box-shadow:0px 0px 2px rgba(0,70,90,0.7);
border:none;
padding: 5px;
color: white !important;

}



.active-button{

background: rgba(0,70,90,0.7);
color:white !important;
padding: 8px;

}




/*--------------------------------------------------------------
# service vendors categories
--------------------------------------------------------------*/



#mechanic img, #vulcanizer img{



  width: 190px;
  height: 160px;
}

#mechanic{

  padding: 20px;
}



#mechanic h6, #vulcanizer h6{

  font-weight: bold !important;
  font-size: 14px;
}

@media only screen and (max-width:498px){
    
#mechanic h6, #vulcanizer h6{

  font-weight: bold !important;
  font-size: 23px !important;
}    
}

#vulcanizer{

  padding: 20px;
}



#see_all{

font-size: 12px;

color:white;


}



#home_verified{

  position: absolute;

  bottom:110px;

  right:50px;
}


#verified{

background-color: green;

color: white;

font-size: 11px;

padding: 0px 9px;

margin-left:-5px;

border-radius: 15px;

z-index: -1;




}


.fa-check{

  color: white;

  background-color: green;

  border-radius: 50%;

  border:1px solid transparent;

  z-index: 100;

  font-size: 21px;

  margin-top: 15px;
}



#sp_name, #sp_name a {

color:black;

font-size: 14px;

text-transform: capitalize;

}

@media only screen and (max-width:497px){


#sp_name, #sp_name a {

color:black;

font-size: 15px;

text-transform: capitalize;

}


.categoryName{
text-transform: capitalize;
font-size: 16px;
}


}




#sp_location, #sp_location a{

font-weight: bold;

font-size: 14px;

color: black;



}


@media only screen and (max-width:497px){



#sp_location, #sp_location a{

font-weight: bold;

font-size: 15px;

color: black;



}

}





#sp_speciality, #sp_speciality a{


font-size: 12px;

color: black;

 

}


@media only screen and (max-width:497px){



#sp_speciality, #sp_speciality a{


font-size: 12px;

color: black;



}

}




#menu_sp_vulcanizer{

  position: relative;

  display: inline-block;

  width: 240px;

  margin-right:18px;

  margin-left: 10px;

  margin-bottom: 20px;
  
  padding:10px;
  
 

  border:1px solid rgba(0,0,0,0.3);

}







#menu_sp_vulcanizer img{
    
  object-fit:cover;

  height: 200px;

  width: 100%;


}


@media only screen and (min-width:300px) and (max-width:325px){

#menu_sp_vulcanizer{



width:9rem !important;

display: inline-block;
margin:1em 0.15em !important;

}



}



@media only screen and (min-width:366px) and (max-width:403px){



#menu_sp_vulcanizer{

width:10rem !important;
display: inline-block;
margin:1em 0.10em !important;

}

}



@media only screen and (min-width:416px) and (max-width:430px){


#menu_sp_vulcanizer{

width:12rem !important;
display: inline-block;
margin:1em 0.10em !important;

}

}










@media only screen and (min-width:430px) and (max-width:498px){


#menu_sp_vulcanizer{

width:10rem !important;
display: inline-block;
margin:1em 0.15em !important;

}

}

@media only screen and (min-width:325px) and (max-width:376px){


#menu_sp_vulcanizer{

background-color:white;padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 5px;

width:10rem !important;

display: inline-block;
margin:1em 0.3em !important;

text-transform:capitalize;

}



.nav_login,.nav_signup{

margin-left:40px !important;
font-weight: normal !important;
display:none !important;

}

}


@media only screen and (min-width:377px) and (max-width:390px){


#menu_sp_vulcanizer{

background-color:white;padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 1px;

width:10.3rem !important;

display: inline-block;
margin:1em 0.2em !important;

}


.nav_login,.nav_signup{

margin-left:40px !important;
font-weight: normal !important;
display:none !important;

}







}











@media only screen and (min-width:400px) and (max-width:414px){


#menu_sp_vulcanizer{

background-color:white;padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 1px;

width:11.6rem !important;

display: inline-block;
margin:1em 0.15em !important;

}


.nav_login,.nav_signup{

margin-left:40px !important;
font-weight: normal !important;
display:none !important;

}

}




@media only screen and (max-width:497px){


#menu_sp_vulcanizer img{
    
   object-fit:cover;

   height: 160px;

  width: 100%;

  padding: 3px;
}


.nav_login,.nav_signup{

margin-left:40px !important;
font-weight: normal !important;
display:none !important;

}



}





@media only screen and (min-width:497px) and (max-width:767px){


#menu_sp_vulcanizer img{
    
    object-fit:cover;

   height: 160px;

  width: 190px;
}



#menu_sp_vulcanizer{

  position: relative;

  display: inline-block;

  margin-right:11px;

  margin-left:16px;

  margin-bottom: 20px;

  word-break: break-all;

  word-wrap: break-word;

  padding: 3px;

}




#sp_speciality, #sp_speciality a{


font-size: 10px;

color: black;





}






}










#menu_sp a{

color: black;

}


/*--------------------------------------------------------------
# navigation
--------------------------------------------------------------*/

.nav_signup{

font-weight: normal !important;
border:1px solid none;
border-left:1px solid white;
border-left-color: rgba(192,192,192,1);
margin-left:0px;



}

.nav_login{

font-weight: normal !important;

margin-left:80px;

}




/*--------------------------------------------------------------
background picture
--------------------------------------------------------------*/






#main_service_provider h6{color: white;font-weight: bold;}



#main_service_provider{



background-image: url(assets/icons/rectangle_28.png);

background-size: cover;

background-position: center;

width: 100%;

height: 100%;

position: relative;

text-align: center;

}



.menu_service_provider select{

font-size: 14px;

background-color: rgba(0,0,0,0.1);

color: white;


}


.menu_service_provider {


padding: 30px;

background-color: rgba(192,192,192,0.1);

margin-top: 10px;

border:1px solid white;

border-radius: 8px;





}


.menu_service_provider .btn-primary{

	font-size: 12px;

	color: white;
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

width: 390px !important;


}


#search_page{

  margin-left: -350px;
}

@media screen only and (max-width:497px){
  
  
  #menu_sp {


  font-size:21px !important;
  
 
}  
    
}


#menu_sp{

  margin-right: 25px;

  position: relative;
  
  
 
}


.service_providers{

  width: 100%;

  font-size: 13px !important;

  text-align: center;

}

#menu_sp img{

  width: 150px;

  height: 150px;

border-radius: 50%;
}


@media only screen and (max-width:767px){


#menu_sp img{

  width: 150px;

  height: 150px;

border-radius: 50%;
}

.menu_service_provider select{font-size:17px;}

}



/*--------------------------------------------------------------
# flickity
--------------------------------------------------------------*/


.flickity-page-dots{

 
  bottom: -35px;
  display: none;
}


 .flickity-page-dots .dot{

  width:100px !important;
  height: 6px;
  margin: 0 !important;
  border-radius: 0 !important;
  display: none;
  
}

@media only screen and (max-width:767px){


 .flickity-page-dots .dot{

  width:40px !important;
  height: 4px;
  margin: 0 !important;
  border-radius: 0 !important;
  display: none;
  
}


}



.flickity-page-dots .dot.is-selected{

  background-color:rgba(255,165,50,1);

  display: none;
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

	margin:17px 10px;

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

display:;
}




/*--------------------------------------------------------------
# flickity
--------------------------------------------------------------*/


#menu figure img{

width: 100%;
height:110px;



}


#menu{


	margin-left: 10px;
margin-right: 10px;
}


  
.carousel .flickity-prev-next-button {
  display: none;
}

    
.carousel .flickity-prev-next-button {
  display: none;
}
.flickity-button:disabled {

}    
  



.menu .flickity-prev-next-button {
  display: block;

  width:25px;
  height:25px;
}



.menu .flickity-page-dots{

 
  display: block;
}


.menu .flickity-page-dots .dot{

  width: 12px;
  height: 12px;
  opacity: 1;
  background: transparent;
  border: 2px solid white;
}

.menu .flickity-page-dots .dot.is-selected{

  background-color: white;
}


@media only screen and (max-width:497px){
    

.menu .flickity-prev-next-button.previous {
 
  left:-3px;
}

.menu .flickity-prev-next-button.next {
  

  right:-3px;
  
}


.menu .flickity-prev-next-button {
  display: block;

  width:25px;
  height:25px;
}



.menu .flickity-page-dots{

  bottom: 0px;
  display: inline-block;
}


.menu .flickity-page-dots .dot{

  width: 12px;
  height: 12px;
  opacity: 1;
  background: transparent;
  border: 2px solid white;

}

.menu .flickity-page-dots .dot.is-selected{

  background-color: white;
}



}

@media only screen and (min-width:497px) and (max-width:767px){
  
.menu .flickity-page-dots{

  bottom: 35px;
  display: inline-block;
}


.menu .flickity-page-dots .dot{

  width: 10px;
  height: 10px;
  opacity: 1;
  background: transparent;
  border: 2px solid white;
}

.menu .flickity-page-dots .dot.is-selected{

  background-color: white;
}



.menu{

  overflow-x: hidden;
  width: 100%;
  margin-top: 15px;
}


.menu .flickity-prev-next-button.previous {
 
  left:0;
  
}

.menu .flickity-prev-next-button.next {
  

  right:0;
  
}






}



/*--------------------------------------------------------------
# footer
--------------------------------------------------------------*/

.footer h6{

  font-weight: bold;

  font-size: 15px;

  margin-bottom: 10px;
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







</style>
</head>
<body>

<!------------------------------------------header navigation--------------------------------------------------->
<?php include 'nav.php'; ?>

<?php include 'overlay.php';?>

 <div class="back-button-container">
        <a onclick='history.go(-1)' class="back-button"><i class='fa fa-chevron-left'></i></a>
    </div>

<br><br>
<div class="nav-container container">
<a class="category" href="">Service provider</a><a class="category" style="color: skyblue;" href="">Auto service provider</a>
</div><br>



<!------------------------------------------background picture--------------------------------------------------->

<div class="container" id="main_service_provider">

<br>

<!------------------------------------------background search criteria--------------------------------------------------->
<div style="backdrop-filter: blur(8px);" class="menu_service_provider">



	
<h6 style="z-index: 99;position: relative;">Search for Auto Service Provider</h6><br>

<div style="z-index: 99;position: relative;" class="row">
<div class="col-md-4"><select id="btn-category" class="form-control">
<option value="">Enter category</option>
<option value="information technology">Information technology</option>
<option value="mechanic">Mechanic</option>
<option value="vulganizer">Vulganizer</option>
<option value="teaching">Teaching</option>
<option value="plumbing services">Plumbing services</option>
<option value="electrical/inverter services">Electrical / Inverter services</option>
<option value="cleaning/laundy/fumigation">Cleaning / Laundry / Fumigation</option>
<option value="carpentry services">Carpentry Services</option>
<option value="appliances electronics">Appliances Electronics</option>
<option value="Ac/refrigeration services">AC /Refrigeration Services</option>


</select><br></div>
<div class="col-md-4"><select style="text-transform: capitalize;" id='btn_speciality' class="form-control">
<option value="">Enter speciality</option>
<?php
 while ($row_cat = mysqli_fetch_array($sp) ) {

$sp_speciality_category  = $row_cat['sp_speciality'];
?>
<option value="<?php echo $sp_speciality_category?>"><?php echo $sp_speciality_category?></option>

<?php
}

?>

</select><br></div>

<div class="col-md-4">
<select class="form-control" name="location" id="location">
            <option selected="" value="">Entire Nigeria</option>
        <option value="Kwara">Kwara</option>
        <option value="Kogi">Kogi</option>
          <option value="Oyo">Oyo</option>
            <option value="Kano">Kano</option>
              <option value="Enugu">Enugu</option>
              <option value="Ebonyi">Ebonyi</option>
                <option value="Owerri">Owerri</option>
                  <option value="FCT-Abuja">FCT-Abuja</option>
                    <option value="Osun">Osun</option>
                    <option value="Ogun">Ogun</option>
                      <option value="Lagos">Lagos</option>
                        <option value="Port-Harcourt">Port-Harcourt</option>
                        <option value="Bauchi">Bauchi</option>
                          <option value="Benue">Benue</option>
                            <option value="Borno">Borno</option>
                              <option value="Cross-River">Cross-River</option>
                                <option value="Delta">Delta</option>
                                  <option value="Edo">Edo</option>
                                  <option value="Imo">Imo</option>
                                    <option value="Ondo">Ondo</option>
                                      <option value="Niger">Niger</option>
                                        <option value="Sokoto">Sokoto</option>
                                          <option value="Zamfara">Zamfara</option>
                                          <option value="Kebbi">Kebbi</option>
                                          <option value="Kaduna">Kaduna</option>
                                          <option value="Abia">Abia</option>
                                           <option value="Adamawa">Adamawa</option>
                                            <option value="Akwa-Ibom">Akwa-Ibom</option>
                                            <option value="Anambra">Anambra</option>
                                            <option value="Bauchi">Bauchi</option>
                                            <option value="Gombe">Gombe</option>
                                            <option value="Pleateau">Pleateau</option>
                                            <option value="Rivers">Rivers</option>
                                            <option value="Nassarawa">Nassarawa</option>



</select><br></div>
</div>
</div>
<br><br>
</div>



<!------------------------------------------Service provider list--------------------------------------------------->


<div class="container"><br>
<h6><b>Service Providers</b></h6><br>
</div>
<div class="container service_providers">
	

<div class="menu">
<?php
require 'engine/configure.php';
$service_provider = mysqli_query($conn,"SELECT * from service_provider_category");
while ($row = mysqli_fetch_array($service_provider)) {
$sp_id = $row['id'];  
$sp_speciality = $row['sp_speciality'];
echo"<div id='menu_sp'>";
echo"<a id='{$sp_speciality}' href='sp_speciality.php?sp_speciality={$sp_speciality}'  value='{$sp_speciality}' class='branch'><img src=".$row['sp_category_img']."></a><br>";
echo"<a id='{$sp_speciality}' href='sp_speciality.php?sp_speciality={$sp_speciality}' class=' categoryName' value='{$sp_speciality}'>". $row['sp_speciality']."</a><br>";
echo"</div>";

}
?>
</div>
</div>
<br><br>


<div class="spinner-border text-info" id="loading-image"></div>

<!------------------------------------------Elements--------------------------------------------------->
<div class="container" id="elements"></div>
</div>
<br><br>




<!------------------------------------------footer--------------------------------------------------->

<?php
include 'footer.php';
?>


<script>
  
$('.menu').flickity({
 cellAlign: 'left',
contain: true,
autoPlay:true
});

</script>


<script type="text/javascript">
$('.numbering').load('engine/item-numbering.php');
$("#loading-image").hide();
$('#elements').load('engine/service-provider-engine.php?page=1');

$(document).on('click','.btn-success',function(e) {
e.preventDefault();
var page = $(this).attr('id');
var sp_speciality = $('#btn_speciality').val();
var sp_category = $('#btn-category').val();
var sp_location = $('#location').val();
if (page!='') {
$('.btn-success').removeClass('active-button');
$(this).addClass('active-button');
}
getData(sp_category,sp_location,sp_speciality,page);
  
});

$('#btn_speciality').on('change',function(e) {
$("#loading-image").show();
$("#elements").hide();
var sp_speciality = $('#btn_speciality').val();
var sp_category = $('#btn-category').val();
var sp_location = $('#location').val();
getData(sp_category,sp_location,sp_speciality);

});


$('#location').on('change',function(e) {
$("#loading-image").show();
$("#elements").hide();
var sp_location = $('#location').val();
var sp_category = $('#btn-category').val();
getData(sp_category,sp_location);
});


$('#btn-category').on('change',function(e) {
$("#loading-image").show();
$("#elements").hide();
var sp_category = $('#btn-category').val();
getData(sp_category);
});


function getData(sp_category,sp_location,sp_speciality,page) {
$.ajax({
url:"engine/service-provider-engine.php",
type:"POST",
data:{'sp_category':sp_category,'sp_location':sp_location,'sp_speciality':sp_speciality,'page':page},
success:function(data) {
$("#loading-image").hide();
$("#elements").html(data).show();

  }


});


};
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
<script src="assets/js/overlay.js" type="text/javascript"></script>
</body>
</html>