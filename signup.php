<?php session_start(); 
error_reporting(E_ALL ^ E_NOTICE);?>

<!DOCTYPE html>
<html>
<head>
	<title>E-stores | Sign up page </title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/flickity.min.css">
  <link rel="stylesheet" href="assets/css/signup.css">
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

	<h6>Sign up</h6>

	<div style="text-align: center">

	<small style="">Enter Your Credentials to login</small>

</div>

<br>
	
<form method="post" id="form-signup">

<input type="text" name="user_name" class="form-control" placeholder="Name"><br>

<input type="email" name="user_email" class="form-control" placeholder="Email"><br>

<input type="password" name="user_password" class="form-control" placeholder="Password"><br>

<input type="password" name="confirm_password" class="form-control" placeholder="Confirm password" ><br>

<input type="text" name="user_location" placeholder="Enter address here" class="form-control"><br>

<input type="hidden" name="verified" value="0">

<input type="text"  name="user_phone" class="form-control" placeholder="Phone number"><br>


<small style="font-size: 12px; display:none">Upload photo</small><br>
<label style="display:none;><i id="file-label" class="fa-solid fa-upload"></i><input type="hidden" class="form-control" name="imager" value="0  id="imager" onchange="updateFileName(this)"></label>

<p><a href="login.php">Have an account?  Log In</a></p>

<button id="btn-signin" class="btn btn-danger form-control">Sign up</button>

<div align="center" style="display: none;" id="loading-image"><br><img id="loader" src="loading-image.GIF"></div>

</form>

</div>
</div>




<br>

<?php

include 'footer.php';


?>
<script>
  $(document).ready(function () {
    $("#form-signup").on("submit", function (e) {
      e.preventDefault();

      $("#loading-image").show();
      $("#btn-signin").prop("disabled", true);

      // Reset input border colors before validation
      $("input").css("border-color", "");

      $.ajax({
        type: "POST",
        url: "signup-process.php",
        data: new FormData(this),
        cache: false,
        processData: false,
        contentType: false,
        dataType: "text", // Ensure response is treated as a string
        success: function (response) {
          $("#loading-image").hide();
          $("#btn-signin").prop("disabled", false);

          if ($.trim(response) == "1") {
            swal({
              text: "A verification link has been sent to the email provided.",
              icon: "success",
            });

            $("#form-signup")[0].reset(); // Reset form on success

            // Auto-close success message after 3 seconds
            setTimeout(() => {
              swal.close();
            }, 3000);
          } else {
            swal({
              icon: "error",
              text: response.trim(),
            });

            // Highlight input fields in red for errors
            $("input").css("border-color", "red");
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.error("AJAX Error:", textStatus, errorThrown);
          swal({
            icon: "error",
            text: "An unexpected error occurred. Please try again.",
          });
          $("#loading-image").hide();
          $("#btn-signin").prop("disabled", false);
        },
      });
    });
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



<script type="text/javascript">
  function updateFileName(input) {
var fileName = input.files[0].name;
  document.getElementById('file-label').innerText = fileName;
}</script>




</body>
</html>