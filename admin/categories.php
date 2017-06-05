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
	$date = date("Y-m-d H:i:s");



	if($name != '' && $type != '' && $description != '') {

		$sql = "INSERT INTO category(name, type, description, dateCreated)
		VALUES('".$name."', '".$type."','".$description."' , '".$date."')";
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'Your new category was added successfully.';
		header("Location: categories.php");
	}else {
		$_SESSION['failure'] = 'Please fill in all fields.';
	}
}
?>

<?php
if(isset($_GET['id']) && $_GET['id'] != '') {

	$id = mysqli_real_escape_string($con, strip_tags(trim($_GET['id'])));

	if ($id) {
		$sql = "UPDATE category SET archive=1 WHERE id='".$id."'";
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'Category was archived successfully.';
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
				<h1 class="page-header">Categories</h1>				
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<!-- /.row -->

		<!-- Modal -->
		<div class="modal fade" id="addCat" tabindex="-1" role="dialog" aria-labelledby="addCatLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span> Close</button>
						<h4 class="modal-title" id="addCatLabel">Add Category</h4>
					</div>
					<div class="modal-body">
						<form role="form" method="post">
							<div class="form-group">
								<label>Category name</label>
								<input name="name" class="form-control" placeholder="Enter name">
							</div>
							<div class="form-group">
								<label>Category type</label>
								<select name="type" class="form-control">
									<option value="" selected="selected">Select type</option>
									<option value="Hardware" >Hardware</option>
									<option value="Software" >Software</option>
								</select>
							</div>
							<div class="form-group">
								<label>Category description</label>
								<textarea name="description" class="form-control" rows="3"></textarea>
							</div>
							<button name="submit" type="submit" class="btn btn-primary">Submit Category</button>
							<button type="reset" class="btn btn-default">Reset Category</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /.Modal -->

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
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						List of all categories
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="pull-right">
									<button class="btn btn-success" data-toggle="modal" data-target="#addCat"> Add Category</button>
								</div>
							</div>
						</div>
						<div class="table-responsive">
							<?php

							$sql = "SELECT * FROM category WHERE archive = 0";
							$res = mysqli_query($con, $sql);

							if (mysqli_num_rows($res) > 0) {
								echo '								
								<table id="category" class="table data-table">
									<thead>
										<tr>
											<th>Category ID</th>
											<th>Name</th>
											<th>Type</th>
											<th>Description</th>
											<th>Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>';
										while ($row = mysqli_fetch_assoc($res)) {

											echo '
											<tr>
												<td>'.$row['id'].'</td>
												<td>'.$row['name'].'</td>
												<td>'.$row['type'].'</td>
												<td>'.$row['description'].'</td>
												<td>'.date("M d, y",strtotime($row['dateCreated'])).'</td>
												<td class="pull-right">
													<a href="editcat.php?id='.$row['id'].'" class="btn btn-primary">Edit Category</a>  <a href="?id='.$row['id'].'" class="btn btn-warning">Archive Category</a>
												</td>
											</tr>';
										}
										echo '
									</tbody>
								</table>';
							} else {
								echo '<div class="alert alert-info">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>No categories found.</strong>
							</div>';
						}
						?>
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
		$('#category').DataTable();
	});
</script>