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
if (isset($_GET['id']) && $_GET['id'] != null) {
	$id = mysqli_real_escape_string($con, strip_tags(trim($_GET["id"])));
} else {
	header('Location: suppliers.php');
}

$name = '';
$product = '';
$email = '';

$sql = "SELECT * FROM suppliers WHERE id=$id";
$res = mysqli_query($con, $sql);

if(mysqli_num_rows($res) > 0) {
	while($row = mysqli_fetch_assoc($res)) {
		$order = '
		ID : '.$row['id'].'<br>
		Name : '.$row['name'].'<br>
		Email : '.$row['email'].'<br>
		Website : <a href="'.$row['website'].'" target="blank">'.$row['website'].'</a><br>
		Product : '.$row['product'].'
		';
		$name = $row['name'];
		$product = $row['product'];
		$email = $row['email'];
	}
}

if(isset($_POST['submit'])) {

	$quantity = mysqli_real_escape_string($con, strip_tags(trim($_POST["quantity"])));
	$date = date("Y-m-d H:i:s");
	
	if($quantity != '') {

		$sql = "INSERT INTO orders(supplierID, supplierName, orderDate, quantity, productName, email) VALUES('".$id."', '".$name."', '".$date."', '".$quantity."', '".$product."', '".$email."')";
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'Your new order has been added successfully.';
		header("Location: orders.php");
	}else {
		$_SESSION['failure'] = 'Please fill in all fields.';
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
				<h1 class="page-header">Order Request</h1>
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
						Enter Order details
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="pull-right">
									<a href="suppliers.php" class="btn btn-warning">Suppliers</a>
								</div>
							</div>
							<div class="col-md-6">
								<h2>Supplier details</h2>
								<?php
								echo $order;
								?>
							</div>

							<div class="col-md-6">
								<form role="form" method="post">
									<div class="col-md-6">
										<div class="form-group">
											<label>Order Quantity</label>
											<input type="number" name="quantity" class="form-control" placeholder="Enter quantity">
										</div>
										<button name="submit" type="submit" class="btn btn-primary">Submit Order</button>
										<button type="reset" class="btn btn-default">Reset Order</button>
									</div>
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