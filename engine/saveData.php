<?php
include_once "configure.php";

$sql = "update item_detail set " . mysqli_escape_string($conn,$_POST["column"]). "='" . mysqli_escape_string($conn, $_POST["value"]) . "' where id=" .  mysqli_escape_string($conn,$_POST["id"]);
if (mysqli_query($conn, $sql)){
    echo "true";
}
else{
    echo "false";
}
?>