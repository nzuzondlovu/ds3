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
				<h1 class="page-header">Stock</h1>				
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
							List of stock
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<div class="pull-right">
										<a href="stockgraph.php" class="btn btn-success"> Show Graph</a>
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
								$sql = "SELECT * FROM product";
								$res = mysqli_query($con, $sql);

								if (mysqli_num_rows($res) > 0) {
									echo '
									<table id="stock" class="table">
										<thead>
											<tr>
												<th>ID</th>
												<th>Product Name</th>
												<th>Count number of product</th>
												<th>Description</th>
												<th>Date in</th>
											</tr>
										</thead>
										<tbody>';
											while ($row=mysqli_fetch_array($res)) {

												echo '
												<tr>
													<td>'.$row['id'].'</td>
													<td>'.$row['brandname'].' '.$row['generic_name'].'</td>
													<td>'.count($row['generic_name']).'</td>													
													<td>'.$row['description'].'</td>
													<td>'.date("M d, y",strtotime($row['date'])).'</td>
												</tr>';

												/*
												$category = $row['type']; 
												$prod_name = $row['name'];
												$query = mysqli_query($con,"SELECT * FROM stork WHERE category = '$category' AND productName = '$prod_name'");
												$count = mysqli_num_rows($query);
												if($count < 1){
													$insert_stock = "INSERT INTO stork(category,productName,quantityOnHand)
													VALUES('{$category}','{$prod_name}','')";
													if(mysqli_query($con,$insert_stock))
													{

													}
													else{
														echo mysqli_error($con);
													}
												}
												*/
											}
											echo '
											
										</tbody>
									</table>';
								} else {
									echo '<div class="alert alert-info">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<strong>No Orders found.</strong>
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
		$('#stock').DataTable();
	});
</script>