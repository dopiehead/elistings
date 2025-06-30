

<?php

require 'configure.php';

$discount = mysqli_real_escape_string($conn,$_POST['dis']);

if ($discount>100) { echo "maximum limit exceeded";
    
   }
else{
	
 $id = mysqli_real_escape_string($conn,$_POST['id']);
    
  $sql="update item_detail set discount = '$discount' where id='$id'";

  $bgt=mysqli_query($conn,$sql);

   if ($bgt) {
     echo "1";
    } 
}
 ?>
