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

if(isset($_POST['submit'])) {

	$emp_id = mysqli_real_escape_string($con, strip_tags(trim($_POST["emp_id"])));
	$norm_hours = mysqli_real_escape_string($con, strip_tags(trim($_POST["norm_hours"])));
	$hourly_pay = mysqli_real_escape_string($con, strip_tags(trim($_POST["hourly_pay"])));

	if ($emp_id != '' && $norm_hours != '' && $hourly_pay != '') {

		$extra_hours = 0;
		$bonus_id = '';
		$deduct_id = '';
		$basic = $norm_hours * $hourly_pay;

		$sql1 = "INSERT INTO bonus(emp_id, basic_salary, bonus)
		VALUES('".$emp_id."', '".$basic."', '0.00')";
		mysqli_query($con, $sql1);

		$sql1 = "SELECT * FROM bonus ORDER BY id DESC LIMIT 1";
		$res1 = mysqli_query($con, $sql1);
		$row1 = mysqli_fetch_assoc($res1);
		$bonus_id = $row1['id'];

		$sql1 = "INSERT INTO deduction(emp_id, med_aid, uif, pension)
		VALUES('".$emp_id."', '0.00', '0.00', '0.00')";
		mysqli_query($con, $sql1);

		$sql1 = "SELECT * FROM bonus ORDER BY id DESC LIMIT 1";
		$res1 = mysqli_query($con, $sql1);
		$row1 = mysqli_fetch_assoc($res1);
		$deduct_id = $row1['id'];

		$sql = "INSERT INTO salary(emp_id, norm_hours, extra_hours, hourly_pay, bonus_id, deduct_id)
		VALUES('".$emp_id."', '".$norm_hours."', '".$extra_hours."', '".$hourly_pay."', '".$bonus_id."', '".$deduct_id."')";
		mysqli_query($con, $sql);

		$_SESSION['success'] = 'Salary was added successfully.';

	} else {

		$_SESSION['failure'] = 'Please make sure all fields are filled in.';
	}

}
?>

<?php
if(isset($_GET['id']) && $_GET['id'] != '') {

	$id = mysqli_real_escape_string($con, strip_tags(trim($_GET['id'])));

	if ($id) {
		$sql = "UPDATE job SET archive=1 WHERE id='".$id."'";
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'Booking was archived successfully.';
	} else {
		$_SESSION['failure'] = 'An error occured, please try again.';
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
				<h1 class="page-header">Salaries</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->

		<!-- Modal -->
		<div class="modal fade" id="addItem" tabindex="-1" role="dialog" aria-labelledby="addItemLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="fa fa-close"></span> Close</button>
						<h4 class="modal-title" id="addItemLabel">Add Product</h4>
					</div>
					<div class="modal-body">
						<form role="form" method="post" enctype="multipart/form-data">							
							<div class="form-group">
								<label>Employee</label>
								<select name="emp_id" class="form-control">
									<option value="" selected="selected">Select employee</option>
									<?php
									$sql = "SELECT * FROM user ORDER BY name ASC";
									$res = mysqli_query($con, $sql);

									if(mysqli_num_rows($res) > 0) {
										while($row = mysqli_fetch_assoc($res)) {
											echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
										}
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label>Monthly Hours</label>
								<input type="number" name="norm_hours" class="form-control" placeholder="Enter text">
							</div>
							<div class="form-group">
								<label>Hourly Pay</label>
								<input type="number" name="hourly_pay" class="form-control" placeholder="Enter text">
							</div>
							<button name="submit" type="submit" class="btn btn-primary">Submit Salary</button>
							<button type="reset" class="btn btn-default">Reset Form</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /.Modal -->

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
						List of all Salaries
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="pull-right">
									<button class="btn btn-success" data-toggle="modal" data-target="#addItem"> Add Salary</button>
									<a class="btn btn-success" href="salarychart.php"> View Graph</a>
								</div>
							</div>
						</div>
						<div class="table-responsive">
							<?php

							$sql = "SELECT * FROM salary";
							$res = mysqli_query($con, $sql);

							if (mysqli_num_rows($res) > 0) {
								echo '
								<table id="bookings" class="table data-table">
									<thead>
										<tr>
											<th>ID</th>
											<th>User</th>
											<th>Normal Hours</th>
											<th>Extra Hours</th>
											<th>Hourly Pay</th>
											<th>Bonus</th>
											<th>Deductions</th>
											<th>Total Payable</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>';
										while ($row = mysqli_fetch_assoc($res)) {

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
											}

											$sql1 = "SELECT * FROM deduction WHERE id='".$row['deduct_id']."'";
											$res1 = mysqli_query($con, $sql1);

											if (mysqli_num_rows($res1) > 0) {

												$row1 = mysqli_fetch_assoc($res1);
												$dtotal = $row1['med_aid'] + $row1['uif'] + $row1['pension'];
												$deduct = 'Medical Aid: R'.$row1['med_aid'].'<br>UIF: R'.$row1['uif'].'<br>Pension: R'.$row1['pension'].'
												<br>Total: R'.$dtotal;
											}

											$total = $dtotal + $total;

											echo '
											<tr>
												<td>'.$row['id'].'</td>
												<td>'.$user.'</td>
												<td>'.$row['norm_hours'].'</td>
												<td>'.$row['extra_hours'].'</td>
												<td>R '.$row['hourly_pay'].'</td>
												<td>'.$bonus.'</td>
												<td>'.$deduct.'</td>
												<td>R '.$total.'</td>
												<td class="pull-right">
													<a href="editsalary.php?id='.$row['id'].'" class="btn btn-warning">Edit Salary</a>
													<a href="payslip.php?id='.$row['id'].'" class="btn btn-warning">Pay Slip</a>
												</td>
											</tr>';
										}
										echo '
									</tbody>
								</table>';
							} else {
								echo '<div class="alert alert-info">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>No Salaries found.</strong>
							</div>';
						}
						?>
					</div>
					<!-- /.table-responsive -->
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
	</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php
include 'footer.php';
?>
<script>
	$(document).ready(function(){
		$('#bookings').DataTable();
	});
</script>