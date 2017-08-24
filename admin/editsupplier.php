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


if(isset($_POST['submit'])) {

	$number = mysqli_real_escape_string($con, strip_tags(trim($_POST["number"])));
	$email = mysqli_real_escape_string($con, strip_tags(trim($_POST["email"])));
	$address = mysqli_real_escape_string($con, strip_tags(trim($_POST["address"])));
	$product = mysqli_real_escape_string($con, strip_tags(trim($_POST["product"])));
	
	if($name != '' && $type != '' && $description != '') {

		$sql = "UPDATE suppliers SET contactNumber='".$number."', email='".$email."', address='".$address."', product='".$product."' WHERE id='".$id."'";
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'The supplier details were updated successfully.';
		header("Location: suppliers.php");
	}else {
		$_SESSION['failure'] = 'Please fill in all fields.';
	}
}
?>

<?php

$cat = '';

$sql = "SELECT * FROM suppliers WHERE id=$id";
$res = mysqli_query($con, $sql);

if(mysqli_num_rows($res) > 0) {
	while($row = mysqli_fetch_assoc($res)) {
		$cat = '
		ID : '.$row['id'].'<br>
		Name : '.$row['name'].'<br>
		Contact # : '.$row['contactNumber'].'<br>
		Email : '.$row['email'].'<br>
		Website : '.$row['website'].'<br>
		Address : '.$row['address'].'<br>
		Product : '.$row['product'].'
		';
		
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
				<h1 class="page-header">Supplier Details</h1>
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
						Enter supplier details
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
								echo $cat;
								?>
							</div>

							<div class="col-md-6">
								<form role="form" method="post">
									<div class="form-group">
										<label>Contact Number</label>
										<input type="text" name="number" class="form-control" value="<?php
										$res = mysqli_query($con, "SELECT * FROM suppliers WHERE id='".$id."' ");
										$row = mysqli_fetch_assoc($res);
										echo $row['contactNumber'];
										?>">
									</div>
									<div class="form-group">
										<label>Email Address</label>
										<input type="email" name="email" class="form-control" value="<?php
										$res = mysqli_query($con, "SELECT * FROM suppliers WHERE id='".$id."' ");
										$row = mysqli_fetch_assoc($res);
										echo $row['email'];
										?>">
									</div>
									<div class="form-group">
										<label>Physical Address</label>
										<input type="text" name="address" class="form-control" value="<?php
										$res = mysqli_query($con, "SELECT * FROM suppliers WHERE id='".$id."' ");
										$row = mysqli_fetch_assoc($res);
										echo $row['address'];
										?>">
									</div>
									<div class="form-group">
										<label>Product</label>
										<input type="text" name="product" class="form-control" value="<?php
										$res = mysqli_query($con, "SELECT * FROM suppliers WHERE id='".$id."' ");
										$row = mysqli_fetch_assoc($res);
										echo $row['product'];
										?>">
									</div>
									<button name="submit" type="submit" class="btn btn-primary">Submit Update</button>
									<button type="reset" class="btn btn-default">Reset Update</button>
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