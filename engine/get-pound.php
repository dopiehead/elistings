<?php
require 'configure.php';
$getPound = mysqli_query($conn,"select pound_rate from pound_rate");
if ($getPound) { while ($row = mysqli_fetch_array($getPound)) {
$pound_rate = $row['pound_rate'];

}
}
?>