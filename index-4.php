<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hotel_id = $_POST['hotel_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Here you would normally save the booking details to the database
    echo "<h1>Booking Confirmed!</h1>";
    echo "<p>Thank you, $name! Your booking for hotel ID $hotel_id has been confirmed.</p>";
} else {
    echo "Invalid request.";
}
?>
