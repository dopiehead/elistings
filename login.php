<?php session_start();
error_reporting(E_ALL ^ E_NOTICE);

if (isset($_GET['step']) && !empty($_GET['step'])):
$step = $_GET['step'];
$url = $step.".php";
endif;

if (isset($_GET['details']) && !empty($_GET['details'])):
$details = $_GET['details'];
$url_details = $details;
endif;

?>




<!DOCTYPE html>
<html>
<head>
	<title>E-stores | Login page </title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/flickity.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
  <link rel="stylesheet" href="assets/css/overlay.css">
  <script src="assets/js/sweetalert.min.js"></script> 
  <script src="assets/js/jquery-1.11.3.min.js"></script>
<script src="assets/js/flickity.pkgd.min.js"></script>

</head>
<body>

 <?php include 'components/header.php';  ?>

	<div class="wrap">

 <div class="back-button-container">
        <a onclick='history.go(-1)' class="back-button"><i class='fa fa-chevron-left'></i></a>
    </div>

<br>

<div class="main">

	<h6>Log In</h6>

	<div style="text-align: center">

	<small style="">Enter Your Credentials to login</small>

</div>
	
<form method="post" id="signin-form">

<select id="user_type" name="user_type" class="form-control">

<option value="buyer">Buyer</option>
<option value="vendor">Vendor</option>
<option value="service_provider">Service Provider</option>
<option value="admin">Admin</option>

</select><br>

<input type="text" class="form-control" placeholder="Enter your email address" name="user_email"><br>

<input type="password" class="form-control" placeholder="Enter your password" name="user_password"><br>

<p><a href="forgot-password.php">Forgot password</a><span><a href="join-us.php">Create new account</a></span></p><br>

<div align="center" style="display: none;" id="loading-image"><br><img id="loader" src="loading-image.GIF"></div>

<button id="btn-signin" class="btn btn-danger form-control">Login</button>

</form>


</div>
</div>

<br>

<?php

include 'footer.php';


?>


<!------------------Redirect url to last visited page-->

<input type="hidden" name="url" id="url" value="<?php if(!empty($url)){echo$url;} ?>">

<input type="hidden" name="url_details" id="url_details" value="<?php  if(!empty($url_details)){echo$url_details;}?>">


<script type="text/javascript">

 var url = $('#url').val();

  var url_details = $('#url_details').val();

  var postData = "text";

  $('#btn-signin').on('click',function(e){

        e.preventDefault();

    $("#loading-image").show();

     $('#btn-signin').prop('disabled', true);

     var user_type = $("#user_type").val();

       $.ajax({

            type: "POST",

            url: "engine/login-process.php",

            data:  $("#signin-form").serialize(),

            cache:false,

            contentType: "application/x-www-form-urlencoded",

             success: function(response) {

             $("#loading-image").hide();

             if (response==1)  {

              
           if (url!='') {

              window.location = url;

              

                 $("#signin-form")[0].reset();


             }

     else if (url_details!=''){

        window.location = url_details;

        $("#signin-form")[0].reset();

     }




             
              else{
                
                window.location="dashboard.php";

                   $("#signin-form")[0].reset();

              }

             }
                      

          else{
            
            swal({

            	icon:"error",
            	text:response

            });

          $('#btn-signin').prop('disabled', false);
         
             $("input").css('border-color','red');

           

           }

            },

            error: function(jqXHR, textStatus, errorThrown) {

                console.log(errorThrown);

            }

        })

    });

</script>














</body>
</html>