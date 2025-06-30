<?php require 'engine/configure.php';
$email=mysqli_escape_string($conn,$_POST['vendor_email']);
$pname=mysqli_escape_string($conn,$_POST['product_name']);
$sender_email=mysqli_escape_string($conn,$_POST['sender_email']);
$productId=mysqli_escape_string($conn,$_POST['product_id']);
$issue=mysqli_escape_string($conn,$_POST['issue']);
$date=date("D, M n, Y g:iA ");
if (empty($email.$issue.$productId)) {
echo "All fields are required";
}
elseif ($email=='') {echo"Email field is required";
  
}
elseif ($issue=='') {echo"issue field is required";
	# code...
}
elseif ($productId=='') {echo"Product details is required";	# code...
}
else{
$a="insert into product_issue(product_name,vendor_email,product,sender_email,issue,date) values('".htmlspecialchars($pname)."','".htmlspecialchars($email)."','".htmlspecialchars($product)."','".htmlspecialchars($sender_email)."','".htmlspecialchars($issue)."','".htmlspecialchars($date)."')";
$r=mysqli_query($conn,$a);
if (!$r) {echo"Message was not sent";
}
else{ echo"1";}
}






 ?>
 



