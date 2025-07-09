<?php session_start();
$user_id = $_SESSION['business_id'] ?? $_SESSION['id'] ?? null;
require 'engine/configure.php';    
if (isset($_POST['id'])) {
$id = mysqli_escape_string($conn,$_POST['id']);
$sql = "SELECT * FROM item_detail where id ='$id'";
$query = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_array($query)) {
$_SESSION['product'] = $row['id']; 
echo "1";
	


}
}


  
 ?>