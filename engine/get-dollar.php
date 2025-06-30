<?php
require 'configure.php';
$getDollar = mysqli_query($conn,"select dollar_rate from dollar_rate");
if ($getDollar) { while ($row = mysqli_fetch_array($getDollar)) {
$dollar_rate = $row['dollar_rate'];
}
}
?>