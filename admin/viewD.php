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

if(isset($_POST['submit'])) {

	$driver = mysqli_real_escape_string($con, strip_tags(trim($_POST["driver"])));
	$custid = mysqli_real_escape_string($con, strip_tags(trim($_POST["custid"])));
	$name = mysqli_real_escape_string($con, strip_tags(trim($_POST["name"])));
	$cell = mysqli_real_escape_string($con, strip_tags(trim($_POST["cell"])));
	$dateD = mysqli_real_escape_string($con, strip_tags(trim($_POST["dateD"])));
	$location = mysqli_real_escape_string($con, strip_tags(trim($_POST["location"])));

	if($driver != '' ) {

		echo $sql="INSERT INTO driverdelivery(driverID,id,custname,custcell,dateofDelivery,location)
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
				<h1 class="page-header">Deliveries</h1>
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
						List of all deliveries
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div class="table-responsive">
							<?php

							$sql = "SELECT * FROM custdelivery ";
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
												<td>'.$row['custId'].'</td>
												<td>'.$row['custname'].'</td>
												<td>'.$row['custcell'].'</td>
												<td>'.$row['strAddress'].'</td>
												<td>'.$row['suburb'].'</td>
												<td>'.$row['area'].'</td>
												<td>'.$row['boxcode'].'</td>
												<td>'.date("M d, y",strtotime($row['dateofRequest'])).'</td>
												<td>'.date("M d, y",strtotime($row['dateofDelivery'])).'</td>
												<td class=" pull-right">
													<button onclick="modal('.$row['id'].')" class="btn btn-warning">Allocate Driver</button>  <a href="DeleteDelivery.php?id='.$row['id'].'" class="btn btn-danger">Delete Request</a>
												</td>
											</tr>';
										}
										echo '
									</tbody>
								</table>';
							} else {
								echo '<div class="alert alert-info">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>No deliveries found.</strong>
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
	function modal(id) {
		var data = {"id" : id};
		jQuery.ajax({
			url : '../includes/drivermodal.php',
			method : "post",
			data : data,
			success : function(data) {
				jQuery('body').append(data);
				jQuery('#driverModal').modal('toggle');
			},
			error : function() {
				alert("Ooops! Something went wrong!");
			}
		});
	}
</script>
<script>
	$(document).ready(function(){
		$('#bookings').DataTable();
	});
</script>