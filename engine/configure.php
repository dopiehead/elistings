<?php
$conn = mysqli_connect("localhost","root","", "elistings");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>