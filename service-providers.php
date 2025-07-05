<?php
 session_start();
 require 'engine/configure.php'; 
 $search = isset($_GET['search']) && !empty($_GET['search']) ? $conn->real_escape_string($_GET['search']) : "";
 $work = isset($_GET['work']) && !empty($_GET['work']) ? $conn->real_escape_string($_GET['work']) : "";
 ?>  

<!DOCTYPE html>
<html>
<head>
	<title>E-listing</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
         <link rel="stylesheet" href="assets/css/btn_scroll.css">
                    <link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="stylesheet" href="assets/css/flickity.min.css">
    <link rel="stylesheet" href="assets/css/overlay.css">
    <link rel="stylesheet" href="assets/css/cart.css">
    <link rel="stylesheet" href="assets/css/service-providers.css">
             <link rel="stylesheet" href="mobile-view.css">
  <script src="assets/js/sweetalert.min.js"></script> 
  <script src="assets/js/jquery-1.11.3.min.js"></script>
<script src="assets/js/flickity.pkgd.min.js"></script>
<style>
  body{
    font-family:poppins !important;
  }
</style>
</head>
<body class='bg-white'>
<!------------------------------------------Header--------------------------------------------------->
<?php include 'components/header.php';  ?>
 <div class="back-button-container px-4 mt-2">
        <a onclick='history.go(-1)' class="back-button"><i class='fa fa-chevron-left'></i></a>
  </div>

<br><br>
 <div class='d-flex px-2 flex-md-row flex-column'>

     <div class='col-md-4 border-right border-2 border-mute'>

        <h4 class='fw-bold mb-2 '>Filters</h4>

 <input type="text" name="q" id="q" class="form-control mt-5" placeholder="Search for anything">
         
<h6 class='mt-4 fw-bold text-secondary' >By preference</h6>

<select name='category' id='category' class="form-select form-control">
                    <option value=''>Select Category</option>                 
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


<h6 class='mt-4 fw-bold text-secondary'>By Services</h6>

<span class='bg-light text-secondary border-0 mt-2 py-2 speciality'>
                    
            
</span>

   <h6 class='mt-4 fw-bold text-secondary'>By Experience</h6>

   <select class=' text-secondary mt-2 py-2 form-control' name="experience" id="experience">
                    
                    <option value=''>Select Experience</option>
                    <option value='1-5'>1 - 5(Years)</option>
                    <option value='6-20'>6 - 20(Years)</option>
                    <option value='20-30'>20 - 30(years)</option>
                    
                   
    </select>       


<h6 class='mt-4 fw-bold text-secondary'>By State</h6>

   <select name='location' id="location" class='form-control'>
       
       <option value="">---Select state---</option>

<?php
require("engine/connection.php");
$getstate = $con->prepare("SELECT DISTINCT state FROM states_in_nigeria ORDER BY state ASC");
if ($getstate->execute()) {
  $result_state = $getstate->get_result();
  while ($data_state = $result_state->fetch_assoc()) { ?>
      <option value="<?= htmlspecialchars($data_state['state']) ?>"><?= htmlspecialchars($data_state['state']) ?></option>
  <?php }
}
?>
</select>

<div class='d-flex justify-content-between flex-wrap gap-3 mt-4 mb-2 py-4 px-3 pricing-container bg-danger'>
    
    <div class='from-container'>
       <label class='fw-bold text-secondary'>From:</label>
      <input type='number' min="0" inputmode="numeric" name="minprice" id="minprice" placeholder="Minimum Price" class='rounded form-control'>
   </div>
   
   <div class='to-container text-secondary'>
       <label class='fw-bold'>To:</label>
      <input type='number' min="0" inputmode="numeric" name="maxprice" id="maxprice" placeholder="Maximum price" class='rounded form-control'>
   </div>
   
</div>

     </div>

     <div class='col-md-8'>
        <div>
           <span style='display:none' class='spinner-border text-warning'></span>
         </div>
         <div class='d-flex justify-content-between align-items-center'>
            <h4 class='fw-bold'>Service Providers</h4>
            <select name="sort" id="sort" class='border-2 border-mute bg-light py-2 px-1'>
                <option value="">All</option>
                <option value="newest">Newest First</option>
                <option value="oldest">Oldest First</option>
            </select>
         </div>
        <div class='product-category mt-4'>

        </div>

        <div class="pagination-container mt-3"></div>

     </div>

 </div>

 <div class='mt-5'></div>

<?php include ('footer.php') ?>

<!------------------------------------------btn-scroll--------------------------------------------------->

<a class="btn-down" onclick="topFunction()">&#8593;</a>
<?php if (!empty($search)) { ?>
<script>
$(document).ready(function() {
    const search = <?= json_encode($search) ?>;
    $("#q").val(search);
    setTimeout(() => {
        $("#q").trigger("keyup");
    }, 300);
});
</script>
<?php } ?>


<?php if (!empty($work)) { ?>
<script>
$(document).ready(function() {
    const work = <?= json_encode($work) ?>;
    
    // Poll every 100ms until the #category select is loaded with options
    const interval = setInterval(function () {
        const $category = $("#speciality");
        // If the dropdown has options and contains the target value
        if ($category.find("option").length && $category.find(`option[value='${work}']`).length) {
            $category.val(work); // Set the selected value
            $category.trigger("change"); // Trigger change event
            clearInterval(interval); // Stop checking
        }
    }, 300);
});
</script>
<?php } ?>



<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script src="assets/js/service-providers.js" type="text/javascript"></script>
<script src="assets/js/scroll.js" type="text/javascript"></script>
<script src="assets/js/products.js" type="text/javascript"></script>
</body>
</html>