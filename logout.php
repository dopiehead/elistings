<?php session_start();
require 'engine/configure.php';
if(isset($_SESSION['id'])){$userId=$_SESSION['id'];}
if(isset($_SESSION['business_id'])){$userId=$_SESSION['business_id'];}
if(isset($_SESSION['sp_id'])){$userId=$_SESSION['sp_id'];}
$delete = mysqli_query($conn,"delete from cart where userid ='$userId'");
session_destroy();
header("location:login.php");
exit();
?>