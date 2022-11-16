<?php
session_start();
#error_reporting(0);
include("/xampp/htdocs/WebBeast/public/include/database-connection.php");
//Checking Details for reset password
if (isset($_POST['submit'])) {
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $query = mysqli_query($conn, "select id from users where email='$email' and contact='$contact'");
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


            </div>
        </div>
        <div class="copyright">
            &copy; <span class="current-year"></span><span class="text-bold text-uppercase"> JBS</span>.
            <span>All rights reserved</span>
        </div>
    </div>
</body>