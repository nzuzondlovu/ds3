<?php
ob_start();
include 'functions.php';
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
						Search for supplier
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-offset-3 col-md-6">
								<form method="POST">
									<dl>
										<dt class="sidebar-search">
											<div class="input-group custom-search-form">
												<input type="text" name="query" class="form-control" placeholder="Enter text">
												<span class="input-group-btn">
													<button id="search" name="search" type="submit" class="btn btn-primary">Search</button>
												</span>
											</div>
											<!-- /input-group -->
										</dt>
									</dl>

									<?php
									if(isset($_POST['search']))
									{
										echo '
										<h2>
											Search Results
										</h2>';
										
										$name = mysqli_real_escape_string($con, strip_tags(trim($_POST['query'])));

										$query="SELECT * FROM suppliers WHERE name LIKE '%".$name."%' OR product LIKE '%".$name."%' OR website LIKE '%".$name."%'";

										$result =mysqli_query($con,$query);

										if (mysqli_num_rows($result) > 0) {
											echo '
											<table class="table">
												<thead>
													<tr>
														<th>ID</th>
														<th>Name</th>
														<th>Product</th>
														<th>Contact #</th>
														<th>Email</th>
														<th>Website</th>
														<th>Address</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>';
													while ($row = mysqli_fetch_assoc($result)) {											

														echo '
														<tr>
															<td>'.$row['id'].'</td>
															<td>'.$row['name'].'</td>
															<td>'.$row['product'].'</td>
															<td>'.$row['contactNumber'].'</td>
															<td>'.$row['email'].'</td>
															<td><a target="blank" href="'.$row['website'].'">'.$row['website'].'</a></td>
															<td>'.$row['address'].'</td>
															<td class="pull-right">
																<a href="createorder.php?id='.$row['id'].'" class="btn btn-warning">Make Order</a>   <a href="editsupplier.php?id='.$row['id'].'" class="btn btn-primary">Update Supplier</a>
															</td>
														</tr>';
													}
													echo '
												</tbody>
											</table>';
										} else {
											echo " Supplier Not Found";
										}	
									}

									?>

								</form>
							</div>
						</div>
					</div>
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
									<a href="addsupplier.php" class="btn btn-success"> Add Supplier</a>
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
							$sql = "SELECT * FROM suppliers ORDER BY id DESC LIMIT $start_from, $num_rec_per_page";
							$res = mysqli_query($con, $sql);

							if (mysqli_num_rows($res) > 0) {
								echo '
								<table class="table">
									<thead>
										<tr>
											<th>ID</th>
											<th>Name</th>
											<th>Product</th>
											<th>Contact #</th>
											<th>Email</th>
											<th>Website</th>
											<th>Address</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>';
										while ($row = mysqli_fetch_assoc($res)) {											

											echo '
											<tr>
												<td>'.$row['id'].'</td>
												<td>'.$row['name'].'</td>
												<td>'.$row['product'].'</td>
												<td>'.$row['contactNumber'].'</td>
												<td>'.$row['email'].'</td>
												<td><a target="blank" href="'.$row['website'].'">'.$row['website'].'</a></td>
												<td>'.$row['address'].'</td>
												<td class="pull-right">
													<a href="createorder.php?id='.$row['id'].'" class="btn btn-warning">Make Order</a>   <a href="editsupplier.php?id='.$row['id'].'" class="btn btn-primary">Update Supplier</a>
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

						$sql = "SELECT * FROM job";
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