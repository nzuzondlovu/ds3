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

		';
		$name = $row['name'];
		
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
								<form role="form" action="incoming.php" method="post">
									<div class="col-md-6">
										<div class="form-group">
                							<label>Brand Name</label>
											<input type="text" name="bname" class="form-control" placeholder="Enter Brand Name">
              							</div>


              							
              							<div class="form-group">
                							<label>Generic Name</label>
											<input type="text" name="genname" class="form-control" placeholder="Or Device Model">
              							</div>
    									<div class="form-group">
											<label>Order Quantity</label>
											<input type="number" name="qty" class="form-control" placeholder="Enter quantity">
										</div>	
              
				 						<button name="submit" type="submit" class="btn btn-info"><i class="fa fa-plus fa-fw"></i>Add</button>                                                                  
              							<button type="reset" class="btn btn-default">Reset</button>
										
									</div>
								</form>
							</div>
							<!-- /.col-lg-6 (nested) -->
						</div>
						<div class="table-responsive">
							<?php
							$num_rec_per_page=10;

							if (isset($_GET["page"])) {

								$page  = $_GET["page"];
							} else {

								$page=1;
							}

							$start_from = ($page-1) * $num_rec_per_page;
							$sql = "SELECT * FROM orders";
							$res = mysqli_query($con, $sql);

							if (mysqli_num_rows($res) > 0) {
								echo '
								<table id="suppliers" class="table">
									<thead>
										<tr>
											<th>Order ID</th>
											<th>Supplier ID</th>
											<th>Supplier Name</th>
											<th>Order Date</th>
											<th>Quantity</th>
											<th>Product Name</th>
											<th>Email</th>
											<th>Product Price</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>';
										while ($row = mysqli_fetch_assoc($res)) {											

											echo '
											<tr>
												<td>'.$row['id'].'</td>
												<td>'.$row['supplierID'].'</td>
												<td>'.$row['supplierName'].'</td>
												<td>'.$row['orderDate'].'</td>
												<td>'.$row['quantity'].'</td>
												<td>'.$row['productName'].'</td>
												<td>'.$row['email'].'</td>
												<td>'.$row['totalPrice'].'</td>
												<td class="pull-right">
													<button class="btn btn-warning"><i class="fa fa-save fa-fw"></i>Make Order</button>   
												</td>
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
<script>
	function modal(id) {
		var data = {"id" : id};
		jQuery.ajax({
			url : '../includes/suppliermodal.php',
			method : "post",
			data : data,
			success : function(data) {
				jQuery('body').append(data);
				jQuery('#supplierModal').modal('toggle');
			},
			error : function() {
				alert("Ooops! Something went wrong!");
			}
		});
	}
</script>