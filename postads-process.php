<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
session_start();

require 'engine/configure.php';
// var_dump($_ENV['CLOUDINARY_CLOUD_NAME'], $_ENV['CLOUDINARY_API_KEY'], $_ENV['CLOUDINARY_API_SECRET']);

require_once 'vendor/autoload.php';

use Cloudinary\Configuration\Configuration;
use Cloudinary\Cloudinary;

try {
    // Method 1: Direct configuration array (Recommended)
    $cloudinary = new Cloudinary([
        'cloud_name' => 'dhgqikloc',
        'api_key' => '379753199352113',
        'api_secret' => 'y1R8_WejnLXnAdb2PvCDXPE1CGEw',
        'secure' => true
    ]);
    
    echo "Cloudinary configured successfully!<br>";
    
    // Your existing code continues here...
    
} catch (Exception $e) {
    echo "Cloudinary Error: " . $e->getMessage();
    die();
}

// Get and validate POST fields
$product_name       = trim($_POST['product_name'] ?? '');
$product_category   = trim($_POST['product_category'] ?? '');
$product_condition  = trim($_POST['product_condition'] ?? '');
$product_color      = trim($_POST['product_color'] ?? '');
$product_location   = trim($_POST['product_location'] ?? '');
$product_address    = trim($_POST['product_address'] ?? '');
$product_price      = isset($_POST['product_price']) ? (float) $_POST['product_price'] : 0;
$phone_number       = preg_replace('/\D/', '', $_POST['phone_number'] ?? '');
$product_details    = trim($_POST['product_details'] ?? '');
$quantity           = isset($_POST['quantity']) ? (int) $_POST['quantity'] : 1;
$discount           = isset($_POST['discount']) ? (int) $_POST['discount'] : 0;

$sold               = 0;
$quantity_sold      = 0;
$likes              = 0;
$views              = 0;
$featured           = 0;
$user_id            = $_SESSION['business_id'] ?? null;
$date               = date("D, F d, Y g:iA");

if (!$user_id || !$product_name || !$product_category || !$product_price || !$phone_number) {
    exit("Required fields are missing.");
}

// Validate file upload
$allowed_extensions = ['jpg', 'jpeg', 'png'];
$maxsize = 5 * 1024 * 1024;

if (!isset($_FILES['imager']) || $_FILES['imager']['error'] !== 0) {
    exit("Image upload failed.");
}

$image_temp = $_FILES['imager']['tmp_name'];
$image_ext  = strtolower(pathinfo($_FILES['imager']['name'], PATHINFO_EXTENSION));

if (!in_array($image_ext, $allowed_extensions)) {
    exit("Only JPG, JPEG, PNG files are allowed.");
}

if ($_FILES['imager']['size'] > $maxsize) {
    exit("Image must not exceed 5MB.");
}

// Upload to Cloudinary
try {
    $result = $cloudinary->uploadApi()->upload($image_temp, [
        'folder' => 'uploads/'
    ]);
    $imageUrl = $result['secure_url'] ?? null;

    if (!$imageUrl) {
        exit("Cloudinary upload failed.");
    }
} catch (Exception $e) {
    exit("Cloudinary error: " . $e->getMessage());
}

// Check for duplicate entry
$stmtCheck = $conn->prepare("SELECT id FROM item_detail WHERE product_name = ? AND product_details = ? AND user_id = ?");
$stmtCheck->bind_param("ssi", $product_name, $product_details, $user_id);
$stmtCheck->execute();
$stmtCheck->store_result();

if ($stmtCheck->num_rows > 0) {
    $stmtCheck->close();
    exit("You cannot post the same product twice.");
}
$stmtCheck->close();

// Insert new product
$stmt = $conn->prepare("
    INSERT INTO item_detail (
        user_id, product_name, product_category, product_condition, product_color,
        product_location, product_address, product_price, product_image,
        phone_number, product_details, quantity, discount, sold,
        quantity_sold, likes, views, featured, date
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
");

$stmt->bind_param(
    "isssssssdsisiiiiiis",
    $user_id,
    $product_name,
    $product_category,
    $product_condition,
    $product_color,
    $product_location,
    $product_address,
    $product_price,
    $imageUrl,
    $phone_number,
    $product_details,
    $quantity,
    $discount,
    $sold,
    $quantity_sold,
    $likes,
    $views,
    $featured,
    $date
);

if ($stmt->execute()) {
    echo "1";
} else {
    echo "Error saving product: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
