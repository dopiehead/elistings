<?php session_start();
require 'engine/configure.php';
require 'engine/get-dollar.php';
require 'engine/get-euro.php';
require 'engine/get-pound.php';
?>
<html lang="en">
<head>
    
 
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/flickity.min.css">
     <link rel="stylesheet" href="assets/css/btn_scroll.css">
      <link rel="stylesheet" href="assets/css/overlay.css">
          <link rel="stylesheet" href="assets/css/shop.css">
    
  <script src="assets/js/sweetalert.min.js"></script> 
  <script src="assets/js/jquery-1.11.3.min.js"></script>
  <script src="assets/js/overlay.js"></script>
<script src="assets/js/flickity.pkgd.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.lazy.min.js"></script>
    <title>Market Place</title>
</head>

<body>

<?php include 'nav.php';  ?>

<?php include 'overlay.php';?>

<br><br>

     <div class='d-flex menu-container'>

         <select class="p-1 text-secondary text-sm business_type border-0" name="business_type">
                  <option value="">Business type</option>
                  <option value="wholesale">Wholesale</option>
                  <option value="retail">Retail</option>
                  <option value="importer">Importer</option>
                  <option value="manufacturer">Manufacturer</option>
              
         </select>

         <select class="p-1 text-secondary text-sm" name="units">
                  <option value="">Units</option>
                  <option value="1-5">1-5</option>
                  <option value="6-10">6-10</option>
                  <option value="10-15">10-15</option>
                   <option value="16-50">16-20</option>
              
         </select>

         <select class="p-1 text-secondary text-sm condition">
                  <option value="">Condition</option>
                  <option value="2">Fairly Used</option>
                  <option value="1">Tokunbo</option>
                  <option value="0">New</option>
              
          </select>

     </div>

     <br>

     <div class="container mt-3">
               
               <input type="search" class="rounded text-dark  p-1 form-control p-3 rounded rounded-pill" placeholder="Search" name="q" id="q">  

         <div class='result'>
    
    
    
    
    
    
          </div>

     </div>

     <br><br>

     <?php include 'footer.php'; ?>

     
     
     
<script>
     
     $(".result").load("getitems.php");          
     $("#q").on('keyup',function() {
     $("#overlay").show();
     var x = $('#q').val();
     
     getData(x);
     });
     
     
     $(".b_location").on('change',function() {
     $("#overlay").show();
     var x = $('.q').val();
     var b_location = $('.b_location').val();
     
     getData(x,b_location);
     });
     
     
     
     $(".itemsdetails").on('change',function() {
     $("#overlay").show();
     var x = $('.q').val();
     var b_location = $('.b_location').val();
     var itemsdetails = $('.itemsdetails').val();
     getData(x,b_location,itemsdetails);
     });
     
     
     
     $(".business_type").on('change',function() {
     $("#overlay").show();
     var x = $('.q').val();
     var b_location = $('.b_location').val();
     var itemsdetails = $('.itemsdetails').val();
     var business_type = $('.business_type').val();
     getData(x,b_location,itemsdetails,business_type);
     });
     
     
     
     
     $(".condition").on('change',function() {
     $("#overlay").show();
     var x = $('.q').val();
     var b_location = $('.b_location').val();
     var itemsdetails = $('.itemsdetails').val();
     var business_type = $('.business_type').val();
     var condition= $('.condition').val();
     getData(x,b_location,itemsdetails,business_type,condition);
     });
     
     
     
     $(".units").on('change',function() {
     $("#overlay").show();
     var x = $('.q').val();
     var b_location = $('.b_location').val();
     var itemsdetails = $('.itemsdetails').val();
     var business_type = $('.business_type').val();
     var condition= $('.condition').val();
     var units = $('.units').val();
     getData(x,b_location,itemsdetails,business_type,condition,units);
     });
     
     
     
     $(document).on('click','.btn-success',function() {
     $("#overlay").show();
     var page = $(this).attr("id");
     var x = $('#q').val();
     $("#overlay").show();
     var x = $('.q').val();
     var b_location = $('.b_location').val();
     var itemsdetails = $('.itemsdetails').val();
     var business_type = $('.business_type').val();
     var condition= $('.condition').val();
     var units = $('.units').val();
     
     getData(x,b_location,itemsdetails,business_type,condition,units,page);
     });
     
     function getData(x,b_location,itemsdetails,business_type,condition,units,page) {
     $.ajax({
     url:"getitems.php",
     type:"POST",
     data:{'q':x,'b_location':b_location,'itemsdetails':itemsdetails,'business_type':business_type,'condition':condition,'units':units,'page':page},
     success:function(data) {
     $("#overlay").hide(); 
     $(".result").html(data).show();
     
       }
     
     
     });
     
     
     };
              
          </script>
         

</body>