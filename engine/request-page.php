<?php
require 'configure.php'; // Assuming this file contains database connection details

// Escape and retrieve POST data
$senderID = mysqli_real_escape_string($conn, $_POST['userid']);
$item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
$more_details = mysqli_real_escape_string($conn, $_POST['more_details']);
$pcs = mysqli_real_escape_string($conn, $_POST['pcs']);
$proCat = mysqli_real_escape_string($conn, $_POST['proCat']);

// Check if required fields are empty
if (empty($item_name) || empty($more_details) || empty($pcs) || empty($proCat)) {
    echo "All fields are required";
} else {
    // Insert request into database
    $query = mysqli_query($conn, "INSERT INTO request_page 
                                  VALUES ('','".$senderID."','".$item_name."', '".$more_details."', '0', '".$pcs."', '".$proCat."')");
    
    if ($query) {
        // Fetch items from database to notify vendors
        $sql = "SELECT product_name, product_price, product_location, product_address FROM item_detail";
        $result = mysqli_query($conn,$sql);

        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $productName = $row['product_name'];
               
                $productCategory = $row['product_category'];
              

                // Query vendors based on certain criteria
                $getproduct = mysqli_query($conn, "SELECT user_id FROM item_detail WHERE product_name LIKE '%$item_name%' AND product_category LIKE '%$proCat%'  
                                                   GROUP BY user_id");
                                                   
               

                while ($data = mysqli_fetch_array($getproduct)) {
                    $recipientID = $data['user_id'];
                    $message = "I want to buy $productName";
                 
                    $date = date("D, F d, Y g:iA");

                    // Insert notification into vendor_notifications table
$insertNotification = mysqli_query($conn, "INSERT INTO vendor_notifications VALUES ('','$senderID', '$message', '$recipientID', '0', '$date')");

                                                                
                   

                    if ($insertNotification) {
                        echo "Notification sent successfully";
                    } else {
                        echo "Error sending notification";
                    }
                }
            }
        } else {
            echo "No products found";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>