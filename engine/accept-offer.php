<?php 

session_start();

$vendor = $_SESSION['business_id'];
require 'configure.php';    
if (isset($_POST['id'])) {
$sender_id = mysqli_real_escape_string($conn,$_POST['sender_id']);
$id=mysqli_real_escape_string($conn,$_POST['id']);
$message=mysqli_real_escape_string($conn,$_POST['message']);
$sql = "UPDATE vendor_notifications SET pending = 1 where id ='".htmlspecialchars($id)."' and recipient_id ='".htmlspecialchars($vendor)."' and sender_id ='".htmlspecialchars($sender_id)."' ";
$query=mysqli_query($conn,$sql);
if ($query) {
$date=date("D, F d, Y g:iA");
$insert = mysqli_query($conn,"insert into buyer_notifications(sender_id,message,recipient_id,pending,date) values('".htmlspecialchars($vendor)."','".htmlspecialchars($message)."','".htmlspecialchars($sender_id)."','0','".($date)."') ");


	
require 'PHPMailer-master/PHPMailer-master/PHPMailerAutoload.php';


$mail= new PHPMailer;

$mail->SMTPDebug = 0;  

    $mail->isSMTP();                                            // Send using SMTP
   
$mail->Host = 'estores.ng'; // Replace with your SMTP host
                    $mail->Port = 465; // Ensure correct SMTP port
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = 'ssl';
                    $mail->Username = 'info@estores.ng'; // Replace with your SMTP username
                    $mail->Password = 'j(Mr7DlV7Oog'; // Replace with your SMTP password
                    $mail->setFrom('info@estores.ng', 'estoresNG');
                    $mail->addAddress($sender_email);
                   $mail->AddEmbeddedImage('https://estores.ng/assets/icon/logo_e_stores.png', 'pic'); // Correctly embed image using CID
                    $mail->addReplyTo('info@estores.ng');

$mail->isHTML(true);

$mail->Subject='Offer';

$mail->MsgHTML("<meta name='color-scheme' content='light only'>

<meta name='supported-color-schemes' content='light only'>

<link rel='stylesheet' type='text/css' href='bootstrap.min.css'>

<body style='height:100px;font-family:;font-size:px;padding:10px;'>
<div style='text-align:center'>
<img style='float:left;opacity:1;margin-top:-5px;' src='https://estores.ng/assets/icon/logo_e_stores.png' height='50' width='50'>
</div>

<br><br><br>

<div align='' class='container' style='color:black;font-size:15px;font-family:Gill Sans, sans-serif;padding:20px;text-align:justify;'>


You have a message from <b>".$name."</b> regarding <b>".$subject."</b><br><p><q>".$message."</q></p><br><br><br>

<a style='font-size:15px;' class='btn btn-warning' href='https://estores.ng/buyer-notifications.php'>Go to </a>

</div>


<br><br>

<br><br>

</body>


");



if (!$mail->send()) {$error ="message not sent".$mail->ErrorInfo;
  
}



else{

  echo"1";

  
}

}

}
?>