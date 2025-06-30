<?php session_start();
require 'engine/configure.php';
require 'engine/get-dollar.php';
require 'engine/get-pound.php';
require 'engine/get-euro.php';

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>E-stores |Marketers</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/flickity.min.css">
      <link rel="stylesheet" href="assets/css/overlay.css">
            <link rel="stylesheet" href="../../assets/css/marketers.css">
        <link rel="stylesheet" href="assets/css/btn_scroll.css">
    <link rel="stylesheet" href="mobile-view.css">
   <link rel="stylesheet" href="assets/css/cart.css">
              <link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <script src="assets/js/sweetalert.min.js"></script> 
<script src="assets/js/jquery-1.11.3.min.js"></script>
<script src="assets/js/flickity.pkgd.min.js"></script>
 <script src="assets/js/flickity-fade.js"></script> 

</head>
    <body>
        
<?php include 'nav.php'; ?>
<?php include 'overlay.php';?>

     <div class="back-button-container">
        <a onclick='history.go(-1)' class="back-button">
            <i class='fa fa-chevron-left'></i>
        </a>
    </div>

                <br><br>

     <div class="nav-container container">

         <a class="category" style="color: skyblue;" href="">Marketers</a>


     </div>
     
     <div class="container">
         
         <?php
        $getmarketers = mysqli_query($conn,"select * from vendor_profile where business_type ='manufacturer'");
        $countMarketers = $getmarketers->num_rows;
        
        while($dataManufacturer = mysqli_fetch_array($getmarketers)){ ?>
        
          <div class="manufacturer-container">
              
          <span>
    <a href="merchant.php?id=<?php echo $dataManufacturer['id']; ?>">
        <img src="<?php echo $dataManufacturer['business_image']; ?>">
    </a>
         </span>
              <span class="fw-bold text-warning"><?php echo$dataManufacturer['business_name']; ?></span>
              
              <span class="fw-bold text-secondary"><?php if($dataManufacturer['status']===1){echo "verified Manufacturer";}else{ echo"Not verified by Essential";}?></span>
                
              <span class="text-secondary"><span>Items sold:</span> <?php echo" ".$dataManufacturer['items_sold']; ?></span>
              
                    <span class="text-secondary">Joined date:<?php echo" ".$dataManufacturer['date']; ?></span>


              
          </div>
            
            
       <?php  }
        
         
         ?>
         
         
     </div>
     
     
     
     
     
     
     
     
     
              <br><br>
    
<?php include'footer.php';?>

    </body>
</html>