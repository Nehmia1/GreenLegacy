<!-- login.php -->
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <h1>Login</h1>
    <form action="process_login.php" method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="submit" value="Log in">
    </form>
    <p>Don't have an account? <a href="signup.php">Sign up</a></p>
  </div>
</body>
</html>
