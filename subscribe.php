<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "grocery_store";

// Connect to MySQL
$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];

// Insert email if not already subscribed
$sql = "INSERT INTO subscribers (email) VALUES (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);

if ($stmt->execute()) {
    echo "Subscribed successfully!";
} else {
    echo "Already subscribed or error occurred.";
}

$stmt->close();
$conn->close();
?>
