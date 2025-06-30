<?php session_start();
require 'engine/configure.php';
require 'engine/get-dollar.php';
if (isset($_GET['id'])) {

	$productId = mysqli_real_escape_string($conn,$_GET['id']);
    $get_product = mysqli_query($conn,"SELECT * FROM item_detail WHERE id = '".htmlspecialchars($productId)."'");
    if ($get_product) {
		while ($data_product = mysqli_fetch_array($get_product)) {
			$category = $data_product['product_category'];
			$price =  $data_product['product_price'];
			$product_name =  $data_product['product_name'];
		}

	}
}

 ?>
<?php


if (isset($_SESSION['business_id'])) {
    $buyer = $_SESSION['business_id'];
}
if (isset($_SESSION['sp_id'])) {
$buyer = $_SESSION['sp_id'];
}
if (isset($_SESSION['id'])) {
$buyer = $_SESSION['id'];

}
?>





<!DOCTYPE html>
<html>
<head>
	<title>Compare product</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/flickity.min.css">
  <link rel="stylesheet" href="assets/css/btn_scroll.css">
  <link rel="stylesheet" href="assets/css/overlay.css">
    <link rel="stylesheet" href="assets/css/cart.css">
  <link rel="stylesheet" href="mobile-view.css">
   <link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
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












.btn-danger{
  color: white !important;
}



#think{
margin-left: 210px !important;

}

@media only screen and (max-width:797px){
#think{
margin-left: 30px !important;

}
}


@media only screen and (min-width:497px) and (max-width:797px){
#think{

font-size: 1rem;

}
}








h6{

	font-weight: bold;
	margin:20px 0px;
    text-transform: capitalize;
}

.col-md-4{


}


#compare-box{

  box-shadow: 0px 0px 8px rgba(0,70,90,0.5);
    border-radius: 10px;

    overflow-y:auto;
    overflow-x: hidden;
    height: 400px;
}

#compare-box #priceitem{
    font-size:12px;
}



#compare-box #package {

    border:1px solid transparent;
	border-radius: 8px;
    width: 320px !important;
    margin: 20px;
}




#package hr{

	border:1px solid rgba(0,0,0,0.3);
    width: 80%;
}


 .item_images input[type=search]{
    box-shadow: 0px 0px 5px rgba(0,0,0,0.3);
    background-color: rgba(192,192,192,0.4);
    font-size: 12px;
}



 .item_images input[type=search]::placeholder{
  text-align: center;
}



#new{

	float: right;
	background-color: rgba(0,0,0,0.8);
    color: white;
    padding: 3px;
    font-size: 12px;
}


.fa-check{

	color: white;
    border-radius: 50%;
	background-color: green;
	padding:3px;
	font-size: 12px;


}





.btn-compare-home{

	display: flex;
    align-items: flex-start;
    justify-content: space-between;
    width: 100%;
    font-size: 12px;
}





.btn-compare-home .btn{

	

	font-size: 12px;
}


.btn-compare{

cursor: pointer;

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



/*--------------------------------------------------------------
# header
--------------------------------------------------------------*/
.nav_login{
margin-left:80px;
font-weight: normal !important;
}

.nav_signup{
border:1px solid none;
border-left:1px solid white;
border-left-color: rgba(192,192,192,1);
margin-left:0px;
font-weight: normal !important;
}



#think{
margin-left: 210px !important;

}

@media only screen and (max-width:497px){
#think{
margin-left: 110px !important;

}
}


#coca_cola img{	
width:100%;
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


.open-btn{display: block !important;font-size: 16px; margin-top: -6px;color: black;}


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
	justify-content: space-between;*/	}


/*--------------------------------------------------------------
# anchor category
--------------------------------------------------------------*/

.category{

	margin:10px;
    margin-right: 10px;
    font-size: 12px;
    border:1px solid rgba(0,0,0,0.2);
    padding: 2px 10px;
    border-radius: 15px;
    text-transform: capitalize;
    color: black;
    text-decoration: none;


}


@media only screen and (max-width:480px){


.category{



	margin-right:5px;
    font-size: 12px;
    border:1px solid rgba(0,0,0,0.2);
    padding: 2px 10px;
    border-radius: 15px;
    text-transform: capitalize;
    color: black;
    text-decoration: none;


}

}





.category:hover{

background-color: skyblue;
color:white;
text-decoration: none;
transition: 0.3s ease-in-out;

}


.category nth-child(3){

	background-color: rgba(192,192,192,0.4);
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


}


/*--------------------------------------------------------------
# navigation search bar button
--------------------------------------------------------------*/


#btn-search{

	font-size: 10px;
	border-radius:0px 13px 13px 0px;
	margin-left: -80px;
	padding: 7px 8px;
	position: relative;
z-index: 9;
color: white !important;
}


/*------------------------



/*--------------------------------------------------------------
# view icon
--------------------------------------------------------------*/

#noviews{

position:relative;
top:45px;
left:10px;
background-color: rgba(0,0,0,0.8);
color: white;
font-weight: bold;
padding: 7px;
z-index: ;
font-size:13px;
display: none;
}



 
#views{
position:relative;
top:45px;
left:-27px;
background-color: rgba(0,0,0,0.8);
color: white;
font-weight: bold;
padding: 7px;
z-index: ;
font-size: 13px;
display: none;
}




/*--------------------------------------------------------------
# product package
--------------------------------------------------------------*/
#package{
background-color:white;padding-bottom:15px 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding:3px;
width:200px;
display: inline-block;
margin:1em 1em;

}



@media only screen and (min-width:450px) and (max-width:498px){


#package{

background-color:white;padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 3px;

width:210px;

display: inline-block;
margin:1em 1em;

}



}

@media only screen and (min-width:325px) and (max-width:376px){


#package{

background-color:white;padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 1px;

width:10.4rem !important;

display: inline-block;
margin:1em 0.1em !important;

}


}


@media only screen and (min-width:377px) and (max-width:399px){


#package{

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 1px;

width:10.3rem !important;

display: inline-block;
margin:1em 0.4em !important;

}

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











@media only screen and (min-width:400px) and (max-width:414px){


#package{

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 1px;

width:11.6rem !important;

display: inline-block;
margin:1em 0.15em !important;

}

.nav_login,.nav_signup{

margin-left:40px !important;
font-weight: normal !important;
display: none! important;

padding: 2px !important;

border:2px solid white !important;

}


}




@media only screen and (min-width:300px) and (max-width:430px){


.section_search{
text-align: left !important;
}


.section_search span{

font-size: 12px;
position: relative;
left: -3px;

}


.section_search input[type=search] {

  font-size: 14px;
    width:160px !important;
    margin-left: 8px;

}

}











@media only screen and (min-width:416px) and (max-width:450px){


#package{

background-color:rgba(243,243,243,0.1);padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 1px;

width:12rem !important;

display: inline-block;
margin:1em 0.15em !important;

}



.nav_login,.nav_signup{

margin-left:40px !important;
font-weight: normal !important;
display: none! important;
padding: 2px !important;
border:2px solid white !important;


}






}


@media only screen and (max-width:415px){

#discount{
background-color: rgba(255,195,50,0.4);
color: rgba(255,95,50,1);
border: 1px solid transparent transparent;
position:relative;
top:45px;
font-weight: bold;
padding:3px;
left: 77% !important;


font-size:12px !important;

} 


}



@media only screen and (max-width:415px){

#noviews{

position:relative;
top:45px;
left:5px;
background-color: rgba(0,0,0,0.8);
color: white;
font-weight: bold;
padding: 3px;
z-index: ;
font-size:11px;

}



 
#views{

position:relative;
top:45px;
left:-35px !important;
background-color: rgba(0,0,0,0.8);
color: white;
font-weight: bold;
padding: 3px;
z-index: ;
font-size: 11px;

}


}






















@media only screen and (min-width:499px) and (max-width:797px){


#package{

background-color:white;padding-bottom: 8px;margin-bottom:50px;border:1px solid rgba(0,70,90,0.2);
padding: 10px;

width:240px;

display: inline-block;
margin:1em 0.5em;

}



}












#priceitem{
font-family:Poppins;
font-weight: bold;
color:black;
opacity: 0.8;
text-transform:capitalize;
font-size:13px;
padding:10px;
position: relative;
margin-bottom: 8px;
}



#locitem{
font-size:12px;
font-family:poppins;
color: rgba(0,0,0,0.9);
padding:10px;
width:100%;
font-weight:normal;

text-transform: capitalize;
}



#imgitem{
height: 120px;
width:100%;
margin-top:-24px;

}



#nameitem a{
  font-size:12px;
  font-weight:normal;
  padding-left:10px;
  text-transform:capitalize;
  color: rgba(0,0,0,0.4);
  padding-top: 8px;
  word-wrap:break-word;
 text-align:center;
  font-family:poppins;  
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

.footer{

	margin-top: 30px;
}




@media only screen and (max-width:1200px){

.button_navigation{
	display: none;
}


.open-btn{display: block !important;font-size: 16px; margin-top: -6px;color: black;}

}


</style>
</head>
<body>

<!------------------------------------------Header--------------------------------------------------->


<?php include 'nav.php';  ?>

<?php include 'overlay.php';  ?>


 <div class="back-button-container">
        <a onclick='history.go(-1)' class="back-button"><i class='fa fa-chevron-left'></i></a>
    </div>





<br><br>




  <div class="nav-container container">
  <a class="category">Compare Product</a><br><br>
  </div>
  <div class="container">

<!------------------------------------------Banner--------------------------------------------------->
   <div class="row">
    <div id="coca_cola" class="col-md-6">
    <img src="assets/img/coca_cola.png">
    </div>
    <div id="coca_cola" class="col-md-6">
    <img src="assets/img/coca_cola.png">
    </div>

   </div>

</div>


<br><br>

<!------------------------------------------Heading--------------------------------------------------->
	
  <div class="container item_images">
  <h6>Best seller</h6>
     <input type="search" name="search"  id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Filter by category"><br>
    <div class="row">


<!------------------------------------------Product compare box--------------------------------------------------->


    <div id="compare-box" class="col-md-4">



<h6 style="text-align: center;"><b>Compare</b></h6>

	 <div id="result" class="result"></div> 

<!------------------------------------------compare buttons--------------------------------------------------->


<div class="btn-compare-home">
<a href="compare.php" class="btn btn-info">Compare</a><a id="<?php echo$buyer?>" class="btn btn-danger">Cancel</a>


</div>

<br>

 </div>


<!------------------------------------------Products--------------------------------------------------->
<div class="col-md-8">
        <?php

        require 'engine/configure.php';
        $condition = "SELECT * from item_detail WHERE sold = 0 AND product_name like '%".htmlspecialchars($product_name)."%'";

    
          $data = mysqli_query($conn,$condition);
          $datafound = $data->num_rows;
   echo "<table id='myTable'><tbody><tr><td>";

        while($row=mysqli_fetch_array($data))

        {        
            ?>
        <?php   

   echo "<div id='package'>";
   $dollar = round($price/1500);
   $price = $row['product_price'];
   if ($row['discount']>0) {
   echo "<span id='discount'>-".$row['discount']."%</span>";

}
    if ($row['discount']==0) {
    echo "<span class='' id='noviews'>".$row['views']." <i class='fa fa-eye'></i></span>";
}

    echo "<a href='product-details.php?id={$row['id']}&{$row['product_name']}&{$row['product_location']}&{$row['product_category']}&{$row['product_details']}' target='_blank'><div style=''><img loading='lazy' id='imgitem'  src=".$row['product_image'].">"." "."</div></a>";

    echo"<span id='fa-check'><i class='fa fa-check'></i></span>";
    echo"<span id='new'>New</span><br>";

            if ($row['discount']>0) {
            $price = $row['product_price'];
            echo"<span style='text-decoration:line-through;' id='priceitem'>&#8358;".$price."</span> ";
            echo"<span id='priceitem'>&#8358;".round(( $row['product_price'])-($row['discount']/100 * $price))."</span><br>";
            echo"<span style='text-decoration:line-through;' id='priceitem'>$".round($price/$dollar_rate)."</span>";
            echo"<span id='priceitem'>$".round(($dollar)-($row['discount']/100 * $dollar))."</span><br>";

}

     if ($row['discount']==0) {
     echo"<span id='priceitem'>&#8358;".$price."</span> ";
     echo" <span id='priceitem'>$".round($price/$dollar_rate)." </span><br>";
}

     echo "<span id='nameitem' style='' ><a target='_blank' href='product-details.php?id={$row['id']}&{$row['product_name']}&{$row['product_location']}&{$row['product_category']}&{$row['product_details']}'>".$row['product_name']."</a></span>"."<br>";

     echo"<span id='locitem'>".$row['product_location'].""."</span><br>";

    ?>
       <div align="center" style="display: none;" id="loading-image"><br><img id="loader" src="loading-image.GIF"></div>

     <?php

     echo"<span id='locitem'><a class='btn-compare' id='{$row['id']}'>Compare</a></span> &nbsp;<span id='locitem'><i class='fa fa-cart-shopping'></i></span>&nbsp;<span id='locitem'><i class='fa fa-share'></i></span><br>";

     ?> 
                <?php

          echo"</div>";      
                
}   
        ?>

     </td>
 </tr>
 </tbody>
 </table>

</div>
</div>
<br><br>
<h6><?php echo$category ?> on Discount</h6>


<?php
   require 'engine/configure.php';
   $condition = "SELECT * from item_detail WHERE sold = 0 AND product_category ='$category' and discount>0";
   $data = mysqli_query($conn,$condition);
   $datafound = $data->num_rows;
   echo "<table id='myTable'><tbody>";

        while($row=mysqli_fetch_array($data))

        {        
            ?>
        <?php   
    echo "<div id='package'>";
  $product_name = $row['product_name'];
   $dollar = round($price/$dollar_rate);
   $price = $row['product_price'];

      if ($row['discount']>0) {

    echo "<span id='discount'>-".$row['discount']."%</span>";
}
       if ($row['discount']==0) {
       echo "<span class='' id='noviews'>".$row['views']." <i class='fa fa-eye'></i></span>";

}
   
    echo "<a href='product-details.php?id={$row['id']}&{$row['product_name']}&{$row['product_location']}&{$row['product_category']}&{$row['product_details']}' target='_blank'><div style=''><img loading='lazy' id='imgitem'  src=".$row['product_image'].">"." "."</div></a>";

    echo"<span id='fa-check'><i class='fa fa-check'></i></span>";
    echo"<span id='new'>New</span><br>";

            if ($row['discount']>0) {
            $price = $row['product_price'];
            echo"<span style='text-decoration:line-through;' id='priceitem'>&#8358;".$price."</span> ";
            echo"<span id='priceitem'>&#8358;".round(( $row['product_price'])-($row['discount']/100 * $price))."</span><br>";
            echo"<span style='text-decoration:line-through;' id='priceitem'>$".round($price/$dollar_rate)."</span>";
            echo"<span id='priceitem'>$".round(($dollar)-($row['discount']/100 * $dollar))."</span><br>";

}

     if ($row['discount']==0) {

     echo"<span id='priceitem'>&#8358;".$price."</span> ";
     echo" <span id='priceitem'>$".round($price/$dollar_rate)." </span><br>";
}

     echo "<span id='nameitem' style='' ><a target='_blank' href='product-details.php?id={$row['id']}&{$row['product_name']}&{$row['product_location']}&{$row['product_category']}&{$row['product_details']}'>".$row['product_name']."</a></span>"."<br>";

     echo"<span id='locitem'>".$row['product_location'].""."</span><br>";

     ?>
       <div align="center" style="display: none;" id="loading-image"><br><img id="loader" src="loading-image.GIF"></div>

     <?php

     echo"<span id='locitem'><a class='btn-compare' id='{$row['id']}'>Compare</a></span> &nbsp;<span id='locitem'><i class='fa fa-cart-shopping'></i></span>&nbsp;<span id='locitem'><a class='share' id='https://estores.ng/product-details.php?share ={$product_name}' onclick='share()' target='_blank' rel='noopener noreferrer'><i class='fa fa-share'></i></a></span><br>";

     ?> 
     
   <?php

          echo"</div>";      
                
}   
        ?>

     </tbody></table>



</div>

<br><br>

<?php include 'footer.php';  ?>

<?php


if (isset($_SESSION['business_id'])) {
    $buyer = $_SESSION['business_id'];
}
if (isset($_SESSION['sp_id'])) {
$buyer = $_SESSION['sp_id'];
}
if (isset($_SESSION['id'])) {
$buyer = $_SESSION['id'];

}
?>


<input type="hidden" name="buyer" id="buyer" value="<?php echo $buyer ?>">

<script type="text/javascript">
$('.result').load('engine/compare-page.php');
$('.btn-compare').on('click',function() {
var id = $(this).attr('id');
var buyer = $('#buyer').val();
$(".loading-image").show();
$.ajax({
type:"POST",
url:"engine/compare-page.php",
data:{'id':id,'buyer':buyer},
success:function(data) {
$(".loading-image").hide();
 $('.result').html(data).show();
   var objDiv = document.getElementById('result');
           objDiv.scrollTop = objDiv.scrollHeight;
}
    });

});
</script>


<script type="text/javascript">
  $('.numbering').load('engine/item-numbering.php');
$('.btn-danger').on('click',function() {
 // Confirm if user wants to delete 
if(confirm("Are you sure you want to delete this?"))
  {
var id = $(this).attr('id');
 // Declare variables 
$(".loading-image").show();
        $.ajax({
        type:"POST",
        url:"engine/delete-compare-page.php",
        data:{'id':id},
        success:function(response) {
        $(".loading-image").hide();
       $('.result').load(location.href + " .result");
       
      

       if (response==1) {
        swal({
               icon:"success",
               text:"Item was deleted successfully",

         });

        }
        
        else{
                 swal({
                  icon:"error",
                  text:response,

         });

        }

        }
    });

    }

});

</script>

<script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>

<script>
function share() {
    var url = $('.share').attr('id');
    var encodedUrl = encodeURIComponent(url);
    var facebookShare = "https://www.facebook.com/sharer/sharer.php?u=" + encodedUrl;
    var twitterShare = "https://twitter.com/intent/tweet?url=" + encodedUrl;
    var linkedinShare = "https://www.linkedin.com/shareArticle?url=" + encodedUrl;
    window.open(facebookShare, "_blank");
    window.open(twitterShare, "_blank");
    window.open(linkedinShare, "_blank");
}
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


<!------------------------------------------btn-scroll--------------------------------------------------->

<a class="btn-down" onclick="topFunction()">&#8593;</a>

<script src="assets/js/scroll.js" type="text/javascript"></script>

<script src="assets/js/overlay.js" type="text/javascript"></script>

</body>
</html>