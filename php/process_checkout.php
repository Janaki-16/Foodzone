<?php
// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];

// Database connection (adjust the credentials as needed)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodzone";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement
$sql = "INSERT INTO checkout (name, email, address) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
    // Bind the parameters and execute the statement
    $stmt->bind_param("sss", $name, $email, $address);
    if ($stmt->execute()) {
        echo "Order placed successfully!";
    } else {
        echo "Error: Unable to execute the query.";
    }
    $stmt->close();
} else {
    echo "Error: Unable to prepare the statement.";
}

$conn->close();
?>