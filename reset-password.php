<?php
session_start();
//error_reporting(0);
include("/xampp/htdocs/WebBeast/public/include/database-connection.php");
// Code for updating Password
if (isset($_POST['change'])) {
    $contact = $_SESSION['contact'];
    $email = $_SESSION['email'];
    $newpassword = md5($_POST['password']);
    $query = mysqli_query($conn, "update users set password='$newpassword' where contact='$contact' and email='$email'");
    if ($query) {
        echo "<script>alert('Password successfully updated.');</script>";
        echo "<script>window.location.href ='SignIn.php'</script>";
    }

    $_SESSION['errmsg'] = "Invalid usermail or password";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password Reset</title>

    <script type="text/javascript">
        function valid() {
            if (
                document.passwordreset.password.value !=
                document.passwordreset.password_again.value
            ) {
                alert(
                    "Password and Confirm Password Field do not match  !!"
                );
                document.passwordreset.password_again.focus();
                return false;
            }
            return true;
        }
    </script>

    <!-- Main css -->
    <link rel="stylesheet" href="/public/css/css/pass.css" />
</head>

<body>
    <div class="mainDiv">
        <div class="cardStyle">
            <h2 class="formTitle">JBS | Change Password</h2>

            <figure>
                <img src="/public/images/password.png" alt="lock image" />
            </figure>

            <div class="box-login">
                <form class="inputDiv" name="passwordreset" method="post" onSubmit="return valid()" ;>

                    <div class="form-group">
                        <label class="inputLabel" for="password">New Password</label>
                        <input type="password" class="form-control" id="password" name="password" required />
                    </div>

                    <div class="form-group">
                        <label class="inputLabel" for="password_again">Confirm Password</label>
                        <input type="password" class="form-control" id="password_again" name="password_again" required />
                    </div>

                    <div class="buttonWrapper">
                        <button type="submit" class="submitButton pure-button pure-button-primary" name="change">Change
                            <i class="fa fa-arrow-circle-right"></i>
                        </button>
                    </div>
                    <div class="new-account">
                        Already have an account?
                        <a href="SignIn.php">
                            Log-in
                        </a>
                    </div>
                </form>

            </div>
        </div>
        <div class="copyright">
            &copy; <span class="current-year"></span><span class="text-bold text-uppercase"> JBS</span>. <span>All rights reserved</span>
        </div>
</body>
<!-- end: BODY -->