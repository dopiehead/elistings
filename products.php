<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
 session_start();
 require 'engine/configure.php';
 require 'engine/get-dollar.php';
 require 'engine/get-euro.php';
 require 'engine/get-pound.php'; 
 $search = isset($_GET['search']) && !empty($_GET['search']) ? $conn->real_escape_string($_GET['search']) : "";
 $search_category = isset($_GET['category']) && !empty($_GET['category']) ? $conn->real_escape_string($_GET['category']) : "";
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
    <link rel="stylesheet" href="assets/css/products.css">
     
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
<marquee
    onmouseover="stop()"
    onmouseout="start()"
    scrollamount="10"
    class="marquee"
    style="display: flex; background-color:rgba(0,0,0,0.9); padding: 5px"
>
    <ul
        style="
          width: 100%;
          list-style: none;
          display: flex;
          justify-content: center;
          align-items: center;
          gap: 30px;
        "
    >
        <!-- -------------------------------- -->
        <li
            style="
            font-size: 12px;
            list-style: none;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2px;
            border-right: 1px solid #ffffffdc;
            padding-right: 10px;
          "
        >
            <img
                src="countries/GB.png"
                width="20px"
                alt=""
            />&nbsp;<span style="color: #ffffff">EUR</span>
            <span style="color: #21ca07">1.00</span>
            &nbsp;
            <img
                src="countries/NG.png"
                width="20px"
                alt=""
            />&nbsp;<span style="color: #ffffff">NGN</span>
            <span style="color: #ff0303"><?php echo $pound_rate; ?></span>
        </li>
        <!-- -------------------------------- -->
        <li
            style="
            font-size: 12px;
            list-style: none;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2px;
            border-right: 1px solid #ffffffdc;
            padding-right: 10px;
          "
        >
            <img
                src="countries/EUR.png"
                width="20px"
                alt=""
            />&nbsp;<span style="color: #ffffff">GDP</span>
            <span style="color: #21ca07">1.00</span>
            &nbsp;
            <img
                src="countries/NG.png"
                width="20px"
                alt=""
            />&nbsp;<span style="color: #ffffff">NGN</span>
            <span style="color: #ff0303"><?php echo $euro_rate; ?></span>
        </li>
        <!-- -------------------------------- -->
        <li
            style="
            font-size: 12px;
            list-style: none;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2px;
            border-right: 1px solid #ffffffdc;
            padding-right: 10px;
          "
        >
            <img
                src="countries/USA.png"
                width="20px"
                alt=""
            />&nbsp;<span style="color: #ffffff">USA</span>
            <span style="color: #21ca07">1.00</span>
            &nbsp;
            <img
                src="countries/NG.png"
                width="20px"
                alt=""
            />&nbsp;<span style="color: #ffffff">NGN</span>
            <span style="color: lightgreen;"><?php echo$dollar_rate;?></span>
        </li>
        <!-- -------------------------------- -->
        <li
            style="
            font-size: 12px;
            list-style: none;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2px;
            border-right: 1px solid #ffffffdc;
            padding-right: 10px;
          "
        >
            <img
                src="countries/SA.png"
                width="20px"
                alt=""
            />&nbsp;<span style="color: #ffffff">SA</span>
            <span style="color: #21ca07">1.00</span>
            &nbsp;
            <img
                src="countries/NG.png"
                width="20px"
                alt=""
            />&nbsp;<span style="color: #ffffff">NGN</span>
            <span style="color: #ff0303">1.00</span>
        </li>
        <!-- -------------------------------- -->
        <li
            style="
            font-size: 12px;
            list-style: none;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2px;
            border-right: 1px solid #ffffffdc;
            padding-right: 10px;
          "
        >
            <img
                src="countries/JPN.png"
                width="20px"
                alt=""
            />&nbsp;<span style="color: #ffffff">JPN</span>
            <span style="color: #21ca07">1.00</span>
            &nbsp;
            <img
                src="countries/NG.png"
                width="20px"
                alt=""
            />&nbsp;<span style="color: #ffffff">NGN</span>
            <span style="color: #ff0303">1.00</span>
        </li>
        <!-- -------------------------------- -->
        <li
            style="
            font-size: 12px;
            list-style: none;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2px;
            border-right: 1px solid #ffffffdc;
            padding-right: 10px;
          "
        >
            <img
                src="countries/GH.png"
                width="20px"
                alt=""
            />&nbsp;<span style="color: #ffffff">GHN</span>
            <span style="color: #21ca07">1.00</span>
            &nbsp;
            <img
                src="countries/NG.png"
                width="20px"
                alt=""
            />&nbsp;<span style="color: #ffffff">NGN</span>
            <span style="color: #ff0303">1.00</span>
        </li>
    </ul>
</marquee>  
<!------------------------------------------Header--------------------------------------------------->
<?php include 'components/header.php';  ?>
 <div class="back-button-container">
        <a onclick='history.go(-1)' class="back-button"><i class='fa fa-chevron-left'></i></a>
    </div>

<br><br>

<div class=" d-flex flex-row flex-column h-100 full-height container">
<?php
$featured = $conn->prepare("SELECT * FROM item_detail where sold = 0 and featured = 1  ORDER BY RAND() ");
$featured->execute();
$featured_result = $featured->get_result();
if ($featured_result->num_rows>0) { ?>
<h4 class='text-left'><b><span class='bg-danger py-1'><span class='ms-4' style='visibility:hidden;'>1</span></span>   &nbsp;&nbsp;Featured</b></h4>

<div style='height:250px;' class="featured  w-100  py-3 px-2">
<?php
while ($getfeaturedProducts = $featured_result->fetch_assoc()) { 
$id = $getfeaturedProducts["id"];
$featured_product = $getfeaturedProducts["featured"];
$featured_image = explode(",",$getfeaturedProducts["product_image"]);

?>
<div class="package bg-white"  style="border:1px solid rgba(0,0,0,0.1);margin-right:25px; width:250px;height:100%; position:relative;">
<?php
    if($featured_product == 1):
         echo "<span style='right:0;' class='fa fa-crown position-absolute top-0  text-warning'></span>";
    endif;
    ?>
<span style="padding:5px;" id="data_name"><?= htmlspecialchars($getfeaturedProducts['product_name']) ?></span><br>
<span style="opacity: 0.5" id="data_price">From<br></span>
<?php if($getfeaturedProducts['discount'] > 0): $discount = $getfeaturedProducts['discount'];
            $discounted_price = $getfeaturedProducts['product_price'] - ($getfeaturedProducts['product_price'] * $discount/100); ?>
             <span style="opacity: 0.5" id="data_price"> <span style='text-decoration:line-through;' class=''><?= htmlspecialchars($getfeaturedProducts['product_price']) ?></span>  <?= htmlspecialchars($discounted_price) ?></span>
           <?php else: ?>

            <span style="opacity: 0.5" id="data_price"> <?= htmlspecialchars($getfeaturedProducts['product_price']) ?></span>
            <?php endif ?>
<span style="opacity: 0.7;color:red;" id="data_price"> <?= htmlspecialchars($getfeaturedProducts['product_location']) ?></span>
<span style="opacity: 0.5" id="data_price"> <?= htmlspecialchars($getfeaturedProducts['product_condition']) ?></span>
<a href="product-details.php?id=<?= htmlspecialchars($id) ?>"><img style="height: 150px; width:200px;" src='<?= htmlspecialchars($featured_image[0]) ?>' ></a>
<?php if($getfeaturedProducts['views']> 0) : ?>
               <span style="left:0;bottom:0;" class="position-absolute bg-dark text-white py-2 px-1" id="data_price"> <?= "<i class='fa fa-eye'></i>". htmlspecialchars($getfeaturedProducts['views']); ?></span>
            <?php endif; ?>

            <?php if($getfeaturedProducts['discount']>0) : ?>
               <span style="right:0;bottom:0;" class="position-absolute bg-warning text-dark py-2 px-1" id="data_price"> <?= htmlspecialchars($getfeaturedProducts['discount'])." %"; ?></span>
            <?php endif; ?>
</div>
<?php } echo'</div>'; } else{   ?>
<div class="d-flex justify-content-center">
  <?php   $images = ['assets/img/coca_cola.png','assets/img/coca_cola.png'];
     foreach ($images as $image) : ?>
      <div style='height:20vh;' class=" px-2 ads w-100 d-flex justify-content-center align-items-center">
            <h2 class='text-white fw-bold'>Place your ads here</h2>
      </div>
    <?php endforeach;
  ?>
</div>
<?php    }     ?>
<br>
</div>
<br>
<!-- end of featured products -->





<div class='d-flex justify-content-between px-3 mt-2 flex-md-row flex-column'>
       <!-- part a for filtering of result -->
     <div class='filters col-md-3  pe-2 border-right border-3 border-secondary'>
        <h4 class='fw-bold mb-3'>Filter</h4>  
        <div class='d-flex flex-row flex-column gap-3 filter-content'>
        
        <!-- search input on key up -->
        <div>
           <input type="text" name="search" id='search' class='form-control' placeholder="Search for anything" value="<?php if(!empty($search)){echo htmlspecialchars($search);} ?>">
        </div>
         
        <!-- condition drop down -->
          <select class='bg-light text-capitalize text-secondary' name="condition" id="condition">
          <option value="">Condition</option>
           <?php $conditions = ['new','used','tokunbo'];
               foreach ($conditions as $condition) { ?>
                  <option value="<?= htmlspecialchars($condition) ?>"><?= htmlspecialchars($condition) ?></option>
              <?php }
           ?>       
          </select>
          
          <!-- category drop down -->
          <select class='bg-light text-capitalize text-secondary select-category py-2' name="category" id="category">
          <option value="">Category</option>
          <?php
            $query_category = $conn->prepare("SELECT  e_auto_categories  FROM categories GROUP BY e_auto_categories ASC");
            if($query_category->execute()):
              $result_category = $query_category->get_result();
              while($categoryRow = $result_category->fetch_assoc()) : ?>
                <option value="<?= htmlspecialchars($categoryRow['e_auto_categories']) ?>"><?= htmlspecialchars($categoryRow['e_auto_categories']) ?></option>
          <?php  
              endwhile;          
           endif;
          ?>        
          </select>

          <span class='w-100 bg-light py-2' id="subcategory"></span>
            
          <!-- subcategory after choosing category -->

           <!-- states in nigeria -->
           <select class='bg-light text-secondary' name="location" id="location">
           <option value="">Location</option>
            <?php
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
             require("engine/connection.php");
             $getstates = $con->prepare("SELECT DISTINCT state FROM states_in_nigeria ORDER BY state ASC");
             if($getstates->execute()):
               $states_result = $getstates->get_result();
               while($states_row = $states_result->fetch_assoc()): ?>
                 <option value="<?= htmlspecialchars($states_row['state']) ?>"><?= htmlspecialchars($states_row['state']) ?></option>
             <?php 
                endwhile;
              else:
                echo"No state found";
             endif;
            ?>
          </select>

           <select class='bg-light text-secondary' name="featured" id="featured">
           <option value="">Not Featured</option>
              <option value="featured">Featured</option>
              
          </select>
           <select class='bg-light text-secondary' name="discount" id="discounted">
            <option value="">No Discount </option>
            <option value="discount">Discounted Items</option>
           </select>
           
           <div class='d-flex justify-content-center flex-wrap bg-danger py-4 px-2 price-content'>
            <h6 class='fw-bold text-white'>Amount</h6>

            <?php
              $getproductminandmax = $conn->prepare("SELECT MIN(product_price) AS min_price, MAX(product_price) AS max_price FROM item_detail WHERE sold = 0");
             if ($getproductminandmax->execute()) {
                $result = $getproductminandmax->get_result();
                if ($row = $result->fetch_assoc()) {
                  $min_price = $row['min_price'];
                  $max_price = $row['max_price'];

                 }
              }
             ?>

             <div class='d-flex flex-column flex-row w-100'>
               <label class='text-white' for="">From:</label>
               <input type="number" min="<?= htmlspecialchars($min_price) ?>" inputmode="numeric" placeholder="Enter minimum amount" class='border-0 bg-light px-1 py-2' value='<?= htmlspecialchars($min_price)?>'>
             </div>
             <div class='d-flex flex-column flex-row w-100'>
               <label class='text-white' for="">To:</label>
               <input type="number" min="<?= htmlspecialchars($min_price) ?>" max="<?= htmlspecialchars($max_price) ?>" inputmode="numeric" placeholder="Enter maximum amount" class='border-0 bg-light px-1 py-2'>
             </div>

           </div>

        </div>

     </div>

     <div class='contents col-md-9'>

        <div class='d-flex justify-content-between'>
          <h3 class='fw-bold text-danger'>Products</h3>

          <select name="sort" id="sort" class='bg-light text-dark border-mute rounded py-1 px-2 text-capitalize'>
             <option value="">Sort By</option>
             <?php
             $orderbys = ['recent', 'oldest', 'highest_views', 'lowest_views', 'highest_price', 'lowest_price'];
             foreach ($orderbys as $orderby) { ?>
              <option value="<?= htmlspecialchars($orderby) ?>"><?= htmlspecialchars(preg_replace("/_/"," ",$orderby)) ?></option>
            <?php }
             ?>
          </select>

        </div>

        <div class='px-2 mt-4'>

           <div style='display:none;' class='spinner-border text-secondary fs-3'>

           </div>

           <div class='table-container'>

           </div>



        </div>

     </div>

<br><br>
</div>

<div class='mt-5'>

</div>

<?php include ('footer.php') ?>


<!------------------------------------------btn-scroll--------------------------------------------------->

<a class="btn-down" onclick="topFunction()">&#8593;</a>
<?php if (!empty($search)) { ?>
<input type="hidden" id="searchValue" value="<?= htmlspecialchars($search) ?>">
<?php } ?>

<?php if (!empty($search_category)) { ?>
<input type="hidden" id="categoryValue" value="<?= htmlspecialchars($search_category) ?>">
<?php } ?>



<script>
  $('#subcategory').html("<select name='subcategory' id='subcategory' class='bg-light text-secondary border-mute rounded py-1 px-2 text-capitalize form-control'><option>Choose subcategory</option></select>");
$('.select-category').on('change',function() {
    const category = $(this).val();

     $.ajax({
           type:"POST",
           url:"engine/get-subcategory.php",
           data:{'category':category || ''},
           success:function(data) {
             if(data.length > 0){
             $('#subcategory').html(data);
             }
             else{
              $('#subcategory').html("<select name='subcategory' id='subcategory' class='bg-light text-secondary border-mute rounded py-1 px-2 text-capitalize form-control'><option>Choose subcategory</option></select>");
             }
             
           }
    });
});

</script>

<script src="assets/js/scroll.js" type="text/javascript"></script>
<script src="assets/js/products.js" type="text/javascript"></script>
</body>
</html>