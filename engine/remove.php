<?php
include 'configure.php';
$id = mysqli_real_escape_string($conn,$_POST['id']);
$buyer = mysqli_real_escape_string($conn, $_POST['buyer']);
$query = mysqli_query($conn, "delete from cart where (buyer ='".htmlspecialchars($buyer)."')");
if ($query) {
        session_start();
        unset($_SESSION['itemId']);
        unset($_SESSION['noofItem']);
        unset($_SESSION['location']);
        echo "1";
    } 

    else {
        echo "Failed to delete item(s) from the cart";

        echo mysqli_error($query);
    }

?>

