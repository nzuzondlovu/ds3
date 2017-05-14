<?php
include 'functions.php';
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
				<h1 class="page-header">Quotation</h1>				
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
							List of all Quotations
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<div class="table-responsive">
								<?php
								$num_rec_per_page=10;

								if (isset($_GET["page"])) {

									$page  = $_GET["page"];
								} else {

									$page=1;
								}

								$start_from = ($page-1) * $num_rec_per_page;
								$sql = "SELECT * FROM quotation ORDER BY id DESC LIMIT $start_from, $num_rec_per_page";
								$res = mysqli_query($con, $sql);

								if (mysqli_num_rows($res) > 0) {
									echo '
									<div class="pull-right">
										<a href="quotation.php" class="btn btn-success"> Add Quotation</a>
									</div>
									<table class="table">
										<thead>
											<tr>
												<th>Quotation ID</th>
												<th>Device Name</th>
												<th>Serial Number</th>
												<th>Model</th>
												<th>Accessory</th>
												<th>Technician</th>
												<th>Description</th>
												<th>Deposit</th>
												<th>Balance</th>
												<th>Total</th>
											</tr>
											
										</thead>
										<tbody>';
											while ($row = mysqli_fetch_assoc($res)) {

												echo '
												<tr>
													<td>'.$row['id'].'</td>
													<td>'.$row['name'].'</td>
													<td>'.$row['serial'].'</td>
													<td>'.$row['model'].'</td>
													<td>'.$row['accessory'].'</td>
													<td>'.$row['technician'].'</td>
													<td>'.$row['description'].'</td>
													<td>'.$row['deposit'].'</td>
													<td>'.$row['balance'].'</td>
													<td>'.$row['total'].'</td>
													<td class="pull-right">
														<a href="EditQuot.php?id='.$row['id'].'" class="btn btn-primary">Edit Quotation</a>
													</td>
												</tr>';
											}
											echo '
										</tbody>
									</table>';
								} else {
									echo '<div class="alert alert-info">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>No Quotations Found.</strong>
								</div>';
							}

							$sql = "SELECT * FROM quotation";
							pagination($con, $sql, $num_rec_per_page, $page);
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