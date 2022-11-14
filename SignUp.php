<?php
include("/xampp/htdocs/WebBeast/public/include/database-connection.php");
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['pass']);
    $contact = $_POST['contact'];

    $query = mysqli_query($conn, "insert into users (name,email,password,contact) values('$name','$email','$password','$contact')");
    if ($query) {
        echo "<script>alert('Successfully Registered. You can login now');</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User SignUp</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="/public/fonts/material-icon/css/material-design-iconic-font.css" />

    <!-- Main css -->
    <link rel="stylesheet" href="/public/css/css/style.css" />
</head>

<body>
    <div class="login">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign Up</h2>
                        <form method="POST" class="register-form" id="register-form" onSubmit="return valid()" ;>

                            <div class="form-group">
                                <label for="name">
                                    <i class="zmdi zmdi-account material-icons-name"></i>
                                </label>
                                <input type="text" name="name" id="name" placeholder="Name" />

                            </div>
                            <div class="form-group">
                                <label for="email">
                                    <i class="zmdi zmdi-email"></i>
                                </label>
                                <input type="email" name="email" id="email" placeholder="Email" onBlur="userAvailability()" />

                                <span id="user-availability-status1" style="font-size: 12px">
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="contact">
                                    <i class="zmdi zmdi-phone"></i>
                                </label>
                                <input type="number" name="contact" id="contact" placeholder="Your Contact Number" required="required" size="12" />
                            </div>

                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
                                    statements in
                                    <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <button type="submit" name="submit" id="submit" class="form-submit" value="Register">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure>
                            <img src="/public/images/signup-image.jpg" alt="sing up image" />
                        </figure>
                        <a href="SignIn.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="copyright">
        &copy; <span class="current-year"></span><span class="text-bold text-uppercase"> JBS</span>.
        <span>All rights reserved</span>
    </div>
    <!-- JS -->
    <script src="/public/vendor/jquery/jquery.min.js"></script>
    <script src="/public/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/public/vendor/modernizr/modernizr.js"></script>
    <script src="/public/vendor/jquery-cookie/jquery.cookie.js"></script>
    <script src="/public/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/public/vendor/switchery/switchery.min.js"></script>
    <script src="/public/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="/public/assets/js/main.js"></script>
    <script src="/public/assets/js/login.js"></script>
    <script>
        jQuery(document).ready(function() {
            Main.init();
            Login.init();
        });
    </script>

    <script>
        function userAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_availability.php",
                data: "email=" + $("#email").val(),
                type: "POST",
                success: function(data) {
                    $("#user-availability-status1").html(data);
                    $("#loaderIcon").hide();
                },
                error: function() {},
            });
        }
    </script>
</body>

</html>