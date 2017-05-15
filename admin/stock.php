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
						List of all stock
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="pull-right">
									<a href="graph.php" class="btn btn-warning"> Show Graph</a>
								</div>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>Product Name</th>
										<th>Count number of product</th>
										<th>Description</th>
										<th>Date in</th>
									</tr>
								</thead>
								<tbody>
									<?php
									include 'database.php';
									$pdo = Database::connect();
									$sql = 'SELECT * FROM product ORDER BY id DESC LIMIT 12';
									foreach ($pdo->query($sql) as $row) {
										echo '<tr>';
										echo '<td>'. $row['name'] . '</td>';
										echo '<td>'.count($row['name']). '</td>';
										echo '<td>'. $row['description'] . '</td>';
										echo '<td>'.date("M d, y",strtotime($row['date'])). '</td>';
										echo '<td width=250>';
										//echo '<a class="btn btn-success" href="read.php?id='.$row['id'].'">Read</a>';
										echo ' ';
										echo '</td>';
										echo '</tr>';
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
									}
									Database::disconnect();
									?>
								</tbody>
							</table>
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