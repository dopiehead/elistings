<?php session_start();
if (!isset($_SESSION['admin_id'])) { ?>
<script>
window.location.href ='login.php';
</script>
<?php } ?>


<!DOCTYPE html>
<html>
<head>

<title>E-stores | admin</title>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/flickity.min.css">
        <link rel="stylesheet" href="assets/css/btn_scroll.css">
   <link rel="stylesheet" href="assets/css/cart.css">
  <script src="assets/js/sweetalert.min.js"></script> 
  <script src="assets/js/jquery-1.11.3.min.js"></script>
<script src="assets/js/flickity.pkgd.min.js"></script>
<style type="text/css">
 
 .col-md-2{
 background-color:rgba(0,70,90,1);
 color:white !important;
    
}


 
 
  

#sliding b:nth-child(1){
float:left;
    
}


#sliding b:nth-child(3){
float:right;
    
}



 .switch {
            position: relative;
            display: inline-block;
            width: 40px;
            height: 20px;
 }

.switch input { 
            opacity: 0;
            width: 0;
            height: 0;
 }

.slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 20px;
}

.slider:before {
            position: absolute;
            content: "";
            height: 14px;
            width: 14px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
}

 input:checked + .slider {
            background-color: #2196F3;
 }

input:checked + .slider:before {
            transform: translateX(20px);
 }

.slider.round {
            border-radius: 34px;
}

 .slider.round:before {
            border-radius: 50%;
}
  

body{font-family: poppins;}

h1 img{

  margin-left: 10px;
}

#btn-changepassword{

  background-color: rgba(255,165,50,1);
}

#open-btn{
 
 display:none;
    
}

#h6{font-size:18px !important;color:black !important;}


.nav_signup,.nav_login{

opacity: 0;
display: none;

}


table {
  border-collapse: separate;
  border-spacing: 25px !important; /* Sets the spacing between cells */
}



table tbody tr td{

font-size: 0.8rem;

text-transform: capitalize;

padding: 8px;

text-align: center;



}


table tbody tr td img{

width: 100px;

height: 80px;



}



table tbody tr td a{

font-size: 0.8rem !important;

}



table thead tr th{

font-size: 0.8rem;

opacity: 0.6;

text-transform: capitalize;

text-align: center;

}



#th-action{

  width:19%;
}


#th-id{

  width:5%;
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
margin-left: 80px !important;
font-size: 1rem;

}

ul li a{
  
  font-size:17px !important;  
    
}



}



#user_type_home select{

padding: 5px 10px;

border:1px solid transparent;

box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.3);

font-size: 0.8rem;

}



#user_type_home select:focus{

outline: 2px solid skyblue;

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

#popup-password,#popup-pay{
background-color: rgba(248,248,248,0.3);  
background-color: rgba(248,248,248,0.3);  
position:fixed;
top: 50%;
left: 50%;
transform: translate(-50%,-50%);
width: 350px;
padding:5px;
z-index: 99;
box-shadow: 0 5px 30px rgba(0,0,0,.30);
background: #fff;
visibility:hidden;
opacity:0;
transition: 0.3s;

}



#popup-dollar{
background-color: rgba(248,248,248,0.3);  
background-color: rgba(248,248,248,0.3);  
position:fixed;
top: 50%;
left: 50%;
transform: translate(-50%,-50%);
width: 350px;
padding:5px;
z-index: 99;
box-shadow: 0 5px 30px rgba(0,0,0,.30);
background: #fff;
visibility:hidden;
opacity:0;
transition: 0.3s;

}







#popup-password.active,#popup-dollar.active,#popupAccount.active,#popup-pay.active{
  
visibility: visible;
opacity: 1;
transition: 0.3s;

    }

#close-password,.close-password,#close-dollar,#close-pay{
float: right;
background-color: black;
color: white;
padding:0px 7px;
border-radius: 50%;
cursor: pointer;


}


#popup-password h6{
  
font-weight: bold;
font-size: 0.8rem;
color: #17a2b8;

    }


ul{

  list-style-type: none;
}



ul li{

  display: block;

  margin: 20px 0px;

  font-size: 0.8rem;

  font-weight: bold;
}




ul li{

cursor: pointer;


}

.active{

opacity:0;

}

.active-button{

  background-color:white;

  padding: 10px;

  border:1px solid transparent;

  box-shadow: 0px 0px 4px rgba(0,0,0,0.3);
  
  color:green !important;

  
}


.btn-success{

 padding: 10px;

}


.link-active,#link-acive{

  background-color: skyblue;

  padding: 10px;

  border-radius: 15px;

  
}




@media only screen and (max-width:498px){

.category_select{

  font-size: 13px;
  margin-left:8px;
  height: 33px;
    width: 125px;
  font-weight: bold;
  text-transform: capitalize;
  border:1px solid transparent;
  box-shadow: 0px 0px 3px rgba(0,70,90,0.5);
}


}






.category_select{

  font-size: 13px;
  margin-left: 20px;
  height: 33px;
  font-weight: bold;
  text-transform: capitalize;
  border:1px solid transparent;

  box-shadow: 0px 0px 3px rgba(0,70,90,0.5);
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




.nav_signup{


border:1px solid none;
border-left:1px solid white;
border-left-color: rgba(192,192,192,1);
margin-left:0px;
font-weight: normal !important;



}


#main{

background: linear-gradient(to top right,rgba(0,70,90,0.9),rgba(0,44,70,1)),url(assets/img/coca_cola.png);
background-size: cover;
background-position: center;

width: 100%;

height: 80px;

margin-top: 50px;

}


#main h6{

color: white;

text-align: center;

font-weight: bold;

position: relative;

top: 35px;

text-transform: uppercase;

font-size: 16px;


}

@media only screen and (max-width:767px){

#main h6{

top: 20px;


}


}


/*--------------------------------------------------------------
# product list
--------------------------------------------------------------*/



#package{

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding:0px;

width:190px;

display: inline-block;
margin:1em 1em;

}

@media only screen and (max-width:498px){


#package{

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 0px;

width:185px;

display: inline-block;
margin:1em 1.5em;

}



}





/*--------------------------------------------------------------
# view icon
--------------------------------------------------------------*/

#noviews{

position:relative;
top:45px;
left:0px;
background-color: rgba(0,0,0,0.8);
color: white;
font-weight: bold;
padding: 7px;
z-index: ;
font-size:11px;

}



 
#views{

position:relative;
top:45px;
left:-37px;
background-color: rgba(0,0,0,0.8);
color: white;
font-weight: bold;
padding: 7px;
z-index: ;
font-size: 11px;

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
font-weight: normal !important;

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








#coca_cola img{

  
width:100%;


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
  justify-content: space-between;*/ }


/*--------------------------------------------------------------
# anchor category
--------------------------------------------------------------*/



@media only screen and (max-width:480px){


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


opacity:;


}


/*--------------------------------------------------------------
# navigation search bar button
--------------------------------------------------------------*/



/*--------------------------------------------------------------
# section product  mobile
--------------------------------------------------------------*/




/*--------------------------------------------------------------
# product list
--------------------------------------------------------------*/


/*--------------------------------------------------------------
# footer
--------------------------------------------------------------*/

.footer h6{

  font-weight: bold;

  font-size: 16px;

  margin-bottom: 10px;
}


.footer p{

  font-size: 14px;
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

display: none;p

}


.footer h6{

  font-weight: bold;

  font-size: 23px !important;

 
}


.background-black{
filter:blur(3px);
}

}

</style>
</head>
<body>


<?php include 'nav.php'; ?>

<br>

<br>


<div style="padding: 20px;">

<div class="row">

<div class="col-md-2">

<div id="main">

<h6>Welcome Admin</h6>

</div>

<br>

<ul>
   <li><a style="color:white;opacity: 0.9;" href="admin.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li class="link-active"><a style="color:white;opacity: 0.9;" href="admin-notify.php"><i class="fa fa-envelope"></i> Messages</a></li>
   <li>    
<a style="cursor: pointer;" onclick="settings()"><i  class="fa fa-gear"></i> Settings &gt;</a>
<ul id="subsettings" class="active">
<li><a onclick="togglepassword()">Change Password</a></li>
<li><a onclick="dollar()"><i class="fa fa-money"></i> Dollar rate ($)</a></li>
<li><a onclick="toggleAllow()">Allow Upload / Pay </a></li>
<li><a style="text-decoration:none;color:white;opacity: 0.8;" href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
</ul>    
</li>
</ul>
<br>
</div>

<div class="col-md-10">






<div style="padding: 20px;">




<?php  

require 'engine/configure.php'; 
$num_per_page =20;
if (isset($_POST['page'])) {
 $page = $_POST['page'];
}
else{
$page = 1;  
}
$initial_page = ($page-1)*$num_per_page; 

$getNotification =mysqli_query($conn,"select * from newsfeed order by id desc limit $initial_page,$num_per_page");

if ($getNotification->num_rows>0) {
  
while ($row = mysqli_fetch_array($getNotification)) {
  
$id = $row['id'];
$name =  mysqli_escape_string($conn,$row['name']);
$subject = mysqli_escape_string($conn,$row['subject']);
$message =  mysqli_escape_string($conn,$row['message']);
$email =  mysqli_escape_string($conn,$row['email']);
$date =   mysqli_escape_string($conn,$row['date']);

?>

<div id="notification" class="container" style="font-size:13px;">


<table class='table table-responsive'>
  <thead>
    <tr>
      <th>UserName</th>
      <th>Message</th>
      <th>Action</th>
      <th>Date</th>
    </tr>
  </thead>

  <tbody>
    <tr>
      <td><?php echo$row['name']; ?></td>
      <td><?php echo$row['compose']; ?></td>
      <td><a class="btn btn-warning" href="mailto:<?php echo$email ?>">Reply <i class="fa fa-chevron-right"></i></a>  </td>
      <td><span id="time"><?php echo$row['date']; ?></span></td>
  </tr>
</tbody>
</table>
 







</div>

<div>
<?php } 


$radius=3;
$pageres = mysqli_query($conn,"select * from newsfeed");
$numpage = $pageres->num_rows;
$total_num_page =ceil($numpage/$num_per_page);
echo "<br>";
if ($page>1) {
$previous = $page-1;
echo'<span id="page_num"><a href="admin-notify.php?page='.$previous.'" style="" class="btn-success prev" id="'.$previous.'">&lt;</a></span>';
}
for ($i=1; $i<=$total_num_page; $i++) { 
if(($i >= 1 && $i <= $radius) || ($i > $page - $radius && $i < $page + $radius) || ($i <= $total_num_page && $i > $total_num_page - $radius)) {
if($i == $page) {echo'<span id="page_num"><a href="admin-notify.php?page='.$i.'" class="btn btn-success active-button" id="'.$i.'">'.$i.'</a></span>';}
  }
elseif($i == $page - $radius || $i == $page + $radius) {
 echo "... ";
}
elseif ($page==$i) {
}
else{
echo'<span id="page_num"><a href="admin-notify.php?page='.$i.'" class="btn btn-success" id="'.$i.'">'.$i.'</a></span>';
}
} 
if ($page<$total_num_page) {
$next = $page+1;
echo'<span id="page_num"><a href="admin-notify.php?page='.$next.'" style="" class="btn btn-success next" id="'.$next.'">&gt;</a></span>';
}
}

else{
echo"<div style='margin:50px 10px;text-align:center;opacity:0.7;'>There are no messages in your inbox</div>";
}

?>


</div>


</div>
</div>
</div>


<div id="popup-pay">
<a onclick="toggleAllow()" id="close-pay">&times;</a>
<h6 align="center" id="h6"><b style="color:skyblue;">Allow upload / Pay to Upload</b></h6>
<hr>
<div id='sliding' class="container" style='text-align:center;'>
 <b>Free upload&nbsp;</b>
<label class="switch">
  <input type="checkbox" id="toggleButton">
 <span class="slider round"></span>
</label>
<b>&nbsp;Paid Upload</b>
<div align="center" style="display: none;" id="loading-image"><img id="loader" height="50" width="50" src="loading-image.GIF"></div>
</div>
<br> 
</div>













<div id="popup-password">
<a onclick="togglepassword()" id="close-password">&times;</a>
<h6 align="center" id="h6">Change Password</h6>
<hr>
<div class="container">

<?php


require 'engine/configure.php';
 $sql="select * from admin where admin_id='".htmlspecialchars($_SESSION['admin_id'])."'";
   $dbc=mysqli_query($conn,$sql);
  while ($row=mysqli_fetch_array($dbc)) {
   $myid=$row['admin_id'];
    $mypassword=$row['admin_password'];
    
    
  
  }
    
 ?>

  <form method="POST" id="changepassword" enctype="multipart/form-data" >
  <input type="hidden" name="id" value="<?php echo$_SESSION['admin_id']?>">
  <input style="font-size:14px;" type="password" name="opassword" id="opassword" class="form-control" value="" placeholder="Enter old password"><br>
  <input style="font-size:0.8rem;" type="password" name="password" id="password" class="form-control" value="" placeholder="Enter new password"><br>
  <input style="font-size:0.8rem;" type="password" name="cpassword" id="cpassword" class="form-control" value="" placeholder="Confirm password" ><br>
  <label style="font-size:0.8rem;">User name: <b>Admin</b></label> 
  <b><input type="submit" name="submit" id="btn-changepassword" value="Update password" class="btn btn-changepassword form-control" style="color: white;font-size:0.8rem !important;"></b><br>
<div align="center" style="display: none;" id="loading-image"><img id="loader" height="50" width="50" src="loading-image.GIF"></div>
</form>
</div>
 <br> 

</div>

<!------------------------------------Dollar rate---------------------------------->

<div id="popup-dollar">
<a onclick="dollar()" id="close-dollar">&times;</a>
<h6 align="center" id="h6"><b style="color:skyblue;">Enter dollar rate</b></h6>
<hr>
<div class="container">
<form id="form-dollar">
<input type="text" name="dollar_rate" id="dollar_rate" style="border:1px solid rgba(0,0,0,0.1);box-shadow : 0px 0px 5px rgba(0,0,0,0.3);" class="form-control" placeholder="$ Enter dollar rate"><br>
<button class="btn btn-warning btn-dollar form-control">Update</button>
<div align="center" style="display: none;" id="loading-image"><img id="loader" height="50" width="50" src="loading-image.GIF"></div>
</form>
</div>


 <br> 

</div>

</div>

<!------------------------------------------footer--------------------------------------------------->


<?php
include 'footer.php';
?>



<script type="text/javascript">
function togglepassword() {
var popup = document.getElementById('popup-password');
popup.classList.toggle('active');
$('.row').toggleClass('background-black');
}

</script>



<script type="text/javascript">
function dollar() {
var popup = document.getElementById('popup-dollar');
popup.classList.toggle('active');
$('.row').toggleClass('background-black');

}

</script>




<script type="text/javascript">
var postData = "text";
$('.btn-dollar').on('click',function(e){
var dollar_rate = $("#dollar_rate").val();
e.preventDefault();
$("#loading-image").show();
$.ajax({
 type: "POST",
url: "engine/add-dollar.php",
data:  $("#form-dollar").serialize(),
cache:false,
contentType: "application/x-www-form-urlencoded",
success: function(response) {
$("#loading-image").hide();
if (response==1) {
swal({
text:"Dollar rate has been modified",
icon:"success",
});
$("#popup-dollar").hide(1000);
}
else{
swal({
icon:"error",
text:response
 });
$("#form-dollar")[0].reset();

}
 },
error: function(jqXHR, textStatus, errorThrown) {
 console.log(errorThrown);
}

        });

    });

</script>



<script type="text/javascript">
var postData = "text";
$('#btn-changepassword').on('click',function(e){
var password = $("#password").val();
e.preventDefault();
$("#loading-image").show();
$.ajax({
type: "POST",
url: "engine/edit-password.php",
data:  $("#changepassword").serialize(),
cache:false,
contentType: "application/x-www-form-urlencoded",
success: function(response) {
$("#loading-image").hide();
if (response==1) {
swal({
 text:"Password has been modified",
  icon:"success",
});
$("#popup-password").hide(1000);             
}
else{
 swal({

 title:"Oops!!", 
icon:"error",
text:response
});
 $("#form-signup").find('input:text').val('');
$("#form-signup").find('input:password').val('');
$("#form-signup").find('input:email').val('');
$('input:checkbox').removeAttr('checked');
 }
 },
error: function(jqXHR, textStatus, errorThrown) {
console.log(errorThrown);

            }

        })

    });





</script>


<script type="text/javascript">

$("#loading-image").hide();
$("#q").on('keyup',function() {
var x = $('#q').val();
var user_type = $('#user_type').val();
if (x=='') {$("#reset").hide();}
else{
$("#reset").show();
}
getData(user_type,x);
});

$('#user_type').on('change',function(e) {
var user_type = $('#user_type').val();
if (user_type !='all') {
getData(user_type);
}
});

$(document).on('click','.btn-success',function(e) {
e.preventDefault();
var page = $(this).attr('id');
var user_type = $('#user_type').val();
var x = $('#q').val();
if (page!='') {
$('.btn-success').removeClass('active-button');
$(this).addClass('active-button');
}

getData(user_type,x,page);
  
});

function getData(user_type,x,page) {
$.ajax({
url:"admin-engine.php",
type:"POST",
data:{'user_type':user_type,'q':x,'page':page},
success:function(data) {
$("#loading-image").hide();
$("#table").html(data).show();

  }


});


};



</script>



<script>
  
$('#user_type').trigger('change');

</script>


<script>
$(document).ready(function(){
    $(document).on('click','.btn-danger',function(e){
        if(!confirm('Are you sure you want to delete this message?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});

</script>


<script>

$(document).on('click','.check_all',function() {

 var isChecked = $(this).prop('checked');

 $('.checkbox').prop('checked', isChecked);

 if (isChecked) {

 $('.delete_all').css("opacity","1");

}

else{

 $('.delete_all').css("opacity","0");


}
 
});


</script>




<!------------------------------------------btn-scroll--------------------------------------------------->

<a class="btn-down" onclick="topFunction()">&#8593;</a>

<script src="assets/js/scroll.js"></script>

<script src="assets/js/overlay.js"></script>

<script>
  
function settings() {
 
$("#subsettings").toggleClass("active");

}

</script>




<script type="text/javascript">
var postData = "text";
$(document).on('click','.delete_all',function(e){
  if(!confirm('Are you sure you want to delete this message?')){
            e.preventDefault();
            return false;
       
var user_type = $("#user_type").val();
var id = $(".check").val();
e.preventDefault();
$("#loading-image").show();
$.ajax({
 type: "POST",
url: "engine/delete-all.php",
data:{'id':id,'user_type':user_type},
cache:false,
contentType: "application/x-www-form-urlencoded",
success: function(response) {
$("#loading-image").hide();
if (response==1) {
swal({
text:"These members have been deleted successfully",
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

        });

 }

    });

</script>


<script type="text/javascript">
function toggleAllow() {
var popup = document.getElementById('popup-pay');
popup.classList.toggle('active');
$('.row').toggleClass('background-black');

}

</script>

<script>
$(document).ready(function() {
    // Function to handle toggle change
    $('#toggleButton').change(function() {
        var isChecked = $(this).prop('checked') ? 1 : 0; // Convert boolean to 1 or 0
        
        // AJAX call to update server
        $.ajax({
            type: "POST",
            url: "engine/update-status.php", // PHP script to handle update
            data: { status: isChecked },
            success: function(response) {
               swal({icon:"success",text:response});
            },
            error: function(xhr, status, error) {
                swal('AJAX Error: ' + status, error);
            }
        });
    });
});
</script>


</body>
</html>