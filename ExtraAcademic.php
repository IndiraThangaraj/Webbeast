<?php
session_start();
error_reporting(0);
//include("/xampp/htdocs/webbeast/public/include/database-connection.php");
//include('include/checklogin.php');
//check_login();

if (isset($_POST['submit'])) {
  

  echo "<script>alert('You have successfully enrolled')</script>";
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>
    Extra Academic Classes
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="author" content="freehtml5.co" />
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400" rel="stylesheet" />

  <!-- Animate.css -->
  <link rel="stylesheet" href="./include/assets/css/animate.css" />
  <!-- Icomoon Icon Fonts-->
  <link rel="stylesheet" href="./include/assets/css/icomoon.css" />
  <!-- Bootstrap  -->
  <link rel="stylesheet" href="./include/assets/css/bootstrap1.css" />
  <!-- Magnific Popup -->
  <link rel="stylesheet" href="./include/assets/css/magnific-popup.css" />
  <!-- Owl Carousel  -->
  <link rel="stylesheet" href="./include/assets/css/owl.carousel.min.css" />
  <link rel="stylesheet" href="./include/assets/css/owl.theme.default.min.css" />
  <!-- Flexslider  -->
  <link rel="stylesheet" href="./include/assets/css/flexslider.css" />
  <!-- Theme style  -->
  <link rel="stylesheet" href="./include/assets/css/style.css" />
  <!-- Modernizr JS -->
  <script src="./include/assets/js/modernizr-2.6.2.min.js"></script>
  <!-- FOR IE9 below -->
  <!--[if lt IE 9]>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <aside id="fh5co-hero">
    <div class="flexslider">
      <ul class="slides">
        <li style="background-image: url(images/background.jpg)">
          <div class="overlay-gradient"></div>
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2 text-center slider-text">
                <div class="slider-text-inner">
                  <h1 class="heading-section">Extra Academic Course</h1>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </aside>

  <div id="fh5co-course">
    <div class="container">
      <div class="row animate-box">
        <div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
          <h2>Extra Academic Course</h2>
          <p>
            An opportunity to gain your soft skills and professional skills
            prior to stepping into the tertiary education/ professional field
          </p>
        </div>
      </div>

      <div class="row">
        <form role="form" class="form" name="edit" method="post"  >
          <div class="col-md-6 animate-box">
            <div class="course">
              <a href="#" class="course-img" style="background-image: url(images/speng.jpg)">
              </a>
              <div class="desc">
                <h3><a href="#">SPOKEN ENGLISH</a></h3>
                <p>Learn how to communicate in English professionally.<br><br>3 December 2022 <br> Saturday<br>9 a.m. - 11 a.m.</p>
                <button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm btn-course">
                  Enroll
                </button>
              </div>
            </div>
          </div>
        </form>
        <form role="form" class="form" name="edit" method="post"  >
          <div class="col-md-6 animate-box">
            <div class="course">
              <a href="#" class="course-img" style="background-image: url(images/interview.jpg)">
              </a>
              <div class="desc">
                <h3><a href="#">INTERVIEW COACHING</a></h3>
                <p>Learn how to excel even the toughest interviews.<br><br>9 December 2022 <br>Friday<br>9 a.m. - 12 p.m.</p>
                </p>
                <button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm btn-course">
                  Enroll
                </button>
              </div>
            </div>
          </div>
        </form>
        <form role="form" class="form" name="edit" method="post"  >
          <div class="col-md-6 animate-box">
            <div class="course">
              <a href="#" class="course-img" style="background-image: url(images/resume.png)">
              </a>
              <div class="desc">
                <h3><a href="#">RESUME WRITING</a></h3>
                <p>Learn how to write resume to impress the employer.<br><br>10 December 2022 <br> Saturday<br>10 a.m. - 1 p.m.</p>
                </p>
                <button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm btn-course">
                  Enroll
                </button>
              </div>
            </div>
          </div>
        </form>
        <form role="form" class="form" name="edit" method="post"  >
          <div class="col-md-6 animate-box">
            <div class="course">
              <a href="#" class="course-img" style="background-image: url(images/muet.png)">
              </a>
              <div class="desc">
                <h3><a href="#">MUET WORKSHOP</a></h3>
                <p>
                  Excel your English skills with extra guidance, tips and trick<br><br>16 December 2022 <br>Friday<br>9 a.m. - 12 p.m.</p>
                </p>
                <button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm btn-course">
                  Enroll
                </button>
              </div>
            </div>
          </div>
        </form>
        <form role="form" class="form" name="edit" method="post"  >
          <div class="col-md-6 animate-box">
            <div class="course">
              <a href="#" class="course-img" style="background-image: url(images/google.png)">
              </a>
              <div class="desc">
                <h3><a href="#">GOOGLE SKILL WORKSHOP</a></h3>
                <p>Learn techniques and shortcuts around various apps in Gogole Workspace.<br><br>17 December 2022 <br> Saturday<br>9 a.m. - 4 p.m.</p>
                </p>
                <button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm btn-course">
                  Enroll
                </button>
              </div>
            </div>
          </div>
        </form>
        <form role="form" class="form" name="edit" method="post"  >
          <div class="col-md-6 animate-box">
            <div class="course">
              <a href="#" class="course-img" style="background-image: url(images/study.jpg)">
              </a>
              <div class="desc">
                <h3><a href="#">STUDY SKILL WORKSHOP</a></h3>
                <p>Master note taking skills and effective learning method to ace in your academics.<br><br>11 December 2022 <br>Sunday<br>9 a.m. - 11 a.m.</p>
                </p>
                <button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm btn-course">
                  Enroll
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="./include/assets/js/jquery1.min.js"></script>
  <!-- jQuery Easing -->
  <script src="./include/assets/js/jquery.easing.1.3.js"></script>
  <!-- Bootstrap -->
  <script src="./include/assets/js/bootstrap.min.js"></script>
  <!-- Waypoints -->
  <script src="./include/assets/js/jquery.waypoints.min.js"></script>
  <!-- Stellar Parallax -->
  <script src="./include/assets/js/jquery.stellar.min.js"></script>
  <!-- Carousel -->
  <script src="./include/assets/js/owl.carousel.min.js"></script>
  <!-- Flexslider -->
  <script src="./include/assets/js/jquery.flexslider-min.js"></script>
  <!-- countTo -->
  <script src="./include/assets/js/jquery.countTo.js"></script>
  <!-- Magnific Popup -->
  <script src="./include/assets/js/jquery.magnific-popup.min.js"></script>
  <script src="./include/assets/js/magnific-popup-options.js"></script>
  <!-- Main -->
  <script src="./include/assets/js/main1.js"></script>
</body>

</html>