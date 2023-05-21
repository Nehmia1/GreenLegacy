<!-- process_signup.php -->
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

// Check if username already exists
$stmt = $db->prepare("SELECT * FROM users WHERE username = :username");
$stmt->bindParam(':username', $username);
$stmt->execute();
$rowCount = $stmt->rowCount();

if ($rowCount > 0) {
  // Username already exists, redirect to signup.php with an error message
  header("Location: signup.php?error=username_exists");
  exit();
}

// Insert new user into the database
$stmt = $db->prepare("INSERT INTO users (username, password, created_at) VALUES (:username, :password, NOW())");
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);

try {
  $stmt->execute();
  // User successfully registered, redirect to login.php with a success message
  header("Location: login.php?success=signup");
  exit();
} catch (PDOException $e) {
  die("Error: " . $e->getMessage());
}
