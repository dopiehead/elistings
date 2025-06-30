<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>E-stores | Password Reset </title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0" charset="utf-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|sofia|Trirong|Poppins">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/flickity.min.css">
  <link rel="stylesheet" href="assets/css/overlay.css">
  <link rel="stylesheet" href="assets/css/forgot-password.css">
  <script src="assets/js/sweetalert.min.js"></script> 
<script src="assets/js/flickity.pkgd.min.js"></script>

</head>
<body>

<?php include 'components/header.php';  ?>

	<div class="wrap">

<div class="main">

	<div style="text-align: center">

	<small style="">Enter Your email to reset password</small><br>

</div>

<form method="post" action="">	

<select name="user_type" class="form-control" style="opacity: 0.8">
     
     <option value="buyer">Buyer</option>
	<option value="vendor">Vendor</option>


</select><br>

<input style="font-size:px;" type="text" class="form-control" placeholder="Email" name="email"><br>



<button name="submit" class="btn btn-danger form-control">Submit</button>

</form>


<?php
require 'engine/configure.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    if (!isset($_POST['user_type']) || !isset($_POST['email'])) {
        echo "<span id='alert-danger'>All fields are required.</span>";
        exit;
    }

    $user_type = trim($_POST['user_type']);
    $email = trim($_POST['email']);
    $vkey = md5(time() . $email);

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<span id='alert-danger'>Invalid email format.</span>";
        exit;
    }

    // Check if user exists in respective table
    $tables = [
        'buyer' => 'user_profile',
        'vendor' => 'vendor_profile',
     
    ];
    
    $type_email = [
        
         'buyer' => 'user_email',
         'vendor' => 'business_email',
        
        
    ];

    if (!isset($tables[$user_type])) {
        echo "<span id='alert-danger'>Invalid user type.</span>";
        exit;
    }
     
     
    $query = "SELECT * FROM " . $tables[$user_type] . " WHERE" .$type_email[$user_type]." = ?";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo "<span id='alert-danger'>Email not found.</span>";
        exit;
    }

    // Insert into forgotten table
    $insert = $conn->prepare("INSERT INTO forgotten (email, user_type, vkey) VALUES (?, ?, ?)");
    $insert->bind_param("sss", $email, $user_type, $vkey);

    if (!$insert->execute()) {
        echo "<span id='alert-danger'>Error saving request.</span>";
        exit;
    }

    // Send email
    require 'PHPMailer-master/PHPMailer-master/PHPMailerAutoload.php';
    
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'estores.ng';
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Username = "info@estores.ng"; // Use environment variable
    $mail->Password = "1s9m@Yl3S2";

    $mail->setFrom('info@estores.ng', 'estoresNG');
    $mail->addAddress($email);
    $mail->addReplyTo('info@estores.ng');
    $mail->isHTML(true);
    $mail->Subject = "Password Reset Request";

    $mail->Body = "
    <div style='text-align:center;font-family:sans-serif;color:#333;'>
        <img src='https://estores.ng/assets/icons/logo_e_stores.png' width='60' height='60' alt='Estores Logo'>
        <h2>Password Reset Request</h2>
        <p>Click the link below to reset your password:</p>
        <a href='https://estores.ng/forget.php?vkey=$vkey&user_type=$user_type' style='background:#28a745;color:#fff;padding:10px 15px;text-decoration:none;'>Reset Password</a>
        <p>If you did not request this, please ignore this email.</p>
    </div>";
    
    $mail->AltBody = "Click this link to reset your password: https://estores.ng/forget.php?vkey=$vkey&user_type=$user_type";

    try {
        if (!$mail->send()) {
            throw new Exception("Email sending failed.");
        }
        echo "<span id='alert-success'>A reset link has been sent to <b style='color:red;'>$email</b></span>";
    } catch (Exception $e) {
        echo "<span id='alert-danger'>Failed to send email. Try again later.</span>";
    }

    $stmt->close();
    $insert->close();
    $conn->close();
}
?>


</div>
</div>
<br>


<?php

include 'footer.php';


?>

</body>
</html>