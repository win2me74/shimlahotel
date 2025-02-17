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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $guest_name = $_POST['guest_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $room_type = $_POST['room_type'];
    $checkin_date = $_POST['checkin_date'];
    $checkout_date = $_POST['checkout_date'];

    // Insert booking data into the database
    $sql = "INSERT INTO bookings (guest_name, email, phone, room_type, checkin_date, checkout_date)
            VALUES ('$guest_name', '$email', '$phone', '$room_type', '$checkin_date', '$checkout_date')";

    if ($conn->query($sql) === TRUE) {
        echo "Booking successfully made!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Your Room - Shimla Luxury Hotel</title>
</head>
<body>
    <h1>Room Booking Form</h1>
    <form action="booking-form.php" method="POST">
        <label for="guest_name">Full Name:</label><br>
        <input type="text" id="guest_name" name="guest_name" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phone">Phone Number:</label><br>
        <input type="text" id="phone" name="phone" required><br><br>

        <label for="room_type">Room Type:</label><br>
        <select id="room_type" name="room_type" required>
            <option value="Deluxe Room">Deluxe Room</option>
            <option value="Suite Room">Suite Room</option>
            <option value="Presidential Suite">Presidential Suite</option>
        </select><br><br>

        <label for="checkin_date">Check-in Date:</label><br>
        <input type="date" id="checkin_date" name="checkin_date" required><br><br>

        <label for="checkout_date">Check-out Date:</label><br>
        <input type="date" id="checkout_date" name="checkout_date" required><br><br>

        <button type="submit">Confirm Booking</button>
    </form>
</body>
</html>
