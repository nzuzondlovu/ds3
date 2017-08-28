<?php
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
	$surname = mysqli_real_escape_string($con, strip_tags(trim($_POST["surname"])));
	$cell= mysqli_real_escape_string($con, strip_tags(trim($_POST["cell"])));
	$idnum= mysqli_real_escape_string($con, strip_tags(trim($_POST["idnum"])));
	$email = mysqli_real_escape_string($con, strip_tags(trim($_POST["email"])));

	if($name != '' && $surname != '' && $cell != '' && $idnum != '' && $email != '') {

		$sql = "INSERT INTO drivers(name,surname,cell,idnumber,email)
		VALUES( '".$name."','".$surname."','".$cell."','".$idnum."','".$email."')";
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'Your new driver was added successfully.';
		header("Location: drivers.php");
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
				<h1 class="page-header">Deliveries</h1>				
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->

		<!-- Modal -->
		<div class="modal fade" id="addItem" tabindex="-1" role="dialog" aria-labelledby="addItemLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="fa fa-close" aria-hidden="true"></span> Close</button>
						<h4 class="modal-title" id="addItemLabel">Add Product</h4>
					</div>
					<div class="modal-body">
						<form role="form" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label>Driver name</label>
								<input name="name" class="form-control" placeholder="Enter text">
							</div>
							<div class="form-group">
								<label>Driver Surname</label>
								<input name="surname" class="form-control" placeholder="Enter text">
							</div>
							<div class="form-group">
								<label>Contact Number</label>
								<input name="cell" class="form-control" placeholder="Enter text">
							</div>
							<div class="form-group">
								<label>ID Number</label>
								<input name="idnum" class="form-control" placeholder="Enter text">
							</div>
							<div class="form-group">
								<label>Email Address</label>
								<input name="email" class="form-control" placeholder="Enter text">
							</div>

							<button name="submit" type="submit" class="btn btn-primary">Submit Driver</button>
							<button type="reset" class="btn btn-default">Reset Form</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /.Modal -->

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
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						List of all Delivery Requests
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div class="table-responsive">
							<div class="col-md-12">
								<div class="pull-right">
									<button data-toggle="modal" data-target="#addItem" class="btn btn-success"> Add Driver</button>
								</div>
							</div>
							<?php

							$sql = "SELECT * FROM custdelivery ORDER BY id DESC";
							$res = mysqli_query($con, $sql);

							if (mysqli_num_rows($res) > 0) {
								echo '
								
								<table id="bookings" class="table data-table">
									<thead>
										<tr>
											<th>Customer ID</th>
											<th>Customer Name</th>
											<th>Cell Number</th>
											<th>Street Address</th>
											<th>Suburb</th>
											<th>Area</th>
											<th>Postal Code</th>
											<th>Date of Request</th>
											<th>Delivery Date</th>
											<th>Action</th>
										</tr>

									</thead>
									<tbody>';
										while ($row = mysqli_fetch_assoc($res)) {

											echo '
											<tr>
												<tr>
													<td>'.$row['custId'].'</td>
													<td>'.$row['custname'].'</td>
													<td>'.$row['custcell'].'</td>
													<td>'.$row['strAddress'].'</td>
													<td>'.$row['suburb'].'</td>
													<td>'.$row['area'].'</td>
													<td>'.$row['boxcode'].'</td>
													<td>'.$row['dateofRequest'].'</td>
													<td>'.$row['dateofDelivery'].'</td>
													<td class=" pull-right"><a href="allocateDriver.php?id='.$row['id'].'" class="btn btn-danger">Allocate Driver</a>  <a href="DeleteDelivery.php?id='.$row['id'].'" class="btn btn-primary">Delete Request</a></td>

												</tr>';
											}
											echo '
										</tbody>
									</table>';
								} else {
									echo '<div class="alert alert-info">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>No Requests Found.</strong>
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