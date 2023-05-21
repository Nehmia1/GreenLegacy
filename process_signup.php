<!-- process_signup.php -->
<?php
// Connect to the database
$host = "localhost";  // Your database host
$dbname = "myloginapp";  // Your database name
$username = "root";  // Your database username
$password = "";  // Your database password

try {
  $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}

// Retrieve form
