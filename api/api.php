<?php
header('Content-Type: application/json');
require 'engine/configure.php';
if ($conn->connect_error) {
    die(json_encode(['error' => 'Connection failed: ' . $conn->connect_error]));
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT dollar_rate FROM dollar_rate";
    $result = $conn->query($sql);
if ($result->num_rows > 0) {
        $dollar_rate = [];
        while($row = $result->fetch_assoc()) {
            $dollar_rate[] = $row;
        }
        echo json_encode(["dollar_rate"=>$dollar_rate]);
    } else {
        echo json_encode([]);
    }
}
$conn->close();
?>
