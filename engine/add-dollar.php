<?php
require 'configure.php';
$dollar_rate = mysqli_real_escape_string($conn,$_POST['dollar_rate']);
if (!empty($dollar_rate)) {
$dollar = mysqli_query($conn,"UPDATE dollar_rate SET dollar_rate ='".htmlspecialchars($dollar_rate)."'");
if ($dollar) {
	echo "1";
}
else{
echo "Dollar rate was not updated";
}
}

?>