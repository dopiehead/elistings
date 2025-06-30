<?php 
require 'engine/configure.php';

    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $message=mysqli_real_escape_string($conn,$_POST['message']);
    $subject=mysqli_real_escape_string($conn,$_POST['subject']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
   $user_type=mysqli_real_escape_string($conn,$_POST['user_type']);
   $date=date("D, F d", strtotime('+1 hours'));

if (empty($name.$message.$email.$subject)) { echo"All fields are required";

print_r($name.$message.$email.$subject);
   }

   

    elseif ($name=='') {

   echo "Name field is required";	
   }

 elseif ($email=='') {

   echo "Email field is required";
   }


   elseif ($message=='') {

   echo "message field is required";
   }

   elseif ($subject=='') {
   echo "subject field is required";
   }   


else{
 
$get_com="select * from newsfeed where compose='".htmlspecialchars($message)."' and email='".htmlspecialchars($email)."' and name='".htmlspecialchars($name)."' and subject='".htmlspecialchars($subject)."'";
$combine=mysqli_query($conn,$get_com);
$res=$combine->num_rows;
if ($res==1) {echo"You cannot post the same message twice.";
}

elseif($res==0){   
    
$dbc=mysqli_query($conn,"insert into newsfeed(name,subject,compose,email,user_type,date) values('".htmlspecialchars($name)."','".htmlspecialchars($subject)."','".htmlspecialchars($message)."','".htmlspecialchars($email)."','".htmlspecialchars($user_type)."','".htmlspecialchars($date)."')");



if ($dbc) { 

echo"1";

     }

else{

echo"message was not sent";
  
echo mysqli_error($dbc);
}


} 

}


 ?>



