<?php
include '../admin/functions.php';
?>

<?php
if(isset($_SESSION['user_id']) == '' ) {
	header("location:../login.php");
}
?>

<?php
if(isset($_GET['id']) && $_GET['id'] != '') {

	$id = mysqli_real_escape_string($con, strip_tags(trim($_GET['id'])));
	$sql = "SELECT * FROM cart WHERE id='".$id."'";
	$res = mysqli_query($con, $sql);

	if (mysqli_num_rows($res) > 0) {

		while ($row = mysqli_fetch_assoc($res)) {

			$tot = $row['price'] * $row['num'];
			$cart = 'ID: '.
			$row['id'].'<br>Product ID: '.
			$row['prod_id'].'<br>Name: '.
			$row['name'].'<br>Price: R '.
			$row['price'].'<br>Quantity: '.
			$row['num'].'<br>Total: R '.
			$tot;
		}
	}
}
?>

<?php

if(isset($_POST['submit'])) {

	$num = mysqli_real_escape_string($con, strip_tags(trim($_POST["num"])));

	if($num != '') {

		$sql = "UPDATE cart SET num='".$num."' WHERE id='".$_GET['id']."'";
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'Successfully updated details.';
		header("Location: cart.php");

	} else {
		$_SESSION['failure'] = 'Please fill in all fields';
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
				<h1 class="page-header">Allocate Job</h1>
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
						Enter update details
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-offset-3 col-md-3">
								<form role="form" method="post">
									<div class="form-group">
										<label>Device details</label>
										<p>
											<?php
											echo $cart;
											?>
										</p>
									</div>
									<div class="form-group">
										<label>Change status</label>
										<input class="form-control" type="number" name="num" value="<?php
                                        $res = mysqli_query($con, "SELECT * FROM cart WHERE id='".$_GET['id']."' ");
                                        $row = mysqli_fetch_assoc($res);
                                        echo $row['num'];
                                        ?>">
									</div>
									<button name="submit" type="submit" class="btn btn-primary">Submit Update</button>
									<button name="remove" type="submit" class="btn btn-danger">Remove Entirely</button>
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