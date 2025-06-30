<?php
header('Content-Type: application/json');
require '../engine/configure.php';
if ($conn->connect_error) {
    die(json_encode(['error' => 'Connection failed: ' . $conn->connect_error]));
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT euro_rate FROM euro_rate";
    $result = $conn->query($sql);
if ($result->num_rows > 0) {
        $euro_rate = [];
        while($row = $result->fetch_assoc()) {
            $euro_rate[] = $row;
        }
        echo json_encode(["euro_rate"=>$euro_rate]);
    } else {
        echo json_encode([]);
    }
}
$conn->close();
?>