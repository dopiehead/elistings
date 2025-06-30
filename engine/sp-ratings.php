<?php session_start();
    require 'configure.php';
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    // Check if there are existing ratings for the email
    $check = mysqli_query($conn,"SELECT * FROM sp_rating WHERE email = '" . $email . "'");
   
        if ($check->num_rows > 0) {
            // Delete all ratings for the email
            $delete = mysqli_query($conn, "DELETE FROM sp_rating WHERE email = '" . $email . "'");
            if ($delete) {
                // Update ratings to -1 for the service provider
                $update_ratings = mysqli_query($conn, "UPDATE service_providers SET ratings = -1 WHERE sp_id = '" . $id . "'");
                if ($update_ratings) {
                    echo "Rating has been removed";
                } else {
                    echo "Error updating ratings: " . mysqli_error($conn);
                }
            } else {
                echo "Error deleting ratings: " . mysqli_error($conn);
            }
        } else {
            // Insert new rating record for the email
            $insert = mysqli_query($conn, "INSERT INTO sp_rating(email) VALUES ('" . $email . "')");
            if ($insert) {
                // Update ratings to +1 for the service provider
                $update_ratings = mysqli_query($conn, "UPDATE service_providers SET ratings = ratings + 1 WHERE sp_id = '" . $id . "'");
                if ($update_ratings) {
                    echo "1";
                } else {
                    echo "Error updating ratings: " . mysqli_error($conn);
                }
            } else {
                echo "Error inserting rating: " . mysqli_error($conn);
            }
        }
    

?>
