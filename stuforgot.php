<?php
session_start();
error_reporting(0);
include("/xampp/htdocs/webbeast/public/include/database-connection.php");
//Checking Details for reset password
if(isset($_POST['submit'])){
$email=$_POST['email'];
$contact=$_POST['contact'];
$query=mysqli_query($conn,"SELECT id from student where email='$email' and contact='$contact'");
$row=mysqli_num_rows($query);
if($row>0){

$_SESSION['contact']=$contact;
$_SESSION['email']=$email;
header('location:stupass.php');
} else {
echo "<script>alert('Invalid details. Please try with valid details');</script>";
echo "<script>window.location.href ='forgot-password.php'</script>";


}

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Password Recovery</title>


  <link rel="stylesheet" href="/public/css/css/pass.css">

</head>

<body>
  <div class="mainDiv">
    <div class="cardStyle">
      <form action="" method="post" name="signupForm" id="signupForm">


        <h2 class="formTitle">
        JBS | User Password Recovery
        </h2>
        <figure><img src="/public/images/password.png" alt="sing up image"></figure>

        <div class="inputDiv">
          <label class="inputLabel" for="email">Registered Email</label>
          <input type="email" id="email" name="email" required>
        </div>

        <div class="inputDiv">
          <label class="inputLabel" for="contact">Registered Contact number</label>
          <input type="number" id="contact" name="contact" required>
        </div>

        <div class="buttonWrapper">
          <button type="submit" id="submit" name="submit" class="submitButton pure-button pure-button-primary">
            <span>Reset Password</span>
          </button>
        </div>

        <div class="new-account">
 						Already have an account?
 						<a href="stulogin.php"> Log-in </a>
 					</div>

           <div class="copyright">
 					&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> JBS</span>.
 					<span>All rights reserved</span>
 				</div>

      </form>
    </div>
  </div>
</body>