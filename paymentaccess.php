    
<?php

require 'engine/configure.php';

$days = 60;

$currentDate = new DateTime();

// Query to find subscriptions that expire within the specified number of days
$query = " SELECT user_id, 
           plan, 
           start_date,
           duration_months,
           DATE_ADD(start_date, INTERVAL duration_months MONTH) AS expiry_date
    FROM subscriptions 
    WHERE DATE_ADD(start_date, INTERVAL duration_months MONTH) 
        BETWEEN NOW() 
        AND DATE_ADD(NOW(), INTERVAL $days DAY)";
        

// Prepare the statement
$result = mysqli_query($conn, $query);

// Check if there are results
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        // Calculate remaining days until expiry
        $expiryDate = new DateTime($row['expiry_date']);
        $remainingDays = $expiryDate->diff($currentDate)->days;

        // Display warning message
        echo "User ID: " . htmlspecialchars($row['user_id']) . " - Your payment expires in " . $remainingDays . " days for the " . htmlspecialchars($row['plan']) . " plan.<br>";
    }
} else {
    echo "No subscriptions expiring soon.";
}

?>
