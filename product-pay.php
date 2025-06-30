<?php session_start();

if (isset($_SESSION['business_id'])) {
$user_id=$_SESSION['business_id'];
}

if (isset($_SESSION['sp_id'])) {
$user_id=$_SESSION['sp_id'];
}

if (isset($_SESSION['id'])) {
$user_id=$_SESSION['id'];
}
require 'engine/configure.php';    
if (isset($_POST['id'])) {
$id = mysqli_escape_string($conn,$_POST['id']);
$sql = "SELECT * FROM item_detail where id ='$id'";
$query = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_array($query)) {
$_SESSION['product'] = $row['id']; 
$product_id =$_SESSION['product'];
echo "1";
	


}
}


  
 ?>