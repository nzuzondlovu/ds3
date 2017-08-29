<?php
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
				<h1 class="page-header">Drivers</h1>				
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
						Search for Driver
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-offset-3 col-md-6">
								<form action="drivers.php" method="POST">
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

										$query="SELECT * FROM drivers WHERE name LIKE '%".$name."%' OR surname LIKE '%".$name."%' OR cell LIKE '%".$name."%' OR idnumber LIKE '%".$name."%'";

										$result =mysqli_query($con,$query);

										if(mysqli_num_rows($result)> 0) {

											echo '
											<table class="table">
												<thead>
													<tr>
														<th>Driver ID</th>
														<th>Name</th>
														<th>Surname</th>
														<th>Cell Number</th>
														<th>Id Number</th>
														<th>Email</th>
														
													</tr>
												</thead>
												<tbody>';
													while ($row=mysqli_fetch_array($result)) {

														echo '
														<tr>
															<td>'.$row['driverID'].'</td>
															<td>'.$row['name'].'</td>
															<td>'.$row['surname'].'</td>
															<td>'.$row['cell'].'</td>
															<td>'.$row['idnumber'].'</td>
															<td>'.$row['email'].'</td>
															<td class=" pull-right"><a href="DeleteDriver.php?id='.$row['driverID'].'" class="btn btn-danger">Delete</a></td>

														</tr>';
													}

													echo '
												</tbody>
											</table>';
										} else {
											echo " Drivers Not Found";
										}	
									}

									?>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						List of all Drivers
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
							$sql = "SELECT * FROM drivers ORDER BY driverID DESC LIMIT $start_from, $num_rec_per_page";
							$res = mysqli_query($con, $sql);

							if (mysqli_num_rows($res) > 0) {
								echo '
								<div class="pull-right">
									<a href="addDriver.php" class="btn btn-success"> Add Driver</a>
								</div>
								<table class="table">
									<thead>
													<tr>
													<th>Driver ID</th>
														<th>Name</th>
														<th>Surname</th>
														<th>Cell Number</th>
														<th>Id Number</th>
														<th>Email</th>
													</tr>
											
									</thead>
									<tbody>';
										while ($row = mysqli_fetch_assoc($res)) {

											echo '
											<tr>
													<td>'.$row['driverID'].'</td>
															<td>'.$row['name'].'</td>
															<td>'.$row['surname'].'</td>
															<td>'.$row['cell'].'</td>
															<td>'.$row['idnumber'].'</td>
															<td>'.$row['email'].'</td>
															<td class=" pull-right"><a href="DeleteDriver.php?id='.$row['driverID'].'" class="btn btn-danger">Delete</a> </td>
											</tr>';
										}
										echo '
									</tbody>
								</table>';
							} else {
								echo '<div class="alert alert-info">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>No Drivers Found.</strong>
							</div>';
						}

						$sql = "SELECT * FROM drivers";
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
