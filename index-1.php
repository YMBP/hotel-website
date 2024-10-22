<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch hotels from the database
$sql = "SELECT * FROM hotels";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Welcome to Our Hotel Booking Site</h1>
    </header>

    <main>
        <div class="hotel-list">
            <?php
            if ($result->num_rows > 0) {
                // Output data for each hotel
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='hotel'>";
                    echo "<img src='" . $row["image_url"] . "' alt='" . $row["name"] . "'>";
                    echo "<h2>" . $row["name"] . "</h2>";
                    echo "<p>" . $row["description"] . "</p>";
                    echo "<p>Location: " . $row["location"] . "</p>";
                    echo "<p>Price: $" . $row["price"] . " per night</p>";
                    echo "<a href='booking.php?id=" . $row["id"] . "'>Book Now</a>";
                    echo "</div>";
                }
            } else {
                echo "No hotels available.";
            }
            $conn->close();
            ?>
        </div>
    </main>
</body>
</html>
