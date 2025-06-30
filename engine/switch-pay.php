<?php require 'configure.php';
$sp_id = mysqli_escape_string($conn, $_POST['sp_id']);
$pay =  mysqli_escape_string($conn, $_POST['pay']);
if (!empty($pay.$sp_id)) {
if($pay == 0){
$query = mysqli_query($conn,"update service_providers set pay = 'essential' where sp_id = '".htmlspecialchars($sp_id)."'");
if ($query) { echo "Payment has been switched to Essential pay";
}
}
else{
$query = mysqli_query($conn,"update service_providers set pay = 'account' where sp_id = '".htmlspecialchars($sp_id)."'");
if ($query) { echo "Payment has been switched to Account pay";
}
}
}
?>