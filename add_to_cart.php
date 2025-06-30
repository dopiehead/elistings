<?php 
require 'engine/configure.php';
$buyer = mysqli_escape_string($conn,$_POST['buyer']);
$itemId = mysqli_escape_string($conn,$_POST['itemId']);
$add_to_cart = mysqli_query($conn,"UPDATE cart SET itemId = +1 WHERE itemId ='".htmlspecialchars($itemId)."' AND buyer = '".htmlspecialchars($buyer)."'");
if ($add_to_cart) {
session_start();
$get_cart = mysqli_query($conn,"select buyer,itemId from WHERE itemId ='$itemId' AND buyer = '$buyer'");
while ($row = mysql_fetch_array($get_cart)) {
$_SESSION['itemId'] = $row['itemId'];
}
}
?>