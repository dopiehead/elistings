<?php

require 'configure.php';
$itemId = mysqli_escape_string($conn,$_POST['itemId']);
$userid = mysqli_escape_string($conn,$_POST['userid']);
$buyer  =  mysqli_escape_string($conn,$_POST['buyer']);


if (empty($itemId.$userid.$buyer)) {

echo "Not successful";

}

else{

$query = mysqli_query($conn,"select * from heart_like where itemId ='".$itemId."' and buyer ='".$buyer."'");

if ($query->num_rows>0) {
	
	echo "You have already liked this item";


}
else{
     $insert = mysqli_query($conn,"insert into heart_like(itemId,buyer,seller) values ('".$itemId."','".$buyer."','".$userid."')");

    if ($insert) {


    $update = mysqli_query($conn,"UPDATE item_detail SET likes =+1 WHERE id ='".$itemId."'");	
		
		echo "1";
	}
}


}















?>
