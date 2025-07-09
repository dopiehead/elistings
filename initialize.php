<?php
// Uncomment for debugging (use only during development)
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);

session_start(); // Must come before accessing $_SESSION

require 'engine/configure.php';
require 'vendor/autoload.php';

use Yabacon\Paystack;

// ✅ Validate Paystack Secret Key
$paystack = new Paystack('sk_test_5625633149fa467dad07b80c7b4dae6be1ddddf7');

// ✅ Check if POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'] ?? null;
    $amount = isset($_POST['amount']) ? intval($_POST['amount']) * 100 : 0; // Convert to kobo
    $productId = $_SESSION['product'] ?? null;
    $username = $_SESSION['username'] ?? 'Guest'; // Optional: set fallback username

    // ✅ Basic validation
    if (!$email || !$amount || !$productId) {
        die('Missing required fields.');
    }

    try {
        // ✅ Initialize transaction
        $response = $paystack->transaction->initialize([
            'email' => $email,
            'amount' => $amount,
            'callback_url' => 'https://localhost/elisting/response.php' // ❗ Update in production
        ]);

        if (!isset($response->data->authorization_url)) {
            throw new Exception("No authorization URL returned.");
        }

        $reference = $response->data->reference;
        $_SESSION['reference'] = $reference;

        // ✅ Insert into database securely
        $stmt = $conn->prepare("INSERT INTO product_subscription 
            (email, user_name, item_id, payment_price, reference_no, payment_status, payment_date) 
            VALUES (?, ?, ?, ?, ?, ?, ?)"
        );

        $status = 'pending';
        $paymentDate = date("Y-m-d H:i:s");

        $stmt->bind_param("ssiisss", $email, $username, $productId, $amount, $reference, $status, $paymentDate);

        if ($stmt->execute()) {
            header("Location: " . $response->data->authorization_url);
            exit;
        } else {
            throw new Exception("Database error: " . $stmt->error);
        }

    } catch (Exception $e) {
        die('Paystack Error: ' . $e->getMessage());
    }

} else {
    die('Invalid request method');
}
