<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);

require 'vendor/autoload.php';

use Yabacon\Paystack;

$paystack = new Paystack('sk_test_5625633149fa467dad07b80c7b4dae6be1ddddf7');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $amount = $_POST['amount'] * 100; // Convert to kobo

    try {
        $response = $paystack->transaction->initialize([
            'email' => $email,
            'amount' => $amount,
            'callback_url' => 'https://localhost/elisting/response.php' // <-- FIXED
        ]);

        session_start();
        $_SESSION['reference'] = $response->data->reference;

        if (isset($response->data->authorization_url)) {
            header("Location: " . $response->data->authorization_url);
            exit;
        } else {
            echo "Failed to get authorization URL. Full response: ";
            var_dump($response);
        }

    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
} else {
    die('Invalid request method');
}
?>
