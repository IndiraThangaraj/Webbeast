<?php
session_start();
error_reporting(0);
include("/xampp/htdocs/webbeast/public/include/database-connection.php");
// Code for updating Password
if (isset($_POST['submit'])) {
  $contact = $_SESSION['contact'];
  $email = $_SESSION['email'];
  $password = md5($_POST['password']);
  $query = mysqli_query($conn, "UPDATE student set password='$password' where contact='$contact' and email='$email'");
  if ($query) {
    echo "<script>alert('Password successfully updated.');</script>";
    echo "<script>window.location.href ='stulogin.php'</script>";
  }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Change Password</title>

  <!-- Font Icon -->
  <link rel="stylesheet" href="/public/fonts/material-icon/css/material-design-iconic-font.min.css">

  <!-- Main css -->
  <link rel="stylesheet" href="/public/css/css/pass.css">

  <script type="text/javascript">
    function valid() {
      if (document.changepass.password.value != document.changepass.password_again.value) {
        alert("Password and Confirm Password Field do not match  !!");
        document.changepass.password_again.focus();
        return false;
      }
      return true;
    }
  </script>
</head>

<body>


  <div class="mainDiv">
    <div class="cardStyle">
      <form name="changepass" method="post" id="changepass" onSubmit="return valid();">

        <h2 class="formTitle">
          JBS | Change Password
        </h2>

        <figure><img src="/public/images/password.png" alt="sing up image"></figure>
        <div class="inputDiv">
          <label class="inputLabel" for="password">New Password</label>
          <input type="password" id="password" name="password" required>
        </div>

        <div class="inputDiv">
          <label class="inputLabel" for="password_again">Confirm Password</label>
          <input type="password" id="password_again" name="password_again">
        </div>

        <div class="buttonWrapper">
          <button type="submit" id="submit" name="submit" class="submitButton pure-button pure-button-primary">
            <span>Submit</span>

          </button>
        </div>

        <div class="copyright">
          &copy; <span class="current-year"></span><span class="text-bold text-uppercase"> JBS</span>.
          <span>All rights reserved</span>
        </div>

      </form>
    </div>
  </div>
</body>