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
	<title>E-stores | Subcription</title>
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

body{font-family: poppins;}




#think{
margin-left: 210px !important;

}

@media only screen and (max-width:497px){
#think{
margin-left: 110px !important;

}
}



@media only screen and (max-width:497px){
#think{
margin-left: 23px !important;
font-size: 1rem;

}
}





#basic h6{

background-color: rgba(225,225,225,0.4);
padding: 8px;
font-size: 14px;
font-weight: bold;
border-radius: 5px;
color: black !important;

border:1px solid transparent;

width:60%;



}


#basic{

text-align:;

}

#basic:nth-child(1),#basic:nth-child(3){

margin-top: 150px;

}

#basic small{

	text-align: center;
	align-self: center;
	align-content: center;
}



#basic p{

font-size: 13px;

}

#basic span{

	font-weight: bold;
	margin-top: 10px;
	font-size: 13px;
}

.basic,.advanced{


border:3px solid skyblue;
padding:20px;border-radius:8px;



}


.basic .fa-check,.advanced .fa-check{

font-size:12px;

border-radius: 50%;

background-color: black;

color:white;

padding:5px;

}



.basic .fa-close{

font-size:12px;

border-radius: 50%;

background-color:red;

color:white;

padding:5px;

}


.professional .fa-check{

font-size:12px;

border-radius: 50%;

background-color:white;

color:skyblue;

padding:5px;

}










.professional{

background-color:skyblue;
padding:20px;border-radius:8px;
color:white !important;

}





h2{
	font-weight: bold;
	margin-top: 25px;
}


h4{
	font-weight: bold;
	font-size: 40px;
}


hr{

	border:1px solid rgba(0,0,0,0.2);
	width: 80%;
}

#btn-advanced,#btn-professional,#btn-basic{

	border:1px solid transparent;
	font-size: 13px !important;
	font-weight: bold !important; 


}

#btn-professional{

	background-color: rgba(255,170,60,1) !important;
	font-weight: bold !important; 
}





#basic p span{

	background-color: rgba(150,252,150,0.5);
	color: green;

	padding: 0px 3px;
	
	margin-left: 10px;
	font-weight: normal;
	font-size:12px;
}



#btn-professional{

	background-color: orange;
}




#btn-advanced,#btn-basic{

	background-color: rgba(0,0,0,0.8);
	color: white;


}

#card{

	text-align: center;
	margin-top: 40px;
}


#card img{
	
	margin-top: -40px;
}


#card h6{

	
	font-weight: bold;
}


#card p:nth-child(2){

	border:2px solid skyblue;
	padding: 20px;
	border-radius: 8px;
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


.open-btn{display: block !important;font-size: 16px; margin-top: -6px;color: black;}


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

width: 310px;

display: none;


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
display: none;
}





/*--------------------------------------------------------------
# footer
--------------------------------------------------------------*/

.footer h6{

  font-weight: bold;

  font-size: 15px;

  margin-bottom: 10px;

 
  background-color: rgba(192,192,192,0.1) !important;

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
	<!------------------------------------------Navigation bar--------------------------------------------------->

<?php include 'nav.php'; ?>

<br><br>


<!------------------------------------------Navigation link--------------------------------------------------->

	<div class="nav-container container">

<a href="" class="category" style="color: skyblue;" href="customer-support.php">Subscribe</a>


</div>




<br>


<!------------------------------------------Section Q&A-------------------------------------------------->




<br><br>

<!------------------------------------------Section main-------------------------------------------------->

<div class="container">




	
<div  class=" row">
	

<div id="basic" class="col-md-4">


	<div class="basic">
	

<h6>BASIC</h6>

<p>For all individuals and starters who

want to start with domaining.</p>

<hr>


<h4>$19</h4>


<span>Per member, per month</span><br><br>

<p><i class="fa fa-check"></i> Access to All Features</p>
<p><i class="fa fa-check"></i> 1k looks up per month</p>
<p><i class="fa fa-close"></i> No API credit</p>
<p><i class="fa fa-check"></i> 20% discount on backorders</p>
<p><i class="fa fa-check"></i> 60 minutes Monitoring interval</p>
<p><i class="fa fa-check"></i> 10 Monitoring Quota</p>

<p><i class="fa fa-check"></i> Domain Name Appraisal   <span>coming soon</span></p>
<p><i class="fa fa-check"></i> Ip Monitoring    <span>coming soon</span></p>
<p><i class="fa fa-check"></i> Backlink Monitoring <span>coming soon</span></p><br>

<button class="form-control" id="btn-basic">Start free 14-day Trial</button>

<div align="center"><small>No credit card required</small></div>

</div>



</div>



<div id="basic" class="col-md-4">

<div class="professional">

<small style="padding:10px;background-color: rgba(192,192,192,0.5);color:darkblue;">Popular</small><br><br>
	
<h6 style="color: black;">PROFESSIONAL</h6>

<p>For professional domain names

investors with a big portfolio.</p>

<hr>

<h4>$49</h4>

<span>Per member, per month</span><br><br>


<p><i class="fa fa-check"></i> Access to All Features</p>
<p><i class="fa fa-check"></i> 1k looks up per month</p>
<p><i class="fa fa-check"></i> 20% discount on backorders</p>
<p><i class="fa fa-check"></i> 60 minutes Monitoring interval</p>
<p><i class="fa fa-check"></i> 10 Monitoring Quota</p>
<p><i class="fa fa-check"></i> 30K API Credits / month</p>
<p><i class="fa fa-check"></i> Domain Name Appraisal    <span>coming soon</span></p>
<p><i class="fa fa-check"></i> Ip Monitoring    <span>coming soon</span></p>
<p><i class="fa fa-check"></i> Backlink Monitoring    <span>coming soon</span></p><br>

<button class="form-control" id="btn-professional">Start free 14-day Trial</button>

</div>



</div>



<div id="basic" class="col-md-4">

<div class="advanced">
	
<h6>ADVANCED</h6>

<p>For businessess, enterprise domain

registrars and registries.</p>

<hr>

<h4>$99</h4>

<span>Per member, per month</span><br><br>

<p><i class="fa fa-check"></i> Access to All Features</p>
<p><i class="fa fa-check"></i> 1k looks up per month</p>
<p><i class="fa fa-check"></i> 20% discount on backorders</p>
<p><i class="fa fa-check"></i> 60 minutes Monitoring interval</p>
<p><i class="fa fa-check"></i> 10 Monitoring Quota</p>
<p><i class="fa fa-check"></i> 30K API Credits / month</p>
<p><i class="fa fa-check"></i> Domain Name Appraisal    <span>coming soon</span></p>
<p><i class="fa fa-check"></i> Ip Monitoring    <span>coming soon</span></p>
<p><i class="fa fa-check"></i> Backlink Monitoring    <span>coming soon</span></p><br>

<button class="form-control" id="btn-advanced">Start free 14-day Trial</button>

<div align="center"><small>No credit card required</small></div>

</div>


</div>






</div>




<div id="card">

<h2>Try our 100% free Plan</h2>

<p>Get started with our free plan and make 10 lookups per month absolutely free!
<button class="btn btn-warning">Signup for Free</button></p><br>



<h6>Payment Methods</h6><br>

<img src="assets/icons/group8888.png">

</div>

</div>






<!------------------------------------------footer--------------------------------------------------->

<?php

include 'footer.php';


?>



</body>
</html>