<?php session_start();
require 'engine/configure.php';
$myid = mysqli_real_escape_string($conn,$_POST['id']);
//if it is set to buyers only change folder accordingly
if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    $imageFolder="uploads/buyers/";
}
//if it is set to vendors only change folder accordingly
 if (isset($_SESSION['business_id']) && !empty($_SESSION['business_id'])) {
  $imageFolder="uploads/vendors/";   
}
//if it is set to service providers only change folder accordingly
  if (isset($_SESSION['sp_id']) && !empty($_SESSION['sp_id'])) {
    $imageFolder="uploads/service-provider/";     
  }
//get profile picture name
   $basename= mysqli_real_escape_string($conn,basename($_FILES["fileupload"]["name"]));
   $maxsize = 4 * 1024 * 1024;
    $myimage=$imageFolder.$basename;
    $imageExtension= strtolower(pathinfo($myimage,PATHINFO_EXTENSION));
    $allowed_extensions = array("jpg","jpeg","png","JPG","JPEG","PNG"); 
   if(!in_array($imageExtension,$allowed_extensions)){ echo "Please upload valid Image in Png and Jpeg only"; }
    $ImageSize=$_FILES['fileupload']['size'];
    if($ImageSize>$maxsize){echo "Image file size of 4mb limit is exceeded.";}
    $image_temp_name=$_FILES["fileupload"]["tmp_name"];
    $upload=move_uploaded_file($image_temp_name,$myimage);
//if it is set to buyers only
if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
  $sql="update user_profile set user_image='".htmlspecialchars($myimage)."' where id='".htmlspecialchars($myid)."'";
    }
//if it is set to vendors  only
  if (isset($_SESSION['business_id']) && !empty($_SESSION['business_id'])) {
 $sql="update vendor_profile set business_image='".htmlspecialchars($myimage)."' where id='".htmlspecialchars($myid)."'";
   }
//if it is set to service providers  only
    if (isset($_SESSION['sp_id']) && !empty($_SESSION['sp_id'])) {
   $sql="update service_providers set sp_img='".htmlspecialchars($myimage)."' where sp_id='".htmlspecialchars($myid)."'";
    }
  $bgt=mysqli_query($conn,$sql);
if ($bgt) { 
if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {$_SESSION['image']= $myimage;}
if (isset($_SESSION['business_id']) && !empty($_SESSION['business_id'])) {$_SESSION['business_image']=$myimage;}
if (isset($_SESSION['sp_id']) && !empty($_SESSION['sp_id'])) { $_SESSION['sp_image']=$myimage;}
echo "1";
}
else{ echo"Error in changing picture";
     



}

?>

