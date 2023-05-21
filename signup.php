<!-- signup.php -->
<!DOCTYPE html>
<html>
<head>
  <title>Sign Up</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <h1>Sign Up</h1>
    <form action="process_signup.php" method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="submit" value="Sign Up">
    </form>
    <p>Already have an account? <a href="login.php">Log in</a></p>
  </div>
</body>
</html>
