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
	header('Location: salary.php');
}

if(isset($_POST['submit'])) {

	$norm = mysqli_real_escape_string($con, strip_tags(trim($_POST["norm"])));
	$extr = mysqli_real_escape_string($con, strip_tags(trim($_POST["extr"])));
	$hpay = mysqli_real_escape_string($con, strip_tags(trim($_POST["hpay"])));
	$bonu = mysqli_real_escape_string($con, strip_tags(trim($_POST["bonu"])));
	$meda = mysqli_real_escape_string($con, strip_tags(trim($_POST["meda"])));
	$uif = mysqli_real_escape_string($con, strip_tags(trim($_POST["uif"])));
	$pens = mysqli_real_escape_string($con, strip_tags(trim($_POST["pens"])));
	
	if($norm != '' && $extr != '' && $hpay != '' && $bonu != '' && $meda != '' && $uif != '' && $pens != '') {
		
		$sql = "SELECT * FROM salary WHERE id='".$id."'";
		$res = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($res);

		$bonus_id = $row['bonus_id'];
		$deduct_id = $row['deduct_id'];

		$basic = ($norm + $extr) * $hpay;

		$sql = "UPDATE bonus SET basic_salary='".$basic."', bonus='".$bonu."' WHERE id='".$bonus_id."'";
		mysqli_query($con, $sql);

		$sql = "UPDATE deduction SET med_aid='".$meda."', uif='".$uif."', pension ='".$pens."' WHERE id='".$deduct_id."'";
		mysqli_query($con, $sql);

		$sql = "UPDATE salary SET norm_hours='".$norm."', extra_hours='".$extr."', hourly_pay='".$hpay."' WHERE id='".$id."'";
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'Your new Promotional Product was added successfully.';
		header("Location: salary.php");		
	}else {
		$_SESSION['failure'] = 'Please fill in all fields.';
	}
}
?>

<?php

$promo = '';
$norm = '';
$extr = '';
$hpay = '';
$bonu = '';
$meda = '';
$uif = '';
$pens = '';

$sql = "SELECT * FROM salary WHERE id=$id";
$res = mysqli_query($con, $sql);

if(mysqli_num_rows($res) > 0) {
	while($row = mysqli_fetch_assoc($res)) {

		$user = '';
		$bonus = '';
		$deduct = '';
		$total = '';
		$dtotal = '';

		$sql1 = "SELECT * FROM user WHERE id='".$row['emp_id']."'";
		$res1 = mysqli_query($con, $sql1);

		if (mysqli_num_rows($res1) > 0) {

			$row1 = mysqli_fetch_assoc($res1);
			$user = $row1['name'].' '.$row1['surname'];
		}

		$sql1 = "SELECT * FROM bonus WHERE id='".$row['bonus_id']."'";
		$res1 = mysqli_query($con, $sql1);

		if (mysqli_num_rows($res1) > 0) {

			$row1 = mysqli_fetch_assoc($res1);
			$total = $row1['basic_salary'] + $row1['bonus'];
			$bonus = 'Bonus: R'.$row1['bonus'];
			$bonu = $row1['bonus'];
		}

		$sql1 = "SELECT * FROM deduction WHERE id='".$row['deduct_id']."'";
		$res1 = mysqli_query($con, $sql1);

		if (mysqli_num_rows($res1) > 0) {

			$row1 = mysqli_fetch_assoc($res1);
			$meda = $row1['med_aid'];
			$uif = $row1['uif'];
			$pens = $row1['pension'];
			$dtotal = $row1['med_aid'] + $row1['uif'] + $row1['pension'];
			$deduct = 'Medical Aid: R'.$row1['med_aid'].'<br>UIF: R'.$row1['uif'].'<br>Pension: R'.$row1['pension'].'
			<br>Total: R'.$dtotal;
		}

		$total = $dtotal + $total;
		$promo = '
		ID: '.$row['id'].'<br>
		Employee: '.$user.'<br>
		Normal Hours: '.$row['norm_hours'].'<br>
		Extra Hours: '.$row['extra_hours'].'<br>
		Hourly Pay: R '.$row['hourly_pay'].'<br>
		Bonus: R '.$bonus.'<br>
		'.$deduct.'<br>
		Total Payable: R '.$total;

		$norm = $row['norm_hours'];
		$extr = $row['extra_hours'];
		$hpay = $row['hourly_pay'];
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
				<h1 class="page-header">Salary Details</h1>
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
						Update salary details
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="pull-right">
									<a href="salary.php" class="btn btn-warning">Salaries</a>
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
										<label>Normal Hours</label>
										<input type="number" name="norm" class="form-control" value="<?php echo $norm; ?>">
									</div>
									<div class="form-group">
										<label>Extra Hours</label>
										<input type="number" name="extr" class="form-control" value="<?php echo $extr; ?>">
									</div>
									<div class="form-group">
										<label>Hourly Pay</label>
										<input type="number" name="hpay" class="form-control" value="<?php echo $hpay; ?>">
									</div>
									<div class="form-group">
										<label>Bonus</label>
										<input type="number" name="bonu" class="form-control" value="<?php echo $bonu; ?>">
									</div>
									<div class="form-group">
										<label>Medical Aid</label>
										<input type="number" name="meda" class="form-control" value="<?php echo $meda; ?>">
									</div>
									<div class="form-group">
										<label>UIF</label>
										<input type="number" name="uif" class="form-control" value="<?php echo $uif; ?>">
									</div>
									<div class="form-group">
										<label>Pension</label>
										<input type="number" name="pens" class="form-control" value="<?php echo $pens; ?>">
									</div>
									<button name="submit" type="submit" class="btn btn-primary">Update Salary</button>
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