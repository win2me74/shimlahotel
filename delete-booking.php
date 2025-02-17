<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shimla_hotel";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $booking_id = $_GET['id'];
    
    // Delete the booking record
    $sql = "DELETE FROM bookings WHERE booking_id=$booking_id";

    if ($conn->query($sql) === TRUE) {
        echo "Booking deleted successfully.";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
