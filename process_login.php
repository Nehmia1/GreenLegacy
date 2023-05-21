<!-- process_login.php -->
<?php
// Connect to the database
$host = "localhost";  // Your database host
$dbname = "green_legacy";  // Your database name
$username = "root";  // Your database username
$password = "";  // Your database password

try {
  $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}

// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password'];

// Check if the provided username and password match
$stmt = $db->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);
$stmt->execute();
$rowCount = $stmt->rowCount();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($rowCount > 0) {
  // Login successful, start the session and redirect to dashboard.php
  session_start();
  $_SESSION['user_id'] = $user['id'];
  $_SESSION['username'] = $user['username'];
  header("Location: index.html");
  exit();
} else {
  // Login failed, redirect to login.php with an error message
  header("Location: login.php?error=login_failed");
  exit();
}
