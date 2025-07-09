<?php session_start(); 
if (!isset($_SESSION['id']) && !isset($_SESSION['sp_id']) && !isset($_SESSION['business_id'])) {
    echo "<script>window.location.href='login.php';</script>";
    exit();
}
$useremail  = $_SESSION['business_email'] ?? $_SESSION['email'] ?? null;
$username   = $_SESSION['business_name'] ?? $_SESSION['name'] ?? null;
$product_id = $_SESSION['product'] ?? null;
?>

<!DOCTYPE html>
<html>
<head>
    <title>E-stores | Service provider details</title>
    <?php include("components/links.php"); ?>
    <link rel="stylesheet" href="assets/css/response.css">
</head>
<body>

<?php include("components/header.php");
if (isset($_GET['reference']) && $product_id) {
    require 'engine/configure.php';
    $paymentDate = date("Y-m-d H:i:s");

    $updatePayment = $conn->prepare("UPDATE product_subscription SET payment_status = 'success', payment_date = ? WHERE item_id = ?");
    $updatePayment->bind_param("si", $paymentDate, $product_id);

    if ($updatePayment->execute()) {
        $mypay = $conn->prepare("UPDATE item_detail SET featured = 1 WHERE id = ?");
        $mypay->bind_param("i", $product_id);

        if ($mypay->execute()) {
            $success = "Payment was successful";
            unset($_SESSION['product']);
        } else {
            $error = "Failed to update item as featured.";
        }
    } else {
        $error = "Failed to update payment status.";
    }
}
?>

<div class='payment-container'>
<?php
require 'engine/configure.php';
$reference_no = $_SESSION['reference'] ?? null;
if ($product_id && $reference_no) {
    $paymentStatus = $conn->prepare("SELECT * FROM product_subscription WHERE item_id = ? AND reference_no = ?");
    $paymentStatus->bind_param("is", $product_id, $reference_no);

    if ($paymentStatus->execute()) {
        $resultPayment = $paymentStatus->get_result();
        while ($row = $resultPayment->fetch_assoc()) {
?>
    <div class="payment-card">
        <div class="success-icon"></div>
        <div class="payment-title">Payment <?= htmlspecialchars($row['payment_status']) ?>!</div>

        <div class="payment-amount">
            <i class='fa fa-naira-sign'></i> <?= htmlspecialchars(number_format($row['payment_price'], 2)) ?>
        </div>

        <div class="payment-details">
            <div class="detail-row">
                <span class="detail-label">Ref Number</span>
                <span class="detail-value"> <?= htmlspecialchars($row['reference_no']) ?></span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Payment Time</span>
                <span class="detail-value"><?= htmlspecialchars($row['payment_date']) ?></span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Sender Name</span>
                <span class="detail-value"> <?= htmlspecialchars($row['user_name']) ?></span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Amount</span>
                <span class="detail-value">
                    <i class='fa fa-naira-sign'></i> <?= htmlspecialchars(number_format($row['payment_price'], 2)) ?>
                </span>
            </div>

            <div class="detail-row">
                <span class="detail-label text-capitalize">
                    <?= $row['payment_status'] === 'success' 
                        ? "<span class='text-success'>Payment successful</span>"
                        : "<span class='text-danger'>Payment failed</span>" ?>
                </span>
                <span class="detail-value">
                    <a class='btn btn-danger text-white' href='mylistings.php'>Proceed to my listings</a>
                </span>
            </div>
        </div>
    </div>
<?php
        }
    }
}
?>
</div>
<br><br>
<?php include 'footer.php'; ?>
</body>
</html>
