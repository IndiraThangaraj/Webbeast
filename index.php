<?php
session_start();
error_reporting(0);
include("/xampp/htdocs/webbeast/public/include/database-connection.php"); 
include('checklogin.php');
check_login();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./include/assets/css/bootstrap.css">
  <link rel="stylesheet" href="./include/assets/css/fonts.css">
  <script src="./include/assets/js/jquery.js"></script>
  <script src="./include/assets/js/bootstrap.js"></script>
  <script src="./include/assets/js/myjs.js"></script>
  <title>Subject Registration Form</title>
</head>

<body class="bg-dark">

  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="card mt-5">
          <div class="card-title ml-5 my-2">
            <!--Registration Button-->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Registration">Enroll Subject Here </button>
          </div>
          <div class="card-body">
            <p id="delete-message" class="text-dark"></p>
            <div id="table"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Registration Modal-->
  <div class="modal" id="Registration">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="text-dark">Subject Registration Form</h3>
        </div>
        <div class="modal-body">
          <p id="message" class="text-dark"></p>
          <form>
            <p> Enter the subject code :
              <select name="SubjectCod" class="form-control" required="required" id="SubjectCode">
                <option value="">Select the subject code :</option>
                <?php $ret = mysqli_query($conn, "select * from subject");
                while ($row = mysqli_fetch_array($ret)) {
                ?>
                  <option value="<?php echo htmlentities($row['subject_code']); ?> " >
                    <?php echo htmlentities($row['subject_code']); ?> - <?php echo htmlentities($row['subject']); ?>
                  </option>
                <?php } ?>
                

              </select>
              </p>

              <p>
              <select name="SubjectName" class="form-control" required="required" id="SubjectName">
                <option value="">Select the subject name :</option>
                <?php $ret = mysqli_query($conn, "select * from subject");
                while ($row = mysqli_fetch_array($ret)) {
                ?>
                  <option value="<?php echo htmlentities($row['subject']); ?> " >
                    <?php echo htmlentities($row['subject']); ?>
                  </option>
                <?php } ?>
                

              </select>
              </p>
            <p>
              Class Mode:
              <input type="text" class="form-control my-2" placeholder="Online/Physical" id="ClassMode">
            </p>
            <p>
              Standard/Form:
              <input type="text" class="form-control my-2" placeholder="Standard/Form" id="Class">
            </p>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="btn_register">Register Now</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_close">Close</button>
        </div>
      </div>
    </div>
  </div>

  
       

  <!--Delete Modal-->
 
  <div class="modal" id="delete">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="text-dark">Drop Subject</h3>
        </div>
        <div class="modal-body">
          <p> Do You Want to Drop the Subject ?</p>
          <button type="button" class="btn btn-success" id="btn_delete_record">Drop Now</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_close">Close</button>
        </div>
      </div>
    </div>
  </div>


</body>

</html>