
<!DOCTYPE html>
<html>
<head>
	<title>E-stores | Verify</title>
	<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    
body{
    
    font-size:15px;
}    
    
</style>	
	
	
</head>



<body>


<h6 style='text-align:center;'><b>Welcome to EstoresNG</b></h6>



<br><br>

<?php 

require 'engine/configure.php';

if (isset($_GET['vkey'])) {
$vkey=$_GET['vkey'];
if (isset($_GET['user_type'])) {
$user_type = $_GET['user_type'];
if ($user_type=='buyer') {
    
$query =  mysqli_query($conn,"UPDATE user_profile SET verified = 1 where vkey ='$vkey'");

if($query){
 
 echo "Registration was successful. Kindly coninue to the <a href='login.php'>login</a> page";   
    
}

}

if($user_type=='vendor'){
    
$query = mysqli_query($conn,"UPDATE vendor_profile SET verified = 1 where vkey ='$vkey' ");   
  
 if($query){
 
 echo "Registration was successful. Kindly coninue to the <a href='login.php'>login</a> page";   
    
} 
    
}


if($user_type=='service provider'){
    
$query = mysqli_query($conn,"UPDATE service_providers SET sp_verified = 1 where vkey ='$vkey' ");   

 if($query){
 
 echo "Registration was successful. Kindly coninue to the <a href='login.php'>login</a> page";   
    
}
    
}


}


}






?>







</body>
</html>