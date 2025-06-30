<?php 
session_start();
error_reporting(E_ALL ^ E_NOTICE);
require 'configure.php'; // Ensure this file contains your database connection ($conn)

// Retrieve and sanitize form data
$full_name = mysqli_real_escape_string($conn, $_POST['fullname']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$shipping_address = mysqli_real_escape_string($conn, $_POST['shipping_address']);
$phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
$pin_code = mysqli_real_escape_string($conn, $_POST['pin_code']);
$lga = mysqli_real_escape_string($conn, $_POST['city']);
$state = mysqli_real_escape_string($conn, $_POST['state']);
$country = mysqli_real_escape_string($conn, $_POST['country']);
$billing_address = mysqli_real_escape_string($conn, $_POST['billing_address']);
$term_agree = mysqli_real_escape_string($conn, $_POST['term_agree']);
$tracking_no = mysqli_real_escape_string($conn, $_POST['tracking_no']);
$notes = mysqli_real_escape_string($conn, $_POST['notes']);
$date = date("D, F d, Y g:iA");

// Prepare the SQL statement
$sql = "INSERT INTO checkout 
        (tracking_no, item_id, product_price, noofItem, buyer, userid, full_name, address, phone_number, shipping_address, lga, state, pin_code, country, billing_address, term_agree, notes, date) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

// Bind parameters
$stmt->bind_param(
    "siddssssssssssssss", 
    $tracking_no, 
    $itemId, 
    $_SESSION['product_price'], 
    $_SESSION['noofItem'], 
    $_SESSION['buyer'], 
    $_SESSION['userid'], 
    $full_name, 
    $address, 
    $phone_number, 
    $shipping_address, 
    $lga, 
    $state, 
    $pin_code, 
    $country, 
    $billing_address, 
    $term_agree, 
    $notes, 
    $date
);

// Execute the query
if ($stmt->execute()) {
    // Set session variables or any other success actions
    $_SESSION['product_name'] = $product_name;
    $_SESSION['product_price'] = $product_price;
    $_SESSION['user_id'] = $user_id;
    $_SESSION['phone_number'] = $phone_number;
    $_SESSION['location'] = $billing_address;
    $_SESSION['date'] = $date;
    $_SESSION['country'] = $country;

    echo "1";
} else {
    echo "Error: " . $stmt->error; // Display SQL error for debugging
}

// Close statement and connection
$stmt->close();
$conn->close();
?>