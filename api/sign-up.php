<?php

require '../engine/configure.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

// Method check
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(["error" => "Invalid request method. Only POST is allowed."]);
    exit;
}

// Retrieve and decode JSON payload
$data = json_decode(file_get_contents("php://input"), true);

// Validate incoming data
$requiredFields = ['sp_name', 'sp_email', 'sp_password', 'confirm_password'];
foreach ($requiredFields as $field) {
    if (empty($data[$field])) {
        http_response_code(400); // Bad Request
        echo json_encode(["error" => "Missing required field: $field"]);
        exit;
    }
}

// Assign and sanitize inputs
$sp_name = htmlspecialchars($data['sp_name']);
$sp_speciality = htmlspecialchars($data['speciality']);
$sp_category = htmlspecialchars($data['category']);
$sp_location = htmlspecialchars($data['sp_location']);
$sp_email = filter_var($data['sp_email'], FILTER_SANITIZE_EMAIL);
$sp_password = htmlspecialchars($data['sp_password']);
$cpassword = htmlspecialchars($data['confirm_password']);
$sp_phonenumber = htmlspecialchars($data['sp_phonenumber']);
$sp_phonenumber2 = htmlspecialchars($data['sp_phonenumber1']);
$sp_experience = htmlspecialchars($data['sp_experience']);
$sp_bio = htmlspecialchars($data['sp_bio']);
$sp_ratings = htmlspecialchars($data['sp_ratings']);
$verified = htmlspecialchars($data['verified']);
$e_verify = htmlspecialchars($data['e_verify']);
$date = date("D, F d, Y g:iA", strtotime('+1 hours'));

// Check password match
if ($sp_password !== $cpassword) {
    http_response_code(400); // Bad Request
    echo json_encode(["error" => "Password mismatch."]);
    exit;
}

// Hash password
$secret_password = password_hash($sp_password, PASSWORD_BCRYPT);

// Database connection setup (use your own credentials)
// Check connection
if ($conn->connect_error) {
    http_response_code(500); // Internal Server Error
    echo json_encode(["error" => "Database connection failed."]);
    exit;
}

// Check if user already exists
$query = "SELECT COUNT(*) AS count FROM service_providers WHERE sp_email = '$sp_email'";
$stmt = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($stmt))
$count = $row['count'];
if ($count > 0) {
    http_response_code(409); // Conflict
    echo json_encode(["error" => "User already exists."]);
    exit;
}

// Generate verification key
$vkey = md5(time() . $sp_email);

// Insert user into the database
$insertQuery="INSERT INTO service_providers(sp_name,sp_img,sp_category,sp_speciality,sp_location,sp_email,sp_password,sp_phonenumber1,sp_phonenumber2,pricing,sp_experience,sp_bio,ratings,sp_verified,e_verify,vkey,date) VALUES ('".htmlspecialchars($sp_name)."','".htmlspecialchars($imagePath)."','".htmlspecialchars($sp_category)."','".htmlspecialchars($sp_speciality)."','".htmlspecialchars($sp_location)."','".htmlspecialchars($sp_email)." ','".htmlspecialchars($secret_password)."','".htmlspecialchars($sp_phonenumber)."','".htmlspecialchars($sp_phonenumber2)."','0','".htmlspecialchars($sp_experience)."','".htmlspecialchars($sp_bio)."','".htmlspecialchars($sp_ratings)."','".htmlspecialchars($verified)."','".htmlspecialchars($e_verify)."','".htmlspecialchars($vkey)."','".$date."')";

$execute = mysqli_query($conn,$insertQuery);

if ($execute) {
    http_response_code(201); // Created
    echo json_encode(["response" => "1"]);
} else {
    http_response_code(500); // Internal Server Error
    echo json_encode(["error" => "An error occurred while creating the user."]);
}


?>