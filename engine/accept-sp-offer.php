<?php
session_start();

$vendor = $_SESSION['sp_id'];
require 'configure.php';    
require 'PHPMailer-master/PHPMailer-master/PHPMailerAutoload.php';  // Load PHPMailer

// Validate if the POST data is set
if (isset($_POST['id'], $_POST['sender_id'], $_POST['message'])) {

    $sender_id = mysqli_real_escape_string($conn, $_POST['sender_id']);
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    
    // Prepare the SQL to update notification status
    $sql = "UPDATE sp_notifications 
            SET pending = 1 
            WHERE id = ? 
            AND recipient_id = ? 
            AND sender_id = ?";
    
    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind parameters and execute the query
        mysqli_stmt_bind_param($stmt, 'iis', $id, $vendor, $sender_id);
        if (mysqli_stmt_execute($stmt)) {
            
            // Get the current date and time
            $date = date("D, F d, Y g:iA");

            // Insert the message into buyer notifications table
            $insert = "INSERT INTO buyer_notifications (sender_id, message, recipient_id, pending, date) 
                       VALUES (?, ?, ?, 0, ?)";
            
            if ($stmt_insert = mysqli_prepare($conn, $insert)) {
                mysqli_stmt_bind_param($stmt_insert, 'isis', $vendor, $message, $sender_id, $date);
                mysqli_stmt_execute($stmt_insert);
            }

            // Sending email using PHPMailer
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host = 'estores.ng';  // Replace with your SMTP host
            $mail->Port = 465;  // Ensure correct SMTP port
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';
            $mail->Username = 'info@estores.ng';  // SMTP username
            $mail->Password = 'j(Mr7DlV7Oog';  // SMTP password
            $mail->setFrom('info@estores.ng', 'estoresNG');
            $mail->addAddress($sender_email);  // Define the sender's email address
            $mail->AddEmbeddedImage('https://estores.ng/assets/icon/logo_e_stores.png', 'pic');  // Embed image using CID
            $mail->addReplyTo('info@estores.ng');

            // Email content setup
            $mail->isHTML(true);
            $mail->Subject = 'Offer';
            $mail->MsgHTML("
                <meta name='color-scheme' content='light only'>
                <meta name='supported-color-schemes' content='light only'>
                <link rel='stylesheet' type='text/css' href='bootstrap.min.css'>
                <body style='height:100px; font-family:sans-serif; padding:10px;'>
                    <div style='text-align:center'>
                        <img style='float:left; opacity:1; margin-top:-5px;' src='https://estores.ng/assets/icon/logo_e_stores.png' height='50' width='50'>
                    </div>
                    <div align='center' class='container' style='color:black; font-size:15px; font-family:Gill Sans, sans-serif; padding:20px; text-align:justify;'>
                        You have a message from <b>{$name}</b> regarding <b>{$subject}</b><br><p><q>{$message}</q></p><br><br>
                        <a style='font-size:15px;' class='btn btn-warning' href='https://estores.ng/sp-notifications.php'>Go to Notifications</a>
                    </div>
                </body>
            ");

            if ($mail->send()) {
                echo "1";  // Message sent successfully
            } else {
                echo "Error in sending email: " . $mail->ErrorInfo;  // Error in sending email
            }

        } else {
            echo "Error in updating the notification status.";  // SQL query error
        }
    } else {
        echo "Error in preparing SQL statement.";  // SQL statement preparation error
    }
} else {
    echo "Invalid request. Missing required parameters.";  // Missing POST data
}

?>
