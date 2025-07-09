<?php 

session_start();
require 'engine/configure.php';
$user_id = null;
$useremail = null;
$username = null;
if(!isset($_SESSION['product'])){
    header("Location:mylistings.php");
}
$user_id = $_SESSION['business_id'] ?? $_SESSION['id'] ?? null;
$useremail=$_SESSION['business_email'] ?? $_SESSION['email'] ?? null;
$username=$_SESSION['business_name'] ?? $_SESSION['name'] ?? null;

$product_id = $_SESSION['product'];
$txn_ref = time();

if (!isset($_SESSION["id"]) && !isset($_SESSION["business_id"]) && !isset($_SESSION["sp_id"] )) { 
echo"<script>location.href='login.php'</script>";
exit();
}
$mypay = $conn->prepare("select * from item_detail where id=? and user_id =?");
$mypay->bind_param("ii",$product_id,$user_id);
if($mypay->execute()){
  $payment = $mypay->get_result();
while($pay = $payment->fetch_assoc()) {  
$phone_number = $pay['phone_number'];
$package = $pay['product_price']* 0.10;
$_SESSION['package'] = $package;
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Elisting | Payment</title>
<?php include("components/links.php") ?>
<link rel="stylesheet" href="assets/css/btn_scroll.css">
<link rel="stylesheet" href="assets/css/payment.css">
<script src="assets/js/sweetalert.min.js"></script> 
<script src="assets/js/jquery-1.11.3.min.js"></script>
<script src="assets/js/flickity.pkgd.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<?php include("components/header.php") ?>


<div class="payment-container">
    <div class="payment-card">
        <div class="card-header">
            <h2>Featured Products</h2>
            <div class="subtitle">Promote your listing to reach more customers</div>
        </div>
        
        <div class="card-body">
            <div class="payment-icons">
                <div class="payment-icon">
                    <i class="fa fa-credit-card"></i>
                </div>
                <div class="payment-icon">
                    <i class="fab fa-cc-mastercard"></i>
                </div>
                <div class="payment-icon">
                    <i class="fab fa-paypal"></i>
                </div>
            </div>
            
            <div class="info-section">
                <p>Each ad can only be promoted once. Package is <span class="highlight">10% of the item being uploaded</span>. If you still wish to make payment, please continue to the proceed button below.</p>
                
                <ul class="feature-list">
                    <li>Top placement on every page</li>
                    <li>Featured on <span class="social-highlight">Facebook, Twitter & Instagram</span></li>
                    <li>Priority in search results</li>
                    <li>Enhanced visibility for <span class="duration-highlight">4 weeks</span></li>
                </ul>
            </div>
            
            <div class="pricing-section">
                <div class="price-display">₦<?= number_format($package, 2) ?></div>
                <div class="duration-display">Duration: 4 weeks</div>
            </div>
            
            <form method="POST" action="initialize.php" id="paymentForm">
                <input type="hidden" name="redirect_url" value="response.php">
                <input type="hidden" name="amount" value="<?= htmlspecialchars($package) ?>">
                <input type="hidden" name="currency" value="NGN">
                <input type="hidden" name="product_id" value="<?= htmlspecialchars($_SESSION['product']) ?>">
                <input type="hidden" name="name" value="<?= htmlspecialchars($username) ?>">
                <input type="hidden" name="email" value="<?= htmlspecialchars($useremail) ?>">
                <input type="hidden" name="phone_number" value="<?= htmlspecialchars($phone_number) ?>">
                <input type="hidden" name="reference" value="<?= htmlspecialchars($txn_ref) ?>">  
                <button type="submit" name="submit" class="proceed-button" id="proceedBtn">
                    <i class="fas fa-lock" style="margin-right: 10px;"></i>
                    Proceed to Payment
                </button>
            </form>
        </div>
    </div>
</div>

<div class="loading-overlay" id="loadingOverlay">
    <div class="loading-spinner"></div>
</div>

<!------------------------------------------btn-scroll--------------------------------------------------->
<a class="btn-down" onclick="topFunction()">&#8593;</a>

<script src="assets/js/scroll.js"></script>
<script src="assets/js/overlay.js"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script src="assets/js/payment.js"></script>

</body>
</html>