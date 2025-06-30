<?php session_start();
echo'<head>';
echo'<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">';
echo' <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">';
echo'  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">';
     echo'<script src="assets/js/sweetalert.min.js"></script> 
  <script src="assets/js/jquery-1.11.3.min.js"></script>';
  
 ?> 
 
 <style>
   .alert-success {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
      text-align: center;
        padding: 20px;
        font-size: 24px;
        animation: fadeInOut 4s ease-out forwards; 
    }
    
    
    .alert-danger {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        padding: 20px;
        font-size: 24px;
         animation: fadeInOut 4s ease-out forwards; 
    }
    


    /* Define the keyframes for fade animation */
    @keyframes fadeInOut {
        0% {
            opacity: 1; /* Fully transparent (invisible) */
        }
       
        100% {
            opacity: 0; /* Fully transparent (invisible) */
        }
    }
    
     
     
 </style>
 </head>
 <body>

 <br>
  <div class='container'>
   <a onclick='history.go(-1)'><b><i class='fa fa-arrow-left'></i></b></a><br>
  </div>
<?php

echo'<div class="container jumbotron" style="margin-top:25px;font-family:poppins;">';

require 'engine/configure.php';
if (isset($_GET['id'])) {
$id = $_GET['id'];
}
$id = $_GET['id'];
?>






<?php
require 'engine/configure.php';
if (isset($_GET['user_type']) && !empty($_GET['user_type'])) {
$user_type = $_GET['user_type'];
if ($user_type=='buyer') {
$getuser = mysqli_query($conn,"select * from user_profile where id = '".htmlspecialchars($id)."'");
if ($getuser) {
while ($row = mysqli_fetch_array($getuser)) {
$id =$row['id'];           
$name =$row['user_name'];
$email=$row['user_email'];
$phone=$row['user_phone'];
$date=$row['joined_date'];
$verified=$row['verified'];
}
     }

 ?>
 

 

<h6 style="font-family: trirong"><b>Buyers</b></h6>

<form method="post" action="">
    
<input type="hidden" name="id" value="<?php echo$id ?>" class="form-control"><br>
<label>Name</label> <br>
<input type="text" name="user_name"  value=" <?php echo$name ?>" class="form-control"><br>
<label>Email</label> <br>
<input type="text" name="user_email" value=" <?php echo$email?>" class="form-control"><br>
<label>Phone</label> <br>
<input type="text" name="user_phone" value=" <?php echo$phone ?>" class="form-control"><br>
<label>Verified</label> <br>
<select name="verified" class="form-control">
 <?php if ($verified){    ?>  
 <option value="0">Remove verify</option>
 <option value="1">Verify</option> 
  <?php } else{ ?>
 <option value="1">Verify</option> 
 <option value="0">Remove verify</option>
  <?php } ?>
</select><br>
<button name="submit-buyer" class="btn btn-warning form-control">Update</button>
</form>

<?php

if (isset($_POST['submit-buyer'])){
$id =$_POST['id'];           
$name =$_POST['user_name'];
$email=$_POST['user_email'];
$phone=$_POST['user_phone'];
$verified=$_POST['verified'];

if (empty($name.$email.$phone.$verified)) {
	
	echo "<span class='alert-danger'>All fields are required</span>";
}

else{
$update = mysqli_query($conn,"UPDATE user_profile SET user_name='".htmlspecialchars($name)."',user_email='".htmlspecialchars($email)."',user_phone='".htmlspecialchars($phone)."',verified='".htmlspecialchars($verified)."' WHERE id='".htmlspecialchars($id)."'");
if ($update) {
	
	echo "<span class='alert-success'>Changes saved successfully</span>";
	
	header("refresh:5;url=view.php?id=$id&&user_type=buyer");
}
} 
}

 }  }  ?>

<?php 
require 'engine/configure.php';
if (isset($_GET['id'])) {
$id = $_GET['id'];
}
$id = $_GET['id'];

if (isset($_GET['user_type']) && !empty($_GET['user_type'])) {
$user_type = $_GET['user_type'];
if ($user_type=='vendor') {
$getuser = mysqli_query($conn,"select * from vendor_profile where id = '".htmlspecialchars($id)."'");
if ($getuser) {
while ($row = mysqli_fetch_array($getuser)) {
$business_id =$row['id'];   
$business_name =$row['business_name'];
$business_email=$row['business_email'];
$business_contact=$row['business_contact'];
$business_address=$row['business_address'];
$company_description=$row['company_description'];
$date=$row['date'];
$business_verified=$row['verified'];
     		}  } ?>



<h6 style="font-family: trirong"><b>Vendors</b></h6>
<form method='POST' action="">
<input type="hidden" name="business_id" value="<?php echo$business_id ?>" class="form-control"><br>
<label>Name</label> <br>
<input type="text"  name="business_name" value=" <?php echo$business_name ?>" class="form-control"><br>
<label>Email</label> <br>
<input type="email" name="business_email" value=" <?php echo$business_email ?>" class="form-control"><br>
<label>Contact</label> <br>
<input type="text" min="0" name="business_contact" value="<?php echo$business_contact ?>" class="form-control"><br>
<label>Address</label> <br>
<input type="text" name="business_address" value="<?php echo$business_address ?>" class="form-control"><br>
<label>Company description</label> <br>
<textarea name="company_description" value=" <?php echo$company_description ?>" class="form-control" placeholder=" <?php echo$company_description ?>"></textarea><br>
<label>Verification</label> <br>
<select name="verified" class="form-control">
<?php if($business_verified>0){      ?>
<option value="0">Remove verify</option>	
<option value="1">Verify</option>
<?php  } else{  ?>
<option value="1">Verify</option>
 <option value="0">Remove verify</option>
<?php  }  ?>
</select><br>
<button name="submit" class="btn btn-warning form-control">Update</button>
</form>

<?php  
if (isset($_POST['submit'])){
$business_id =$_POST['business_id'];   
$business_name =$_POST['business_name'];
$business_email=$_POST['business_email'];
$business_contact=$_POST['business_contact'];
$business_address=$_POST['business_address'];
$company_description=$_POST['company_description'];
$business_verified=$_POST['verified'];

if (empty($business_name.$business_email.$business_contact.$business_address.$company_description.$business_verified)) {
    echo "<span class='alert-danger'>All fields are required</span>";
}

else{

$update = mysqli_query($conn,"UPDATE vendor_profile SET business_name='".htmlspecialchars($business_name)."',business_email='".htmlspecialchars($business_email)."',business_contact='".htmlspecialchars($business_contact)."',business_address='".htmlspecialchars($business_address)."',company_description='".htmlspecialchars($company_description)."',verified='".htmlspecialchars($business_verified)."' WHERE id='".htmlspecialchars($business_id)."'");
if ($update) {
	
	echo "<span class='alert-success'>Changes saved successfully</span>";
	
		header("refresh:5;url=view.php?id=$id&&user_type=vendor");
	
}

}

} 

}  }  ?>


<?php 

if (isset($_GET['id'])) {
$id = $_GET['id'];
}
$id = $_GET['id'];
require 'engine/configure.php';
if (isset($_GET['user_type']) && !empty($_GET['user_type'])) {
$user_type = $_GET['user_type'];
if ($user_type=='service_provider') {
$getuser = mysqli_query($conn,"select * from service_providers where sp_id = '".htmlspecialchars($id)."'");
if ($getuser) {
while ($row = mysqli_fetch_array($getuser)) {
$sp_id =$row['sp_id'];           
$sp_name =$row['sp_name'];
$sp_email=$row['sp_email'];
$sp_experience=$row['sp_experience'];
$sp_location=$row['sp_location'];
$sp_bio=$row['sp_bio'];
$sp_phonenumber=$row['sp_phonenumber1'];
$sp_phonenumber1=$row['sp_phonenumber2'];
$sp_pricing=$row['pricing'];
$sp_date=$row['date'];
$sp_verified=$row['sp_verified'];
$e_verified=$row['e_verify'];
$pay=$row['pay'];
}
} ?>



<h6  style="font-family: trirong"><b>Service Provider</b></h6>
<form method="POST" action="">
<input type="hidden" min="1" name="sp_id" value="<?php echo$sp_id ?>" class="form-control"><br>
<label>Name</label><br>     
<input type="text"  name="sp_name" value="<?php echo$sp_name ?> " class="form-control"><br>
<label>Email</label> <br>
<input type="email"  name="sp_email" value="<?php echo$sp_email ?>" class="form-control"><br>
<label>Experience</label><br> 
<textarea type="text"  name="sp_experience" placeholder="<?php echo$sp_experience?>" value="<?php echo$sp_experience?>" class="form-control"  wrap="physical"></textarea><br>
<label>Location</label><br>
<input type="text"  name="sp_location" value="<?php echo$sp_location ?>" class="form-control"><br>
<label>Bio</label> <br>
<textarea  name="sp_bio" placeholder="<?php echo$sp_bio?>" value="<?php echo$sp_bio ?>"  class="form-control" wrap="physical"></textarea><br>
<label>Phone number</label> <br>
<input type="number" min="0" maxlength="11" name="sp_phonenumber" value="<?php echo$sp_phonenumber ?>" class="form-control"><br>
<label>Phone number</label> <br>
<input type="number" min="0" maxlength="11" name="sp_phonenumber1" value="<?php echo$sp_phonenumber1 ?>" class="form-control"><br>
<label>Pricing</label> <br>
<input type="number"  min="0" maxlength="3"  name="pricing" value="<?php echo$sp_pricing ?>" class="form-control"><br>


<!-------------------------------------------------------Verify User---------------------------------------------------------->
<label>Verified</label> <br>
<select name="sp_verified" class="form-control">
<?php if ($sp_verified>0) { ?>
<option value="0">Remove verify</option>
<option value="1">Verify User</option>
<?php } else { ?>
<option value="1">Verify User</option>
<option value="0">Remove verify</option>
<?php } ?>
</select><br>


<label>Payment option: <?php if($pay==0){echo "Essential";}else{ echo "Account";} ?></label> <br>

<select name="payment_method" id="payment_method" class="form-control" onchange="pay()">
	
	<option value="0">Pay to Essential </option>
	<option value="1">Pay to provider</option>


</select><br>
<!-------------------------------------------------------E-Verify User---------------------------------------------------------->
<label>E-verify</label> <br>
<select name="e_verify" class="form-control">
<?php if($e_verified>0){ ?>
<option value="0">Remove verify</option>
 <option value="1">Verify user</option>
<?php }
else{ ?>
<option value="1">Verify User</option>
<option value="0">Remove verify</option>
<?php } ?>
</select><br>
<button name="submit-sp" class="btn btn-warning form-control">Update</button>
</form>

<?php 
if (isset($_POST['submit-sp'])){
$sp_id =$_POST['sp_id'];           
$sp_name =$_POST['sp_name'];
$sp_email=$_POST['sp_email'];
$sp_experience=$_POST['sp_experience'];
$sp_location=$_POST['sp_location'];
$sp_bio=$_POST['sp_bio'];
$sp_phonenumber=$_POST['sp_phonenumber'];
$sp_phonenumber1=$_POST['sp_phonenumber1'];
$sp_pricing=$_POST['pricing'];
$sp_verified=$_POST['sp_verified'];
$e_verified=$_POST['e_verify'];
if (strlen($sp_name)>30) {
echo "item limit exceeded";
}

else{
$update = mysqli_query($conn,"UPDATE service_providers SET sp_name='".htmlspecialchars($sp_name)."',sp_email='".htmlspecialchars($sp_email)."',sp_experience='".htmlspecialchars($sp_experience)."',sp_location='".htmlspecialchars($sp_location)."',sp_bio='".htmlspecialchars($sp_bio)."',sp_phonenumber1='".htmlspecialchars($sp_phonenumber)."',sp_phonenumber2='".htmlspecialchars($sp_phonenumber1)."',pricing='".htmlspecialchars($sp_pricing)."',sp_verified='".htmlspecialchars($sp_verified)."',e_verify='".htmlspecialchars($e_verified)."' WHERE sp_id='".htmlspecialchars($sp_id)."'");


if ($update) {
echo "<span class='alert-success'>Changes saved successfully</span>";
header("refresh:5;url=view.php?id=$sp_id&&user_type=service_provider");
}
} 
}

}  } ?>

</div>

<script type="text/javascript">
	
function pay() {
var pay = $("#payment_method").val()
var sp_id = "<?php echo $sp_id ?>";
$.ajax({
type:"POST",
url:"engine/switch-pay.php",
data:{'pay':pay,'sp_id':sp_id},
success:function(result) {
$(".loading-image").hide();
swal({
      
      icon:"success",
      text:result

});

  
}
    });


}


</script>
</body>
</html>



