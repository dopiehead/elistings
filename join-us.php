<?php  session_start();
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
	<title>E-stores | Join us</title>
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/flickity.min.css">
  <link rel="stylesheet" href="assets/css/join-us.css">
  <link rel="stylesheet" href="assets/css/overlay.css">
  <script src="assets/js/sweetalert.min.js"></script> 
  <script src="assets/js/jquery-1.11.3.min.js"></script>
<script src="assets/js/flickity.pkgd.min.js"></script>

</head>
<body>
	<!------------------------------------------Navigation bar--------------------------------------------------->

    <?php include 'components/header.php';  ?>

<br><br>

 <div class="back-button-container">
        <a onclick='history.go(-1)' class="back-button"><i class='fa fa-chevron-left'></i></a>
    </div>







<!------------------------------------------Section main-------------------------------------------------->

<div class="container">



<div id="row_home" >
	
<div class=" row">
	

<div class="col-md-6">


    <div class='radio-wrapper'  id="vendor">

	<input type="radio" id="user" value="signup-vendors.php" name="user">

	<img src="assets/icons/hand.png">

	<p>I’m a Vendor, here to sell.</p>


</div>

<br>


</div>



<div class="col-md-6">

	<div class='radio-wrapper' id="buyer">

	<input type="radio" value="signup.php" id="user" name="user">

	<img src="assets/icons/icons8_buy.png">

	<p>I’m here to buy or get service provider</p>

    </div>


    <br>

</div>


<button name="btn-create" id="btn-create" class="form-control btn btn-danger ">Create account</button>




</div>

<p id="login_button" style="text-align: center;">Already have an account? <a href="login.php">Login</a></p>




</div>


</div>

<br><br>


<!------------------------------------------footer--------------------------------------------------->

<?php

include 'footer.php';


?>


<script>

$(document).ready(function(){

    $('#btn-create').click(function(){


      var selectedValues = [];

      $("input[name='user']:checked").each(function() {

      selectedValues.push($(this).val());

      window.location.href = selectedValues;

});

      
    });

    // When any div with class "radio-wrapper" is clicked
    $(".radio-wrapper").on('click', function() {
        // Find the radio input inside the clicked div and trigger a click event on it
        $(this).find('input[type="radio"]').prop('checked', true); // Select the radio button
        
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











</body>
</html>