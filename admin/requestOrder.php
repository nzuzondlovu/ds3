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
include 'header.php';
?>

<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Orders</h1>				
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
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							Tools and Material
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<div class="pull-right">
									</div>
								</div>
							</div>
							<div class="table-responsive">
								<form action="requestMeth.php" method="post">
									<div class="container">
										<div class="row">
											<br><table class="table table-striped table-bordered">
											<tr>
												<td>Device Name:</td>
												<td><input type="text" name="Dname" required="please enter a number" placeholder="Enter Device name"/></td>
											</tr>
											<tr>
												<td>Type:</td>
												<td><select name="Dtype" required="please enter a number" placeholder="Select type">
													<option value="Hardware">Hardware</option>
													<option value="Software">Software</option>
												</select></td>
											</tr>
											<tr>
												<td>Description:</td>
												<td><input type="text" name="description" required="please enter a number" placeholder="Enter description"/></td>
											</tr>
											<tr>
												<td>Date Recieved:</td>
												<td><input type="text" name="dateRecieved" required="please enter a number" placeholder="Enter date recieved"/><br></td>
											</tr>
											<tr>
												<td>Quantity: </td>
												<td><input type="text" name="quantity" required="please enter a number" placeholder="Enter quantity"/></td>
											</tr>
										</table>

										<input type="submit" name="create" class="btn btn-primary" value="save"/><br><br>
										<a href="viewMaterial.php">View<a>
										</div>
									</div>
								</form>



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
			$('#orders').DataTable();
		});
	</script>