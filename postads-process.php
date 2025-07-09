<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
session_start();

require 'engine/configure.php';
require_once 'vendor/autoload.php';

use Cloudinary\Cloudinary;

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

// Validate image upload
$allowed_extensions = ['jpg', 'jpeg', 'png'];
$maxsize = 5 * 1024 * 1024;

if (!isset($_FILES['imager']) || !is_array($_FILES['imager']['tmp_name'])) {
    exit("No image files uploaded.");
}

$imageUrls = [];

foreach ($_FILES['imager']['tmp_name'] as $key => $tmpName) {
    if (!empty($tmpName) && $_FILES['imager']['error'][$key] === UPLOAD_ERR_OK) {
        $image_ext = strtolower(pathinfo($_FILES['imager']['name'][$key], PATHINFO_EXTENSION));
        if (!in_array($image_ext, $allowed_extensions)) {
            continue; // Skip invalid extensions
        }

        if ($_FILES['imager']['size'][$key] > $maxsize) {
            continue; // Skip large files
        }

        try {
            $uploadResult = $cloudinary->uploadApi()->upload($tmpName, [
                'folder' => 'uploads/products'
            ]);

            if (isset($uploadResult['secure_url'])) {
                $imageUrls[] = $uploadResult['secure_url'];
            }
        } catch (Exception $e) {
            echo "Image $key upload failed: " . $e->getMessage();
        }
    }
}

if (empty($imageUrls)) {
    exit("No valid image was uploaded.");
}

// Store all image URLs as comma-separated string
$imageUrlString = implode(',', $imageUrls);

// Check for duplicate entry
$stmtCheck = $conn->prepare("SELECT * FROM item_detail WHERE product_name = ? AND product_details = ? AND user_id = ?");
$stmtCheck->bind_param("ssi", $product_name, $product_details, $user_id);
$stmtCheck->execute();
$stmtCheck->store_result();

if ($stmtCheck->num_rows > 0) {
    $stmtCheck->close();
    exit("You cannot post the same product twice.");
}
$stmtCheck->close();


$stmtPosts = $conn->prepare("SELECT * FROM item_detail WHERE product_name = ? AND product_category = ? AND user_id = ?");
$stmtPosts->bind_param("ssi", $product_name, $product_category, $user_id);
$stmtPosts->execute();
$stmtPosts->store_result();
if($stmtPosts->num_rows > 4){
    $stmtPosts->close();
    exit("You have exceeded the Free Posting limit. <a href='user-subscription.php'>Kindly Proceed to the Subscription packages.</a>");

}
$stmtPosts->close();
// Insert into DB
$stmt = $conn->prepare("
    INSERT INTO item_detail (
        user_id, product_name, product_category, product_condition, product_color,
        product_location, product_address, product_price, product_image,
        phone_number, product_details, quantity, discount, sold,
        quantity_sold, likes, views, featured, date
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
");

$stmt->bind_param(
    "isssssssssisiiiiiis",
    $user_id,
    $product_name,
    $product_category,
    $product_condition,
    $product_color,
    $product_location,
    $product_address,
    $product_price,
    $imageUrlString,
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
    error_log("Database error: " . $stmt->error);
}

$stmt->close();
$conn->close();
?>
