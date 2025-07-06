<?php
session_start();
require 'engine/configure.php';
require_once 'vendor/autoload.php';

use Cloudinary\Cloudinary;

// Validate session and determine user type
$userType = null;
$userId = null;
$imageColumn = null;
$table = null;

if (!empty($_SESSION['id'])) {
    $userType = 'buyer';
    $userId = $_SESSION['id'];
    $table = 'user_profile';
    $imageColumn = 'user_image';
    $folder = 'uploads/buyers/';
} elseif (!empty($_SESSION['business_id'])) {
    $userType = 'vendor';
    $userId = $_SESSION['business_id'];
    $table = 'vendor_profile';
    $imageColumn = 'business_image';
    $folder = 'uploads/vendors/';
} else {
    exit('User not authenticated.');
}

// Cloudinary configuration
try {
    $cloudinary = new Cloudinary([
        'cloud_name' => $_ENV['CLOUDINARY_CLOUD_NAME'],
        'api_key'    => $_ENV['CLOUDINARY_API_KEY'],
        'api_secret' => $_ENV['CLOUDINARY_API_SECRET'],
        'secure'     => true
    ]);
} catch (Exception $e) {
    exit("Cloudinary configuration failed: " . $e->getMessage());
}

// Validate uploaded file
if (!isset($_FILES['fileupload']) || $_FILES['fileupload']['error'] !== UPLOAD_ERR_OK) {
    exit("No file uploaded or upload error.");
}

$file = $_FILES['fileupload'];
$basename = basename($file['name']);
$extension = strtolower(pathinfo($basename, PATHINFO_EXTENSION));
$allowed = ['jpg', 'jpeg', 'png'];
$maxSize = 4 * 1024 * 1024;

if (!in_array($extension, $allowed)) {
    exit("Please upload a valid image (JPG, JPEG, PNG).");
}

if ($file['size'] > $maxSize) {
    exit("Image file size exceeds the 4MB limit.");
}

// Upload to Cloudinary
try {
    $upload = $cloudinary->uploadApi()->upload($file['tmp_name'], [
        'folder' => $folder,
        'public_id' => 'profile_' . uniqid(),
        'overwrite' => true,
        'resource_type' => 'image'
    ]);
    $imageUrl = $upload['secure_url'] ?? null;
    if (!$imageUrl) {
        exit("Upload failed. No URL returned.");
    }
} catch (Exception $e) {
    exit("Cloudinary upload error: " . $e->getMessage());
}

// Update user record
$id = mysqli_real_escape_string($conn, $_POST['id']);
$imageUrlSafe = mysqli_real_escape_string($conn, $imageUrl);
$sql = "UPDATE $table SET $imageColumn = '$imageUrlSafe' WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

if ($result) {
    if ($userType === 'buyer') {
        $_SESSION['image'] = $imageUrl;
    } else {
        $_SESSION['business_image'] = $imageUrl;
    }
    echo "1";
} else {
    echo "Error updating profile image.";
}
?>
