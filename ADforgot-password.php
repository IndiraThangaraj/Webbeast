<?php
session_start();
#error_reporting(0);
include("/xampp/htdocs/WebBeast/public/include/database-connection.php");
//Checking Details for reset password
if (isset($_POST['submit'])) {
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $query = mysqli_query($conn, "select id from admin where contact='$contact' and email='$email'");
    $row = mysqli_num_rows($query);
    if ($row > 0) {

        $_SESSION['contact'] = $contact;
        $_SESSION['email'] = $email;
        header('location:ADreset-password.php');
    } else {
        echo "<script>alert('Invalid details. Please try with valid details');</script>";
        echo "<script>window.location.href ='ADforgot-password.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Password Recovery</title>


    <!-- Main css -->
    <link rel="stylesheet" href="/public/css/css/pass.css" />
</head>

<body class="mainDiv">
    <div class="cardStyle">
        <h2 class="formTitle"> JBS | Admin Password Recovery</h2></a>
        <figure>
            <img src="/public/images/password.png" alt="sing up image" />
        </figure>
        <div class="box-login">
            <form class="inputDiv" method="post">

                <div class="form-group">
                    <span class="inputLabel">
                        <input type="text" class="form-control" name="contact" placeholder="Registred Contact">
                        <i class="fa fa-lock"></i>
                    </span>
                </div>

                <div class="form-group">
                    <span class="inputLabel">
                        <input type="email" class="form-control" name="email" placeholder="Registred Email">
                        <i class="fa fa-user"></i> </span>
                </div>

                <div class="buttonWrapper">

                    <button type="submit" class="submitButton pure-button pure-button-primary" name="submit"><a href="ADreset-password.php">
                            Reset</a> <i class="fa fa-arrow-circle-right"></i>
                    </button>
                </div>
                <div class="new-account">
                    Already have an account?
                    <a href="ADSignIn.php">
                        Log-in
                    </a>
                </div>
            </form>


        </div>
        <div class="copyright">
            &copy; <span class="current-year"></span><span class="text-bold text-uppercase"> JBS</span>. <span>All rights reserved</span>
        </div>
    </div>
</body>