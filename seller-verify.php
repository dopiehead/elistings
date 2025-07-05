<?php
session_start();
require 'engine/configure.php';
require 'vendor/autoload.php';

use Cloudinary\Cloudinary;
use Cloudinary\Configuration\Configuration;

// Cloudinary config
Configuration::instance([
    'cloud' => [
        'cloud_name' => $_ENV['CLOUDINARY_CLOUD_NAME'],
        'api_key'    => $_ENV['CLOUDINARY_API_KEY'],
        'api_secret' => $_ENV['CLOUDINARY_API_SECRET'],
    ],
    'url' => ['secure' => true]
]);

$cloudinary = new Cloudinary();

$sid = mysqli_real_escape_string($conn, $_POST['sid']);
$verified = mysqli_real_escape_string($conn, $_POST['verified']);
$date = date("D, F d, Y g:iA", strtotime('+1 hour'));

$maxsize = 5 * 1024 * 1024; // 5MB

$img = $_FILES["img"];
$valid_id = $_FILES["valid_id"];

$allowed_extensions = ['jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG'];

$img_ext = strtolower(pathinfo($img["name"], PATHINFO_EXTENSION));
$valid_id_ext = strtolower(pathinfo($valid_id["name"], PATHINFO_EXTENSION));

$img_temp = $img["tmp_name"];
$valid_id_temp = $valid_id["tmp_name"];

// Validate files
if (!file_exists($img_temp) || !file_exists($valid_id_temp)) {
    exit("Choose both images to upload.");
}
if (!in_array($img_ext, $allowed_extensions) || !in_array($valid_id_ext, $allowed_extensions)) {
    exit("Only JPG and PNG images are allowed.");
}
if ($img["size"] > $maxsize || $valid_id["size"] > $maxsize) {
    exit("Image size exceeds 5MB limit.");
}

// Upload to Cloudinary
$img_upload = $cloudinary->uploadApi()->upload($img_temp, [
    'folder' => 'seller-verification/'
]);
$valid_id_upload = $cloudinary->uploadApi()->upload($valid_id_temp, [
    'folder' => 'seller-verification/'
]);

$img_url = $img_upload['secure_url'] ?? null;
$valid_id_url = $valid_id_upload['secure_url'] ?? null;

if (!$img_url || !$valid_id_url) {
    exit("Cloudinary upload failed.");
}

// Check if already submitted
$check_stmt = $conn->prepare("SELECT id FROM verify_seller WHERE sid = ?");
$check_stmt->bind_param("s", $sid);
$check_stmt->execute();
$check_stmt->store_result();

if ($check_stmt->num_rows > 0) {
    echo "Verification is already in process.";
    exit();
}
$check_stmt->close();

// Insert into DB
$insert_stmt = $conn->prepare("INSERT INTO verify_seller (sid, img, valid_id, verified, date) VALUES (?, ?, ?, ?, ?)");
$insert_stmt->bind_param("sssis", $sid, $img_url, $valid_id_url, $verified, $date);
if ($insert_stmt->execute()) {
    echo "1"; // success
} else {
    echo "Images upload not successful.";
}
$insert_stmt->close();
?>
