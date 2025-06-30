<?php
require 'engine/configure.php';

// Sanitize input
$sp_name = trim($_POST['sp_name']);
$sp_speciality = trim($_POST['sp_speciality']);
$sp_category = trim($_POST['sp_category']);
$sp_location = trim($_POST['sp_location']);
$sp_email = trim($_POST['sp_email']);
$sp_img = $_POST['imager'] ?? "0";
$sp_password = trim($_POST['sp_password']);
$cpassword = trim($_POST['confirm_password']);
$sp_phonenumber = $_POST['sp_phonenumber1']??"";
$sp_phonenumber2 = $_POST['sp_phonenumber']?? " ";
$pricing = $_POST['pricing'] ?? " 0 ";
$sp_experience = trim($_POST['sp_experience']);
$sp_bio = trim($_POST['sp_bio']);
$sp_ratings = $_POST['sp_ratings'] ?? "0";
$views = $_POST['views'] ?? "0";
$verified = $_POST['verified'] ?? "0";
$e_verify = $_POST['e_verify'] ?? "0";
$date = date("D, F d, Y g:iA", strtotime('+1 hours'));
$vkey = md5(time() . $sp_email);
$bank_name = $_POST['bank_name'] ??" ";
$account_number = $_POST['account_number'] ??"0";
$pay = $_POST['pay'] ?? " 0 ";
$secret_password = sha1($sp_password); // Hash password

// Validate input fields
if (empty($sp_name) || empty($sp_email) || empty($sp_password) || empty($cpassword) || empty($sp_phonenumber) || empty($sp_experience) || empty($sp_bio)) {
    http_response_code(400);
    echo("All fields are required.");
    
    print( $sp_experience . " " . $sp_bio);

}

if (!filter_var($sp_email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    exit("Invalid email format.");
}

if ($sp_password !== $cpassword) {
    http_response_code(400);
    echo("Password mismatch!");
}

// Check if user already exists
$check_query = "SELECT * FROM service_providers WHERE sp_email = ?";
$stmt = $conn->prepare($check_query);
$stmt->bind_param("s", $sp_email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    http_response_code(400);
    echo("You are already a registered member.");
}
$stmt->close();

// Insert user into the database
$insert_query = "INSERT INTO service_providers (sp_name, sp_img, sp_category, sp_speciality, sp_location, sp_email, sp_password, sp_phonenumber1, sp_phonenumber2, pricing, sp_experience, sp_bio, ratings, views, sp_verified, e_verify, bank_name, account_number, pay, vkey, date) 
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($insert_query);

$stmt->bind_param("sssssssssssssssssssss", $sp_name, $sp_img, $sp_category, $sp_speciality, $sp_location, $sp_email, $secret_password, $sp_phonenumber, $sp_phonenumber2, $pricing, $sp_experience, $sp_bio, $sp_ratings, $views, $verified, $e_verify, $bank_name, $account_number, $pay, $vkey, $date);

if ($stmt->execute()) {
    // Send verification email
    require 'PHPMailer-master/PHPMailer-master/PHPMailerAutoload.php';

    $mail = new PHPMailer;
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'estores.ng';
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Username = 'info@estores.ng';
    $mail->Password = "1s9m@Yl3S2";
    $mail->setFrom('info@estores.ng', 'EstoresNG');
    $mail->addAddress($sp_email);
    $mail->isHTML(true);
    $mail->Subject = 'Welcome to Estores';

    $mailContent = "
        <meta name='color-scheme' content='light only'>
        <meta name='supported-color-schemes' content='light only'>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' crossorigin='anonymous'>
        <body style='font-family:gill-sans,sans-serif'>
            <div class='text-left px-2'>
                <img src='https://estores.ng/assets/icons/logo_e_stores.png' height='50' width='50'>
            </div>
            <br><br>
            <p>Thank you for signing up with EstoresNG! We're excited to have you on board.</p>
            <p>To complete your registration and activate your account, please verify your email by clicking the link below:</p>
            <br><br>
            <div class='container' style='color:black;font-size:15px;padding:10px;text-align:justify;margin-top:10px;'>
                Click on the link to <a href='https://estores.ng/verify.php?vkey=$vkey&&user_type=service_provider'>Verify Account</a>
            </div>
            <br><br>
            <p>If you did not sign up for this account, please ignore this email.</p>
            <p>Need help? Contact our support team at <a href='mailto:info@estores.ng'>info@estores.ng</a>.</p>
            <p>Best regards, <br> The EstoresNG Team</p>
        </body>
    ";

    $mail->Body = $mailContent;

    if (!$mail->send()) {
        http_response_code(500);
        echo("Error sending verification email: " . $mail->ErrorInfo);
    } else {
        echo "1"; // Success response
    }
} else {
    http_response_code(500);
    echo("Database insertion failed: " . $stmt->error);
}

$stmt->close();
$conn->close();
?>