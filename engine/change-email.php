<?php session_start();
require 'configure.php';
if(isset($_GET['id'])){
$id =  $_GET['id'];
}

?>
<!DOCTYPE html>
<html>
<head>
<title>E-stores | Change email </title>
<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
<style>
    
 
.alert-success{


animation: fade 3s forwards;
animation-delay:1s;
}

@keyframes fade{
0%{
	opacity: 1;
}

100%{
opacity: 0;
}

}


.nav_signup,.nav_login{
opacity: 0;
display: none;

}



#think{
margin-left: 210px !important;

}

@media only screen and (max-width:797px){
#think{
margin-left: 120px !important;

}
}


@media only screen and (max-width:497px){
#think{
margin-left: 23px !important;
font-size: 1rem;

}
}


input[type=search]{
border:1px solid transparent;
box-shadow: 0px 0px 4px rgba(0,0,0,0.3);
font-size: 0.8rem;

}

#btn-search{
font-size: 10px;
  border-radius:0px 13px 13px 0px;
  margin-left: -80px;
  padding: 7px 8px;
  position: relative;
z-index: 9;
color: white !important;
}


#user,#love,#carting{
display: none !important;
opacity: 0;
}


@media only screen and (min-width:377px) and (max-width:390px){
.nav_login,.nav_signup{

margin-left:40px !important;
font-weight: normal !important;
display: none! important;
padding: 2px !important;
border:2px solid white !important;

}

#think{
font-size: 0.84rem !important;
}
}

.wrap{
    padding:20px;
    font-weight:bold;
}

.wrap a{
    
    font-size:18px;
    cursor:pointer
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
padding: 10px 30px;
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
display: none;
}

.footer{
margin-top: 30px;
}

@media only screen and (max-width:1200px){

.button_navigation{
display: none;
}
}

</style>
</head>
<body>


<?php include 'nav.php'; ?>


<br>
<br>

<div class="wrap"><a onclick="history.go(-1)"><i class="fa fa-arrow-left"></i></a></div>
<div class="container"  style='text-align:center;' >
<h5 style="font-family:trirong"><b>CHANGE EMAIL</b></h5> <br>   
    
<form method="POST" action="">
<input type = 'hidden' name ='id' id='id' value="<?php echo $id ?>">
<input type = 'text' name ='email' id='email' value="<?php echo $_SESSION['admin_email'] ?>"><br><br>
<button name="submit" class="btn btn-primary">Change email</button>
</form>


<?php 
require 'configure.php';
if(isset($_POST['submit'])){
$id =  mysqli_escape_string($conn,$_POST['id']);
$email = mysqli_escape_string($conn,$_POST['email']);
$updateEmail = mysqli_query($conn,"UPDATE admin set admin_email ='".htmlspecialchars($email)."' where admin_id ='".htmlspecialchars($id)."'");
if($updateEmail){

echo"<br><span class='alert-success' style='padding:5px;'>Email has been updated.</span><br><br>";

echo"<a href='../admin.php'>Go to admin &gt;</a>";
    
}

}


?>
</div>
<!------------------------------------------footer--------------------------------------------------->

<br>
<?php
include 'footer.php';
?>
</body>