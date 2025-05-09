<?php
$servername = "localhost";
$username = "root";
$password = ""; // change this if you use a different password
$dbname = "grocery_store";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['number'];
$quantity = $_POST['quantity'];
$product = $_POST['product'];
$address = $_POST['address'];

// Insert into database
$sql = "INSERT INTO orders (name, email, phone_number, quantity, product_name, address)
        VALUES ('$name', '$email', '$phone', '$quantity', '$product', '$address')";

if ($conn->query($sql) === TRUE) {
    echo "Order placed successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
