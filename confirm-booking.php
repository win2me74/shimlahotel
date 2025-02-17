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
    
    // Update the booking status to "Confirmed"
    $sql = "UPDATE bookings SET status='Confirmed' WHERE booking_id=$booking_id";

    if ($conn->query($sql) === TRUE) {
        echo "Booking confirmed successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
