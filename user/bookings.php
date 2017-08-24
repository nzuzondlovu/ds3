<?php
ob_start();
include '../includes/functions.php';
?>

<?php
if(isset($_SESSION['user_id']) == '' ) {
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
				<h1 class="page-header">Bookings</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						List of all bookings
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
							$sql = "SELECT * FROM job WHERE user ='".$_SESSION['user_id']."' ORDER BY id DESC LIMIT $start_from, $num_rec_per_page";
							$res = mysqli_query($con, $sql);

							if (mysqli_num_rows($res) > 0) {
								echo '
								<table class="table">
									<thead>
										<tr>
											<th>Booking ID</th>
											<th>Device name</th>
											<th>Serial</th>
											<th>Type</th>
											<th>Picture</th>
											<th>Description</th>
											<th>Date in</th>
											<th>Status</th>
											<th>Technician</th>
											<th>Date out</th>
										</tr>
									</thead>
									<tbody>';
										while ($row = mysqli_fetch_assoc($res)) {

											echo '
											<tr>
												<td>'.$row['id'].'</td>
												<td>'.$row['name'].'</td>
												<td>'.$row['serial'].'</td>
												<td>'.$row['type'].'</td>
												<td><img src="../uploads/'.$row['pic_url'].'"></td>
												<td>'.$row['description'].'</td>
												<td>'.date("M d, y",strtotime($row['date_in'])).'</td>
												<td>'.$row['status'].'</td>
												<td>'.$row['technician'].'</td>
												<td>'.date("M d, y",strtotime($row['date_out'])).'</td>
											</tr>';
										}
										echo '
									</tbody>
								</table>';
							} else {
								echo '<div class="alert alert-info">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>No bookings found.</strong>
							</div>';
						}

						$sql = "SELECT * FROM job WHERE user ='".$_SESSION['user_id']."'";
						$rs_result = mysqli_query($con, $sql); 
						$total_records = mysqli_num_rows($rs_result);  
						$total_pages = ceil($total_records / $num_rec_per_page);

						if ($total_pages == 0) {
							$total_pages = 1;
						}

						echo '
					</div>
					<div class="col-lg-12">
						<p align="center">
						<a class="btn btn-primary" href="?page=1">'."|<".'</a> '; 

							if ($page < 4) {
								for ($i=1; $i<$page; $i++) {
									echo '<a class="btn btn-primary" href="?page='.$i.'">'.$i.'</a> ';
								};
							} else {
								for ($i=($page-3); $i<$page; $i++) {
									echo '<a class="btn btn-primary" href="?page='.$i.'">'.$i.'</a> ';
								};
							}
							echo '<a class="btn btn-default" href="?page='.$page.'">'.$page.'</a> ';

							if ($page >= ($total_pages - 3)) {
								for ($i=($page+1); $i<=($total_pages); $i++) {
									echo '<a class="btn btn-primary" href="?page='.$i.'">'.$i.'</a> ';
								};
							} else {
								for ($i=($page+1); $i<=($page+3); $i++) {
									echo '<a class="btn btn-primary" href="?page='.$i.'">'.$i.'</a> ';
								};
							}

							echo '
							<a class="btn btn-primary" href="?page='.$total_pages.'">'.">|".'</a>
						</p>
					</div>';
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