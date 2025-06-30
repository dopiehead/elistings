<?php
require 'engine/configure.php';
$pic =mysqli_escape_string($conn,$_POST['pict']);
$imagefolder="assets/img/";
 $max_pic_allowed = 3;
 $max_upload = 5*1024*1024;
$filecount=count($_FILES['fileupload']['name']);
if ($filecount>=$max_pic_allowed) {
 echo "You have exceeded the maximum number of upload. Kindly upload atmost 3 pictures. ";
}
else{
$allowed_extensions = array("jpg","jpeg","png","JPG","JPEG","PNG"); 
$output='';
for ($i = 0; $i < $filecount; $i++) {
    $filename = basename(mysqli_escape_string($conn,$_FILES['fileupload']['name'][$i]));
    $file_extension=pathinfo($_FILES["fileupload"]["name"][$i],PATHINFO_EXTENSION); 
    $ImageSize=$_FILES['fileupload']['size'][$i];
    $imagepath = $imagefolder . $filename;
    $image_temp_name = mysqli_escape_string($conn,$_FILES["fileupload"]["tmp_name"][$i]);
 if (!file_exists($image_temp_name)) {
       echo "Choose Image file to upload"; }
    elseif ( $ImageSize> $max_upload) {
echo "Maximum image size exceeded. Kindly upload below 5MP.";
}

elseif(!in_array($file_extension,$allowed_extensions)){ echo "Kindly upload valid Image in Png and Jpeg format only.";
}
else {  
$check="select * from picx where sid='".htmlspecialchars($pic)."'";
$result_check=mysqli_query($conn,$check);
$count=$result_check->num_rows;
if ($count>3) {echo"You have exceeded the maximum number of upload,";
}
else{
move_uploaded_file($_FILES["fileupload"]["tmp_name"][$i], $imagepath);
$dbc=mysqli_query($conn,"insert into picx(sid,pictures) values ('".htmlspecialchars($pic)."','".htmlspecialchars($imagepath)."')");
}

}

}
} 
   echo "1";  


?>

