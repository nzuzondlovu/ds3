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
				<h1 class="page-header">Payslip Details</h1>
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
						View payslip details
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="pull-right">
									<a href="salary.php" class="btn btn-warning">Salaries</a>
								</div>
							</div>
							<div class="col-md-12">
								<?php
								echo $promo;
								?>
							</div>
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