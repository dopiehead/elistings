<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer classes
require 'vendor/autoload.php'; // Adjust the path as needed

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com'; // Specify your SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'your_email@example.com'; // SMTP username
    $mail->Password = 'your_password'; // SMTP password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Sender and recipient settings
    $mail->setFrom('your_email@example.com', 'Your Name');
    $mail->addAddress('recipient@example.com', 'Recipient Name');

    // Email subject and body
    $mail->isHTML(true)…



<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer classes
require 'vendor/autoload.php'; // Adjust the path as needed

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com'; // Specify your SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'your_email@example.com'; // SMTP username
    $mail->Password = 'your_password'; // SMTP password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Sender and recipient settings
    $mail->setFrom('your_email@example.com', 'Your Name');
    $mail->addAddress('recipient@example.com', 'Recipient Name');

    // Email subject
    $mail->isHTML(true);
    $mail->Subject = 'Check out these awesome products!';

    // HTML body
    $body = '<html><body style="font-family: Arial, sans-serif;">';
    $body .= '<h2 style="color: #333333;">Welcome to Our E-storesNG </h2>';
    
    // Product 1
    $body .= '<div style="margin-bottom: 20px;">';
    $body .= '<img src="https://example.com/path/to/product1.jpg" alt="Product 1" style="width: 100px; height: auto; float: left; margin-right: 15px;">';
    $body .= '<div style="font-size: 16px;">Product 1 Description</div>';
    $body .= '<div style="font-weight: bold; color: #FF6600;">$19.99</div>';
    $body .= '<div style="clear: both;"></div>';
    $body .= '</div>';
    
    // Product 2
    $body .= '<div style="margin-bottom: 20px;">';
    $body .= '<img src="https://example.com/path/to/product2.jpg" alt="Product 2" style="width: 100px; height: auto; float: left; margin-right: 15px;">';
    $body .= '<div style="font-size: 16px;">Product 2 Description</div>';
    $body .= '<div style="font-weight: bold; color: #FF6600;">$24.99</div>';
    $body .= '<div style="clear: both;"></div>';
    $body .= '</div>';
    
    // Product 3
    $body .= '<div style="margin-bottom: 20px;">';
    $body .= '<img src="https://example.com/path/to/product3.jpg" alt="Product 3" style="width: 100px; height: auto; float: left; margin-right: 15px;">';
    $body .= '<div style="font-size: 16px;">Product 3 Description</div>';
    $body .= '<div style="font-weight: bold; color: #FF6600;">$29.99</div>';
    $body .= '<div style="clear: both;"></div>';
    $body .= '</div>';

    $body .= '<p style="text-align: center;"><a href="https://your-ecommerce-site.com" style="padding: 10px 20px; background-color: #FF6600; color: #ffffff; text-decoration: none; border-radius: 5px;">Shop Now</a></p>';

    $body .= '<p style="font-size: 12px; color: #999999; text-align: center;">You are receiving this email because you signed up at our website. <br>If you wish to unsubscribe, <a href="#" style="color: #999999; text-decoration: none;">click here</a>.</p>';

    $body .= '</body></html>';
    $mail->Body = $body;

    // Send email
    $mail->send();
    echo 'Email sent successfully';
} catch (Exception $e) {
    echo 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo;
}
?>