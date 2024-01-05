<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $orderId = $_POST['order_id'];
    $location = $_POST['location'];

    // TODO: Validate and sanitize the form data

    // Create a database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "foodzone";

    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL statement to insert the data into the database
    $stmt = $conn->prepare("INSERT INTO donations (name, phone, order_id, location) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $phone, $orderId, $location);
    $stmt->execute();

    // Check if the insertion was successful
    if ($stmt->affected_rows > 0) {
        echo "Donation recorded successfully.";
    } else {
        echo "Error recording donation.";
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
}
?>
