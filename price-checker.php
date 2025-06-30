
<!DOCTYPE html>
<html>
<head>
  <title>E-stores | Price checker </title>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/flickity.min.css">
   <link rel="stylesheet" href="../../assets/css/deals.css">
  <link rel="stylesheet" href="assets/css/btn_scroll.css">
          <link rel="stylesheet" href="assets/css/overlay.css">
                     <link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="stylesheet" href="assets/css/cart.css">
      <script src="assets/js/jquery-1.11.3.min.js"></script>
         <script src="../../assets/js/overlay.js"></script>
  <script src="assets/js/sweetalert.min.js"></script> 
<script src="assets/js/flickity.pkgd.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.lazy.min.js"></script>


<style type="text/css">

body{
    font-family:poppins;
}


h1 img{

	margin-left: 10px;
}

.img_object{
    width:80px;
    height:90px;
    object-fit:cover;
}


#overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black overlay */
  display: flex;
  justify-content: center; /* Center horizontally */
  align-items: center; /* Center vertically */
  z-index: 9999; /* Ensure the overlay is on top of other content */
}

/* Style for the loading image */
.loader {
  border: 10px solid #f3f3f3; /* Light grey border */
  border-top: 10px solid #3498db; /* Blue border for animation */
  border-radius: 50%;
  width: 50px;
  height: 50px;
  animation: spin 2s linear infinite; /* Rotate animation */
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Style for the main content */
.content {
  padding: 20px;
  text-align: center;
  margin-top: 50px; /* Adjust margin to avoid overlay covering content */
  z-index: 1; /* Ensure main content is behind the overlay */
}


@media only screen and (min-width:400px) and (max-width:414px){

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



@media only screen and (min-width:415px) and (max-width:430px){

.nav_login,.nav_signup{

margin-left:40px !important;
font-weight: normal !important;
display: none! important;
padding: 2px !important;
border:2px solid white !important;


}

}





#think{
margin-left: 210px !important;

}

@media only screen and (min-width:497px) and (max-width:797px){
#think{
margin-left: 30px !important;
font-size: 1rem;

}
}



@media only screen and (max-width:797px){
#think{
margin-left: 30px !important;

}
}



@media only screen and (max-width:767px){

.nav_login{

margin-left:40px !important;
font-weight: normal !important;

}

}



table{
    border-collapse:collapse;
    padding:10px;
}

table ul{
     list-style-type:decimal;
}

td,th{
    padding:10px;
}

.from{
    display:flex;
    flex-direction:column;
}

.to{
    display:flex;
    flex-direction:column;
}

.btn-success{
    padding:10px;
    margin:0px 5px;
    cursor:pointer;
}

.text-sm{
    font-size:14px;
}


.select-menu{
padding:30px; 
display:flex;
justify-content:center;
gap:10px;    
} 

@media screen and (max-width:1200px){
.select-menu{
overflow:auto;
justify-content:start;
} 

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
<?php include 'overlay.php';?>
<br><br>

<div id="overlay" style="display: none;">
  <div class="loader"></div>
</div>
    
 <h3 class="mt-4 text-capitalize text-center">Price Checker</h3>  
 
 <div  class="mt-4 container">
     
 <input type='text' name="q" id="q" class="form-control mb-3 mt-3 rounded q" placeholder="Live Search">

 <div class="mt-3 select-menu text-center ">
    
 <!--  <select  class="border-0 px-3 py-1 m-2 text-center bg-secondary text-white  text-capitalize">-->
 <!--    <option>-->
 <!--        Condition-->
 <!--    </option>-->
 <!--         <option>-->
 <!--       Used-->
 <!--    </option>-->
 <!--         <option>-->
 <!--       New-->
 <!--    </option>-->
 <!--</select>-->
   
  
   <select name="merchant_type" class="border-0 px-3 py-1 m-2 text-center bg-secondary text-white  text-capitalize">
          <option value="">Select business type</option>  
          <option value="importer">Importer</option>  
          <option value="wholesaler">Wholesaler</option>   
          <option value="retailer">Retailer</option>    
          <option value="manufacturer">Manufacturer</option>   
</select>
   
  
 <select name="sort" id="sort" class="border-0 px-3 py-1 m-2 text-center bg-secondary text-white  text-capitalize">
     <option value="newest">Newest</option>
      <option value="oldest">Oldest</option>
      <option value="views">Views</option>
 </select>
 
   <select name="category" id="category" class="border-0 px-3 py-1 m-2 text-center bg-secondary text-white text-capitalize">
       <option value="">Choose category</option>
 
 <?php
 
require 'engine/configure.php';
$query_category = mysqli_query($conn,"SELECT product_category, COUNT(*) AS count FROM item_detail where sold = 0 and used = 0 GROUP BY product_category");
while ($row = mysqli_fetch_array($query_category)) { 
    $count = $row['count']; ?>

<option value="<?php echo$row['product_category']?>"><?php echo$row['product_category']?></option>

<?php } ?>

 </select>
 

 <!-- <select  class="border-0 px-3 py-1 m-2 text-center bg-secondary text-white  text-capitalize">-->
 <!--    <option>-->
 <!--        Sub category-->
 <!--    </option>-->
 <!--</select>-->
 

<select class="border-0 px-3 py-1 m-2 text-center bg-secondary text-white  text-capitalize location" name="location" id="location">
<option value="">Entire Nigeria</option>';
 
 <?php

require 'engine/connection.php';

$getStates = mysqli_query($con,"SELECT * from states_in_nigeria GROUP by state");
while ($states = mysqli_fetch_array($getStates)) {

?>

<option value="<?php echo $states['state']?>"><?php echo $states['state']?></option>
<?php	
}

?>
</select>
 
<!--<span id="lg"></span>-->
     
<div class="bg-secondary px-3 py-2">
    <div class="text-white">Pricing</div>
    
    <div class="d-flex justify-content-center align-items-center">
     <div class="d-flex from">
          <small class="text-white mb-2">From</small>
          <input type="number" min="0" name="minprice" id="minprice" class="border-0 bg-white text-dark mr-2">
    </div>
  
 
     <div class="d-flex to">
      <small class="text-white mb-2">To</small>
      <input type="number" name="maxprice" min="0" id="maxprice"  class="border-0 bg-white text-dark">
     </div> 
    
 </div>
 
 </div>
 
 
 </div>
 

 <div class="table-check">
     
     
     
     
 </div>
 
 
 </div>
 
 
 <?php include 'footer.php'; ?>
 
 

 <script>
 
$(".table-check").load("engine/price-checker-engine.php");

$("#q").on('keyup',function() {
$("#overlay").show();
var x = $('#q').val();

getData(x);
});


$("#category").on('change',function() {
$("#overlay").show();
var x = $('#q').val();
var category = $('#category').val();

getData(x,category);
});



$("#location").on('change',function() {
$("#overlay").show();
var x = $('#q').val();
var category = $('#category').val();
var location = $('#location').val();
getData(x,category,location);
});


$("#minprice").on('keyup',function() {
$("#overlay").show();
var x = $('#q').val();
var category = $('#category').val();
var location = $('#location').val();
var minprice = $('#minprice').val();
getData(x,category,location,minprice);
});




$("#maxprice").on('keyup',function() {
$("#overlay").show();
var x = $('#q').val();
var category = $('#category').val();
var location = $('#location').val();
var minprice = $('#maxprice').val();
var maxprice = $('#minprice').val();
getData(x,category,location,minprice,maxprice);
});



$("#sort").on('change',function() {
$("#overlay").show();
var x = $('#q').val();
var category = $('#category').val();
var location = $('#location').val();
var sort = $('#sort').val();
var maxprice = $('.maxprice').val();
var minprice = $('.minprice').val();
getData(x,category,location,minprice,maxprice,sort);
});



$(document).on('click','.btn-success',function() {
$("#overlay").show();
var page = $(this).attr("id");

var x = $('#q').val();
var category = $('#category').val();
var location = $('#location').val();
var sort = $('#sort').val();
var maxprice = $('.maxprice').val();
var minprice = $('.minprice').val();

getData(x,category,location,minprice,maxprice,sort,page);
});


function getData(x,category,location,minprice,maxprice,sort,page) {
$.ajax({
url:"engine/price-checker-engine.php",
type:"POST",
data:{'q':x,'category':category,'location':location,'minprice':minprice,'maxprice':maxprice,'sort':sort,'page':page},
success:function(data) {
$("#overlay").hide(); 
$(".table-check").html(data).show();

  }


});


};
</script>


<!--<script type="text/javascript">-->

<!--$('#lg').html("<select name='lga' id='lga' class='border-0 px-3 py-1 m-2 text-center bg-secondary text-white  text-capitalize lga'><option value=''>Choose LGA</option></select>");-->
	
<!--$('#location').on('change',function() {-->
	
<!--var location = $(this).val();-->

<!--      $.ajax({-->
<!--            type:"POST",-->

<!--            url:"engine/get-lga.php",-->

<!--            data:{'location':location},-->

<!--            success:function(data) {-->

<!--            	$('#lg').html(data);-->
            	
<!--            }-->


<!--     });-->

<!--});-->

<!--</script>-->
</body>
</html>