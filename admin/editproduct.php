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
	header('Location: products.php');
}


if(isset($_POST['submit'])) {
	$price = mysqli_real_escape_string($con, strip_tags(trim($_POST["price"])));
	$start = mysqli_real_escape_string($con, strip_tags(trim($_POST["start"])));
	$end = mysqli_real_escape_string($con, strip_tags(trim($_POST["end"])));
	$date = date("Y-m-d");
	
	if($price != '' && $start != '' && $end != '') {

		if ($start < $date) {
			$_SESSION['failure'] = 'Entered start date has past already.';

		} else if ($end > $start) {

			$sql = "UPDATE product SET promo_price='".$price."', promo_date1='".$start."', promo_date2='".$end."' WHERE id='".$id."'";
			mysqli_query($con, $sql);
			$_SESSION['success'] = 'Your new Promotional Product was added successfully.';
			header("Location: promotions.php");
		} else {
			$_SESSION['failure'] = 'Entered end date has past already.';
		}		
	}else {
		$_SESSION['failure'] = 'Please fill in all fields.';
	}
}
?>

<?php

$promo = '';
$gennam = '';
$brandnam = '';
$typ = '';
$pri = '';
$des = '';

$sql = "SELECT * FROM product WHERE id=$id";
$res = mysqli_query($con, $sql);

if(mysqli_num_rows($res) > 0) {
	while($row = mysqli_fetch_assoc($res)) {
		$promo = '
		ID : '.$row['id'].'<br>
		User : '.$row['user'].'<br>
		Name : '.$row['brand_name'].','.$row['generic_name'].'<br>
		Type : '.$row['type'].'<br>
		Price : R '.$row['price'].'<br>
		Date : '.date("M d, y",strtotime($row['date'])).'<br>
		Description : '.$row['description'].'<br>
		<img class="img-responsive" src="../uploads/'.$row['pic_url'].'">';
		$gennam = $row['generic_name'];
		$brandnam = $row['brand_name'];
		$typ = $row['type'];
		$pri = $row['price'];
		$des = $row['description'];
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
				<h1 class="page-header">Product Details</h1>
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
						Update product details
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="pull-right">
									<a href="products.php" class="btn btn-warning">Products</a>
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
										<label>Brand Name</label>
										<input type="text" name="bname" class="form-control" value="<?php echo $brandnam; ?>">
									</div>
										<div class="form-group">
										<label>Generic Name</label>
										<input type="text" name="genname" class="form-control" value="<?php echo $gennam; ?>">
									</div>
									<div class="form-group">
										<label>Device type</label>
										<select name="type" class="form-control">
											<option value="" selected="selected"><?php echo $typ; ?></option>
											<?php
											$sql = "SELECT * FROM category ORDER BY name ASC";
											$res = mysqli_query($con, $sql);

											if(mysqli_num_rows($res) > 0) {
												while($row = mysqli_fetch_assoc($res)) {
													echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
												}
											}
											?>
										</select>
									</div>
									<div class="form-group">
										<label>Price</label>
										<input type="decimal" name="price" class="form-control" value="<?php echo $pri; ?>">
									</div>
									<div class="form-group">
										<label>Device description</label>
										<textarea name="description" class="form-control" rows="3"><?php echo $des; ?></textarea>
									</div>
									<button name="submit" type="submit" class="btn btn-primary">Update Product</button>
									<button type="reset" class="btn btn-default">Reset Form</button>
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