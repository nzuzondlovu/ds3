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
 
	$brandname = mysqli_real_escape_string($con, strip_tags(trim($_POST["bname"])));
	$genname = mysqli_real_escape_string($con, strip_tags(trim($_POST["name"])));
	$type = mysqli_real_escape_string($con, strip_tags(trim($_POST["type"])));
	$description = mysqli_real_escape_string($con, strip_tags(trim($_POST["description"])));
	$supplier = mysqli_real_escape_string($con, strip_tags(trim($_POST["supplier"])));
	$oprice = mysqli_real_escape_string($con, strip_tags(trim($_POST["oprice"])));
	$price = mysqli_real_escape_string($con, strip_tags(trim($_POST["price"])));
	$profit = mysqli_real_escape_string($con, strip_tags(trim($_POST["profit"])));
	$qty= mysqli_real_escape_string($con, strip_tags(trim($_POST["qty"])));
	$qtysold= mysqli_real_escape_string($con, strip_tags(trim($_POST["qtysold"])));
	$target_dir = "../uploads/";
	$url = basename( $_FILES["fileToUpload"]["name"]);
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$user = $_SESSION['user_id'];
	$date = date("Y-m-d H:i:s");

	$sql = "INSERT INTO product(user, brand_name,generic_name,description,type,order_price,price,profit,supplierID,qty,qty_sold, pic_url, date)
	VALUES('".$user."', '".$brandname."', '".$genname."', '".$description."', '".$type."', '".$oprice."', '".$price."','".$profit."','".$supplier."','".$qty."','".$qtysold."','".$url."', '".$date."')";

	upload($url, $target_dir, $target_file, $sql, $con);

}
?>

<?php
if(isset($_GET['id']) && $_GET['id'] != '') {

	$id = mysqli_real_escape_string($con, strip_tags(trim($_GET['id'])));

	if ($id) {
		$sql = "UPDATE product SET archive=1 WHERE id='".$id."'";
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'Product was archived successfully.';
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
				<h1 class="page-header">Products</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->

		<!-- Modal -->
		<div class="modal fade" id="addItem" tabindex="-1" role="dialog" aria-labelledby="addItemLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span> Close</button>
						<h4 class="modal-title" id="addItemLabel">Add Product</h4>
					</div>
					<div class="modal-body">
						<form role="form" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label>Device name</label>
								<input name="name" class="form-control" placeholder="Enter text">
							</div>
							<div class="form-group">
								<label>Device type</label>
								<select name="type" class="form-control">
									<option value="" selected="selected">Select type</option>
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
								<label>Order price</label>
								<input name="oprice" class="form-control" placeholder="Enter text">
							</div>
							<div class="form-group">
								<label>Device sell price</label>
								<input name="price" class="form-control" placeholder="Enter text">
							</div>
								<div class="form-group">
								<label>Profit</label>
								<input name="profit" class="form-control" placeholder="Enter text" readonly>>
							</div>
							<div class="form-group">
								<label>Supplier Name</label>
								<select name="supplier" class="form-control">
									<option value="" selected="selected">Select type</option>
									<?php
									$sql = "SELECT * FROM suppliers ORDER BY name ASC";
									$res = mysqli_query($con, $sql);

									if(mysqli_num_rows($res) > 0) {
										while($row = mysqli_fetch_assoc($res)) {
											echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
										}
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label>Upload picture</label>
								<input type="file" name="fileToUpload">
							</div>
							<div class="form-group">
								<label>Device description</label>
								<textarea name="description" class="form-control" rows="3"></textarea>
							</div>
							<button name="submit" type="submit" class="btn btn-primary">Submit Device</button>
							<button type="reset" class="btn btn-default">Reset Device</button>
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
				<div class="panel panel-default">
					<div class="panel-heading">
						List of all products
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="pull-right">
									<button class="btn btn-success" data-toggle="modal" data-target="#addItem"> Add Product</button>
								</div>
							</div>
						</div>
						<div class="table-responsive">
							<?php

							$sql = "SELECT * FROM product WHERE archive = 0";
							$res = mysqli_query($con, $sql);

							if (mysqli_num_rows($res) > 0) {
								echo '
								<table id="products" class="table">
									<thead>
										<tr>
											<th>Product ID</th>
											<th>User</th>
											<th>Name</th>
											<th>Description</th>
											<th>type</th>
											<th>Price</th>
											<th>Picture</th>
											<th>Date</th>
											<th>Promo</th>
										</tr>
									</thead>
									<tbody>';
										while ($row = mysqli_fetch_assoc($res)) {

											$button = '<a href="editpromo.php?id='.$row['id'].'" class="btn btn-primary">Make Promo</a>   <a href="editproduct.php?id='.$row['id'].'" class="btn btn-info">Edit</a>';
											
											if ($row['promo_price'] > 0) {
												$button = '<a href="editpromo.php?id='.$row['id'].'" class="btn btn-info">Edit Promo</a>   <a href="editproduct.php?id='.$row['id'].'" class="btn btn-primary">Edit</a>';
											}

											echo '
											<tr>
												<td>'.$row['id'].'</td>
												<td>'.$row['user'].'</td>
												<td>'.$row['name'].'</td>
												<td>'.$row['description'].'</td>
												<td>'.$row['type'].'</td>
												<td>'.$row['price'].'</td>
												<td><img src="../uploads/'.$row['pic_url'].'" class="img-responsive"></td>
												<td>'.date("M d, y",strtotime($row['date'])).'</td>
												<td>'.$button.'   <a href="?id='.$row['id'].'" class="btn btn-warning">Archive</a></td>
											</tr>';
										}
										echo '
									</tbody>
								</table>';
							} else {
								echo '<div class="alert alert-info">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>No products found.</strong>
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
		$('#products').DataTable();
	});
</script>