<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "grocery_store";

// Connect to MySQL
$conn = new mysqli($host, $user, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get values from form
$email = $_POST['Email'];
$password = $_POST['Password'];

// Basic SQL to check login
$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Login successful!";
    // You can redirect using: header("Location: dashboard.php");
} else {
    echo "Invalid email or password.";
}

$conn->close();
?>
