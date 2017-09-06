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

	$name = mysqli_real_escape_string($con, strip_tags(trim($_POST["name"])));
	$id = mysqli_real_escape_string($con, strip_tags(trim($_POST["id"])));
	$phone = mysqli_real_escape_string($con, strip_tags(trim($_POST["phone"])));
	$email = mysqli_real_escape_string($con, strip_tags(trim($_POST["email"])));

	if ($id != '' && $name != '' && $phone != '' && $email != '') {

		$sql = 'INSERT INTO customerrepaire (Cname, idNo, num, email) VALUES("'.$cname.'", "'.$IdNo.'", "'.$num.'", "'.$email.'")';
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'User was added successfully.';
	} else {
		$_SESSION['failure'] = 'An error occured, please try again.';
	}
	


}
?>

<?php
if(isset($_GET['id']) && $_GET['id'] != '') {

	$id = mysqli_real_escape_string($con, strip_tags(trim($_GET['id'])));

	if ($id != '') {

		$sql = "DELETE FROM customersaledevice WHERE id='".$id."'";
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'Device was deleted successfully.';
	} else {
		$_SESSION['failure'] = 'An error occured, fill in all fields and please try again.';
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
				<h1 class="page-header">Devices To Be Fixed</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->

		<!-- Modal -->
		<div class="modal fade" id="addItem" tabindex="-1" role="dialog" aria-labelledby="addItemLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span> Close</button>
						<h4 class="modal-title" id="addItemLabel">Add Customer</h4>
					</div>
					<div class="modal-body">
						<form role="form" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label>Customer name</label>
								<input name="name" class="form-control" placeholder="Enter text">
							</div>
							<div class="form-group">
								<label>ID number</label>
								<input name="id" class="form-control" placeholder="Enter text">
							</div>
							<div class="form-group">
								<label>Phone number</label>
								<input name="phone" class="form-control" placeholder="Enter text">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input name="email" class="form-control" placeholder="Enter text">
							</div>
							<button name="submit" type="submit" class="btn btn-primary">Submit Customer</button>
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
						List of all devices
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="pull-right">
									<button class="btn btn-success" data-toggle="modal" data-target="#addItem"> Add Customer</button>
								</div>
							</div>
						</div>						
						<div class="table-responsive">							
							<?php

							$sql = "SELECT * FROM customersaledevice";
							$res = mysqli_query($con, $sql);

							if (mysqli_num_rows($res) > 0) {
								echo '
								<table id="bookings" class="table data-table">
									<thead>
										<tr>
											<th>ID</th>
											<th>Device</th>
											<th>Model</th>
											<th>serial</th>
											<th>type</th>
											<th>Amount</th>
											<th>Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>';
										while ($row = mysqli_fetch_assoc($res)) {

											echo '
											<tr>
												<td>'.$row['id'].'</td>
												<td>'.$row['diviceName'].'</td>
												<td>'.$row['model'].'</td>
												<td>'.$row['serialNumber'].'</td>
												<td>'.$row['Dtype'].'</td>
												<td>R '.$row['establishAmount'].'</td>												
												<td>'.date("M d, y",strtotime($row['recievedDate'])).'</td>
												<td class="pull-right">
													<a class="btn btn-danger" href="?id='.$row['id'].'"><span class="fa fa-trash"> Delete</span></a>
													<a class="btn btn-warning" href="editdevice.php?id='.$row['id'].'"><span class="fa fa-pencil"> Edit</a>
													<!--<a class="btn btn-info" href="checkrepair.php?id='.$row['id'].'"><span class="fa fa-cogs"> Repair device</a>-->
												</tr>';
											}
											echo '
										</tbody>
									</table>';
								} else {
									echo '<div class="alert alert-info">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>No devices found.</strong>
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