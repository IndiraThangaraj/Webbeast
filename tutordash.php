<?php
session_start();
//error_reporting(0);
include("/xampp/htdocs/webbeast/public/include/database-connection.php");
include('checklogin.php');
check_login();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tutor | Dashboard</title>
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/public/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/public/vendor/themify-icons/themify-icons.min.css">
    <link href="/public/vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
    <link href="/public/vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
    <link href="/public/vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
    <link href="/public/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
    <link href="/public/vendor/select2/select2.min.css" rel="stylesheet" media="screen">
    <link href="/public/vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
    <link href="/public/vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../tutor/include/assets/css/styles.css">
    <link rel="stylesheet" href="../tutor/include/assets/css/plugins.css">
    <link rel="stylesheet" href="../tutor/include/assets/css/themes/theme-1.css" id="skin_color" />


</head>

<body>
    <div id="app">
        <?php include('include/sidebar.php'); ?>
        <div class="app-content">

            <?php include('include/header.php'); ?>
            <?php
            $sql = mysqli_query($conn, "SELECT * from tutor_data where id='" . $_SESSION['id'] . "'");
            while ($data = mysqli_fetch_array($sql)) { ?>

            <!-- end: TOP NAVBAR -->
            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <!-- start: PAGE TITLE -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle"><?php echo htmlentities($data['name']);
                                                            ?> | Dashboard</h1>
                            </div>
                            <br>
                            <?php include('include/clock.php'); ?>

                            <ol class="breadcrumb">
                                <li>
                                    <span><?php echo htmlentities($data['name']);
                                            } ?>'s</span>
                                </li>
                                <li class="active">
                                    <span>Dashboard</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    <!-- end: PAGE TITLE -->
                    <!-- start: BASIC EXAMPLE -->
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="panel panel-white no-radius text-center">
                                    <div class="panel-body" style="background-color:#84d7f8 ;">
                                        <span class="fa-stack fa-2x"> <i class="fa fa-envelope"></i> </span>
                                        <h2 class="StepTitle">Queries</h2>

                                        <p class="links cl-effect-1">
                                            <a href="manage-student.php">
                                            Click Here        
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="panel panel-white no-radius text-center">
                                    <div class="panel-body" style="background-color:#84d7f8 ;">
                                        <span class="fa-stack fa-2x"> <i class="fa fa-book"></i> </span>
                                        <h2 class="StepTitle">Manage subjects</h2>

                                        <p class="cl-effect-1">
                                            <a href="timetable.php">
                                            Click Here
                                            </a>

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="panel panel-white no-radius text-center">
                                    <div class="panel-body" style="background-color:#84d7f8 ;">
                                        <span class="fa-stack fa-2x"> <i class="fa fa-graduation-cap"></i> </span>
                                        <h2 class="StepTitle">Consultation</h2>

                                        <p class="links cl-effect-1">
                                            <a href="book-appointment.php">
                                                <a href="consultation.php">
                                                Click Here
                                                </a>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                             <div class="col-sm-6">
                                <div class="panel panel-white no-radius text-center">
                                    <div class="panel-body" style="background-color:#84d7f8 ;">
                                        <span class="fa-stack fa-2x"> <i class="fa fa-cog"></i> </span>
                                        <h2 class="StepTitle"> Profile Setting</h2>

                                        <p class="links cl-effect-1">
                                            <!--<a href="book-appointment.php">-->
                                                <a href="tutoredit.php">
                                                Click Here
                                                </a>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-sm-3"> </div>
                            <div class="col-sm-3">

                                <?php include('include/calendar.php'); ?>

                            </div>
                            <div class="col-sm-3"> </div>
                        </div>
                    </div>

                    <!-- end: SELECT BOXES -->

                </div>
            </div>
        </div>
        <!-- start: FOOTER -->
        <?php include('include/footer.php'); ?>
        <!-- end: FOOTER -->

        <!-- start: SETTINGS -->
        <?php include('include/setting.php'); ?>
        <!-- end: SETTINGS -->
    </div>
    <!-- start: MAIN JAVASCRIPTS -->
    <script src="/public/vendor/jquery/jquery.min.js"></script>
    <script src="/public/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/public/vendor/modernizr/modernizr.js"></script>
    <script src="/public/vendor/jquery-cookie/jquery.cookie.js"></script>
    <script src="/public/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/public/vendor/switchery/switchery.min.js"></script>
    <!-- end: MAIN JAVASCRIPTS -->
    <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <script src="/public/vendor/maskedinput/jquery.maskedinput.min.js"></script>
    <script src="/public/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="/public/vendor/autosize/autosize.min.js"></script>
    <script src="/public/vendor/selectFx/classie.js"></script>
    <script src="/public/vendor/selectFx/selectFx.js"></script>
    <script src="/public/vendor/select2/select2.min.js"></script>
    <script src="/public/vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="/public/vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <!-- start: CLIP-TWO JAVASCRIPTS -->
    <script src="../tutor/include/assets/js/main.js"></script>
    <!-- start: JavaScript Event Handlers for this page -->
    <script src="../tutor/include/assets/js/form-elements.js"></script>
    <script>
        jQuery(document).ready(function() {
            Main.init();
            FormElements.init();
        });
    </script>
    <!-- end: JavaScript Event Handlers for this page -->
    <!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>