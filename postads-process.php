<?php session_start();



require 'engine/configure.php';

error_reporting(E_ALL ^ E_NOTICE);

$product_name=mysqli_escape_string($conn,$_POST['product_name']);

$product_category=mysqli_real_escape_string($conn,$_POST['product_category']);

$product_color=mysqli_real_escape_string($conn,$_POST['product_color']);

$product_location=mysqli_real_escape_string($conn,$_POST['product_location']);

$product_address=mysqli_real_escape_string($conn,$_POST['product_address']);

$product_price=mysqli_real_escape_string($conn,$_POST['product_price']);

$quantity=mysqli_real_escape_string($conn,$_POST['quantity']);

$status = isset($_POST['status']) ? intval($_POST['status']) : 0; // Ensure $status is integer (0 or 1)

// Switch value of $status to 0 or 1
$status = $status == 1 ? 0 : 1;


$price_denomination = mysqli_real_escape_string($conn,$_POST['price_denomination']);

$phone_number=mysqli_real_escape_string($conn,$_POST['phone_number']);

$product_details=mysqli_real_escape_string($conn,$_POST['product_details']);

$discount=mysqli_real_escape_string($conn,$_POST['discount']);

$userid=mysqli_real_escape_string($conn,$_POST['user_id']);

if($phone_number>0){$phone_number=(int)$_POST['phone_number'];}

$sold=mysqli_real_escape_string($conn,$_POST['sold']);

$views=mysqli_real_escape_string($conn,$_POST['views']);

$deals=mysqli_real_escape_string($conn,$_POST['deals']);

$likes=mysqli_real_escape_string($conn,$_POST['likes']);

$gift_picks=mysqli_real_escape_string($conn,$_POST['gift_picks']);

$featured=mysqli_real_escape_string($conn,$_POST['featured']);

$date=date("D, F d, Y g:iA");

if (empty($product_name.$product_details.$product_price.$product_location.$phone_number)) { echo"All fields are required";

}

elseif(strlen($product_name)>20){echo "item name limit exceeded, must be at most 20 letters";

}


else{

$imageFolder="uploads/";

$basename=basename($_FILES["imager"]["name"]);

$allowed_extensions = array("jpg",
    "jpeg",
    "png",
      "JPG",
    "JPEG",
    "PNG");
$maxsize= 5 * 1024 * 1024;//5mb
$imagePath=$imageFolder.$basename;
$file_extension=pathinfo($_FILES["imager"]["name"],PATHINFO_EXTENSION);
$imageExtension=pathinfo($imagePath,PATHINFO_EXTENSION);
$ImageSize=$_FILES['imager']['size'];
$image_temp_name=$_FILES["imager"]["tmp_name"];

 if (!file_exists($image_temp_name)) {
       echo "Choose Image file to upload"; }
    elseif(!in_array($imageExtension,$allowed_extensions)){ echo "Please upload valid Image in png and Jpeg only";
}

elseif (($_FILES["imager"]["size"] > $maxsize)) {echo "Image file size limit is exceeded.Please upload image around 3mb."; 

}
else {

$upload=move_uploaded_file($image_temp_name,$imagePath); 
$check="select * from item_detail where product_name='".htmlspecialchars($product_name)."' and product_details='".htmlspecialchars($product_details)."' and user_id='".htmlspecialchars($userid)."' ";

$we=mysqli_query($conn,$check);

if ($we->num_rows==1) { echo"You cannot post the same content twice";

}



else {
$a="insert into item_detail values('','".htmlspecialchars($userid)."','".htmlspecialchars($product_name)."','".htmlspecialchars($product_category)."','".htmlspecialchars($product_color)."','".htmlspecialchars($product_location)."','".htmlspecialchars($product_address)."','".htmlspecialchars($product_price)."','".htmlspecialchars($price_denomination)."','".htmlspecialchars($imagePath)."','".htmlspecialchars($phone_number)."','".htmlspecialchars($product_details)."','".htmlspecialchars($quantity)."','".htmlspecialchars($discount)."','".htmlspecialchars($gift_picks)."','".htmlspecialchars($sold)."','".htmlspecialchars($likes)."','".htmlspecialchars($views)."','".htmlspecialchars($deals)."','".htmlspecialchars($featured)."','".htmlspecialchars($status)."','".htmlspecialchars($date)."')";
$r = mysqli_query($conn,$a);
if (!$r) {echo"Item was not posted";
}

else{

  echo "1";
  
}

}

}



}




 ?>
