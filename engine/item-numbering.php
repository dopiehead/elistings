<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
require 'configure.php';
if (isset($_SESSION['business_id'])) {
$buyer = $_SESSION['business_id'];	
}
elseif  (isset($_SESSION['sp_id'])) {
$buyer = $_SESSION['sp_id'];
}
elseif (isset($_SESSION['id'])) {
$buyer = $_SESSION['id'];
}
else{$buyer = substr(sha1(time()),0,12);}
if (isset($_SESSION) && !empty($_SESSION)) {
$cart_item = "SELECT cart.itemId,cart.userid,cart.noofitem,cart.location,cart.buyer,item_detail.id,item_detail.views,item_detail.discount,item_detail.user_id,item_detail.product_name,item_detail.product_image,item_detail.product_price,item_detail.product_category,item_detail.product_location FROM cart,item_detail WHERE cart.itemId=item_detail.id AND cart.buyer = '".htmlspecialchars($buyer)."'";
$cart = mysqli_query($conn,$cart_item);
$num_cart = $cart->num_rows;
if ($num_cart>0) {
echo "<span id='count'>".$num_cart."</span>";	
}

}


?>
