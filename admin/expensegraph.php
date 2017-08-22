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

$tot = 0.00;
$qty = 0;
$num = 0;
$sup = 0;

$sql = "SELECT * FROM orders";
$res = mysqli_query($con, $sql);

if (mysqli_num_rows($res) > 0) {

	$sql1 = "SELECT DISTINCT(productName) FROM orders";
	$num = mysqli_num_rows(mysqli_query($con, $sql1));

	$sql1 = "SELECT DISTINCT(supplierName) FROM orders";
	$sup = mysqli_num_rows(mysqli_query($con, $sql1));
	
	while ($row = mysqli_fetch_assoc($res)) {

		$qty += $row['quantity'];
		$tot += $row['totalPrice'];
	}
}
?>

<?php
include 'header.php';
?>
<script src="../assets/js/jquery.js" type="text/javascript"></script>

<script src="../assets/js/awesomechart.js" type="application/javascript"></script>
<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Expenses</h1>
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
						Expenses to date
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="pull-right">
									<a href="expense.php" class="btn btn-success"> Show Table</a>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="pull-left">
									From a total of <b><u><?php echo $sup; ?></u></b> suppliers<br>
									There have been <b><u><?php echo $num; ?></u></b> types of products bought to date<br>
									The total number of products bought from suppliers to date is <b><u><?php echo $qty; ?></u></b><br>
									The grand total expenditure from all expenses to suppliers is <b><u>R <?php echo $tot; ?></u></b>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<canvas id="stockcanvas" height="100%">
									Your web-browser does not support the HTML 5 canvas element.
								</canvas>
							</div>
						</div>
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
<script type="text/javascript" src="../assets/js/expensechart.js"></script>