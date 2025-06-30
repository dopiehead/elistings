<?php
header('Content-Type: application/json');
require '../engine/configure.php';
if ($conn->connect_error) {
    die(json_encode(['error' => 'Connection failed: ' . $conn->connect_error]));
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT pound_rate FROM pound_rate";
    $result = $conn->query($sql);
if ($result->num_rows > 0) {
        $pound_rate = [];
        while($row = $result->fetch_assoc()) {
            $pound_rate[] = $row;
        }
        echo json_encode(["pound_rate"=>$pound_rate]);
    } else {
        echo json_encode([]);
    }
}
$conn->close();
?>