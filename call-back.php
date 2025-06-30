<?php

session_start();

$product_id = $_SESSION['product'];

require 'vendor/autoload.php';

use Yabacon\Paystack;

$paystack = new Paystack('sk_test_5625633149fa467dad07b80c7b4dae6be1ddddf7');

// Retrieve the transaction reference from session (or database)
session_start();
$reference = $_SESSION['reference'];

if (!$reference) {
    die('Transaction reference not found');
}

try {
    $tranx = $paystack->transaction->verify(['reference' => $reference]);

    if ('success' === $tranx->data->status) {
    
    require 'engine/configure.php';
    
     $mypay = mysqli_query($conn,"UPDATE item_detail SET featured = 1 where id ='$product_id'");
    
    if($mypay){
        
        echo"Payment was successful";
        
        echo 'Payment successful. Transaction reference: ' . $tranx->data->reference;

        unset($_SESSION['product']);
     
       unset($_SESSION['package']);
 
   
    } else {
        // Transaction was unsuccessful
        echo 'Payment unsuccessful. Please try again.';
    }

} catch (\Yabacon\Paystack\Exception\ApiException $e) {
    print_r($e->getResponseObject());
    die($e->getMessage());
}
?>