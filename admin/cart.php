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
				<h1 class="page-header">Shopping Cart</h1>
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
						List of all user carts
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div class="table-responsive">
							<?php

							$sql = "SELECT * FROM cart";
							$res = mysqli_query($con, $sql);

							if (mysqli_num_rows($res) > 0) {
								echo '
								<table id="cart" class="table data-table">
									<thead>
										<tr>
											<th>ID</th>
											<th>User</th>
											<th>Product</th>
											<th>Quantity</th>
											<th>Date</th>
											<th class="pull-right">Action</th>
										</tr>
									</thead>
									<tbody>';
										while ($row = mysqli_fetch_assoc($res)) {

											$userD = '';
											$prodD = '';

											$sql1 = "SELECT * FROM user WHERE id='".$row['user_id']."'";
											$res1 = mysqli_query($con, $sql1);
											if (mysqli_num_rows($res1) > 0) {
												while ($row1 = mysqli_fetch_assoc($res1)) {
													$userD = 'Name: '.$row1['name'].'<br>Surname: '.$row1['surname'].'<br>Location: '.$row1['location'];
												}
											}else {
												$userD = 'User does not exist!';
											}

											$sql2 = "SELECT * FROM product WHERE id='".$row['prod_id']."'";
											$res2 = mysqli_query($con, $sql2);
											if (mysqli_num_rows($res2) > 0) {
												while ($row2 = mysqli_fetch_assoc($res2)) {
													$prodD = 'Name: '.$row2['name'].'<br>Type: '.$row2['type'].'<br>Price: R '.$row2['price'].'<br>Description: '.$row2['description'];
												}
											}else {
												$prodD = 'Product does not exist!';
											}

											echo '
											<tr>
												<td>'.$row['id'].'</td>
												<td>'.$userD.'</td>
												<td>'.$prodD.'</td>
												<td>'.$row['num'].'</td>
												<td>'.date("M d, y",strtotime($row['date'])).'</td>
												<td class="pull-right">
													<a href="?id='.$row['id'].'" class="btn btn-primary">View Product</a>  <a href="?id='.$row['id'].'" class="btn btn-warning">Edit</a>  <a href="?id='.$row['id'].'" class="btn btn-danger">Delete</a>
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
		$('#cart').DataTable();
	});
</script>