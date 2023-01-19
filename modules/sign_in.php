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
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/logging.css">
  <script src="https://kit.fontawesome.com/d6c47f4f0c.js" crossorigin="anonymous"></script>
  <title>Sign in</title>
</head>
<body>
  <div class="form-group">
    <a  href="index.php" class="btn btn-dark">Home</a>
  </div>
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">

        <div class="login100-pic js-tilt" data-tilt><img src="../imgs/img1.jpg" alt="IMG"></div>
        <form class="login100-form validate-form" action="" method="post">
          <span class="login100-form-title">Member Login</span>

          <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" name="email" placeholder="Email">
            <span class="focus-input100"></span>
            <span class="symbol-input100"> <i class="fa fa-envelope" aria-hidden="true"></i> </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Password is required">
            <input class="input100" type="password" name="pass" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100"> <i class="fa fa-lock" aria-hidden="true"></i> </span>
          </div>
            
          <div class="container-login100-form-btn">
            <button class="login100-form-btn">Login</button>
          </div>

          <div class="text-center p-t-12">
            <span class="txt1">Forgot</span><a class="txt2" href="forgot.php">Username / Password?</a>
          </div>

          <div class="text-center p-t-136">
            <a class="txt2" href="sign_Up.php">Create your Account</a>
          </div>
        </form>

      </div>
    </div>
  </div>
               
  <script src="js/form-submission.js"></script>
</body>
</html>