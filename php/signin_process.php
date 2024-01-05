<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodzone";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process signin form submission
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $username = $_GET["username"];
    $password = $_GET["password"];

    // Perform input validation and data sanitization as per your requirements

    // Retrieve user data from the database
    $sql = "SELECT * FROM users_table WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Signin successful, redirect to the home page
        header("Location:index.html");
        exit();
    } else {
        // Signin failed, display error message or redirect to an error page
        echo "Invalid username or password.";
    }
}

$conn->close();
?>
