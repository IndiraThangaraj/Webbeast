<?php
session_start();
#error_reporting(0);
include("/xampp/htdocs/WebBeast/public/include/database-connection.php");
if (isset($_POST['submit'])) {
    $ret = mysqli_query($conn, "SELECT * FROM admin WHERE email='" . $_POST['email'] . "' and password='" . $_POST['password'] . "'");
    $num = mysqli_fetch_array($ret);
    if ($num > 0) {
        $extra = "dashboard.php"; //
        $_SESSION['login'] = $_POST['email'];
        $_SESSION['id'] = $num['id'];
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        exit();
    } else {
        $_SESSION['errmsg'] = "Invalid email or password";
        $extra = "index.php";
        $host  = $_SERVER['HTTP_HOST'];
        $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin-Login</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">

    <!-- Font Icon -->
    <link rel="stylesheet" href="/fonts/material-icon/css/material-design-iconic-font.min.css" />

    <!-- Main css -->
    <link rel="stylesheet" href="/public/css/css/style.css" />

</head>

<body>
    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure>
                            <img src="/public/images/signin-image.jpg" alt="sing up image" />
                        </figure>
                    </div>

                    
                    <div class="signin-form">
                        <h2 class="form-title">Sign In</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="email" id="email" placeholder="Email" />
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" />

                                <h1></h1>
                                <a href="ADforgot-password.php"> Forgot Password ? </a>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>

    </div>
    <div class="copyright">
        &copy; <span class="current-year"></span><span class="text-bold text-uppercase"> </span>. <span>All rights reserved</span>
    </div>

</body>
<!-- end: BODY -->

</html>