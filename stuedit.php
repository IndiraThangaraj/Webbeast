<?php
session_start();
error_reporting(0);
include("/xampp/htdocs/webbeast/public/include/database-connection.php");
include('/xampp/htdocs/webbeast/public/include/checklogin.php');
check_login();
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $state = $_POST['state'];
    $age = $_POST['age'];
    $contact = $_POST['contact'];
    $school = $_POST['school'];
    $type = $_POST['type'];
    $mode = $_POST['mode'];
    $gender =$_POST['gender'];


    $sql = mysqli_query($conn, "UPDATE stud set name='$name',address='$address',age='$age',contact='$contact',state='$state',school='$school',type='$type',mode='$mode',gender='$gender' where id='" . $_SESSION['id'] . "'");
    if ($sql) {
        echo "<script>alert('Your Profile updated Successfully');</script>";
    }
}
$status = $statusMsg = '';
if (isset($_POST["upload"])) {
    $status = 'error';
    if (!empty($_FILES["image"]["name"])) {
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

            // Insert image content into database 
            $sql2 = mysqli_query($conn, "UPDATE stud SET image='$imgContent' where id='" . $_SESSION['id'] . "'");

            if ($sql2) {
                $status = 'success';
                $statusMsg = "File uploaded successfully.";
            } else {
                $statusMsg = "File upload failed, please try again.";
            }
        } else {
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
        }
    } else {
        $statusMsg = 'Please select an image file to upload.';
    }
}

// Display status message 
echo $statusMsg;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Profile Edit</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="/public/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!--Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Main css -->
    <link rel="stylesheet" href="/public/css/css/edit.css">

</head>

<body>

    <?php
    $sql = mysqli_query($conn, "SELECT * from stud where id='" . $_SESSION['id'] . "'");
    while ($data = mysqli_fetch_array($sql)) {

    ?> <form role="form" name="edit" method="post" enctype="multipart/form-data">
            <div class="container rounded bg-white mt-5 mb-5">
                <div class="row">
                    <div class="col-md-3 border-right">
                        <div class="d-flex1 flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($data['image']); ?>"> <br><span class="font-weight-bold"><?php echo htmlentities($data['name']); ?></span></div>
                        <div class="image">
                            <label>Select Image File:</label>
                            <input type="file" name="image">
                            <input type="submit" name="upload" value="Upload">
                        </div>
                    </div>
                    <div class="col-md-5 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Profile Settings</h4>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" name="name" value="<?php echo htmlentities($data['name']); ?>"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Contact Number</label><input type="text" class="form-control" name="contact" value="<?php echo htmlentities($data['contact']); ?>"></div>
                                <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" name="address" value="<?php echo htmlentities($data['address']); ?>"></div>
                                <div class="col-md-12"><label class="labels">State</label><input type="text" class="form-control" name="state" value="<?php echo htmlentities($data['state']); ?>"></div>
                                <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" readonly name="email" value="<?php echo htmlentities($data['email']); ?>"></div>
                                <div class="col-md-6"><label class="labels">Age</label><input type="number" class="form-control" value="<?php echo htmlentities($data['age']); ?>" name="age"></div>
                                <div class="col-md-6"><label class="labels">Gender</label><input type="text" class="form-control" value="<?php echo htmlentities($data['gender']); ?>" name="gender"></div>

                            </div>
                            <div class="row mt-3">

                            </div>
                            <div class="mt-5 text-center">
                                <button type="submit" name="submit" id="submit" class="btn btn-primary profile-button">Save Profile</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 py-5">

                            <div class="d-flex justify-content-between align-items-center experience"><span>Edit Educational background</span></div><br>
                            <div class="col-md-12"><label class="labels">School Name</label><input type="text" class="form-control" name="school" value="<?php echo htmlentities($data['school']); ?>"></div>
                            <div class="col-md-12"><label class="labels">School Type</label><input type="text" class="form-control" name="type" value="<?php echo htmlentities($data['type']); ?>"></div>
                            <div class="col-md-12"><label class="labels">Study Mode</label><input type="text" class="form-control" name="mode" value="<?php echo htmlentities($data['mode']);
                                                                                                                                                        ?>"></div>
        </form>
    <?php } ?>
    <a href="logout.php">
        Log Out
    </a>



    </div>
    </div>
    </div>
    </div>

</body>

</html>
<script>
    $(document).ready(function() {
        $('#insert').change(function() {
            var image_name = $('#image').val();
            if (image_name == '') {
                alert("Please Select Image");
                return false;
            } else {
                var extension = $('#image').val().split('.').pop().toLowerCase();
                if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                    alert('Invalid Image File');
                    $('#image').val('');
                    return false;
                }
            }
        });
    });
</script>