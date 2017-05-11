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
				<h1 class="page-header">Products</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						List of all products
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
							$sql = "SELECT * FROM product ORDER BY id DESC LIMIT $start_from, $num_rec_per_page";
							$res = mysqli_query($con, $sql);

							if (mysqli_num_rows($res) > 0) {
								echo '
								<table class="table">
									<thead>
										<tr>
											<th>Product ID</th>
											<th>User</th>
											<th>Name</th>
											<th>Description</th>
											<th>type</th>
											<th>Price</th>
											<th>Picture</th>
											<th>Date</th>
											<th>Promo</th>
										</tr>
									</thead>
									<tbody>';
										while ($row = mysqli_fetch_assoc($res)) {

											$button = '';
											
											if ($row['promo_price'] == 0) {
												$button = '<a href="editpromo.php?id='.$row['id'].'" class="btn btn-primary">Make Promo</a>';
											}

											echo '
											<tr>
												<td>'.$row['id'].'</td>
												<td>'.$row['user'].'</td>
												<td>'.$row['name'].'</td>
												<td>'.$row['description'].'</td>
												<td>'.$row['type'].'</td>
												<td>'.$row['price'].'</td>
												<td><img src="../uploads/'.$row['pic_url'].'" class="img-responsive"></td>
												<td>'.date("M d, y",strtotime($row['date'])).'</td>
												<td>'.$button.'</td>
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

						$sql = "SELECT * FROM product";
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