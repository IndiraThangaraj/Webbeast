<?php
session_start();
error_reporting(0);
include("/xampp/htdocs/webbeast/public/include/database-connection.php");
//include('/xampp/htdocs/webbeast/public/include/checklogin.php');
//check_login();
//include('include/header.php'); 

?>
<html>

<head>

    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Inter", sans-serif;
            background-image: linear-gradient(#BDB706, #556B02);
            text-align: center;
        }

        h1 {
            font-style: bold;

        }

        a {
            text-align: center;
        }

        button {
            background: #FF4742;
            border: 1px solid #FF4742;
            border-radius: 6px;
            box-shadow: rgba(0, 0, 0, 0.1) 1px 2px 4px;
            box-sizing: border-box;
            color: #FFFFFF;
            cursor: pointer;
            display: inline-block;
            font-family: nunito, roboto, proxima-nova, "proxima nova", sans-serif;
            font-size: 16px;
            font-weight: 800;
            line-height: 16px;
            min-height: 40px;
            outline: 0;
            padding: 12px 14px;
            text-align: center;
            text-rendering: geometricprecision;
            text-transform: none;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            vertical-align: middle;
            margin-top: 15px;
        }

        button:hover,
        button:active {
            background-color: initial;
            background-position: 0 0;
            color: #FF4742;
        }

        button:active {
            opacity: .5;
        }

        .header {
            overflow: hidden;
            background-color: #f1f1f1;

        }

        .header a {
            float: left;
            text-align: center;
            padding: 12px;
            text-decoration: none;
            font-size: 18px;
            line-height: 25px;
            border-radius: 4px;
        }

        .header a.logo {
            font-size: 25px;
            font-weight: bold;
        }

        .header a:hover {
            background-color: #BDB706;
            color: black;
        }

        .header a.active {
            background-color: #BDB706;
            color: black;
        }

        .header-right {
            float: right;
        }

        @media screen and (max-width: 500px) {
            .header a {
                float: none;
                display: block;
                text-align: left;
            }

            .header-right {
                float: none;
            }
        }
    </style>

</head>

<body>


    <div class="header">
        <a href="#default" class="logo"> <img src="/public/images/jbs.jpg" width="50px" ,height="50px">JBS EDUCATION & CONSULTATION</a>
        <div class="header-right">
            <a class="active" href="status.php">Check Status</a>

            <a href="logout.php">Log out</a>
        </div>
    </div>
    <h1> Application status </h1>
    <div class="status">
        <?php
        $sql = mysqli_query($conn, "SELECT * from application where tutorId='" . $_SESSION['id'] . "'");
        while ($data = mysqli_fetch_array($sql)) {
            echo htmlentities($data['status']);
        } ?>
    </div>

    <a href="tutorlog.php"><button class="1">Login</button></a>



</body>



</html>