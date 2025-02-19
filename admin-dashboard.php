<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shimla_hotel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all bookings from the database
$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Shimla Luxury Hotel Booking</title>
</head>
<body>
    <h1>Admin Dashboard - View Bookings</h1>
    <h1> Booking Status </h1>
        <table border="1" cellpadding="10">
        <tr>
            <th>Booking ID</th>
            <th>Guest Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Room Type</th>
            <th>Check-in</th>
            <th>Check-out</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>

        <?php
        // Display bookings in table rows
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['booking_id'] . "</td>
                        <td>" . $row['guest_name'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . $row['phone'] . "</td>
                        <td>" . $row['room_type'] . "</td>
                        <td>" . $row['checkin_date'] . "</td>
                        <td>" . $row['checkout_date'] . "</td>
                        <td>" . $row['status'] . "</td>
                        <td>
                            <a href='confirm-booking.php?id=" . $row['booking_id'] . "'>Confirm</a> | 
                            <a href='delete-booking.php?id=" . $row['booking_id'] . "'>Delete</a>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No bookings found.</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
