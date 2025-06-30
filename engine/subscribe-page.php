<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'configure.php'; // update the path if needed
$date = date("Y-m-d H:i:s");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    if(empty($email)){
        echo json_encode(['status' => 'error', 'message' => 'Empty input.']);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid email address.']);
        exit;
    }

    // Prevent duplicate entries
    $stmt = $conn->prepare("SELECT email FROM newsletter WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo json_encode(['status' => 'info', 'message' => 'This email is already subscribed.']);
        exit;
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO newsletter (email,date) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $date);
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Thank you for subscribing!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Something went wrong. Try again.']);
    }

    $stmt->close();
    $conn->close();
}
?>
