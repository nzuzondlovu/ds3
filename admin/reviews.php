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
	$sql = "UPDATE review SET seen=1 WHERE id='".$id."'";
	$res = mysqli_query($con, $sql);
}
?>

<?php
if(isset($_GET['ar']) && $_GET['ar'] != '') {

	$ar = mysqli_real_escape_string($con, strip_tags(trim($_GET['ar'])));

	if ($ar) {
		$sql = "UPDATE review SET archive=1 WHERE id='".$ar."'";
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
				<h1 class="page-header">Reviews</h1>
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
						List of all product reviews
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div class="table-responsive">
							<?php

							$sql = "SELECT * FROM review WHERE archive = 0";
							$res = mysqli_query($con, $sql);

							if (mysqli_num_rows($res) > 0) {
								echo '
								<table id="review" class="table data-table">
									<thead>
										<tr>
											<th>ID</th>
											<th>Product</th>
											<th>User ID</th>
											<th>Name</th>
											<th>Message</th>
											<th>Rating</th>
											<th>Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>';
										while ($row = mysqli_fetch_assoc($res)) {

											$prodD = '';
											$button = '';

											$sql2 = "SELECT * FROM product WHERE id='".$row['prod_id']."'";
											$res2 = mysqli_query($con, $sql2);
											if (mysqli_num_rows($res2) > 0) {
												while ($row2 = mysqli_fetch_assoc($res2)) {
													$prodD = 'Name: '.$row2['name'].'<br>Type: '.$row2['type'].'<br>Price: R '.$row2['price'].'<br>Description: '.$row2['description'];
												}
											}else {
												$prodD = 'Product does not exist!';
											}

											if ($row['seen'] == 0) {
												$button = '<a href="?id='.$row['id'].'" class="btn btn-primary">Mark as Seen</a>';
											}

											echo '
											<tr>
												<td>'.$row['id'].'</td>
												<td>'.$prodD.'</td>
												<td>'.$row['user'].'</td>
												<td>'.$row['name'].'</td>
												<td>'.$row['message'].'</td>
												<td>'.$row['rate'].'</td>
												<td>'.date("M d, y",strtotime($row['date'])).'</td>
												<td class="pull-right">'.$button.'  <a href="?ar='.$row['id'].'" class="btn btn-warning">Archive</a></td>
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
		$('#review').DataTable();
	});
</script>