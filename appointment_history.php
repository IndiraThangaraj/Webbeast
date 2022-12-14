<?php
session_start();
error_reporting(0);
include("/xampp/htdocs/webbeast/public/include/database-connection.php");
include('/xampp/htdocs/webbeast/public/include/checklogin.php');
check_login();
if (isset($_GET['cancel'])) {
	mysqli_query($conn, "update appointment set userStatus='0' where id = '" . $_GET['id'] . "'");
	$_SESSION['msg'] = "Your appointment canceled !!";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Student | Appointment History</title>

	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="/public/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/public/vendor/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="/public/vendor/themify-icons/themify-icons.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="/public/vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
	<link href="/public/vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
	<link href="/public/vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
	<link href="/public/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
	<link href="/public/vendor/select2/select2.min.css" rel="stylesheet" media="screen">
	<link href="/public/vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
	<link href="/public/vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="../student/include/assets/css/styles.css">
	<link rel="stylesheet" href="../student/include/assets/css/plugins.css">
	<link rel="stylesheet" href="../student/include/assets/css/themes/theme-1.css" id="skin_color" />
</head>

<body>
	<div id="app">
		<?php include('include/sidebar.php'); ?>
		<div class="app-content">


			<?php include('include/header.php'); ?>
			<?php
            $sql = mysqli_query($conn, "SELECT * from stud where id='" . $_SESSION['id'] . "'");
            while ($data = mysqli_fetch_array($sql)) { ?>
			<!-- end: TOP NAVBAR -->
			<div class="main-content">
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle"><?php echo htmlentities($data['name']);
                                                       ?>   | Appointment History</h1>
							</div>
							<br>
									<?php include('include/clock.php');?>
							<ol class="breadcrumb">
								<li>
									<span><?php echo htmlentities($data['name']);
                                            } ?> </span>
								</li>
								<li class="active">
									<span>Appointment History</span>
								</li>
							</ol>
						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">


						<div class="row">
							<div class="col-md-12">

								<p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
									<?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
								<table class="table table-hover" id="sample-table-1">
									<thead>
										<tr>
											<th class="center">#</th>
											<th class="hidden-xs">Tutor Name</th>
											<th>Appointment Date / Time </th>
											<th>Appointment Creation Date </th>
											<th>Appointment Status</th>
											<th>Action</th>
											

										</tr>
									</thead>
									<tbody>
										<?php
										$sql = mysqli_query($conn, "select tutor_data.name as name,appointment.*  from appointment join tutor_data on tutor_data.id=appointment.tutor where appointment.userId='" . $_SESSION['id'] . "'");
										$cnt = 1;
										while ($row = mysqli_fetch_array($sql)) {
										?>

											<tr>
												<td class="center"><?php echo $cnt; ?>.</td>
												<td class="hidden-xs"><?php echo $row['name']; ?></td>
												<td><?php echo $row['appointmentDate']; ?> / <?php echo
																								$row['appointmentTime']; ?>
										
												</td>
												<td><?php echo $row['postingDate']; ?></td>


												<td>
													<?php if (($row['userStatus'] == 1) && ($row['tutor_status'] == 1)) {
														echo "Waiting for approval";
													}
													if (($row['userStatus'] == 0) && ($row['tutor_status'] == 1)) {
														echo "Cancel by User";
													}

													if (($row['userStatus'] == 1) && ($row['tutor_status'] == 0)) {
														echo "Not Approved";
													}
													if (($row['userStatus'] == 1) && ($row['tutor_status'] == 2)) {
														echo "Approved";
													}

													?>

													</div>

												</td>
												<td>
													<div class="visible-md visible-lg hidden-sm hidden-xs">
														<?php if (($row['userStatus'] == 1) && ($row['tutor_status'] == 1) || ($row['userStatus'] == 1) && ($row['tutor_status'] == 2)) { ?>

															<a href="appointment_history.php?id=<?php echo $row['id'] ?>&cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment ?')" class="btn btn-transparent btn-xs tooltips" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove">Cancel</a>
														<?php } else if (($row['userStatus'] == 0) && ($row['tutor_status'] == 1)) {

															echo "Canceled";
														} ?>


													</div>

												</td>
												
											</tr>

										<?php
											$cnt = $cnt + 1;
										} ?>


									</tbody>
								</table>
							</div>
						</div>
					</div>

					<!-- end: BASIC EXAMPLE -->
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
	<script src="../student/include/assets/js/main.js"></script>
	<!-- start: JavaScript Event Handlers for this page -->
	<script src="../student/include/assets/js/form-elements.js"></script>
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