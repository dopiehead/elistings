<?php session_start();

if (isset($_GET['sp_speciality']) && !empty($_GET['sp_speciality'])) {
 $sp_speciality = $_GET['sp_speciality'];
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
  <link rel="stylesheet" href="assets/css/flickity.min.css">
       <link rel="stylesheet" href="assets/css/overlay.css">
   <link rel="stylesheet" href="assets/css/cart.css">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <script src="assets/js/sweetalert.min.js"></script> 
  <script src="assets/js/jquery-1.11.3.min.js"></script>
<script src="assets/js/flickity.pkgd.min.js"></script>
<style type="text/css">

body{font-family: poppins;}

h1 img{
    margin-left:5px;
}



table{

width: 100%;
border-collapse:separate !important;
padding:15px !important;

}


.check{
 padding:1px 29px; 
  border-radius:5px;
  font-size:9px;
   background-color:darkgreen;
   margin-top:-20px;
   margin-left:-8px;

  
}


.fa-check{
 
 color:white;
 padding:5px;
 background-color:darkgreen;
 border-radius:50%;
}


@media only screen and (max-width:497px){
.check{
 padding:1px 29px; 
  border-radius:5px;
  font-size:9px;
   background-color:darkgreen;
   margin-top:-35px !important;
   margin-left:0px;

  
}    
    
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

td{
    border-collapse:separate;
}


#think{
margin-left: 210px !important;

}

@media only screen and (max-width:497px){
#think{
margin-left: 34px !important;

}


.nav_login,.nav_signup{

margin-left:40px !important;
font-weight: normal !important;
display: none! important;

padding: 2px !important;

border:2px solid white !important;

}


}


@media only screen and (max-width:497px){
#think{
margin-left: 28px !important;
font-size: 0.8rem;

}
}

.fa-map-marker{
    color:red;
}


#menu_img{
    
     object-fit:cover;
    
	width:350 !important; 

	height: 170px !important;
	
	padding:10px;
	
	
}






@media only screen and (max-width:512px){


#menu_img{
    
    

	width:250px !important; 

	height: 100px;
	
	object-fit:cover;
}
}


@media only screen and (max-width:512px){

.fa-envelope, .fa-map-marker{

	font-size: 12px;
}


}

#speciality{width:1000px;}


@media only screen and (max-width:512px){

#speciality{width:100%;}

}
}

.menu_sp{
 
 margin-top:0px; 
 
 padding:10px;
 

    
}





.menu_sp  tr td a{

	font-size: 13px;
}


#home_verified{

  position: absolute;

  top:110px;

  left:130px;
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


.stars .fa-star{

 font-size:14px;
 color:black;
}

.stars{

position: relative;
top:-10px;
	
}


@media only screen and (max-width:512px){

#sp_name, #sp_name {

color:black;

font-size:20px !important;

text-transform: capitalize;

font-weight: bold;

}



#sp_location, #sp_location{

font-weight: bold;

font-size:0.6rem;

color: black;

}

}



#sp_name, #sp_name {

color:black;

font-size: 14px;

font-weight: bold;

text-transform: capitalize;

}



#sp_location, #sp_location{

font-weight:normal;

font-size:0.8rem;

color: black;

}





#sp_speciality, #sp_speciality{


font-size:0.9rem;

color: black;

}



@media only screen and (max-width:512px){


#sp_speciality, #sp_speciality{


font-size:0.8rem;

color: black;

text-transform:capitalize;

}

}



#sp_button{

color:white;background-color:blue;border-radius:8px;border:1px solid transparent;font-size:0.8rem;padding:3px 8px;

}




@media only screen and (max-width:512px){


#sp_button{

color:white;background-color:blue;border-radius:8px;border:1px solid transparent;font-size:0.9rem;padding:3px 8px;width:100%;

}


}









.menu_sp a{

color: black;

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

font-size: 12px;

background-color: rgba(0,0,0,0.1);

color: white;


}

@media only screen and (max-width:767px){

.menu_service_provider select{
    
   font-size: 17px; 
}

}




.menu_service_provider {


padding: 30px;

background-color: rgba(192,192,192,0.1);

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

width: 390px;


}


#search_page{

  margin-left: -350px;
}




.service_providers{

  width: 100%;

  font-size: 13px !important;

  text-align: center;

}



@media only screen and (max-width:767px){


.menu_sp img{
    
 object-fit:cover;

  width: 150px;

  height: 150px;

border-radius: 50%;
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

@media only screen and (max-width:1200px){

.button_navigation{

display: none;

}


.open-btn{display: block !important;font-size: 16px; margin-top: px;color: black;}


}

.button_navigation:hover{

opacity: 0.8;

text-decoration: none;

color: white;

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
}




/*--------------------------------------------------------------
# flickity
--------------------------------------------------------------*/




/*--------------------------------------------------------------
# footer
--------------------------------------------------------------*/


.footer h6{

  font-weight: bold;

  font-size: 15px;

  margin-bottom: 10px;
}

@media only screen and (max-width:497px){
 
 
.footer h6{
    
font-size: 21px !important;
 
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







</style>
</head>
<body>

<!------------------------------------------header navigation--------------------------------------------------->
<?php include 'nav.php'; ?>

<?php include 'overlay.php'; ?>


 <div class="back-button-container">
        <a onclick='history.go(-1)' class="back-button"><i class='fa fa-chevron-left'></i></a>
    </div>


<br><br>
	<div class="nav-container container">

<a class="category" href="">Service provider</a><a class="category" style="color: skyblue;" href="">Auto service provider</a><br><br>


</div>



<!------------------------------------------background picture--------------------------------------------------->

<div class="container" id="main_service_provider">
	

<br>


<!------------------------------------------background search criteria--------------------------------------------------->
<div class="menu_service_provider">



	
<h6>Search for Auto Service Provider</h6><br>

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



</select><br>


</div>


<div class="col-md-4"><select style="text-transform: capitalize;" id='btn_speciality' class="form-control">

<?php require 'engine/configure.php'; ?>
<option value="">Enter Speciality</option>
<option  selected value="<?php echo$sp_speciality?>"><?php echo$sp_speciality?></option>

</select>

</div>

</div>





</div>


<br>
</div>


<!------------------------------------------Service provider list--------------------------------------------------->




<div class="container">

<div id="speciality"></div>


</div>

<!------------------------------------------footer--------------------------------------------------->
<br><br><br>
<?php

include 'footer.php';


?>



<script type="text/javascript">

$('.numbering').load('engine/item-numbering.php');
  
$('.carousel').flickity({
 
  cellAlign: 'left',
  contain: true,
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


<script type="text/javascript">

$('.numbering').load('engine/item-numbering.php');
$("#loading-image").hide();
$('#speciality').load('engine/speciality.php');

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
$("#speciality").hide();
var sp_speciality = $('#btn_speciality').val();
var sp_category = $('#btn-category').val();
var sp_location = $('#location').val();
getData(sp_category,sp_location,sp_speciality);

});


$('#location').on('change',function(e) {
$("#loading-image").show();
$("#speciality").hide();
var sp_location = $('#location').val();
var sp_category = $('#btn-category').val();
getData(sp_category,sp_location);
});


$('#btn-category').on('change',function(e) {
$("#loading-image").show();
$("#speciality").hide();
var sp_category = $('#btn-category').val();
getData(sp_category);
});


function getData(sp_category,sp_location,sp_speciality,page) {
$.ajax({
url:"engine/speciality.php",
type:"POST",
data:{'sp_category':sp_category,'sp_location':sp_location,'sp_speciality':sp_speciality,'page':page},
success:function(data) {
$("#loading-image").hide();
$("#speciality").html(data).show();

  }


});


};
</script>



<script>
  
$('#btn_speciality').trigger('change');

</script>

<?php 

if ($sp_speciality!='') {?>

<script>

$(document).ready(function(){

$('#btn_speciality').children('option').each(function(){

if($(this).is(':selected')){

$(this).trigger('change');
}

  });

});

</script>
 
<?php } ?>








<script src="assets/js/overlay.js" type="text/javascript"></script>



</body>




</html>