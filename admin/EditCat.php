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
	header('Location: viewcat.php');
}


if(isset($_POST['submit'])) {

	$name = mysqli_real_escape_string($con, strip_tags(trim($_POST["name"])));
	$type = mysqli_real_escape_string($con, strip_tags(trim($_POST["type"])));
	$description = mysqli_real_escape_string($con, strip_tags(trim($_POST["description"])));
	$date = date("Y-m-d H:i:s");
	
	if($name != '' && $type != '' && $description != '') {

		$sql = "UPDATE category SET name='".$name."', type='".$type."', description='".$description."' WHERE id='".$id."'";
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'Your new Category was updated successfully.';
		header("Location: viewcat.php");
	}else {
		$_SESSION['failure'] = 'Please fill in all fields.';
	}
}
?>

<?php

$cat = '';

$sql = "SELECT * FROM category WHERE id=$id";
$res = mysqli_query($con, $sql);

if(mysqli_num_rows($res) > 0) {
	while($row = mysqli_fetch_assoc($res)) {
		$cat = '
		ID : '.$row['id'].'<br>
		Name : '.$row['name'].'<br>
		Type : '.$row['type'].'<br>
		Description : '.$row['description'].'<br>
		Date : '.date("M d, y",strtotime($row['dateCreated'])).'
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
				<h1 class="page-header">Category Details</h1>
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
						Enter	Category details
					</div>
					<div class="panel-body">
						<div class="row">
						<div class="col-lg-12">
								<div class="pull-right">
									<a href="viewcat.php" class="btn btn-warning">Categories</a>
								</div>
							</div>
							<div class="col-md-6">
								<h2>Category details</h2>
								<?php
								echo $cat;
								?>
							</div>

							<div class="col-md-6">
								<form role="form" method="post">
									<div class="form-group">
										<label>Category Name</label>
										<input type="decimal" name="name" class="form-control" value="<?php
										$res = mysqli_query($con, "SELECT * FROM category WHERE id='".$id."' ");
										$row = mysqli_fetch_assoc($res);
										echo $row['name'];
										?> ">
									</div>
									<div class="form-group">
										<label>Category Type</label>
										<select name="type" class="form-control">
											<option value="" selected="selected">Select type</option>
											<option value="Hardware" >Hardware</option>
											<option value="Software" >Software</option>
										</select>
									</div>
									<div class="form-group">
										<label>Category Description</label>
										<textarea name="description" class="form-control" rows="3"></textarea>
									</div>
									<button name="submit" type="submit" class="btn btn-primary">Submit Category</button>
									<button type="reset" class="btn btn-default">Reset Category</button>
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