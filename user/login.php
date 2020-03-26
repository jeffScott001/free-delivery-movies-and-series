<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/be994c5cbf.js" crossorigin="anonymous"></script>
    <title>ScottMovies</title>
</head>
<body class="body-login">
    <?php
    include ("../inc/navbar.php");
    ?>
    <div class="background-login">
        <div class="login-container">
          <h2 class="login"><i class="fas fa-sign-in-alt"></i> Sign in</h2>
          <p id="success-msg" class="<?php if(isset($_GET['registration_msg'])) { echo 'success-msg';} ?>"><?php if(isset($_GET['registration_msg'])) { echo 'Account successfully created!';} ?></p>
          <p id="error-msg-login" class="<?php if(isset($_GET['null_fields'])) { echo 'error-msg-login';} ?>"><?php if(isset($_GET['null_fields'])) { echo 'Fill All Fields!';} ?></p>
          <p id="error-msg-login2" class="<?php if(isset($_GET['email_error_msg'])) { echo 'error-msg-login';} ?>"><?php if(isset($_GET['email_error_msg'])) { echo 'Email Does not Exist!';} ?></p>
          <p id="error-msg-login3" class="<?php if(isset($_GET['password_error'])) { echo 'error-msg-login';} ?>"><?php if(isset($_GET['password_error'])) { echo 'Wrong Password!';} ?></p>
          <form method="POST" action="../auth/login.php"  class="form-group-login">
            <label class="email">Email</label>
            <input class="email-input" type="email" value="<?php if(isset($_GET['email'])) { echo !empty($_GET['email']) ? $_GET['email'] : '';} ?>" name="email" placeholder="Enter your email" />
            <label class="password">Password</label>
            <input class="password-input" type="password" value="" name="password" placeholder="Enter password" />
            <input type="submit" value="Log in" class="btn-submit" />
          </form>
          <div class="links">
            <a class="link" href="http://localhost/online_freedelivery_movies_series/user/register.php">Don't have an account?</a>
          </div>
        </div>
      </div>
      <script src="../js/login.js"></script>
</body>
</html>