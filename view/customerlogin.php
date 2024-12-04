<?php
include_once('../settings/core.php');

redirect_if_logged_in();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/login-register.css" type="text/css" />
  <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins&amp;display=swap'>
  <script src="../js/login.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <title>Log-in Page</title>
</head>

<body id="page-top" class="index">

  <label class="dayNight">
    <input type="checkbox">
    <div></div>
  </label>
  <div class="wrapper">
    <div class="login-box">
      <div class="login-header">
        <span>Login</span>
      </div>
      <form id="loginForm" method="POST">
        <div class="input-box">
          <input autocomplete="on" type="text" id="email" placeholder="Email" required class="input-field">
          <i class="bx bx-envelope icon"></i>
          <div id="emailError" class="error-message"></div>
        </div>
        <div class="input-box">
          <input autocomplete="off" type="password" id="password" placeholder="Password" required class="input-field">
          <i class="bx bx-lock-alt icon" id="show-password"></i>
          <div id="passwordError" class="error-message"></div>
        </div>
        <div class="remember-forgot">
          <div id="remember-me"></div>
          <div class="forgot">
            <a href="#">Forgot password</a>
          </div>
        </div>
        <button type="submit" class="input-submit">Login</button>
        <div class="register">
          <span>Don't have an account?</span>
        </div>
        <button type="button" onclick="location.href='Register_customer.php'" class="input-submit">Create Account</button>
      </form>
    </div>
  </div>
  <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
  <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
    $('.dayNight input').change(function () {
      $('body').toggleClass('day', $(this).is(':checked'))
    });
  </script>
</body>
</html>
