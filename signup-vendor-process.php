<?php
error_reporting(E_ALL ^ E_NOTICE);
require 'engine/configure.php';

// Sanitize user inputs
$business_name = mysqli_real_escape_string($conn, $_POST['business_name'])??"";
$business_email = mysqli_real_escape_string($conn, $_POST['business_email'])??"";
$business_contact = mysqli_real_escape_string($conn, $_POST['business_contact'])??"";
$business_password = mysqli_real_escape_string($conn, $_POST['business_password'])??"";
$business_address = mysqli_real_escape_string($conn, $_POST['business_address'])??"";
$company_description = mysqli_real_escape_string($conn, $_POST['company_description'])??"";
$business_type = mysqli_real_escape_string($conn, $_POST['business_type'])??"";
$business_image = mysqli_real_escape_string($conn, $_POST['imager'])??"";
$cpassword = mysqli_real_escape_string($conn, $_POST['confirm_password']);
$item_sold = mysqli_real_escape_string($conn, $_POST['item_sold'])??"0";
$verified = 0; // Default value
$bank_name = 0;
$account_number = 0;
$pay = 0;
$status = 0;
$date = date("D, F d, Y g:iA", strtotime('+1 hours'));
$vkey = md5(time() . $business_email);
$secret_password = sha1($business_password);

// Check for existing email in multiple tables
$check_query = "SELECT 'vendor' AS type FROM vendor_profile WHERE business_email = ? 
                UNION 
                SELECT 'user' FROM user_profile WHERE user_email = ? 
                UNION 
                SELECT 'service_provider' FROM service_providers WHERE sp_email = ?";
$check_stmt = $conn->prepare($check_query);
$check_stmt->bind_param("sss", $business_email, $business_email, $business_email);
$check_stmt->execute();
$check_stmt->store_result();

if ($check_stmt->num_rows > 0) {
    echo "You are already a registered member of E-storesNG.";
} elseif (empty($business_name . $business_email . $business_password . $cpassword . $company_description . $business_address . $business_contact)) {
    echo "All fields are required.";
} elseif ($business_password != $cpassword) {
    echo "Password mismatch!";
} elseif (!filter_var($business_email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format.";
} else {
    // Insert new vendor
    $insert_query = "INSERT INTO vendor_profile 
        (business_name, business_email, business_password, business_type, business_address, business_contact, company_description, business_image, items_sold, vkey, verified, bank_name, account_number, pay, status, date) 
        VALUES (?, ?, ?, ?, ?, ?,  ?, ?, ?, ?, ?, ?,  ?, ?, ?, ?)";

    $insert_stmt = $conn->prepare($insert_query);
    $insert_stmt->bind_param("sssssssssissiiis", $business_name, $business_email, $secret_password, $business_type, $business_address, $business_contact, $company_description, $business_image, $item_sold, $vkey, $verified, $bank_name, $account_number, $pay, $status, $date);

    if ($insert_stmt->execute()) {
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
        $mail->addAddress($business_email);
        $mail->addReplyTo('info@estores.ng');
        $mail->isHTML(true);
        $mail->Subject = 'Welcome to EstoresNG';

        // Email body
        $mail->MsgHTML("
            <meta name='color-scheme' content='light only'>
            <meta name='supported-color-schemes' content='light only'>
            <link rel='stylesheet' type='text/css' href='bootstrap.min.css'>
            <body>
                <div style='text-align:center;'>
                    <img src='https://estores.ng/assets/icons/logo_e_stores.png' height='50' width='50'>
                </div>
                <br><br><br><br>
                <div class='container' style='color:black;font-size:15px;font-family:Gill Sans, sans-serif;padding:10px;margin-top:10px;'>
                    Click on the link below to <a href ='https://estores.ng/verify.php?vkey=$vkey&&user_type=vendor'>Verify Account</a>
                </div>
                <br><br>
            </body>
        ");

        if (!$mail->send()) {
            echo "Error sending verification link: " . $mail->ErrorInfo;
        } else {
            echo "1"; // Success
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Close statements
$check_stmt->close();
$insert_stmt->close();
$conn->close();
?>