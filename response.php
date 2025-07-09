<?php session_start(); 
if(!isset($_SESSION['id']) && !isset($_SESSION['sp_id']) && !isset($_SESSION['business_id'])){echo"<script>window.location.href='login.php';</script>";}
$useremail=$_SESSION['business_email'] ?? $_SESSION['email'] ?? null;
$username=$_SESSION['business_name'] ?? $_SESSION['name'] ?? null;
?>

<!DOCTYPE html>
<html>
<head>
	<title>E-stores | Service provider details </title>
	<?php include("components/links.php"); ?>
    <link rel="stylesheet" href="assets/css/response.css">
</head>
<body>

<!------------------------------------------Header--------------------------------------------------->

<?php include("components/header.php");
$product_id = $_SESSION['product'];
if(isset($_GET['reference'])){
require 'engine/configure.php';
$mypay = mysqli_query($conn,"UPDATE item_detail SET featured = 1 where id ='$product_id'");
if($mypay){
 $success = "payment was successful";
// unset($_SESSION['product']);
}
else{    
  $error = "Payment was unsuccessful";  
   
}

}

?>

<div class='payment-container'>

    <div class="payment-card">

        <div class="success-icon"></div>
        
        <div class="payment-title">Payment Success!</div>
        
        <div class="payment-amount"><i class='fa fa-naira-sign'></i> <?=htmlspecialchars(number_format($_SESSION['package'],2)) ?></div>
        
        <div class="payment-details">
            <div class="detail-row">
                <span class="detail-label">Ref Number</span>
                <span class="detail-value"> <?=htmlspecialchars($_SESSION['reference']) ?></span>
            </div>
            
            <div class="detail-row">
                <span class="detail-label">Payment Time</span>
                <span class="detail-value">25-02-2023, 13:22:18</span>
            </div>
            
            <div class="detail-row">
                <span class="detail-label">Sender Name</span>
                <span class="detail-value"> <?=htmlspecialchars($username) ?></span>
            </div>
            
            <div class="detail-row">
                <span class="detail-label">Amount</span>
                <span class="detail-value"><i class='fa fa-naira-sign'></i>  <?=htmlspecialchars(number_format($_SESSION['package'],2)) ?></span>
            </div>

			<div class="detail-row">
                <span class="detail-label text-capitalize"><?= "<span class='text-success'>".$success."</span>" ?? "<span class='text-danger'>".$error."</span>" ?></span>

                <span class="detail-value"><a class='btn btn-danger text-white' href='mylistings.php'>Proceed to mylistings</a></span>
            </div>
            
        </div>
    </div>
</div>
<br><br>
<?php include 'footer.php'; ?>
</body>
</html>