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

if(isset($_POST['submit'])) {

	$name = mysqli_real_escape_string($con, strip_tags(trim($_POST["name"])));
	$type = mysqli_real_escape_string($con, strip_tags(trim($_POST["type"])));
	$description = mysqli_real_escape_string($con, strip_tags(trim($_POST["description"])));
	$price = mysqli_real_escape_string($con, strip_tags(trim($_POST["price"])));
	$target_dir = "../uploads/";
	$url = basename( $_FILES["fileToUpload"]["name"]);
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$user = $_SESSION['user_id'];
	$date = date("Y-m-d H:i:s");

	$sql = "INSERT INTO product(user, name, description, type, price, pic_url, date)
	VALUES('".$user."', '".$name."', '".$description."', '".$type."', '".$price."', '".$url."', '".$date."')";

	upload($url, $target_dir, $target_file, $sql, $con);

}
?>

<?php
if(isset($_GET['id']) && $_GET['id'] != '') {

	$id = mysqli_real_escape_string($con, strip_tags(trim($_GET['id'])));

	if ($id) {
		$sql = "UPDATE product SET archive=1 WHERE id='".$id."'";
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'Booking was archived successfully.';
	} else {
		$_SESSION['failure'] = 'An error occured, please try again.';
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
				<h1 class="page-header">Cart (Chart)</h1>
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
						Chart of cart products
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="pull-right">
									<a class="btn btn-success" href="cart.php"> Table</a>
								</div>
							</div>
						</div>
						<div class="table-responsive">
            <div class="col-lg-12">
                <div class="panel panel-default">
                        <canvas id="stockcanvas" height="100%">
                            Your web-browser does not support the HTML 5 canvas element.
                        </canvas>
            </div>
        </div>
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
		$('#products').DataTable();
	});
</script>
<script type="text/javascript" src="../assets/js/cartchart.js"></script>