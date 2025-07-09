<?php session_start();
require 'engine/configure.php';
require 'engine/get-dollar.php';
 $txn_ref=time();
 if (!isset($_SESSION["business_id"])) { 
  echo"<script>location.href='dashboard.php'</script>";
  exit();
}

date_default_timezone_set('Africa/Lagos');
date_default_timezone_get();

if (!empty($_SESSION["id"])) {
$date = $_SESSION['date'];
$userId = $_SESSION['id'];
$username = $_SESSION['name'];
$useremail = $_SESSION['email'];
}

if (!empty($_SESSION["business_id"])) {
$business_date = $_SESSION['business_date'];
$userId = $_SESSION['business_id'];
$username = $_SESSION['business_name'];
$useremail = $_SESSION['business_email'];
}

if (!empty($_SESSION["sp_id"])) {
$sp_date = $_SESSION['sp_date'];
$userId = $_SESSION['sp_id'];
$username = $_SESSION['sp_name'];
$useremail = $_SESSION['sp_email'];
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>E-stores | My listings </title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/flickity.min.css">
               <link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="stylesheet" href="assets/css/flickity.min.css">
  <link rel="stylesheet" href="assets/css/mylistings.css">
  <link rel="stylesheet" href="assets/css/navigator.css">
  <link rel="stylesheet" href="assets/css/profile-section.css">
      <link rel="stylesheet" href="mobile-view.css">
      <script src="assets/js/jquery-1.11.3.min.js"></script>
  <script src="assets/js/sweetalert.min.js"></script> 
  <script src="assets/js/mylistings.js"></script> 
<script src="assets/js/flickity.pkgd.min.js"></script>

</head>
<body>
<a id="openbar" onclick="openbar()"><i class="fa fa-bars"></i></a>

<div class="edit-page"></div>
<!------------------------------------------overlay content--------------------------------------------------->

<div id="wrap">
<div style="" class="  row">
<div id="overlay" class="col-md-3">
<?php include ("components/navigator.php"); ?>
</div>
<div class="col-md-9">
<div class="container row"> 
  <div class="col-md-6">
   <br>
    <h6>My listings</h6>
  </div>

     <div class="col-md-6">
     <?php
        $vendor = mysqli_query($conn,"SELECT * FROM vendor_profile WHERE id = '$userId'");
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
                  $getnotification = mysqli_query($conn,"SELECT * FROM vendor_notifications WHERE pending = 0 AND recipient_id ='".htmlspecialchars($userId)."'");
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

<div id="label">
       <div class="row">
         <div class="col-md-6">
    <input style="font-size: 13px;" type="search" class="form-control q" name="q" id="q"  placeholder="Search by title">

    </div>
    <div class="col-md-6">
    <select style="font-size:14px;" name="category" id="category" class="category form-control">
    <option value="">Select by category</option>
    
<?php
require 'engine/configure.php';
$query_category = mysqli_query($conn,"SELECT product_category, COUNT(*) AS count FROM item_detail GROUP BY product_category");
while ($row = mysqli_fetch_array($query_category)) {?>
<option value="<?php echo$row['product_category']?>"><?php echo$row['product_category']?></option>
<?php }?>
</select>
</div></div>


<div class="row">
  <div class="col-md-6">
    <select style="font-size:14px" id="price"  class="price form-control">
  <option selected="selected" value="">Price</option>
  <?php
    $exchangeRate = 1500; // Naira to USD rate
    $priceOptions = [1000, 5000, 20000, 50000, 100000, 500000, 1000000, 10000000, 50000000, 100000000];

    foreach ($priceOptions as $price) {
        $usd = round($price / $exchangeRate, 2);
        echo "<option value='{$price}'> Under &#8358;" . number_format($price) . "</option>";
    }
  ?>
</select>
</div>

<div class="col-md-6">
    <select  style="font-size:14px" name="sold" id="sold" class="sold form-control"><option value="">Status</option>
        <option value="available">Available</option>
        <option value="sold">Sold</option></select>
      </div></div>
<div>


</div><br>

<div classs="text-center" style="display: none;" id="loading-image"><img id="loader" height="50" width="80" src="loading-image.GIF"></div>
<div class="myitems"></div>
</div>






</div></div>




</div></div>





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



<script src="https://js.paystack.co/v2/inline.js"></script>
   
<script>
$(document).ready(function() {

    // Function to handle Paystack payment
  $(document).on("click",".paywithPaystack",function(){
        // Initialize PaystackPop object
        const paystack = new PaystackPop();

        // Retrieve the value of 'id' from the input field
     var id = $('#id').val();
     var subscription = $('#subscription').val();
        
        // Alert to verify the value of 'id' (you can remove this alert in production)

        // Paystack options
        var options = { 
            key: "pk_test_7580449c6abedcd79dae9c1c08ff9058c6618351", // Replace with your Paystack public key
            email: "<?php echo $useremail ?>",
            amount: subscription * 100, // Amount in kobo
            currency: "NGN",
            ref: "<?php echo $txn_ref ?>", // Unique reference generated on the server side
            metadata: {
                custom_fields: [
                    {
                        display_name: "Mobile Number",
                        variable_name: "mobile_number",
                        value: $("#phone_number").val() // Assuming 'phone_number' is the ID of your input field
                    }
                ]
            },
            onSuccess: function(response) {
                // Handle success response
                if (response.status === "success") {
                    var ref = response.reference; // Retrieve the payment reference
                    // Redirect to success page with parameters
                    window.location.href = "pay.php?status=success&id=" + id + "&reference=" + ref;
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
  });

    // Call the paywithPaystack function when #payButton is clicked
    $('#payButton').on('click', function(e) {
        e.preventDefault(); // Prevent default link behavior
        
        // Call the Paystack payment function
        paywithPaystack();
    });

});


</script>
<script>

$("#loading-image").hide();
$(".myitems").load('myitems.php?page=1'); 
$("#q").on('keyup',function() {
$("#loading-image").show();
var x = $('#q').val();
if (x=='') {$("#reset").hide();}
else{
$("#reset").show();
}
getData(x);
});

$('#category').on('change',function(e) {
$("#loading-image").show();
$(".myitems").hide();
var x = $('#q').val();
var category = $(this).val();
if (category !='all') {
getData(x,category);
}
});

$('.sold').on('change',function(e) {
$("#loading-image").show();
$(".myitems").hide();
var x = $('#q').val();
var sold = $('.sold').val();
var category = $('#category').val();
if (category !='all') {
getData(x,category,sold);
}
});

$('.price').on('change',function() {
$("#loading-image").show();
var sold = $('.sold').val()
var price = $(this).val();
var x = $('#q').val();
var category = $('#category').val();

getData(x,category,sold,price);

});

function getData(x,category,sold,price) {
$.ajax({
url:"myitems.php",
type:"POST",
data:{'q':x,'category':category,'sold':sold,'price':price},
success:function(data) {
$("#loading-image").hide();
$(".myitems").html(data).show();
}

});

};

</script>



<br><br>

</body>
</html>