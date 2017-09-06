<?php
include '../includes/functions.php';
?>

<?php
if(isset($_SESSION['key']) == '' ) {
	header("location:../login.php");
}
?>

<?php

if (isset($_GET['id']) && $_GET['id'] != null) {
	$id = mysqli_real_escape_string($con, strip_tags(trim($_GET["id"])));
} else {
	header('Location: viewquot.php');
}

$name = '';
$email = '';
$query = '';

if(isset($_GET['id']) && $_GET['id'] != '') {

	$id = mysqli_real_escape_string($con, strip_tags(trim($_GET['id'])));
	$sql = "SELECT * FROM query WHERE id='".$id."'";
	$res = mysqli_query($con, $sql);

	if (mysqli_num_rows($res) > 0) {

		while ($row = mysqli_fetch_assoc($res)) {

			$name = $row['name'];
			$email = $row['email'];
			$query = $row['query'];
		}
	}
}

if(isset($_POST['submit'])) {

	$feedback = mysqli_real_escape_string($con, strip_tags(trim($_POST["feedback"])));

	if($feedback != '') {

		echo $sql = "UPDATE query SET feedback = '".$feedback."', status = 'answered' WHERE id='".$id."'";
		//mysqli_query($con, $sql);
		$_SESSION['success'] = 'Your feedback was added successfully.';
		//header("Location: feedback.php");
	}else {
		$_SESSION['failure'] = 'Please fill in all fields.';
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
				<h1 class="page-header">Feedback</h1>
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
						Enter Query Details
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="pull-right">
									<a href="feedback.php" class="btn btn-warning">Queries</a>
								</div>
							</div>
							<div class="col-md-offset-3 col-md-6">
								<form role="form" method="post">
									<div class="form-group">
										<label>Name</label>
										<input value="<?php echo $name; ?>" class="form-control" type="text" disabled>
									</div>
									<div class="form-group">
										<label>Email</label>
										<input value="<?php echo $email; ?>" class="form-control" type="text" disabled>
									</div>                              
									<div class="form-group">
										<label>Query</label>
										<input value="<?php echo $query; ?>" class="form-control" disabled>
									</div>
									<div class="form-group">
										<label>Feedback</label>
										<textarea name="feedback" class="form-control" rows="3"></textarea>
									</div>                                    
									<button name="submit" type="submit" class="btn btn-primary">Submit Feedback</button>
									<button type="reset" class="btn btn-default">Reset Form</button>
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