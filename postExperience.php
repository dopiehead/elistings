<?php
require 'engine/configure.php';

error_reporting(E_ALL ^ E_NOTICE);

  $spId=mysqli_escape_string($conn,$_POST['spId']);

  $experience=mysqli_real_escape_string($conn,$_POST['experience']);

  $title=mysqli_real_escape_string($conn,$_POST['title']);
  
  $location=mysqli_real_escape_string($conn,$_POST['location']);

  $employer=mysqli_real_escape_string($conn,$_POST['employer']);

  $fromDate=mysqli_real_escape_string($conn,$_POST['from_date']);
  
  $toDate=mysqli_real_escape_string($conn,$_POST['to_date']);

  $charge=mysqli_real_escape_string($conn,$_POST['charge']);
  
$currency=mysqli_real_escape_string($conn,$_POST['currency']);  

 if (empty($employer.$location.$experience.$title.$fromDate.$toDate.$charge.$currency)) { echo"All fields are required";

}

elseif(strlen($experience)<20){echo "experience limit exceeded, must be at least 23 letters and not more than 50 words";}

elseif ($title=='') {echo"Title field is required";
  # code...
}
elseif ($fromDate=='') {echo"Please set start date";
  # code...
}
elseif ($toDate=='') {echo"Please set end date";
  # code...
}

elseif ($charge=='') {echo"Charges field is required";
  # code...
}

elseif ($currency=='') {echo"Currency field is required";
  # code...
}

else{

$pic =mysqli_escape_string($conn,$_POST['pict']);

$imagefolder="uploads/service-provider/experience/";

$filecount=count($_FILES['fileupload']['name']);

$allowed_extensions = array("jpg","jpeg","png","JPG","JPEG","PNG"); 

$output='';


for ($i=0; $i<$filecount ; $i++) { 
    
  $file_extension=pathinfo($_FILES["fileupload"]["name"][$i],PATHINFO_EXTENSION); 

  $imagepath=$imagefolder.$_FILES['fileupload']['name'][$i];
  
  $image_temp_name=$_FILES["fileupload"]["tmp_name"][$i];

 if (!file_exists($image_temp_name)) {
       echo "Choose Image file to upload"; }
       
    elseif(!in_array($file_extension,$allowed_extensions)){ echo "Please upload valid Image in png and Jpeg only";
    
}

elseif (($_FILES["imager"]["size"] > 2000000)) {
    
   "Image file size limit is exceeded"; 

}
else {

    $upload=move_uploaded_file($image_temp_name,$imagepath); 

 $check="select * from work_experience where experience='$experience' and title='$title'";

$we=mysqli_query($conn,$check);

if ($we->num_rows>3) { echo"You cannot post the same content twice";

}


else {

   $a="INSERT INTO work_experience(sp_id,title,employer,location,experience,from_date,to_date,images,currency,charge) VALUES ('".htmlspecialchars($spId)."','".htmlspecialchars($title)."','".htmlspecialchars($employer)."','".htmlspecialchars($location)."','".htmlspecialchars($experience)."','".htmlspecialchars($fromDate)."','".htmlspecialchars($toDate)."','".htmlspecialchars($imagepath)."','".htmlspecialchars($currency)."','".htmlspecialchars($charge)."')";


   $b ="UPDATE service_providers SET pricing ='$charge' WHERE sp_id = '$spId'";

   $x=mysqli_query($conn,$b);

   $r=mysqli_query($conn,$a);



}



}



}


echo "1";


}




 ?>
