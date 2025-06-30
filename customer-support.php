<?php session_start();
 require 'engine/configure.php';  
if(isset($_POST["submit"])) {  
if(!empty($_POST["search"]))  {  
$query = str_replace(" ", "+", mysqli_real_escape_string($conn,$_POST["search"]));
  header("location:search-process.php?search=" .htmlspecialchars($query)); 
 }  

 }  

 ?>  
<!DOCTYPE html>
<html>
<head>
	<title>E-stores | Customer support</title>
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/flickity.min.css">
    <link rel="stylesheet" href="assets/css/cart.css">
       <link rel="stylesheet" href="assets/css/btn_scroll.css">
    <link rel="stylesheet" href="assets/css/overlay.css">
  <script src="assets/js/sweetalert.min.js"></script> 
  <script src="assets/js/jquery-1.11.3.min.js"></script>
<script src="assets/js/flickity.pkgd.min.js"></script>
<style type="text/css">




h1 img{

	margin-left: 10px;
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




#think{
margin-left: 210px !important;

}

@media only screen and (max-width:497px){
#think{
margin-left: 30px !important;
font-size: 0.8rem;

}


.nav_login,.nav_signup{

margin-left:40px !important;
font-weight: normal !important;
display:none !important;
}


}


@media only screen and (min-width:497px) and (max-width:797px){
#think{

font-size: 1rem;

}
}



@media only screen and (max-width:767px){

.nav_login{

margin-left:40px !important;
font-weight: normal !important;

}

}







body{font-family: poppins;}


#questions p{

	font-size: 13px;

	font-weight: bold;

	background-color: white;

	padding: 30px;

	border-radius: 8px;



	
}

@media only screen and (max-width:767px){
    
#questions p{
    
 font-size: 14px;   
    
}  
    
}



#questions p a{

	color: black;

	cursor: pointer;

	text-decoration: none;



	
}



#questions p a:hover{

	opacity: 0.6;



	
}










#questions{

background-color: skyblue;

padding-top: 30px;


}


.col-md-6{


width:100%;

text-align: center;

border-radius:5px;



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
margin-left:80px;

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


.main_header input{


font-size: 12px;

background-color: rgba(192,192,192,0.3);

border:1px solid transparent;


}


.main_header input::placeholder {

	text-align: center;
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

color:black !important;

text-decoration: none;

transition: 0.3s ease-in-out;

}


.category nth-child(3){

	
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

  font-weight: bold;

  font-size: 21px;

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







</style>
</head>
<body>
	<!------------------------------------------Navigation bar--------------------------------------------------->

<?php include 'nav.php'; ?>

<?php include 'overlay.php';?>

 <div class="back-button-container">
        <a onclick='history.go(-1)' class="back-button"><i class='fa fa-chevron-left'></i></a>
    </div>


<br><br>


<!------------------------------------------Navigation link--------------------------------------------------->

	<div class="nav-container container">

<a href="" class="category" style="color: skyblue;" href="customer-support.php">Customer support</a>


</div>




<br>


<!------------------------------------------Section Q&A-------------------------------------------------->


<div  class="container main_header">

<input type="text" name="" class="form-control" placeholder="What would you like us to help you with?">


</div>

<br><br>

<!------------------------------------------Section main-------------------------------------------------->

<div  id="questions" class="container">




	
<div  class=" row">
	
<div class="col-md-6 col-sm-6 col-6">

	<p><a href="">A delivery, order or return</a></p><br>

</div>



<div class="col-md-6 col-sm-6 col-6">

	<p><a href="">Login & password</a></p>

	<br></div>


</div>



<div class=" row">


<div class="col-md-6 col-sm-6 col-6">

	<p><a href="">Address, security & Privacy</a></p><br>

</div>

<div class="col-md-6 col-sm-6 col-6">

	<p><a href="">Report something suspicious</a></p><br>

</div>

</div>



<div  class="row">

<div class="col-md-6  col-sm-6 col-6">

	<p><a href="">Membership & subscriptions</a></p><br>

</div>

<div class="col-md-6 col-sm-6 col-6">

	<p><a href="">Something else</a></p><br>

</div>


</div>















</div>







<br><br>




</div>







<!------------------------------------------footer--------------------------------------------------->

<?php

include 'footer.php';


?>
<script type="text/javascript">
$('.numbering').load('engine/item-numbering.php');
</script>
<!------------------------------------------btn-scroll--------------------------------------------------->

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


<a class="btn-down" onclick="topFunction()">&#8593;</a>

<script src="assets/js/scroll.js" type="text/javascript"></script>

<script src="assets/js/overlay.js" type="text/javascript"></script>
</body>
</html>