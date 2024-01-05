<?php
// Database connection details
$host = 'localhost';
$dbname = 'foodzone';
$username = 'root';
$password = '';

// Establish a database connection
try {
  $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
  exit();
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $position = $_POST['position'];

  // Prepare and execute the SQL query
  $stmt = $conn->prepare("INSERT INTO job_applications (name, email, phone, position) VALUES (:name, :email, :phone, :position)");
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':phone', $phone);
  $stmt->bindParam(':position', $position);
  $stmt->execute();

  // Display success message
  echo "<h2>Registration successful!</h2>";
  echo "<p>Thank you for applying for the job.</p>";
}
?>