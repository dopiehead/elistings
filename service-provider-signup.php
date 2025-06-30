
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
  <link rel="stylesheet" href="assets/css/flickity.min.css">
       <link rel="stylesheet" href="assets/css/btn_scroll.css">
          <link rel="stylesheet" href="assets/css/overlay.css">
    <link rel="stylesheet" href="assets/css/cart.css">
  <script src="assets/js/sweetalert.min.js"></script> 
  <script src="assets/js/jquery-1.11.3.min.js"></script>
<script src="assets/js/flickity.pkgd.min.js"></script>
<style type="text/css">

body{

	font-family: poppins;

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













#think{
margin-left: 210px !important;

}

@media only screen and (max-width:497px){
#think{
margin-left: 110px !important;

}
}



.btn-default{
background-color:#4788c8;
color: white;
float: right;
}

#back{
  cursor:pointer; 

}

#loader{

  height:50px;

  width:50px;
}

/*--------------------------------------------------------------
# style file
--------------------------------------------------------------*/

input[type=file]{

display: none;

}


select{

  width: 47%;

  margin-right: 17px;

  margin-bottom:20px;

  box-shadow: 0px 0px 5px rgba(0,0,0,0.4);

  font-size: 13px;

  border:;

  opacity: 0.7;

padding: 8px;

text-transform: capitalize;
}


@media only screen and (max-width:767px){

select{

width: 100%;

}


}







label{

  border: 1px solid rgba(0,0,0,0.1);



  background-color:rgba(192,192,192,0.4); 

align-content: center;

height: 51px;

width: 100%;

padding: 2px;

padding-left:;

text-align: center;

color:black;



font-size:13px;

cursor: pointer;

}




label:hover{

opacity: 0.5;}




/*--------------------------------------------------------------
# menu navbar
--------------------------------------------------------------*/


.menu #thinking{

text-align: center;
margin-top: -40px;
font-size: 13px;


}

.nav_signup{

    	font-size: 13px;

        color: white !important;

        background-color: skyblue;

        padding: 5px;


}


.nav_login{



     font-size: 13px;

     color: black;



}





.nav_signup{


      border:1px solid none;
      border-left:1px solid white;
      border-left-color: rgba(192,192,192,1);
      padding-left:8px;

}

.menu {

    position: relative;
    padding: 0px 10px;
    width: 100%;
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

  font-size: 12px;
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



/*--------------------------------------------------------------
# main
--------------------------------------------------------------*/
.wrap{
padding: 10px;
	}




/*--------------------------------------------------------------
# main
--------------------------------------------------------------*/

.main

{
	width:85%;
	padding: 5% 5%;
	border:1px solid transparent;
	box-shadow: 0px 0px 5px rgba(0,0,0,0.6);
	margin-top: 50px;



	margin-left: 0;

	margin-right: 0;

	margin: auto;
	

}


.main p{

	color:skyblue;
	font-weight: bold;
	font-size: 12px;
}


.main p span{

float: right;

}

.main input{

border:1px solid transparent;

box-shadow:0px 0px 3px rgba(0,0,0,0.3);

font-size: 13px;

}


.main span{

	font-size: 13px;
}


.main button{

font-size: 13px;


}

.main h6{

	text-align: center;
	font-weight: bold;
}





@media only screen and (max-width:767px){

	.main p{

	color:skyblue;
	font-weight: bold;
	font-size: 14px !important;
}

	.main p a{

	color:skyblue;
	font-weight: bold;
	font-size: 14px !important;
}




	.main small{

	text-align: center;
	font-size: 13px;
}

.main

{
	width:95%;
	padding: 10% 5%;
	border:1px solid transparent;
	box-shadow: 0px 0px 5px rgba(0,0,0,0.6);
	margin-top: 40px;
	}

.main h6{

	text-align: center;
	font-size:18px;
}
}

</style>
</head>
<body>
<div class="wrap">
<div class="menu">
<p> 
<a href="index.php" style="text-decoration: none;"><img style="" align="" src="assets/icons/logo_e_stores.png" height="" width=""></a>
<span style="float: right;"><a href="login.php" class="nav_login" style="text-decoration: none;color:;">Login</a>
<a class="nav_signup" style="text-decoration: none; color:;">Sign up</a></span></p>
<div id="thinking"><b style="text-align:">Think of it? Buy it now</b></div>
</div>

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
<form method="post" id="signup_sp">
<div class="first-form">
<input type="text" class="form-control" placeholder="Name" name="sp_name"><br>

<input type="text" class="form-control"  placeholder="Email" id="sp_email"  name="sp_email"><br>

<select name="sp_category" class="category">
<option value="">Service category</option>
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
</select>

<span class="speciality"></span><br>

<input type="text" class="form-control"  placeholder="Experience (years)"  name="sp_experience"><br>
<textarea  class="form-control"  placeholder="Bio"  name="sp_bio"></textarea><br>

</div>
<div id="hide" class="hide">


<input type="password" class="form-control"  placeholder="Password"  name="sp_password"><br>
<input type="password" class="form-control"  placeholder="Confirm Password"  name="confirm_password"><br>
<input type="number" class="form-control"  min="1" minlength="12" placeholder="Phone number"  name="sp_phonenumber1"><br>
<input type="number" class="form-control" min="1" minlength="12"  placeholder="Phone number(Optional)"  name="sp_phonenumber"><br>
<input type="text" class="form-control" min="1" minlength="31"  placeholder="Location"  name="sp_location"><br>

<input type="hidden" value="0" name="sp_ratings">

<input type="hidden" value="0" name="verified">

<input type="hidden" value="0" name="e_verify">

<small style="font-size: 12px;display:none">Upload photo</small><br>
<label style='display:none'><i id="file-label" class="fa-solid fa-upload"></i><input type="file" class="form-control" value='0' name="imager"  id="imager" onchange="updateFileName(this)"></label>



<p>Have an account?  <a href="login.php">Log In</a><span style="float: right;"><a id="back" onclick="back()">Go back</a></span></p>
<button id="btn-signup" name='submit' class="btn btn-info form-control">Sign up</button>
</div>
<div align="center" style="display: none;" id="loading-image"><br><img id="loader" src="loading-image.GIF"></div>
</form>

<button class="btn btn-default form-control">Continue</button>
</div>
</div>
<br>

<?php

include 'footer.php';


?>
<script type="text/javascript">
$(document).ready(function () {
    $('#signup_sp').on('submit', function (e) {
        e.preventDefault();

        $("#loading-image").show();
        $('#btn-signup').prop('disabled', true);

        var sp_email = $("#sp_email").val().trim(); // Trim spaces for better validation

        $.ajax({
            type: "POST",
            url: "sp_signup.php",
            data: new FormData(this),
            cache: false,
            processData: false,
            contentType: false,
            success: function (response) {
                $("#loading-image").hide();
                
                if (response == "1") {
                    swal({
                        title: "Success!",
                        text: `A verification link has been sent to ${sp_email}.`,
                        icon: "success",
                    });

                    // Reset form
                    $("#signup_sp")[0].reset();
                    $('#signup_sp input[type="file"]').val(""); // Reset file inputs
                    $('#signup_sp input').css('border-color', 'skyblue');
                } else {
                    swal({
                        title: "Error",
                        text: response,
                        icon: "error",
                    });

                    $('#btn-signup').prop('disabled', false);
                    $('#signup_sp input').css('border-color', 'red');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("Error: " + errorThrown);
                console.log("Response: " + jqXHR.responseText);
                swal({
                    title: "Server Error",
                    text: "An error occurred. Please try again.",
                    icon: "error",
                });
                $('#btn-signup').prop('disabled', false);
            }
        });
    });
});
</script>


<script type="text/javascript">
$('#hide').hide();  
  $('.btn-default').on('click',function() {
$('.first-form').slideUp();
$('#hide').slideDown().show();
$('.btn-default').hide();
});
</script>


<script type="text/javascript">
  
function back() {
$('.first-form').slideDown().show();
$('#hide').slideUp().hide();
$('.btn-default').show();
}
</script>


<script type="text/javascript">
	function updateFileName(input) {
var fileName = input.files[0].name;
	document.getElementById('file-label').innerText = fileName;
}</script>


<script type="text/javascript">
$(document).ready(function () {
    const categories = {
        "information technology": [
            "Web developer", "UI UX designer", "Graphics designer"
        ],
        "mechanic": [
            "Motorcycles", "Trucks", "Vehicles", "Buses"
        ],
        "vulganizer": [
            "Trucks", "Buses", "Motorcycles", "Vehicles"
        ],
        "teaching": [
            "Primary schools", "Secondary schools", "Tertiary institutions"
        ],
        "household": [
            "Plumber", "Bricklayer", "Painter", "Gardener"
        ],
        "electrical/inverter services": [
            "Electrical installations", "Electrical repairs", "Fixtures/Fittings/Outlets", "Inverter repair/installation", "Prepaid meter install"
        ],
        "plumbing services": [
            "Plumbing repair/Install", "Drain/Leaks fixing", "Pumping machine", "Toilet repairs", "Water treatment/Tank washing"
        ],
        "Ac/refrigeration services": [
            "AC gas filling", "AC repair and installations", "Refrigerator repair", "Freezer repair", "Water dispenser", "Cold room servicing"
        ],
        "appliances electronics": [
            "Washing machine", "Blender", "Exercise equipment", "Gas/Electric cooker", "Microwave", "TV-Installation/Mounting/Repair", "Fan", "Home theater"
        ],
        "cleaning/laundy/fumigation": [
            "Indoor cleaning", "Outdoor cleaning", "Fumigation", "Laundry service"
        ],
        "carpentry services": [
            "Windows and doors", "Cabinetry", "Furniture", "Roofing"
        ]
    };

    $(".category").on("change", function () {
        let category = $(this).val().toLowerCase();
        let specialityDropdown = $(".speciality");
        specialityDropdown.empty();

        if (categories[category]) {
            let options = `<select name="sp_speciality"><option value="">Select Speciality</option>`;
            categories[category].forEach(spec => {
                options += `<option value="${spec.toLowerCase()}">${spec}</option>`;
            });
            options += `</select>`;
            specialityDropdown.html(options);
        } else {
            specialityDropdown.html('<select name="speciality"><option value="">Select Category</option></select>');
        }
    });
});
</script>


<!------------------------------------------btn-scroll--------------------------------------------------->

<a class="btn-down" onclick="topFunction()">&#8593;</a>

<script src="assets/js/scroll.js" type="text/javascript"></script>

<script src="assets/js/overlay.js" type="text/javascript"></script>
</body>
</html>