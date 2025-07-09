<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>E-stores | vendor sign up </title>
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
  <link rel="stylesheet" href="assets/css/sign-up-vendors.css">
  <link rel="stylesheet" href="assets/css/overlay.css">
  <script src="assets/js/sweetalert.min.js"></script> 
  <script src="assets/js/jquery-1.11.3.min.js"></script>
<script src="assets/js/flickity.pkgd.min.js"></script>
<style type="text/css">

</style>
</head>
<body>
<?php include 'components/header.php';  ?>

	<div class="wrap">

 <div class="back-button-container">
        <a onclick='history.go(-1)' class="back-button"><i class='fa fa-chevron-left'></i></a>
    </div>

<br>

<div class="main">

	<h6>Sign up</h6>

	<div style="text-align: center">

	<small style="">Enter Your Credentials to sign up</small>

</div>
	
<br>

<form method="post" id="signup_vendors">

<input type="text" class="form-control" placeholder="Business name" name="business_name"><br>

<input type="text" class="form-control"  placeholder="Business email"  name="business_email"><br>

<input type="password" class="form-control"  placeholder="Password"  name="business_password"><br>

<input type="password" class="form-control"  placeholder="Confirm Password"  name="confirm_password"><br>

<input type="text" class="form-control"  placeholder="Business address"  name="business_address"><br>

<input type="text" class="form-control"  placeholder="Business contact"  name="business_contact"><br>

<br>

<input type="text" class="form-control"  placeholder="Company description"  name="company_description"><br>

<small style="font-size: 12px;display:none">Upload Business image</small><br>

<label style="display:none"><i id="file-label" class="fa-solid fa-upload"></i><input type="hidden" class="form-control" name="imager" value="0"  id="imager" onchange="updateFileName(this)"></label>

<p><a href="login.php">Have an account?  Log In</a></p>

<button id="btn-signup" class="btn btn-danger form-control">Sign up</button>

<div align="center" style="display: none;" id="loading-image"><br><img id="loader" src="loading-image.GIF"></div>


</form>

</div>
</div>

<br>

<?php

include 'footer.php';


?>


 <script type="text/javascript">

  $('#signup_vendors').on('submit',function(e){

        e.preventDefault();

        $("#loading-image").show();

         $('#btn-signup').prop('disabled', true);
        
        var formdata = new FormData();

      $.ajax({

            type: "POST",

            url: "signup-vendor-process.php",

            data:new FormData(this),

            cache:false,

            processData:false,

            contentType:false,

             success: function(response) {

             $("#loading-image").hide();

     if (response==1) {

          
              swal({    
                       title:"Success!!",
                       text:"A verification link has been sent to the email provided",
                      icon:"success"

              });

              $("#form-signup")[0].reset();
               

     } 

     else{
              swal({
                
                title:"Notice",
                icon:"error",
              	text:response

              });

              $('#btn-signup').prop('disabled', false);
            
              $('input').css('border-color','red');
               

           }

            },

            error: function(jqXHR, textStatus, errorThrown) {

                console.log(errorThrown);

            }

        })

    });

</script>


<script type="text/javascript">
	
function updateFileName(input) {

	var fileName = input.files[0].name;
	
	document.getElementById('file-label').innerText = fileName;
}

</script>

</body>
</html>