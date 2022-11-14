<?php
session_start();
#error_reporting(0);
include("/xampp/htdocs/WebBeast/public/include/database-connection.php");
//Checking Details for reset password
if (isset($_POST['submit'])) {
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $query = mysqli_query($con, "select id from users where email='$email' and contact='$contact'");
    $row = mysqli_num_rows($query);
    if ($row > 0) {

        $_SESSION['contact'] = $contact;
        $_SESSION['email'] = $email;
        header('location:reset-password.php');
    } else {
        echo "<script>alert('Invalid details. Please try with valid details');</script>";
        echo "<script>window.location.href ='forgot-password.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Password Recovery</title>

    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="/public/vendor/fontawesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/public/vendor/themify-icons/themify-icons.min.css" />
    <link href="/public/vendor/animate.css/animate.min.css" rel="stylesheet" media="screen" />
    <link href="/public/vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen" />
    <link href="/public/vendor/switchery/switchery.min.css" rel="stylesheet" media="screen" />
    <link rel="stylesheet" href="/public/assets/css/styles.css" />
    <link rel="stylesheet" href="/public/assets/css/plugins.css" />
    <link rel="stylesheet" href="/public/assets/css/themes/theme-1.css" id="skin_color" />

    <!-- Main css -->
    <link rel="stylesheet" href="/public/css/css/pass.css" />
</head>

<body>
    <div class="mainDiv">
        <div class="cardStyle">
            <h2 class="formTitle">JBS | User Password Recovery</h2>
            <figure>
                <img src="/public/images/password.png" alt="sing up image" />
            </figure>
            <div class="box-login">
                <form class="inputDiv" method="post">

                    <div class="inputDiv">
                        <label class="inputLabel" for="email">Registred Email</label>
                        <input type="email" class="form-control" name="email" />
                    </div>

                    <div class="form-group">
                        <label class="inputLabel" for="contact">Registred Contact Number</label>
                        <input type="text" class="form-control" name="contact" />
                    </div>

                    <div class="buttonWrapper">
                        <button type="submit" id="submitButton" class="submitButton pure-button pure-button-primary" name="submit">
                            <a href="reset-password.php"> Reset </a><i class="fa fa-arrow-circle-right"></i>
                        </button>
                    </div>
                    <div class="new-account">
                        Already have an account?
                        <a href="SignIn.php"> Log-in </a>
                    </div>
                </form>

                <div class="copyright">
                    &copy; <span class="current-year"></span><span class="text-bold text-uppercase"> JBS</span>.
                    <span>All rights reserved</span>
                </div>
            </div>
        </div>
    </div>

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
</body>