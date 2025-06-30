 <?php
 require 'configure.php';
 $id = $_POST['id'];
 $verification = $_POST['verification'];
 $b = mysqli_query($conn,"UPDATE verify_seller set verified = '$verification' WHERE sid ='".htmlspecialchars($id)."'");
 if($b){echo "E-verification was successful";} else { echo "The E-verification was unsuccessful";  }
 ?>