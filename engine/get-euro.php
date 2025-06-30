<?php
require 'configure.php';
$getEuro = mysqli_query($conn,"select euro_rate from euro_rate");
if ($getEuro) { while ($row = mysqli_fetch_array($getEuro)) {
$euro_rate = $row['euro_rate'];

}
}
?>