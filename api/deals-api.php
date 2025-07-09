<?php 

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

require_once 'engine/configure.php';

// Check connection
if ($conn->connect_error) {
    die(json_encode(['error' => 'Connection failed: ' . $conn->connect_error]));
}

// Handle GET request to fetch users
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $sql = "SELECT * from service_provider_category";
    $service_provider = $conn->query($sql);
    $data = [];
    
    if ($service_provider->num_rows > 0) {
        while ($row = $service_provider->fetch_assoc()) {  
            $data[] = $row;  // Append the entire row associative array
        }
        echo json_encode($data);
    } else {
        echo json_encode([]);  // Return an empty array if no results
    }
}

?>




