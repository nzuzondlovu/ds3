<?php
ob_start();
include 'functions.php';
?>

<?php
if(isset($_SESSION['key']) == '' ) {
	header("location:../login.php");
}
?>

<?php
if(isset($_GET['id']) && $_GET['id'] != '') {

	$id = mysqli_real_escape_string($con, strip_tags(trim($_GET['id'])));
	$sql = "SELECT * FROM job WHERE id='".$id."'";
	$res = mysqli_query($con, $sql);

	if (mysqli_num_rows($res) > 0) {

		while ($row = mysqli_fetch_assoc($res)) {

			$_SESSION['booking_id'] = $row['id'];
			$_SESSION['booking'] = 'Name: '.$row['name'].'<br>Serial: '.
			$row['serial'].'<br>Type: '.
			$row['type'].'<br>Status: '.
			$row['status'].'<br>Description: '.
			$row['description'].'<br>Date: '.
			date("M d, y",strtotime($row['date']));
		}
	}
}
?>

<?php

if(isset($_POST['submit'])) {

	$status = mysqli_real_escape_string($con, strip_tags(trim($_POST["status"])));
	$technician = mysqli_real_escape_string($con, strip_tags(trim($_POST["technician"])));
	$description = mysqli_real_escape_string($con, strip_tags(trim($_POST["description"])));

	if($status != '' && $technician != '' && $description != '') {

		$sql = "UPDATE job SET status='".$status."', technician='".$technician."', description2='".$description."' WHERE id='".$_SESSION['booking_id']."'";
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'Successfully updated details.';
		header("Location: bookings.php");

	} else {
		$_SESSION['failure'] = 'Please fill in all fields';
	}
}
?>

<?php
include 'header.php';
?>

<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Allocate Job</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div>
					<?php if(isset($_SESSION['failure']) && $_SESSION['failure'] != '') { ?>
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<?php echo $_SESSION['failure']; unset($_SESSION['failure']); ?>
					</div>
					<?php } ?>

					<?php if(isset($_SESSION['success']) && $_SESSION['success'] != '') { ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
					</div>
					<?php } ?>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						Enter update details
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-offset-3 col-md-6">
								<form role="form" method="post">
									<div class="form-group">
										<label>Device details</label>
										<p>
											<?php
											echo $_SESSION['booking'];
											?>
										</p>
									</div>
									<div class="form-group">
										<label>Change status</label>
										<select name="status" class="form-control">
											<option value="" selected="selected">Select status</option>
											<?php
											$sql = "SELECT * FROM status";
											$res = mysqli_query($con, $sql);

											if(mysqli_num_rows($res) > 0) {
												while($row = mysqli_fetch_assoc($res)) {
													echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
												}
											}
											?>
										</select>
									</div>
									<div class="form-group">
										<label>Choose technician</label>
										<select name="technician" class="form-control">
											<option value="" selected="selected">Select technician</option>
											<?php
											$sql = "SELECT * FROM user WHERE role='Technician'";
											$res = mysqli_query($con, $sql);

											if(mysqli_num_rows($res) > 0) {
												while($row = mysqli_fetch_assoc($res)) {
													echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
												}
											}
											?>
										</select>
									</div>
									<div class="form-group">
										<label>Device description</label>
										<textarea name="description" class="form-control" rows="3"></textarea>
									</div>
									<button name="submit" type="submit" class="btn btn-primary">Submit Job</button>
									<button type="reset" class="btn btn-default">Reset Job</button>
								</form>
							</div>
							<!-- /.col-lg-6 (nested) -->
						</div>
						<!-- /.row (nested) -->
					</div>
					<!-- /.panel-body -->
				</div>
				<!-- /.panel -->
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php
include 'footer.php';
?>