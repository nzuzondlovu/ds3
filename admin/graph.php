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
<script src="js/jquery.js" type="text/javascript"></script>

<script type="application/javascript" src="js/awesomechart.js"></script>
<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Stock (Graph)</h1>
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
						Different Products with Quantity
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
					<div class="row">
							<div class="col-lg-12">
								<div class="pull-right">
									<a href="stock.php" class="btn btn-warning"> Show Stock Table</a>
								</div>
							</div>
						</div>
						<div class="hero-unit-table">
							<div class="charts_container">
								<div class="chart_container">
								<canvas id="motorcycle_graph" width="1500" height="400">
										Your web-browser does not support the HTML 5 canvas element.
									</canvas>
								</div>
							</div>
						</div>
						<script type="application/javascript">
							var motorcycle_chart = new AwesomeChart('motorcycle_graph');
							motorcycle_chart.data = [
							<?php
							$query = mysqli_query($con, "SELECT * FROM product LIMIT 15");
							while ($row = mysqli_fetch_array($query)) {
								?>
								<?php echo $row['price'] . ','; ?>
								<?php }; ?>
								];

								motorcycle_chart.labels = [
								<?php
								$query = mysqli_query($con, "SELECT * FROM product");
								while ($row = mysqli_fetch_array($query)) {
									?>
									<?php echo "'" . $row['name'] . "'" . ','; ?>
									<?php }; ?>
									];
									motorcycle_chart.colors = ['gold', 'skyblue', '#FF6600', 'pink', 'darkblue', 'lightpink', 'green'];
									motorcycle_chart.randomColors = true;
									motorcycle_chart.animate = true;
									motorcycle_chart.animationFrames = 30;
									motorcycle_chart.draw();
								</script>
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