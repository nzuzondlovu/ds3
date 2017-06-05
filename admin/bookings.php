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
				<h1 class="page-header">Bookings</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
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
						List of all bookings
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div class="table-responsive">
							<?php

							$sql = "SELECT * FROM job WHERE archive = 0";
							$res = mysqli_query($con, $sql);

							if (mysqli_num_rows($res) > 0) {
								echo '
								<table id="bookings" class="table data-table">
									<thead>
										<tr>
											<th>ID</th>
											<th>User</th>
											<th>Name</th>
											<th>serial</th>
											<th>type</th>
											<th>Picture</th>
											<th>Description</th>
											<th>Date In</th>
											<th>Status</th>
											<th>Technician</th>
											<th>Date Out</th>
											<th>Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>';
										while ($row = mysqli_fetch_assoc($res)) {

											$sql1 = "SELECT * FROM quotation WHERE booking_id = '".$row['id']."' AND archive = 0";
											$res1 = mysqli_query($con, $sql1);
											$btn = '<a href="createquote.php?id='.$row['id'].'" class="btn btn-primary">Create Quotation</a>';

											if (mysqli_num_rows($res1) > 0) {

												$row1 = mysqli_fetch_assoc($res1);
												$btn = '<a href="editquote.php?id='.$row1['id'].'" class="btn btn-info">Review Quotation</a>';
											}

											echo '
												<tr>
													<td>'.$row['id'].'</td>
													<td>'.$row['user'].'</td>
													<td>'.$row['name'].'</td>
													<td>'.$row['serial'].'</td>
													<td>'.$row['type'].'</td>
													<td><img src="../uploads/'.$row['pic_url'].'"></td>
													<td>'.$row['description'].'</td>
													<td>'.date("M d, y",strtotime($row['date_in'])).'</td>
													<td>'.$row['status'].'</td>
													<td>'.$row['technician'].'</td>
													<td>'.date("M d, y",strtotime($row['date_out'])).'</td>
													<td>'.date("M d, y",strtotime($row['date'])).'</td>
													<td class="pull-right">
														 '.$btn.'  <a href="?id='.$row['id'].'" class="btn btn-warning">Archive Booking</a>
													</td>
												</tr>';
										}
										echo '
									</tbody>
								</table>';
							} else {
								echo '<div class="alert alert-info">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>No products found.</strong>
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