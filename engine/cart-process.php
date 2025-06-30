<?php 
session_start();
include 'configure.php';

$itemId = mysqli_real_escape_string($conn, $_POST['itemId']);
$userid = mysqli_real_escape_string($conn, $_POST['userid']);
$noofItem = mysqli_real_escape_string($conn, $_POST['noofItem']);
$location = mysqli_real_escape_string($conn, $_POST['location']);
$buyer = mysqli_real_escape_string($conn, $_POST['buyer']);
$lga = mysqli_real_escape_string($conn, $_POST['lga']);
$items_per_id = mysqli_real_escape_string($conn, $_POST['items_per_id'] ?? 0);

// Check required fields
if (!empty($itemId) && !empty($userid) && !empty($noofItem) && !empty($location) && !empty($lga)) {

    // Use prepared statement for security
    $stmt = $conn->prepare("INSERT INTO cart (itemId, userid, noofItem, items_per_id, location, buyer, lga) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iiissss", $itemId, $userid, $noofItem, $items_per_id, $location, $buyer, $lga);
    
    if ($stmt->execute()) {
        $_SESSION['itemId'][] = $itemId;
        $_SESSION['userid'] = $userid;
        $_SESSION['noofItem'] = $noofItem;
        $_SESSION['location'] = $location;
        $_SESSION['buyer'] = $buyer;
        $_SESSION['lga'] = $lga;        
        $_SESSION['items_per_id'] = $items_per_id;
        echo "1";
        
    } else {
        error_log("Error adding item to cart: " . $stmt->error); // Log the error
        echo "Failed to add item(s) to the cart";
    }

    $stmt->close();
} else {
    echo "All fields are required";
}
?>
