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
				<h1 class="page-header">Promotional Products</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						List of all promotional products
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
					<div class="row">
							<div class="col-lg-12">
								<div class="pull-right">
									<a href="products.php" class="btn btn-success"> Create Promotion</a>
								</div>
							</div>
						</div>
						<div class="table-responsive">
							<?php
							
							$sql = "SELECT * FROM product WHERE promo_price > 0 AND archive = 0";
							$res = mysqli_query($con, $sql);

							if (mysqli_num_rows($res) > 0) {
								echo '
								<table id="promo" class="table">
									<thead>
										<tr>
											<th>ID</th>
											<th>User</th>
											<th>Description</th>
											<th>Promo Price</th>
											<th>Promo Dates</th>
											<th>Picture</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>';
										while ($row = mysqli_fetch_assoc($res)) {

											$details = $row['name'].'<br>'.$row['description'].'<br>'.$row['type'].'<br> R '.$row['price'];
											$dates = date("M d, y",strtotime($row['promo_date1'])).' - '.date("M d, y",strtotime($row['promo_date2']));
											echo '
											<tr>
												<td>'.$row['id'].'</td>
												<td>'.$row['user'].'</td>
												<td>'.$details.'</td>
												<td> R '.$row['promo_price'].'</td>
												<td>'.$dates.'</td>
												<td><img class="img-responsive" src="../uploads/'.$row['pic_url'].'"></td>
												<td><a href="editpromo.php?id='.$row['id'].'" class="btn btn-primary">Edit Promo</a></td>
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
		$('#promo').DataTable();
	});
</script>