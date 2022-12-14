<?php
session_start();
error_reporting(0);
include("/xampp/htdocs/webbeast/public/include/database-connection.php");
include('/xampp/htdocs/webbeast/public/include/checklogin.php');
check_login();


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
    </style>

</head>

<body>

    <h1> Timetable </h1>
    <div class="t1">
        <img src="/public/images/s1.png" width="500px" ,height="500px">
    </div>
    <br>
    <div class="t1">
        <img src="/public/images/s2.png" width="500px" ,height="500px">
    </div>
    <br>
    <div class="t1">
        <img src="/public/images/f1.png" width="500px" ,height="500px">
    </div>
    <br>
    <div class="t1">
        <img src="/public/images/f2.png" width="500px" ,height="500px">
    </div>
    <br>
    <div class="t1">
        <img src="/public/images/f3.png" width="500px" ,height="500px">
    </div>
    <br>
    <div class="t1">
        <img src="/public/images/f4.png" width="500px" ,height="500px">
    </div>
    <br>
    <div class="t5">
        <img src="/public/images/f3.png" width="500px" ,height="500px">
    </div>
    <br>

    <a href="index.php"><button class="1">Register Now</button></a>



</body>



</html>