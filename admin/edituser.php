<?php
ob_start();
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
	header('Location: users.php');
}

$cat = '';
$name = '';
$surname = '';
$email = '';

$sql = "SELECT * FROM user WHERE id=$id";
$res = mysqli_query($con, $sql);

if(mysqli_num_rows($res) > 0) {
	while($row = mysqli_fetch_assoc($res)) {
		$cat = '
		ID : '.$row['id'].'<br>
		Name : '.$row['name'].'<br>
		Surname : '.$row['surname'].'<br>
		Contact # : '.$row['cell'].'<br>
		ID Number : '.$row['idnumber'].'<br>
		Email : '.$row['email'].'<br>
		Address : '.$row['location'].'<br>
		Current Role : '.$row['role'].'
		';
		$name = $row['name'];
		$surname = $row['surname'];
		$email = $row['email'];		
	}
}

if(isset($_POST['submit'])) {

	$role = mysqli_real_escape_string($con, strip_tags(trim($_POST["role"])));
	$speciality = mysqli_real_escape_string($con, strip_tags(trim($_POST["speciality"])));
	
	if($role != '') {

		$sql = "UPDATE user SET role='".$role."' WHERE id='".$id."'";
		mysqli_query($con, $sql);

		if ($role == 'technician') {

			$sql = "INSERT INTO technician(name, surname, email, speciality)
			VALUES( '".$name."', '".$surname."', '".$email."', '".$speciality."')";
			mysqli_query($con, $sql);
			$_SESSION['success'] = 'Your new technician was added successfully.';
			header("Location: viewtech.php");
		}

		$_SESSION['success'] = 'Your user role was updated successfully.';
		header("Location: users.php");
	}else {
		$_SESSION['failure'] = 'Please fill in all role field.';
	}
}
?>

<?php


?>

<?php
include 'header.php';
?>

<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">User Details</h1>
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
						Enter User details
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="pull-right">
									<a href="users.php" class="btn btn-warning">Users</a>
								</div>
							</div>
							<div class="col-md-6">
								<h2>User details</h2>
								<?php
								echo $cat;
								?>
							</div>

							<div class="col-md-6">
								<form role="form" method="post">
									<div class="col-lg-6">
										<div class="form-group">
											<label>Choose Role</label>
											<select name="role" class="form-control">
												<option value="" selected="selected">Select role</option>
												<option value="admin" >Admin</option>
												<option value="clerk" >Clerk</option>
												<option value="technician" >Technician</option>
											</select>
										</div>
										<div class="form-group">
											<label>Technician Specialty</label>
											<select name="speciality" class="form-control">
												<option value="" selected="selected">Select speciality (Technician only)</option>
												<option value="Hardware" >Hardware Technician</option>
												<option value="Software" >Software Technician</option>
												<option value="Both" > Hardware & Software Technician</option>
											</select>                                        
										</div>
										<button name="submit" type="submit" class="btn btn-primary">Update Role</button>
										<button type="reset" class="btn btn-default">Reset Form</button>
									</div>
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