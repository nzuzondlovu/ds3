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
	header('Location: quotations.php');
}


if(isset($_POST['submit'])) {

	$description = mysqli_real_escape_string($con, strip_tags(trim($_POST["desc"])));
	$deposit = mysqli_real_escape_string($con, strip_tags(trim($_POST["deposit"])));
	$balance = mysqli_real_escape_string($con, strip_tags(trim($_POST["balance"])));
	$Total = mysqli_real_escape_string($con, strip_tags(trim($_POST["total"])));
	$status = mysqli_real_escape_string($con, strip_tags(trim($_POST["status"])));

	
	if($deposit != '' && $balance != '' && $total != '' && $description != '' && $status != '' ) {

		$sql = "UPDATE quotation SET description='".$description."', deposit='".$deposit."', balance='".$balance."', total='".$Total."', status='".$status."' WHERE id='".$id."'";
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'Your Quotation was updated successfully.';
		header("Location: quotations.php");
	}else {
		$_SESSION['failure'] = 'Please fill in all fields.';
	}
}
?>

<?php

$cat = '';
$dep = '';
$bal = '';
$tot = '';
$sta = '';
$des = '';

$sql = "SELECT * FROM quotation WHERE id=$id";
$res = mysqli_query($con, $sql);

if(mysqli_num_rows($res) > 0) {
	while($row = mysqli_fetch_assoc($res)) {
		$cat = '
		ID : '.$row['id'].'<br>
		Device Name : '.$row['name'].'</br>
		Serial Number : '.$row['serial'].'</br>
		Model : '.$row['model'].'</br>
		Accessory : '.$row['accessory'].'</br>
		Technician : '.$row['technician'].'</br>
		Description : '.$row['description'].'</br>
		Deposit : R '.$row['deposit'].'</br>
		Balance : R '.$row['balance'].'</br>
		Total : R '.$row['total'].'</br>
		Status : '.$row['status'].'</td>
		';
		$dep = $row['deposit'];
		$bal = $row['balance'];
		$tot = $row['total'];
		$sta = $row['status'];
		$des = $row['description'];
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
				<h1 class="page-header">Quotation Details</h1>
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
						Enter Quotation details
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="pull-right">
								<a href="quotations.php" class="btn btn-warning">Quotations</a>
								</div>
							</div>
							<div class="col-md-6">
								<h2>Qoutation details</h2>
								<?php
								echo $cat;
								?>
							</div>

							<div class="col-md-6">
								<form role="form" method="post">

									<div class="form-group">
										<label>Deposit</label>
										<input name="deposit" class="form-control" value="<?php echo $dep;?>">
									</div>
									<div class="form-group">
										<label>Balance</label>
										<input name="balance" class="form-control" value="<?php echo $bal;?>">
									</div>
									<div class="form-group">
										<label>Total</label>
										<input name="total" class="form-control" value="<?php echo $tot;?>">
									</div>
									<div class="form-group">
										<label>Status</label>
										<select name="status" class="form-control">
											<option value="" selected="selected"><?php echo $sta;?></option>
											<?php
											$sql = "SELECT * FROM status ORDER BY name ASC";
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
										<label>Description</label>
										<textarea name="desc" class="form-control" rows="3"><?php echo $des;?></textarea>
									</div>
									<button name="submit" type="submit" class="btn btn-primary">Submit Quotation</button>
									<button type="reset" class="btn btn-default">Reset Quotation</button>
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