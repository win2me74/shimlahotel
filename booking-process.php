<?php
// Database connection details
$servername = "localhost";
$username = "root";  // Update this with your MySQL username
$password = "";      // Update this with your MySQL password
$dbname = "shimla_hotel"; // The database name

// Create connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve form data
    $guest_name = mysqli_real_escape_string($conn, $_POST['guest_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $room_type = mysqli_real_escape_string($conn, $_POST['room_type']);
    $checkin_date = mysqli_real_escape_string($conn, $_POST['checkin_date']);
    $checkout_date = mysqli_real_escape_string($conn, $_POST['checkout_date']);

    // Validate the input fields
    if (empty($guest_name) || empty($email) || empty($phone) || empty($room_type) || empty($checkin_date) || empty($checkout_date)) {
        echo "All fields are required. Please fill out the form completely.";
        exit();
    }

    // Insert the booking details into the database
    $sql = "INSERT INTO bookings (guest_name, email, phone, room_type, checkin_date, checkout_date)
            VALUES ('$guest_name', '$email', '$phone', '$room_type', '$checkin_date', '$checkout_date')";

    if ($conn->query($sql) === TRUE) {
        echo "Booking successful! Your booking has been confirmed.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
