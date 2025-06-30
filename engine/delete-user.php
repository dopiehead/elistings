<?php
require 'configure.php';
if (isset($_GET['id']) && isset($_GET['user_type'])) {
$id = mysqli_escape_string($conn,$_GET['id']);
$user_type = mysqli_escape_string($conn,$_GET['user_type']);
if ($user_type=='buyer') {
$delete_user = mysqli_query($conn,"delete from user_profile where id = '".htmlspecialchars($id)."'");
if($delete_user){
 header('location:../admin.php');
    
}

}


if ($user_type=='vendor') {
$delete_user = mysqli_query($conn,"delete from vendor_profile where id = '".htmlspecialchars($id)."'");
$delete_item = mysqli_query($conn,"delete from item_detail where sid = '".htmlspecialchars($id)."'");
if($delete_user){
header('location:../admin.php');
    
}

}


if ($user_type=='service_provider') {
$delete_user = mysqli_query($conn,"delete from service_providers where sp_id = '".htmlspecialchars($id)."'");
if($delete_user){
header('location:../admin.php');
    
}

}

} ?>

