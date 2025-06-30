<?php session_start();

require 'configure.php';

$email = mysqli_escape_string($conn,$_POST['email']);
$name =  mysqli_escape_string($conn, $_POST['name']);
$vendor_message =  mysqli_escape_string($conn,$_POST['vendor_message']);
if (!empty($email.$name.$vendor_message)) {
echo "All fields are required";
}
else{
	$check = mysqli_query($conn,"select email, name, vendor_message from sp_message where email='".htmlspecialchars($email)."'");
    if ($check->num_rows==1) {
         echo "You cannot post this comment twice";	
	}
    else{
      $insert = mysqli_query($conn,"insert into sp_message(email,name,vendor_message) values('".htmlspecialchars($email)."','".htmlspecialchars($name)."','".htmlspecialchars($vendor_message)."')");

      if ($insert) {
      	
      	require 'PHPMailer-master/PHPMailer-master/PHPMailerAutoload.php';

$mail= new PHPMailer;

$mail->SMTPDebug = 0;  
                    // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
  $mail->Host = 'estores.ng';
    
    $servername="localhost";
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

$mail->Subject=$subject;

$mail->MsgHTML("<meta name='color-scheme' content='light only'>

<meta name='supported-color-schemes' content='light only'>

<link rel='stylesheet' type='text/css' href='bootstrap.min.css'>

<body style='height:100px;font-family:;font-size:px;'>

<img style='float:left;opacity:1;margin-top:-5px;' src='cid:pic' height='80' width='150'>

<br><br><br>

<div align='' class='container' style='color:black;font-size:15px;font-family:Gill Sans, sans-serif;padding:20px;text-align:justify;'>

You have a message from <b>".$name."</b>

</div>

<br><br><br>

<div align='center' class='container'>

".$vendor_message."<br><br>

<a href='http://e-stores.com/chat.php?user_name=$receiver_email' class='form-control'>Login to view message</a>

</div>

</div>

<br><br>

</body>


");



if (!$mail->send()) {$error ="mensaje no enviado".$mail->ErrorInfo;
  
}



else{

  echo"1";

  
}


      }

      else{

      	echo "Message was not sent";
      }
	}
}

?>