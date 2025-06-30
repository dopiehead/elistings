<?php

error_reporting(E_ALL ^ E_NOTICE);
require 'engine/configure.php';

// Prepare input data with prepared statements
$user_name = trim($_POST['user_name']);
$user_email = trim($_POST['user_email']);
$user_password = trim($_POST['user_password']);
$cpassword = trim($_POST['confirm_password']);
$user_phone = trim($_POST['user_phone']);
$user_location = trim($_POST['user_location']);
$verified = trim($_POST['verified']);
$user_image = trim($_POST['imager'])??"";
$date = date("D, F d, Y g:iA", strtotime('+1 hours'));
$vkey = md5(time() . $user_email);
$secret_password = sha1($user_password);

// Check for empty fields
if (empty($user_name) || empty($user_email) || empty($user_password) || empty($cpassword) || empty($user_phone) || empty($user_location)) {
    exit("All fields are required");
}

// Validate email format
if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
    exit("Invalid email format");
}

// Check if passwords match
if ($user_password !== $cpassword) {
    exit("Password mismatch!");
}

// Check if user exists in vendor_profile
$checkforuser = $conn->prepare("SELECT id FROM vendor_profile WHERE business_email = ?");
$checkforuser->bind_param("s", $user_email);
$checkforuser->execute();
$checkforuser->store_result();
if ($checkforuser->num_rows > 0) {
    exit("You are already a member of E-storesNG");
}
$checkforuser->close();

// Check if user exists in service_providers
$checkforusersp = $conn->prepare("SELECT sp_id FROM service_providers WHERE sp_email = ?");
$checkforusersp->bind_param("s", $user_email);
$checkforusersp->execute();
$checkforusersp->store_result();
if ($checkforusersp->num_rows > 0) {
    exit("You are already a member of E-storesNG");
}
$checkforusersp->close();

// Check if user exists in user_profile
$check = $conn->prepare("SELECT id FROM user_profile WHERE user_email = ?");
$check->bind_param("s", $user_email);
$check->execute();
$check->store_result();
if ($check->num_rows > 0) {
    exit("This account already exists");
}
$check->close();

// Insert new user into user_profile
$insert = $conn->prepare("INSERT INTO user_profile (user_name, user_email, user_image, user_phone, user_password, user_location, vkey, verified, joined_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$insert->bind_param("sssssssss", $user_name, $user_email, $user_image, $user_phone, $secret_password, $user_location, $vkey, $verified, $date);

if ($insert->execute()) {
    require 'PHPMailer-master/PHPMailer-master/PHPMailerAutoload.php';
    
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'estores.ng';
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Username = 'info@estores.ng';
    $mail->Password = "1s9m@Yl3S2";
    $mail->setFrom('info@estores.ng', 'estores.ng');
    $mail->addAddress($user_email);
    $mail->addReplyTo('info@estores.ng');
    $mail->isHTML(true);
    $mail->Subject = 'Welcome to Estores.NG';
    $mail->Body = "Click on the link to <a href='https://estores.ng/verify.php?vkey=$vkey&&user_type=buyer'>Verify Account</a>";
    
    if (!$mail->send()) {
        exit("Error in sending verification email: " . $mail->ErrorInfo);
    }
    exit("1"); // Success
} else {
    exit("Error: Unable to register user");
}

$insert->close();
$conn->close();
?>