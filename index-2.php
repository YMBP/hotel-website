<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get hotel ID from URL
$id = $_GET['id'];
$sql = "SELECT * FROM hotels WHERE id = $id";
$result = $conn->query($sql);
$hotel = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking - <?php echo $hotel['name']; ?></title>
</head>
<body>
    <h1>Booking for <?php echo $hotel['name']; ?></h1>
    <p>Location: <?php echo $hotel['location']; ?></p>
    <p>Price: $<?php echo $hotel['price']; ?> per night</p>
    
    <form action="confirm_booking.php" method="POST">
        <input type="hidden" name="hotel_id" value="<?php echo $hotel['id']; ?>">
        <label for="name">Your Name:</label>
        <input type="text" name="name" required>
        
        <label for="email">Your Email:</label>
        <input type="email" name="email" required>
        
        <button type="submit">Confirm Booking</button>
    </form>
</body>
</html>
