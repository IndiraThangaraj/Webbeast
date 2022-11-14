<?php
session_start();
error_reporting(0);
include("/xampp/htdocs/webbeast/public/include/database-connection.php");
if (isset($_POST['submit'])) {
    $ret = mysqli_query($conn, "SELECT * FROM tutor WHERE email='" . $_POST['email'] . "' and password='" . md5($_POST['password']) . "'");
    $num = mysqli_fetch_array($ret);
    if ($num > 0) {
        $extra = "dashboard.php";
        $_SESSION['login'] = $_POST['email'];
        $_SESSION['id'] = $num['id'];
        $host = $_SERVER['HTTP_HOST'];
        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 1;
        // For stroing log if user login successfull
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        exit();
    } else {
        $_SESSION['login'] = $_POST['email'];
        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 0;
        $_SESSION['errmsg'] = "Invalid username or password";
        $extra = "tutorlog.php";
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tutor Login</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="/public/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="/public/css/css/style.css">
</head>

<body>


    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="/public/images/tutorlog.png" alt="sing up image"></figure>
                    <a href="tutorreg.php" class="signup-image-link">Apply now</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Tutor Login</h2>
                    <span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg'] = ""; ?></span>
                    <form name="login" method="post" class="register-form" id="login-form">
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="text" name="email" id="email" placeholder="Your Email" />
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="password" placeholder="Password" />
                        </div>
                        <div class="form-group">
                            <a href="tutorforgot.php" class="signup-image-link">Forgot Password</a>
                        </div>
                        <div class="form-group form-button">
                        <button type="submit" name="submit" id="submit" class="form-submit" value="Log in"> Log In </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="copyright">
        &copy; <span class="current-year"></span><span class="text-bold text-uppercase"> JBS</span>.
        <span>All rights reserved</span>
    </div>
    </section>

</body>