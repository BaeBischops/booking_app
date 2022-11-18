<?php
session_start();

if (isset($_SESSION["authenticated"]))
{
    if ($_SESSION["authenticated"] == "1")
    {
        header("Location: index.php");
    }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <title>Sign in</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <h3 class="mb-0 my-2">Property Rentals</h3>
      <div><a href="index.php" class="btn btn-dark">Home</a></div>
      <form class="form" role="form" autocomplete="off" id="login-form" method="post">
        <div class="form-group">
          <label for="loginEmail">Email <span class="red-asterisk">*</span></label>
          <input type="text" class="form-control" id="loginEmail" name="loginEmail" placeholder="email address" required>
        </div><br>
        <div class="form-group">
          <label for="loginPassword">Password <span class="red-asterisk">*</span></label>
          <input type="password" class="form-control" id="loginPassword" name="loginPassword" placeholder="password" required>
        </div><br>
        <div class="form-group">
          <input type="submit" class="btn btn-primary btn-md float-right" value="Sign in" name="loginSubmitBtn">
        </div>
      </form>
      <div class="form-group">
        <p>Not registered? <a href="register.php">Register here.</a></p>
    </div>
    </div>
  </div>
               
  <script src="js/form-submission.js"></script>
</body>
</html>