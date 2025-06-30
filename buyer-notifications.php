
<?php session_start(); ?>

<?php 

if (!isset($_SESSION['id'])) { ?>

<script>
  
window.location.href='login.php';

</script>

<?php
}
?>


<!DOCTYPE html>
<html>
<head>
	
        <title></title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/flickity.min.css">
      <link rel="stylesheet" href="assets/css/overlay.css">
         <link rel="stylesheet" href="assets/css/btn_scroll.css">
           <link rel="stylesheet" href="assets/css/cart.css">
  <script src="assets/js/sweetalert.min.js"></script> 
  <script src="assets/js/jquery-1.11.3.min.js"></script>
<script src="assets/js/flickity.pkgd.min.js"></script>
<style type="text/css">



h1  a img{

  margin-left: 20px !important;
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
font-size: 0.8rem;

}
}


#notification{

box-shadow: 0px 5px 13px rgba(0,70,90,0.5);

padding:10px;

margin-top: 40px;

margin-bottom: 30px;

border-radius: 14px;


}


#time{

	color: green;

	margin:20px 0px !important;
}



.fa-trash{



font-size: 40px;

padding: 40px;



}


#notification{

	font-size: 0.8rem;

	opacity: 0.7;


}



@media only screen and (max-width:480px){


#notification{

	font-size: 0.6rem;

	opacity: 0.7;


}





}




.btn-accept{


background-color:blue;

color:white;

float: right;

border-radius: 15px;

font-size: 13px;

margin-top: 10px;

opacity: 1;

}



.btn-reject{

border:2px solid blue;

color:blue;

opacity: 1;

border-radius: 15px;

font-size: 13px;

margin-top: 10px;
}


















body{font-family: poppins;}



#vendor_details{

box-shadow:0px 0px 8px rgba(0,70,90,0.5);

padding: 20px;

border-radius: 15px;

margin-top: 40px;

text-align: center;


}




#vendor_details img{

width:100px;

height:100px;

border-radius:50%;

box-shadow: 0px 0px 8px rgba(0,0,0,0.5);


}







#vendor_details  h6{

margin-top: 15px;

font-weight:bold;

text-transform:capitalize;

color: darkblue;

}



@media only screen and (min-width:499px) and (max-width:498px){


#vendor_details p{

margin-top: 25px;



}




}


#space{

width:150px;


}


.btn-info{

border-radius:15px;
}



#book{
 
border:2px solid skyblue;

color:skyblue;

font-weight:bold;

padding: 5px 25px !important;

margin-top: 10px;

border-radius: 13px;


}


small{

   position:absolute;
   margin-left: 35px;
   opacity: 0.6;
}




.main{

    background-image: url(assets/img/images.jpg);

    background-size:100%;

    background-position: center;

    height: 40vh;

    border-radius: 15px;
}



#stores{
    
    background-image:linear-gradient(to top right,#203d5b,skyblue,#203d5b);
    
    text-align:center;

    padding: 30px 20px;
}


#stores h6{
    
    font-weight:bold;

    color:white;

     text-shadow: 1px 1px black;
}


#stores p{
    
    color:white;
}


#stores .btn-stores{
    
    color:skyblue;

    background-color:white;

    border:1px solid skyblue;

    padding:5px 15px;

    font-size:0.9rem;

    box-shadow: 0px 3px 8px rgba(0,0,0,0.6);

    font-weight: bold;


}




.h6{

    font-size: 13px;
    font-weight: bold;
}


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


.nav_signup{


border:1px solid none;
border-left:1px solid white;
border-left-color: rgba(192,192,192,1);
margin-left:0px;



}


/*--------------------------------------------------------------
# product list
--------------------------------------------------------------*/



#package{

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 10px;

width:200px;

display: inline-block;
margin:1em 1em;

}

@media only screen and (max-width:498px){


#package{

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 10px;

width:140px;

display: inline-block;
margin:1em 1em;

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
}


.discount_main p{ 
font-size: 13px;
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


.open-btn{display: block !important;font-size:px;color: black;margin-top: 2px !important;}


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
    justify-content: space-between;*/   }


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


/*--------------------------------------------------------------
# section product  mobile
--------------------------------------------------------------*/

@media only screen and (max-width:797px){


#package{

width:10.5em;



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


<!------------------------------------------Header--------------------------------------------------->    
<?php include 'nav.php'; ?>
<?php include 'overlay.php';?>

<br><br>

<div class="container">

<a class="category" href="">Notification</a>

<br>

<?php  




require 'engine/configure.php'; 

$getNotification =mysqli_query($conn,"select * from buyer_notifications where recipient_id ='".htmlspecialchars($_SESSION['id'])."' and pending = 0 ");

if ($getNotification->num_rows>0) {
  


while ($row = mysqli_fetch_array($getNotification)) {
  

$id = $row['id'];

$senderID = $row['sender_id'];

$message = $row['message'];

?>

<div id="notification" class="container">
  

<p><?php echo$row['message']; ?></p>

<span id="time"><?php echo$row['date']; ?></span><br>



<div id="buttons"><a id="<?php echo$id?>" class="btn btn-reject" href="">Reject</a><a id="<?php echo$id?>" class="btn btn-accept" href="">Accept</a></div>


</div>


<?php } }  else{  echo"<div style='margin:120px 10px;opacity:0.7'><br><br>You have no notification yet<br></div>";      }

  ?>


<a class="btn-down" onclick="topFunction()">&#8593;</a>



</div>

<br>

<!------------------------------------------footer--------------------------------------------------->
<?php  include 'footer.php';  ?>


<input type="hidden" name="message" id="message" value="<?php echo$message?>">
<input type="hidden" name="sender_id" id="sender_id" value="<?php echo$senderID?>">
<script type="text/javascript">
$(document).on('click','.btn-accept',function(e){
    e.preventDefault();
if (confirm("Are you sure to accept this offer?")) {
$('.btn-accept').prop('disabled',true);
var del_id = $(this).attr('id');
var sender_id = $("#sender_id").val();
var message = $("#message").val();
$.ajax({
type: "POST",
url: "engine/accept-buy-offer.php",
data: {'id':del_id,'sender_id':sender_id,'message':message},
success: function(response) {
$('.btn-accept').prop('disabled',false);
if (response==1) {
swal({
text:"Offer accepted. Seller will be notified",
icon:"success",
});
}
else{
swal({
icon:"error",
text:response
 });
}
 },
error: function(jqXHR, textStatus, errorThrown) {
console.log(errorThrown);
}
})
}
    });
</script>



<input type="hidden" name="sender_id" id="sender_id" value="<?php echo$senderID?>">
<script type="text/javascript">
$(document).on('click','.btn-reject',function(e){
if (confirm("Are you sure to accept this offer?")) {
  e.preventDefault();

$('.btn-reject').prop('disabled',true);
var del_id = $(this).attr('id');
var sender_id = $("#sender_id").val();
$.ajax({
type: "POST",
url: "engine/decline-offer.php",
data: {'id':del_id,'sender_id':sender_id},
success: function(response) {
$('.btn-reject').prop('disabled',false);
if (response==1) {
swal({
text:"Offer declined. Seller will be notified",
icon:"success",
});
}
else{
swal({
icon:"error",
text:response
 });
}
 },
error: function(jqXHR, textStatus, errorThrown) {
console.log(errorThrown);
}
})
}
    });
</script>




<a class="btn-down" onclick="topFunction()">&#8593;</a>

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

<script src="assets/js/scroll.js" ></script>
<script src="assets/js/overlay.js"></script>

</body>
</html>