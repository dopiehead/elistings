<?php
session_start();
require 'configure.php';
if (isset($_POST['id'])) {
$id = mysqli_escape_string($conn,$_POST['id']);
$deletelist = mysqli_query($conn,"delete from compare where buyer_id ='".htmlspecialchars($id)."'");
    if ($deletelist) {
    echo "1";
    }
  else{
  	echo"Error in deleting item";
  }
 }