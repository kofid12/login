<?php
require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM hotelbooking WHERE id = $id";

    if (mysqli_query($connect, $sql)) {
        echo "Booking deleted successfully";
    } else {
        echo "Error deleting booking: " . mysqli_error($connect);
    }
} else {
    echo "Invalid request";
}

mysqli_close($connect);
?>
