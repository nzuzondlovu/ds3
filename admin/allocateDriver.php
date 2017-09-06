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
	$id = mysqli_real_escape_string($con, strip_tags(trim($_GET['id'])));
} else {
	header('Location: viewD.php');
}
?>

<?php

$cust = '';
$custid = '';
$name = '';
$cell = '';
$dateD = '';
$location = '';

$sql = "SELECT * FROM custdelivery WHERE id='".$id."'";
$res = mysqli_query($con, $sql);

if (mysqli_num_rows($res) > 0) {

	while ($row = mysqli_fetch_assoc($res)) {

		$cust = '
		Name : '.$row['custname'].'<br>
		Cell Number : '.$row['custcell'].'<br>
		Street Address : '.$row['strAddress'].'<br>
		Suburb : '.$row['suburb'].'<br>
		Area : '.$row['area'].'<br>
		Boxcode : '.$row['boxcode'].'<br>
		Date of Request : '.$row['dateofRequest'].'<br>
		Date of Delivery : '.$row['dateofDelivery'];

		$custid = $row['custId'];
		$name = $row['custname'];
		$cell = $row['custcell'];
		$dateD = $row['dateofDelivery'];
		$location = $row['strAddress'].', '.$row['suburb'].', '.$row['area'].', '.$row['boxcode'];

	}
}
?>
<?php

if(isset($_POST['submit'])) {

	$driver = mysqli_real_escape_string($con, strip_tags(trim($_POST["driver"])));

	if($driver != '' ) {

		$sql="INSERT INTO driverdelivery(driverID,id,custname,custcell,dateofDelivery,location)
		VALUES('".$driver."','".$custid."', '".$name."','".$cell."','".$dateD."','".$location."')";
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'Successfully updated details.';
		header("Location: drivers.php");

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
				<h1 class="page-header">Allocate Driver</h1>
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
						Enter allocation details
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="pull-right">
									<a href="viewD.php" class="btn btn-warning">Deliveries</a>
								</div>
							</div>
							<div class="col-md-6">
								<?php
								echo $cust;
								?>
							</div>
							<div class="col-md-6">
								<form role="form" method="post">
									<div class="form-group">
										<label>Choose Driver</label>
										<select name="driver" class="form-control">
											<option value="" selected="selected">Select Driver</option>
											<?php
											$sql = "SELECT * FROM drivers";
											$res = mysqli_query($con, $sql);

											if(mysqli_num_rows($res) > 0) {
												while($row = mysqli_fetch_assoc($res)) {
													echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
												}
											}
											?>
										</select>
									</div>
									<button name="submit" type="submit" class="btn btn-primary">Submit Allocation</button>
									<button type="reset" class="btn btn-default">Reset</button>
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
