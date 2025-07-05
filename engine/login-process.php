<?php session_start();
error_reporting(E_ALL ^ E_NOTICE);
require 'configure.php';
$user_email=mysqli_escape_string($conn,$_POST['user_email']);
$user_password= mysqli_escape_string($conn,$_POST['user_password']);
$user_type=mysqli_escape_string($conn,$_POST['user_type']);
$condition="";
$secret_password= sha1($user_password);
if (empty($user_email.$user_password)) {
	echo "All fields are required";
}
elseif ($user_email=='') {
	echo "Email field is required";
	
}
elseif ($user_password=='') {
	echo "Password field is required";
}
else{
//login as a sBuyer
if ($user_type=='buyer') {
$condition ="select * from user_profile where user_email = '".$user_email."' and user_password = '".$secret_password."' and verified = 1";
$bbc = mysqli_query($conn,$condition);
$result=$bbc->num_rows;
if ($result>0) { 
while ($row=mysqli_fetch_array($bbc))  {
$_SESSION["id"] = $row['id'];
$_SESSION["email"]=$row['user_email'];
$_SESSION["name"]=$row['user_name'];
$_SESSION["location"]=$row['user_location'];
$_SESSION["phone"]=$row['user_phone'];
$_SESSION['date']= $row['joined_date'];
$_SESSION['image'] = __DIR__.$row['user_image'];
$_SESSION['user_type'] =  'buyer';
echo "1";  
	}
	
}
else{echo"Incorrect login details";}

 }

//login as a vendor
if ($user_type=='vendor') {
     $condition ="select * from vendor_profile where business_email = '".$user_email."' and business_password = '".$secret_password."' and verified = 1";
    $vbc = mysqli_query($conn,$condition);
    $result=$vbc->num_rows;
     if ($result>0) { 
	while ($row=mysqli_fetch_array($vbc))  {
	$_SESSION["business_id"] = $row['id'];
    $_SESSION["business_email"]=$row['business_email'];
    $_SESSION["business_name"]=$row['business_name'];
    $_SESSION['business_date']= $row['date'];
    $_SESSION['business_image'] =  __DIR__.$row['business_image'];
    $_SESSION['business_contact'] = $row['business_contact'];
    $_SESSION['business_address'] =  $row['business_address'];
    $_SESSION['user_type'] =  'vendor';
    echo "1";  
	}
	
}
else{echo"Incorrect login details";

}

}


//login as a service provider
if ($user_type=='admin') {
$condition ="select * from admin where admin_email = '".$user_email."' and admin_password = '".$secret_password."'";
$sbc = mysqli_query($conn,$condition);
$result = $sbc->num_rows;
if ($result>0) { 
while ($row = mysqli_fetch_array($sbc))  {
$_SESSION["admin_id"] = $row['admin_id'];
$_SESSION["admin_email"]=$row['admin_email'];
$_SESSION['admin_date']= $row['admin_date'];
$_SESSION['admin_password']= $row['admin_password'];

echo "1";  
	}
	
}
else{echo"Incorrect login details";

}


}



















}


 ?>