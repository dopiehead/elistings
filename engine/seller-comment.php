<?php

require 'configure.php';
$product_ID = mysqli_real_escape_string($conn,$_POST['product_ID']);
$sender_email = mysqli_real_escape_string($conn,$_POST['sender_email']);
$sender_name = mysqli_real_escape_string($conn,$_POST['sender_name']);
$comment = mysqli_real_escape_string($conn,$_POST['comment']);
$date=date("D, F d, Y g:iA", strtotime('+1 hours'));
if (empty($comment.$sender_name.$sender_email)) {
echo "All fields are required";
}
elseif (empty($comment)) {
echo "Comment field is required";
}
elseif (empty($sender_name)) {
echo "Name field is required";
}
elseif (empty($sender_email)) {
echo "Email field is required";
}
else{
require 'configure.php';
$check = mysqli_query($conn,"select * from seller_comment where sender_email='".htmlspecialchars($sender_email)."' AND sender_name='".htmlspecialchars($sender_name)."' AND product_name='".htmlspecialchars($product_ID)."' AND comment='".htmlspecialchars($comment)."'");
   if($check->num_rows>=1){
echo 'SPAM';

}
else{
$query= mysqli_query($conn,"insert into seller_comment value('','".htmlspecialchars($sender_email)."','".htmlspecialchars($sender_name)."','".htmlspecialchars($comment)."','".htmlspecialchars($product_ID)."','".htmlspecialchars($date)."')");
if ($query) {
echo "1";
	}
else{
echo "Error in adding comment";
	} }
}

?>