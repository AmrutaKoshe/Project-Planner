<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Planner</title>
    <link rel="stylesheet" href="css/Register.css">
  </head>
  <body>
    <div class="wrapper">
      <div class="title">Register Form</div>
      <form action="registeration.php" method="post">
        <div class="field">
          <input type="text" name="full_name" required>
          <label>Name</label>
        </div>
        <div class="field">
          <input type="text" name="username" required>
          <label>Username</label>
        </div>
        <div class="field">
          <input type="password" name="password" required>
          <label>Password</label>
        </div>
<!-- <div class="content">
          <div class="checkbox">
            <input type="checkbox" id="remember-me">
            <label for="remember-me">Remember me</label>
          </div>
<div class="pass-link">
<a href="#">Forgot password?</a></div>
</div> -->
        <div class="field" id="log"><input type="submit" value="Register"></div>
        <div class="signup-link">Already a member? <a href="login.php">Login now</a></div>
</form>
</div>
</body>
</html>
