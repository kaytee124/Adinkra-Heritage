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
    <script src="../js/Registration.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Registration Page</title>
    
</head>


<body>
    <body id="page-top" class="index" data-pinterest-extension-installed="cr1.3.4">
        <label class="dayNight">
            <input type="checkbox">
            <div></div>
        </label>
        <div class="wrapper-register">
            <div class="login-box">
                <div class="login-header">
                    <span>Sign-Up</span>
                </div>
                <form id="registrationForm" onsubmit="createAccount(event)">
                    <div class="input-box">
                        <input autocomplete="on" type="text" id="fullName" name="fullName" placeholder="Full Name" required class="input-field">
                        <i class="bx bx-user icon"></i>
                        <div id="nameError" class="error-message"></div>
                    </div>
                    <div class="input-box">
                        <input type="email" id="email" name="email" placeholder="Enter your Email" required class="input-field">
                        <i class="bx bx-envelope icon"></i>
                        <div id="emailError" class="error-message"></div>
                    </div>
                    <div class="input-box">
                        <input type="password" id="newPassword" name="newPassword" placeholder="New Password" required class="input-field">
                        <i class="bx bx-lock-alt icon"></i>
                        <div id="passwordError" class="error-message"></div>
                    </div>
                    <div class="input-box">
                        <input type="password" id="rePassword" placeholder="Retype Password" required class="input-field">
                        <i class="bx bx-lock-alt icon"></i>
                        <div id="rePasswordError" class="error-message"></div>
                    </div>
                    <div class="input-box">
                        <input type="text" id="country" name="country" placeholder="Country" required class="input-field">
                        <i class="bx bx-world icon"></i>
                    </div>
                    <div class="input-box">
                        <input type="text" id="city" name="city" placeholder="City" required class="input-field">
                        <i class="bx bx-buildings icon"></i>
                    </div>
                    <div class="input-box">
                        <input type="text" id="phoneNumber" name="phoneNumber" placeholder="+233XXXXXXXXX" required class="input-field">
                        <i class="bx bx-phone icon"></i>
                        <div id="phoneError" class="error-message"></div>
                    </div>
                    <!-- Updated role input with dropdown -->
                    <div class="input-box">
                        <select name="userRole" id="userRole" class="input-field">
                            <option value="2">Customer</option>
                            <option value="1">Seller</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <input type="file" id="image" name="image" class="input-field">
                    </div>
                    <button type="submit" class="input-submit">Register</button>
                    <div class = "register">
                        <span>Already have an account?</span>
                    </div>
                    <button type="button" onclick="location.href='customerlogin.php'" class="input-submit">Login</button>
                </form>
            </div>
        </div>
        <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
        <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $('.dayNight input').change(function () {
            $('body').toggleClass('day', $(this).is(':checked'))
        });
    </script>

</body>
</html>
