<?php 

require 'configure.php';    
if (isset($_POST['id'])) {
$id=mysqli_real_escape_string($conn,$_POST['id']);
$sql = "UPDATE item_detail SET sold = 1 where id ='".htmlspecialchars($id)."'";
$query=mysqli_query($conn,$sql);
if ($query) {
echo "1";	
}
else{
echo mysqli_error($query);
} 
} ?>