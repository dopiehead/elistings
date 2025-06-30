<?php session_start();

if (!isset($_SESSION)) {
    header("location:login.php");
}



if (isset($_SESSION['business_id'])) {
$buyer = $_SESSION['business_id'];
}
if (isset($_SESSION['sp_id'])) {
$buyer = $_SESSION['sp_id'];
}
if(isset($_SESSION['id'])) {
$buyer = $_SESSION['id'];
} 


require 'engine/configure.php';

    if ($conn->connect_error) {

        die("Connection failed: " . $conn->connect_error);
    }

if (isset( $_POST['user_type']) && !empty($_POST['user_type']) && $_POST['user_type']=='product') {
    
$sql = "SELECT product_name, product_price,product_category,product_location,product_address FROM item_detail";

    $result = $conn->query($sql);
    $products = [];
   if ($result->num_rows > 0) {
   while ($row = mysqli_fetch_array($result)) {
   $products[] = [

                'name' => $row['product_name'],

                'price' => $row['product_price'],

                'location' => $row['product_location'],

                'address' => $row['product_address'],

            ];
        }
    } 

    else {

        echo "0 results";

       
    }

   if (!empty($products)) {

        $search = $_POST['search'];

        $senderID = $buyer;

        foreach ($products as $product) {

            $productName = $product['name'];

            $productPrice = $product['price'];

            $productLocation = $product['location'];

            $productAddress = $product['address'];

if (preg_match('/\b' . preg_quote($productName, '/') . '\b/', $search) && preg_match('/\b' . preg_quote($productPrice, '/') . '\b/', $search) && preg_match('/\b' . preg_quote($productLocation, '/') . '\b/', $search) && preg_match('/\b' . preg_quote($productAddress, '/') . '\b/', $search)) {

    $getproduct= mysqli_query($conn,"SELECT user_id FROM item_detail WHERE product_name LIKE '%$productName%' AND product_price <= '$productPrice'  AND product_location like '%$productLocation%' AND product_address like '%$productAddress%'  GROUP BY user_id");



                while ($data = mysqli_fetch_array($getproduct)) {

                    $message = "I want to buy " . htmlspecialchars($productName) . " for NGN" . htmlspecialchars($productPrice);

                    $date = date("D, F d, Y g:iA");

                    $recipientID = $data['user_id'];

                    $Insert = mysqli_query($conn,"INSERT INTO vendor_notifications VALUES ( '','$senderID', '$message', '$recipientID','0','$date')");

                    $senderID = $buyer;

                    if ($Insert) {

                        echo "<span class='alert-success'>Message sent successfully to the vendors at rate ".htmlspecialchars($productPrice).". We'll revert shortly</span><br> ";

                    } 

                    else {

                        echo "Error sending message";
                    }

                   
                }

              
            }

       else{

       

        echo"<div id='fadeOut'>No match found</div>";

       

       }
           break;
        }
    }

     else {

        echo "No keywords found to match.";
    }

}



if ((isset( $_POST['user_type']) && !empty($_POST['user_type']) && $_POST['user_type']=='service provider')) {
    

$sql = "SELECT sp_name, pricing,sp_category,sp_location FROM service_providers";
    $result = $conn->query($sql);
    $products = [];
   if ($result->num_rows > 0) {
   while ($row = mysqli_fetch_array($result)) {
   $products[] = [

                'name' => $row['sp_category'],

                'price' => $row['pricing'],

                'location' => $row['sp_location'],

            ];
        }
    } 

    else {

        echo "0 results";

       
    }

   if (!empty($products)) {

        $search = $_POST['search'];

        $senderID = $buyer;

        foreach ($products as $product) {

            $productName = $product['category'];

            $productPrice = $product['pricing'];

            $productLocation = $product['location'];

if (preg_match('/\b' . preg_quote($productName, '/') . '\b/', $search) && preg_match('/\b' . preg_quote($productPrice, '/') . '\b/', $search) && preg_match('/\b' . preg_quote($productLocation, '/') . '\b/', $search)) {

    $getproduct= mysqli_query($conn,"SELECT sp_id FROM service_providers WHERE sp_category LIKE '%$productName%' AND pricing <=  '$productPrice'   AND sp_location like  '%$productLocation%'   GROUP BY sp_id");



                while ($data = mysqli_fetch_array($getproduct)) {

                    $message = "I want a" . htmlspecialchars($productName) . " that can make a deal for NGN" . htmlspecialchars($productPrice);

                    $recipientID = $data['user_id'];

                    $date = date("D, F d, Y g:iA");

                    $Insert = mysqli_query($conn,"INSERT INTO vendor_notifications VALUES ( '','$senderID', '$message', '$recipientID','0','$date')");

                    $senderID = $buyer;

                    if ($Insert) {

                        echo "<span class='alert-success'>Message sent successfully to the Service providers at rate ".htmlspecialchars($productPrice)." . We'll revert shortly</span><br> ";

                    } 

                    else {

                        echo "Error sending message";
                    }

                   
                }

              
            }

       else{

       

        echo"<div id='fadeOut'>No match found</div>";

       

       }
           break;
        }
    }

     else {

        echo "No keywords found to match.";
    }




















}











?>
