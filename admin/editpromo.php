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

if (isset($_GET['id']) && $_GET['id'] != null) {
	$id = mysqli_real_escape_string($con, strip_tags(trim($_GET["id"])));
} else {
	header('Location: items.php');
}


if(isset($_POST['submit'])) {

	$price = mysqli_real_escape_string($con, strip_tags(trim($_POST["price"])));
	$start = mysqli_real_escape_string($con, strip_tags(trim($_POST["start"])));
	$end = mysqli_real_escape_string($con, strip_tags(trim($_POST["end"])));
	
	if($price != '' && $start != '' && $end != '') {

		$sql = "UPDATE product SET promo_price='".$price."', promo_date1='".$start."', promo_date2='".$end."' WHERE id='".$id."'";
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'Your new Promotional Product was added successfully.';
		header("Location: promo.php");
	}else {
		$_SESSION['failure'] = 'Please fill in all fields.';
	}
}
?>

<?php

$promo = '';

$sql = "SELECT * FROM product WHERE id=$id";
$res = mysqli_query($con, $sql);

if(mysqli_num_rows($res) > 0) {
	while($row = mysqli_fetch_assoc($res)) {
		$promo = '
		ID : '.$row['id'].'<br>
		User : '.$row['user'].'<br>
		Name : '.$row['name'].'<br>
		Type : '.$row['type'].'<br>
		Price : R '.$row['price'].'<br>
		Date : '.date("M d, y",strtotime($row['date'])).'<br>
		Description : '.$row['description'].'<br>
		<img class="img-responsive" src="../uploads/'.$row['pic_url'].'">';
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
				<h1 class="page-header">Promotional Item Details</h1>
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
						Enter item details
					</div>
					<div class="panel-body">
						<div class="row">
						<div class="col-lg-12">
								<div class="pull-right">
									<a href="items.php" class="btn btn-warning">Items</a>
									<a href="promo.php" class="btn btn-warning">Promotional</a>
								</div>
							</div>
							<div class="col-md-6">
							<h2>Device details</h2>
							<?php
							echo $promo;
							?>
							</div>

							<div class="col-md-6">
								<form role="form" method="post">
									<div class="form-group">
										<label>Promotional Price</label>
										<input type="decimal" name="price" class="form-control" placeholder="Enter price">
									</div>
									<div class="form-group">
										<label>Start Date</label>
										<input type="date" name="start" class="form-control" placeholder="Enter date">
									</div>
									<div class="form-group">
										<label>End Date</label>
										<input type="date" name="end" class="form-control" placeholder="Enter date">
									</div>
									<button name="submit" type="submit" class="btn btn-primary">Submit Promotion</button>
									<button type="reset" class="btn btn-default">Reset Promotion</button>
								</form>
							</div>
							<!-- /.col-lg-6 (nested) -->
						</div>
						<!-- /.row (nested) -->
					</div>
					<!-- /.panel-body -->
				</div>
				<!-- /.panel -->
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php
include 'footer.php';
?>