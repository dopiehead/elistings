<?php
session_start();
require 'configure.php';
$sid = $_SESSION['business_id'];
if (isset($_POST['id'])) {
$id=$_POST['id'];
$thu="delete from item_detail where (id='$id')";
$src=mysqli_query($conn,$thu);
if ($src) {}   
else{echo mysqli_error($src);
}
}
  ?>


<?php
$sid = $_SESSION['busines_id'];
if (isset($_POST['id'])) {
$id=$_POST['id'];
$thu="delete from picx where (sid='$id')";
$src=mysqli_query($conn,$thu);
if ($src) {echo "1";}   
else{echo mysqli_error($src);
}
}
  ?>
