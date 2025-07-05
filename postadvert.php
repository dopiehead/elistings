<?php
session_start();

// Redirect unauthenticated users
if (empty($_SESSION["business_id"])) { 
    echo "<script>location.href='dashboard.php'</script>";
    exit();
}

// Set time zone
date_default_timezone_set('Africa/Lagos');

// Get user session data
$myid = $_SESSION['id'] ?? null;
$date = $_SESSION['date'] ?? null;

$business_id = $_SESSION['business_id'];
$business_date = $_SESSION['business_date'] ?? null;
$business_contact = $_SESSION['business_contact'] ?? null;

// Fallback to email if available
$user_email = $_SESSION['business_email'] ?? $_SESSION['email'] ?? null;

// DB connection
require("engine/configure.php");

?>


<!DOCTYPE html>
<html>
<head>
	<title>E-stores | Post product </title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
             <link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="stylesheet" href="assets/css/flickity.min.css">
  <link rel="stylesheet" href="assets/css/postadvert.css">
  <link rel="stylesheet" href="assets/css/navigator.css">
  <link rel="stylesheet" href="assets/css/profile-section.css">
  <script src="assets/js/jquery-1.11.3.min.js"></script>
  <script src="assets/js/sweetalert.min.js"></script> 
<script src="assets/js/flickity.pkgd.min.js"></script>
<script src="assets/js/postadvert.js"></script>
</head>
<body>

<!-- popup for verification -->


<div id="popup" class="popup active">
     <a class="close"  onclick="verify_id()">&times;</a>  

     <form method="post" id="formPopup" enctype="multipart/form-data">
         <div class="row jumbotron">
           <div class="col-md-6">
             <h4>Upload passport / Selfie (max:2MB)</h4> 
             <p>Please upload a passport size photograph or a selfie to continue. This to reduce spamming and phising. All sellers are required to  upload a valid ID card and a selfie or passport size photograph.</p>
             <input type="hidden" name="sid" value="<?= htmlspecialchars($_SESSION['business_id'])?>">
             <input type="hidden" name="verified" value="0">
             <input  type="file" name="img" accept="image/*" capture='environment'>
             <br>
             <br>
           </div>

           <div class="col-md-6">
             <h4>Upload Valid ID (max:2MB)</h4>
             <p>Please upload any valid ID card. Verification process takes about 6-24 hrs for new sellers account to be active, please bear with us.</p>
             <input type="file" name="valid_id"  accept="image/*">
             <br>
             <br>
           </div>
<div align="center" style="display: none;" id="loading-image"><img id="loader" height="50" width="80" src="loading-image.GIF"></div>
<button type="submit" name="submit_verify" style="font-size:13px;" class="btn btn-success form-control">Submit</button>
</div>
<br>
</form>
</div>

<!------------------------------------------overlay content--------------------------------------------------->

<div style="overflow: hidden;">
   <div class="row">
   <a id="openbar" onclick="openbar()"><i class="fa fa-bars"></i></a>
   <div id="overlay" class="overlay col-md-3">
     <?php include ("components/navigator.php"); ?>
   </div>

<div class="col-md-9">
  <div class="container">
  <div class="row">
    <!-- Left: Product Options -->
    <div class="col-md-6 mb-4">
      <h6 class="mt-3">Post your product</h6>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" onclick="discount()" name="Discount" id="discount">
        <label class="form-check-label" for="discount">Discount sales</label>
      </div>
      <div class="form-check mt-2">
        <input class="form-check-input" type="checkbox" name="negotiable" id="negotiable">
        <label class="form-check-label" for="negotiable">Negotiable</label>
      </div>
    </div>

    <!-- Right: Vendor Info -->
    <div class="col-md-6">
      <?php
        require 'engine/configure.php';   
        $vendor = mysqli_query($conn,"SELECT * FROM vendor_profile WHERE id = '$business_id'");
        if ($vendor) {   
          while ($dataVendor = mysqli_fetch_array($vendor)) {
            $vendorName = $dataVendor['business_name'];
            $vendorImg = $dataVendor['business_image'];
          }
        }
      ?>
      <div style='gap:10px;' class="d-flex align-items-center">
        <img id="user_image" src="<?= htmlspecialchars($vendorImg); ?>" class="rounded-circle me-3" alt="Vendor Image" style="object-fit: cover;">

        <div>
          <div class="d-flex align-items-center justify-content-between">
            <span class="fw-bold user_name" id="user_name"><?= htmlspecialchars($_SESSION['business_name']); ?></span>

            <a href="vendor-notification.php" class="ms-3 text-decoration-none position-relative">
              <i class="fa-solid fa-bell"></i>
              <?php
                if (isset($_SESSION['business_id'])) {
                  $business_id = $_SESSION['business_id'];
                  $getnotification = mysqli_query($conn,"SELECT * FROM vendor_notifications WHERE pending = 0 AND recipient_id ='".htmlspecialchars($business_id)."'");
                  $countNotifications = $getnotification->num_rows;
                  if ($countNotifications > 0) {
                    echo '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">'.htmlspecialchars($countNotifications).'</span>';
                  }
                }
              ?>
            </a>
          </div>
          <small class="text-muted d-block user_email" id="user_email"><?= htmlspecialchars($_SESSION['business_email']); ?></small>
        </div>
      </div>
    </div>

  </div>
</div>



<!-- product details -->


<br>

<div id='label px-2'>

<h6 class='px-3'>Product details</h6>


  
<form id="form-product">
  <div class="container">
    <input type="text" class="form-control p-2" name="product_name" placeholder="....Write product Name" required>
  </div>

  <div class="row mt-3 px-3">
    <div style="gap:20px;font-size:14px;" class="col-md-6 d-flex flex-row flex-column g-3">
      <select name="product_category" class="category form-control" id="product_category" style="text-transform: capitalize;font-size:14px;" required>
        <option>Choose Category</option>
        <?php
        $query_category = mysqli_query($conn,"SELECT e_auto_categories FROM categories");
        while ($row = mysqli_fetch_array($query_category)) { 
        ?>
        <option value="<?= htmlspecialchars($row['e_auto_categories']) ?>"><?= htmlspecialchars($row['e_auto_categories']) ?></option>
        <?php } ?>
      </select>

      <!-- Subcategory will be injected here -->
      <span id="subcategory"></span>
    </div>

    <div style="gap:20px;" class="col-md-6 d-flex flex-row flex-column g-3 px-3">
      <!-- FIXED: Added name -->
      <select id="btn-condition" name="product_condition" style="padding: 8px;font-size:14px;" class="btn-condition form-control text-capitalize" required>
        <option value="">Select Product condition</option>
       <?php $conditions = ['new','used','tokunbo'];
         foreach ($conditions as $condition) {
           echo"<option value='".$condition."'>".$condition."</option>";
         }  
       ?>
      </select>

      <select name="product_color" id="product_color" class="form-control" style="text-transform: capitalize;font-size:14px;">
        <option value="">choose color</option>
        <?php
        $colors = ['blue', 'brown', 'red', 'yellow', 'pink', 'purple', 'white', 'gold', 'black', 'green', 'magenta', 'orange' ]; 
        foreach ($colors as $color) {
          echo'<option value="'.htmlspecialchars($color).'">'.htmlspecialchars($color).'</option>';
        }
        ?>
      </select>
    </div>
  </div>

  <br>
  <h6 class="px-3">Address details</h6>

  <div class="row px-3">
    <div class="col-md-6">
      <select name="product_location" class="form-control" style="font-size: 14px;text-transform: capitalize;" required>
        <option selected="" value="">Entire Nigeria</option>
        <?php
        require("engine/connection.php");
        $getstates = $con->prepare("SELECT DISTINCT state FROM states_in_nigeria ORDER BY state ASC");
        if($getstates->execute()):
          $state_result = $getstates->get_result();
          while($stateRow = $state_result->fetch_assoc()){
            echo'<option value="'.$stateRow["state"].'">'.$stateRow["state"].'</option>';          
          }
        endif; ?>
      </select>
    </div>

    <div class="col-md-6">
      <input class="form-control" type="text" name="product_address" placeholder="Street / Estate / Neighbourhood" required>
    </div>
  </div>

  <br>
  <h6 class="px-3">Price details</h6>

  <div class="row px-3">
    <div class="col-md-6">
      <input style="font-size:14px" inputmode="numeric" class="form-control" type="number" min="1" name="product_price" id="product_price" placeholder="Price" required>
    </div>

    <div class="col-md-6">
      <select style="padding:8px;border-radius:3px;" id="discount_hide" class="btn-accordion active" name="discount">
        <option value="">How many percentage</option>
        <?php 
        for ($i = 10; $i < 100; $i += 10) {
          echo "<option value='$i'>$i% OFF</option>";
        }
        ?>
      </select>
    </div>
  </div>

  <br>

  <!-- ✅ ADDED Quantity -->
  <div class="row px-3">
    <div class="col-md-6">
      <input style="font-size:14px;" class="form-control" type="number" min="1" name="quantity" id="quantity" placeholder="Quantity available" required>
    </div>
  </div>

  <br>
  <h6 class="px-3">Phone number</h6>
  <div class="px-3">
    <input style="font-size:14px;" class="form-control" type="number" min="1" name="phone_number" id="phone_number" value="<?= htmlspecialchars($business_contact) ?>" placeholder="Phone number" required>
  </div>

  <br>
  <div class="form-group px-3">
    <h6>Description</h6>
    <textarea
      name="product_details"
      rows="5"
      class="form-control"
      style="font-size: 14px;"
      placeholder="Describe your product"
      wrap="physical"
      required
    ></textarea>
  </div>

  <!-- File Upload Section -->
  <div class="form-group mt-3 px-3">
    <label
      for="imager"
      class="form-control text-center"
      style="background-color: rgba(192,192,192,0.8); padding: 30px; cursor: pointer;"
    >
      <small
        id="file-label"
        style="font-size: 14px; padding: 1px; background-color: rgba(0,0,0,0.6); color: white;"
      >
        Upload image (Max 4MB)
      </small>
      <br>
      <span id="fileName" style="display: block; margin-top: 5px;"></span>
      <input
        type="file"
        id="imager"
        name="imager"
        class="form-control"
        accept="image/*"
        style="display: none;"
        onchange="updateFileName(this)"
        required
      >
    </label>
  </div>

  <div class="container text-center">
    <?php 
    $getverification = mysqli_query($conn,"select * from verify_seller where sid ='".htmlspecialchars($_SESSION['business_id'])."' and verified = 1 ");
    if ($getverification->num_rows === 0) {?> 
      <a type="submit" name="verify_id" onclick="verify_id()" class="btn btn-success"> Verify ID </a>
    <?php } else { ?>
      <input type="submit" name="submit" value="Submit" class="btn btn-success">
    <?php } ?>
    <img id="loader" class="loader" height="50" width="80" src="loading-image.GIF">
  </div>

  <!-- Hidden Fields -->
  <input type="hidden" name="user_id" value="<?= htmlspecialchars($_SESSION['business_id'])?>">
  <input type="hidden" name="sold" value="0">
  <input type="hidden" name="gift_picks" value="0">
  <input type="hidden" name="deals" value="0">
  <input type="hidden" name="views" value="0">
  <input type="hidden" name="likes" value="0">
  <input type="hidden" name="featured" value="0">
</form>


</div>

</div>



</div>
<br>
</div>


<?php $txn_ref = time(); $fee ="1000"; ?>
<script src="https://js.paystack.co/v2/inline.js"></script>

<script>

function paywithPaystack() {
   var id = <?= json_encode($_SESSION['business_id']) ?>;
   const paystack = new PaystackPop();
   // Paystack options
   var options = { 
       key:<?= json_encode($_ENV['paystack_key']) ?>, // Replace with your Paystack public key
       email: <?= json_encode($_SESSION['business_email']) ?>,
       amount: <?= json_encode($fee) ?> * 100 , // Amount in kobo (multiply by 100 to convert to kobo)
       currency: "NGN",
       ref: <?= json_encode($txn_ref) ?>, // Unique reference generated on the server side
       metadata: {
           custom_fields: [
               {
                   display_name: "Mobile Number",
                   variable_name: "mobile_number",
                   value: document.getElementById('phone_number').value // Assuming 'phone_number' is the ID of your input field
               }
           ]
       },
       onSuccess: function(response) {
           // Handle success response
           if (response.status === "success") {
               var ref = response.reference; // Retrieve the payment reference
               window.location.href = "verify-pay.php?status=success&id="+ id+"&reference=" + ref; // Redirect to success page
           } else {
               console.log("Payment not successful");
           }
       },
       onCancel: function() {
           // Handle cancellation
           console.log("Payment canceled");
       }
   };
   
   // Initialize Paystack payment with the provided options
   paystack.newTransaction(options);
}

$('#subcategory').html("<select style='font-size:14px;' name='subcategory' id='subcategory' class='subcategory form-control'><option>Choose subcategory</option></select>");
$('.category').on('change',function() {
const category = $(this).val();

     $.ajax({
           type:"POST",
           url:"engine/get-subcategory.php",
           data:{'category':category || ''},
           success:function(data) {
             $('#subcategory').html(data);             
           }
    });
});


$('#formPopup').on('submit',function(e){

e.preventDefault();

$("#loading-image").show();

var formdata = new FormData();

$.ajax({

    type: "POST",

    url: "seller-verify.php",

    data:new FormData(this),

    cache:false,

    processData:false,

    contentType:false,

     success: function(data) {

     $("#loading-image").hide();

    

if (data==1) {

  
      swal({
               text:"Image upload successful. We will revert back shortly",
              icon:"success",

      });
        
       $('#bom').load(location.href + " #cy");
       $("#formPopup")[0].reset();
       $("#formPopup").removeClass("active");
} 

else{
  swal({

    icon:"error",
    text:data}); 
}

    },

    error: function(jqXHR, textStatus, errorThrown) {

        console.log(errorThrown);

    }

})

});


$('#form-product').on('submit',function(e){

e.preventDefault();

$(".loader").show();

var formdata = new FormData();


$.ajax({

    type: "POST",

    url: "postads-process.php",

    data:new FormData(this),

    cache:false,

    processData:false,

    contentType:false,

     success: function(response) {

     $(".loader").hide();

if (response==1) {
        swal({
               text:"Item(s) uploaded successfully",
              icon:"success",

      });
        
       $('#bom').load(location.href + " #cy");
       $("#form-product")[0].reset();
       setTimeout(function() {
        window.location.href='mylistings.php'
        }, 500); 
       
      } 

else{
  swal({icon:"error",
        text:response

}); 
}

    },

    error: function(jqXHR, textStatus, errorThrown) {

        console.log(errorThrown);

    }

})

});

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

</body>
</html>