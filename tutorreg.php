<?php
include("/xampp/htdocs/webbeast/public/include/database-connection.php");
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $type = $_POST['type'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $state = $_POST['state'];
    $edu =$_POST['edu'];
    $mode = $_POST['mode'];
    $contact = $_POST['contact'];

    $sql= mysqli_query($conn,"INSERT INTO tutor (name,email,password,type,age,address,state,edu,mode,contact) values('$name','$email','$password','$type','$age','$address','$state','$edu','$mode','$contact')");
    
    if ($sql) {
        echo "<script>alert('Successfully Registered. You can login now');</script>";
    }

    else{
        echo "<script>alert('Error! Try Again.');</script>";
    }

  
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tutor Application</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="/public/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="/public/css/css/style.css">

    <script type="text/javascript">
        function valid() {
            if (document.register.password.value != document.register.re_pass.value) {
                alert("Password and Confirm Password Field do not match  !!");
                document.register.password_again.focus();
                return false;
            }
            return true;
        }
    </script>
</head>

<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Tutor Application</h2>
                        <form name="register" method="post" class="register-form" id="register-form">
                            <h3>Personal Details</h3>
                            <fieldset>
                                <br>
                                <div class="form-group">
                                    <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                    <input type="text" name="name" id="name" placeholder="Your Name" required="required" />
                                </div>
                                <div class="form-group">
                                    <label for="email"><i class="zmdi zmdi-email"></i></label>
                                    <input type="email" name="email" id="email" placeholder="Your Email" required="required" onBlur="userAvailability()"/>
                                    <span id="user-availability-status1" style="font-size:12px;"></span>
                                </div>

                                <div class="form-group">
                                    <label for="contact"><i class="zmdi zmdi-phone"></i></label>
                                    <input type="number" name="contact" id="contact" placeholder="Your Contact Number" required="required" size="10" />
                                </div>

                                <div class="form-group">
                                    <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                    <input type="password" name="password" id="password" placeholder="Password" required="required" />
                                </div>

                                <div class="form-group">
                                    <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                    <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" required="required" onchange="return valid();"/>
                                </div>

                                <div class="form-group">
                                    <label for="age">
                                        <i class="zmdi zmdi-time-interval"></i>
                                    </label>
                                    <input type="number" name="age" id="age" placeholder="Your Age" required="required"/>
                                </div>
                                <div class="form-group">
                                    <label for="gender"> <i class="zmdi zmdi-book"></i> Choose your gender:</label> <br> <br>
                                    <select name="gender" id="gender" required="required">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <textarea name="address" cols="25" rows="5" required="required">Your Address</textarea>
                                </div>

                                <div class="form-group">
                                    
                                    <select name="state" class="form-control" required="required">
                                        <option value="">Select State</option>
                                        <?php $ret = mysqli_query($conn, "select * from states");
                                        while ($row = mysqli_fetch_array($ret)) {
                                        ?>
                                            <option value="<?php echo htmlentities($row['state']); ?>">
                                                <?php echo htmlentities($row['state']); ?>
                                            </option>
                                        <?php } ?>

                                    </select>
                                </div>
                                <br>
                            </fieldset>

                            <h3>Education</h3>
                            <fieldset>
                                <br>
                                <div class="form-group">
                                    <label for="type"><i class="zmdi zmdi-case"></i> Choose the type of your school:</label> <br><br>
                                    <select name="type" id="type" required="required">
                                        <option value="primary">Primary</option>
                                        <option value="Secondary">Secondary</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="school"><i class="zmdi zmdi-library"></i></label>
                                    <input type="text" name="edu" id="edu" placeholder="Your Education" required="required" />
                                </div>



                                <div class="form-group">
                                    <label for="class mode"> <i class="zmdi zmdi-book"></i> Choose the class mode you prefer:</label> <br> <br>
                                    <select name="mode" id="mode" required="required">
                                        <option value="online">Online</option>
                                        <option value="physical">Physical</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                   
                                    <select name="subject class=" form-control required="required">
                                        <option value="">Select Subject</option>
                                        <?php $ret = mysqli_query($conn, "select * from subject");
                                        while ($row = mysqli_fetch_array($ret)) {
                                        ?>
                                            <option value="<?php echo htmlentities($row['subject']); ?>">
                                                <?php echo htmlentities($row['subject']); ?>
                                            </option>
                                        <?php } ?>

                                    </select>
                                </div>

                                <br>
                            </fieldset>
                            <br>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <button type="submit" name="submit" id="submit" class="form-submit">Send Application</button>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="/public/images/tutor.png" alt="sing up image"></figure>
                        <a href="tutorlog.php" class="signup-image-link">I am already a tutor</a>
                    </div>
                </div>
            </div>
            <div class="copyright">
        &copy; <span class="current-year"></span><span class="text-bold text-uppercase"> JBS</span>.
        <span>All rights reserved</span>
    </div>
        </section>



    </div>

    <!-- JS -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/public/assets/js/main.js"></script>

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