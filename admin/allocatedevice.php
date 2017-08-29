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
	header('Location: products.php');
}

$promo = '';
$name = '';
$model = '';
$serial = '';
$type = '';
$recievedDate = '';
$establishAmount = '';

$sql = "SELECT * FROM customersaledevice WHERE id=$id";
$res = mysqli_query($con, $sql);

if(mysqli_num_rows($res) > 0) {
	while($row = mysqli_fetch_assoc($res)) {
		$promo = '
		ID : '.$row['id'].'<br>
		Name : '.$row['diviceName'].'<br>
		Model : '.$row['model'].'<br>
		Type : '.$row['Dtype'].'<br>
		Date : '.date("M d, y",strtotime($row['recievedDate'])).'<br>
		Price : R '.$row['establishAmount'].'<br>';

		$name = $row['diviceName'];
		$model = $row['model'];
		$serial = $row['serialNumber'];
		$type = $row['Dtype'];
		$recievedDate = $row['recievedDate'];
		$establishAmount = $row['establishAmount'];
	}
}
?>

<?php

if(isset($_POST['submit'])) {
	$tname = mysqli_real_escape_string($con, strip_tags(trim($_POST["tname"])));
	
	if($tname != '') {

		$sql = "INSERT INTO techrepair(diviceName, model, serialNumber, Dtype, recievedDate,amount, tname) 
		VALUES ('".$name."','".$model."', '".$serial."', '".$type."', '".$recievedDate."','".$establishAmount."', '".$tname."')";
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'Your device was allocated successfully.';
		header("Location: jobs.php");

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
				<h1 class="page-header">Allocate Device</h1>
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
						Device details
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="pull-right">
									<a href="jobs.php" class="btn btn-warning">Waitlist</a>
								</div>
							</div>
							<div class="col-md-6">
								<h2>Device details</h2>
								<?php
								echo $promo;
								?>
							</div>

							<div class="col-md-6">
								<form role="form" method="post">
									<div class="form-group">
										<label>Technicial</label>
										<select name="tname" class="form-control">
											<option value="" selected="selected">Select..</option>
											<?php
											$sql = "SELECT * FROM tech ORDER BY tname ASC";
											$res = mysqli_query($con, $sql);

											if(mysqli_num_rows($res) > 0) {
												while($row = mysqli_fetch_assoc($res)) {
													echo '<option value="'.$row['tname'].'">'.$row['tname'].'</option>';
												}
											}
											?>
										</select>
									</div>
									<button name="submit" type="submit" class="btn btn-primary">Allocate Device</button>
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