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
if (isset($_GET['del']) && $_GET['del'] != '') {
	$del = (int)mysqli_real_escape_string($con, strip_tags(trim($_GET['del'])));

	if ($del != '') {
		$sql = "DELETE FROM suppliers WHERE id='".$del."'";
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'Supplier has been successfully deleted.';
	}
}

?>

<?php

if(isset($_POST['submit'])) {

	$name = mysqli_real_escape_string($con, strip_tags(trim($_POST["name"])));
	$email = mysqli_real_escape_string($con, strip_tags(trim($_POST["email"])));
	$number = mysqli_real_escape_string($con, strip_tags(trim($_POST["number"])));
	$address = mysqli_real_escape_string($con, strip_tags(trim($_POST["address"])));
	$website = mysqli_real_escape_string($con, strip_tags(trim($_POST["website"])));
	$notes = mysqli_real_escape_string($con, strip_tags(trim($_POST["product"])));

	if ($name != '' && $email != '' && $number != '' &&  $address != '' && $website != '' ) {

		$sql = "INSERT INTO suppliers(name, notes, contactNumber, email, website, address)
		VALUES('".$name."', '".$notes."', '".$number."', '".$email."', '".$website."', '".$address."')";
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'You have successfully added a new supplier.';
		header("Location: suppliers.php");
	} else {
		$_SESSION['failure'] = 'Please fill in all the fields.';
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
				<h1 class="page-header">Suppliers</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->

		<!-- Modal -->
		<div class="modal fade" id="addSupp" tabindex="-1" role="dialog" aria-labelledby="addSuppLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span> Close</button>
						<h4 class="modal-title" id="addSuppLabel">Add Supplier</h4>
					</div>
					<div class="modal-body">
						<form role="form" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" class="form-control" placeholder="Enter name">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" name="email" class="form-control" placeholder="Enter email">
							</div>
							<div class="form-group">
								<label>Contact Number</label>
								<input type="text" name="number" class="form-control" placeholder="Enter number">
							</div>
							<div class="form-group">
								<label>Address</label>
								<input type="text" name="address" class="form-control" placeholder="Enter address">
							</div>
							<div class="form-group">
								<label>Website</label>
								<input type="text" name="website" class="form-control" value="http://">
							</div>
							
							<button onclick="modal('.$row['deliveryID'].')" class="btn btn-warning">Allocate Driver</button><button name="submit" type="submit" class="btn btn-primary">Submit Supplier</button>
							<button type="reset" class="btn btn-default">Reset Supplier</button>
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
			</div>
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						List of all suppliers
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="pull-right">
									<button class="btn btn-success" data-toggle="modal" data-target="#addSupp"> Add Supplier</button>
								</div>
							</div>
						</div>
						<div class="table-responsive">
							<?php
							$num_rec_per_page=10;

							if (isset($_GET["page"])) {

								$page  = $_GET["page"];
							} else {

								$page=1;
							}

							$start_from = ($page-1) * $num_rec_per_page;
							$sql = "SELECT * FROM suppliers";
							$res = mysqli_query($con, $sql);

							if (mysqli_num_rows($res) > 0) {
								echo '
								<table id="suppliers" class="table">
									<thead>
										<tr>
											<th>ID</th>
											<th>Name</th>
											<th>Contact #</th>
											<th>Email</th>
											<th>Website</th>
											<th>Address</th>
											<th>Notes</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>';
										while ($row = mysqli_fetch_assoc($res)) {											

											echo '
											<tr>
												<td>'.$row['id'].'</td>
												<td>'.$row['name'].'</td>
												<td>'.$row['contactNumber'].'</td>
												<td>'.$row['email'].'</td>
												<td><a target="blank" href="'.$row['website'].'">'.$row['website'].'</a></td>
												<td>'.$row['address'].'</td>
												<td>'.$row['notes'].'</td>
												<td class="pull-right">
													<a href="createOrder.php?id='.$row['id'].'" class="btn btn-primary">Make Order</a>   <a href="editsupplier.php?id='.$row['id'].'" class="btn btn-primary">Update Supplier</a>
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
	function modal(id) {
		var data = {"id" : id};
		jQuery.ajax({
			url : '../includes/suppliermodal.php',
			method : "post",
			data : data,
			success : function(data) {
				jQuery('body').append(data);
				jQuery('#supplierModal').modal('toggle');
			},
			error : function() {
				alert("Ooops! Something went wrong!");
			}
		});
	}
</script>

<script>
	$(document).ready(function(){
		$('#suppliers').DataTable();
	});
</script>