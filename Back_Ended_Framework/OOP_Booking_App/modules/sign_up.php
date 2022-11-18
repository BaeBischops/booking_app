<?php
ob_start();
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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Register</title>
  </head>
  <body class="bg-secondary">
    <div class="container">
      <h2>Property Rentals</h2>
      <div class="row">
        <h3 class="mb-0 my-2">Sign Up</h3>
                        </div>
                        <div class="form-group">
                            <a  href="index.php" class="btn btn-dark">Home</a>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" autocomplete="off" id="registration-form" method="post">
                                <div class="form-group">
                                    <label for="registrationFullName">Name<span class="red-asterisk">*</span></label>
                                    <input type="text" class="form-control" id="registrationFullName" name="registrationFullName" placeholder="Full name">
                                </div>
                                <div class="form-group">
                                    <label for="registrationEmail">Email<span class="red-asterisk">*</span></label> 
                                    <input type="email" class="form-control" id="registrationEmail" name="registrationEmail" placeholder="email@domain.com" required>
                                </div>
                                <div class="form-group">
                                    <label for="registrationPassword">Password<span class="red-asterisk">*</span></label>
                                    <input type="password" class="form-control" id="registrationPassword" name="registrationPassword" placeholder="password" title="At least 4 characters with letters and numbers" required>
                                </div>
                                <div class="form-group">
                                    <label for="registrationPassword2">Confirm Password<span class="red-asterisk">*</span></label>
                                    <input type="password" class="form-control" id="registrationPassword2" name="registrationPassword2" placeholder="Retype Password" required>
                                </div>
                                <div class="form-group">
                                    <p>Already registered? <a href="sign-in.php">Sign in here.</a></p>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-md float-right" name="registerSubmitBtn" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="js/form-submission.js"></script>
  </body>
</html>