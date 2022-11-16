<?php
session_start();
//error_reporting(0);
include("/xampp/htdocs/WebBeast/public/include/database-connection.php");
if (isset($_POST['submit'])) {
  $ret = mysqli_query($conn, "SELECT * FROM users WHERE email='" . $_POST['email'] . "' and password='" . md5($_POST['password']) . "'");
  $num = mysqli_fetch_array($ret);
  if ($num > 0) {
    $extra = "dashboard.php"; //
    $_SESSION['login'] = $_POST['email'];
    $_SESSION['id'] = $num['id'];
    $host = $_SERVER['HTTP_HOST'];
    $uip = $_SERVER['REMOTE_ADDR'];
    $status = 1;
    // For stroing log if user login successfull
    $log = mysqli_query($conn, "insert into userlog(uid,usermail,userip,status) values('" . $_SESSION['id'] . "','" . $_SESSION['login'] . "','$uip','$status')");
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    header("location:http://$host$uri/$extra");
    exit();
  } else {
    // For stroing log if user login unsuccessfull
    $_SESSION['login'] = $_POST['email'];
    $uip = $_SERVER['REMOTE_ADDR'];
    $status = 0;
    mysqli_query($conn, "insert into userlog(usermail,userip,status) values('" . $_SESSION['login'] . "','$uip','$status')");
    $_SESSION['errmsg'] = "Invalid usermail or password";
    $extra = "SignIn.php";
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
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User SignIn</title>

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
            <a href="SignUp.php" class="signup-image-link">Create an account</a>
          </div>

          <div class="signin-form">
            <h2 class="form-title">Sign In</h2>
            <form method="POST" class="register-form" id="login-form">
              <div class="form-group">
                <label for="usermail"><i class="zmdi zmdi-account material-icons-name"></i></label>
                <input type="text" name="usermail" id="usermail" placeholder="Usermail" />
              </div>
              <div class="form-group">
                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                <input type="password" name="password" id="password" placeholder="Password" />

                <h1></h1>
                <a href="forgot-password.php"> Forgot Password ? </a>
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
      <div class="copyright">
        &copy; <span class="current-year"></span><span class="text-bold text-uppercase"> JBS</span>. <span>All rights reserved</span>
      </div>
    </section>
  </div>
</body>