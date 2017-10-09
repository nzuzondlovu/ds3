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
$date = date('Y-m-d H:m:s');

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

	$bname = $_POST["bname"];
	$price = $_POST["price"];
	$qty = $_POST["qty"];

	$date = date("Y-m-d H:i:s");

	foreach ($bname as $key => $value) {
		
		$brandname = mysqli_real_escape_string($con, strip_tags(trim($value)));
		$totalPrice = mysqli_real_escape_string($con, strip_tags(trim($price[$key])));
		$brandqty = mysqli_real_escape_string($con, strip_tags(trim($qty[$key])));

		$totalPrice = $totalPrice * $brandqty;

		$sql = 'INSERT INTO orders(supplierID, supplierName, orderDate, quantity, productName, email, totalPrice) VALUES ("'.$id.'", "'.$name.'", "'.$date.'", "'.$brandqty.'", "'.$brandname.'", "'.$email.'", "'.$totalPrice.'")';
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'Your new order has been added successfully.';
		header("Location: orders.php");
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
							<div class="col-md-2">
								<h2>Supplier details</h2>
								<?php
								echo $order;
								?>
							</div>

							<div class="col-md-9">
								<form role="form" method="post">
									<table width="100%" id="container">
										<tr>
											<td>
												<div class="col-md-3">
													<div class="form-group">
														<label>Brand Name</label>
														<input type="text" name="bname[]" id="bname" class="form-control" placeholder="Enter Brand Name" required="required">
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label>Price</label>
														<input type="number" name="price[]" id="price" class="form-control" placeholder="R0.00" required="required">
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label>Order Quantity</label>
														<input type="number" name="qty[]" id="qty" class="form-control" placeholder="Enter quantity" required="required">
													</div>
												</div>
												<div class="col-md-1">
													<div class="form-group">
														<label>Action</label>
														<a href="#" id="add" class="btn btn-primary"><i class="fa fa-plus fa-fw"></i>Add More</a>
													</div>
												</div>
											</td>
										</tr>
									</div>
									<div class="col-md-9">
										<button name="submit" type="submit" class="btn btn-info">Add</button>                                                                  
										<button type="reset" class="btn btn-default">Reset</button>										
									</table>
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
<script type="text/javascript">
	$(document).ready(function(e){
		//variables
		var i = 1;
		var maxRows = 5;
		var x = 1;

		var html = '';
		


		//add rows to form
		$("#add").click(function(e){

			if (x <= maxRows) {

				$("#container").append('<tr id="remove'+i+'"><td><div class="col-md-3"><div class="form-group"><label>Brand Name</label><input type="text" name="bname[]" id="childbname" class="form-control" placeholder="Enter Brand Name" required="required"></div></div><div class="col-md-3"><div class="form-group"><label>Generic Name</label><input type="text" name="price[]" id="childprice" class="form-control" placeholder="R0.00" required="required"></div></div><div class="col-md-3"><div class="form-group"><label>Order Quantity</label><input type="number" name="qty[]" id="childqty" class="form-control" placeholder="Enter quantity" required="required"></div></div><div class="col-md-1"><div class="form-group"><label>Action</label><a href="#" id="remove'+i+'" class="btn btn-danger btn-remove"><i class="fa fa-minus fa-fw"></i>Remove Row</a></div></div></td></tr>');
				x++;
				i++;
			}
		});


		//remove rows from form
		$(document).on('click', '.btn-remove', function(e){

			var id = $(this).attr("id");
			$("#"+id+"").remove();
			//$(this).parent('#row').remove();
			x--;
		});


		//populate values from first row
		$("#container").on('dblclick', '#childbname', function(e){
			$(this).val( $('#bname').val() );
		});

		$("#container").on('dblclick', '#childprice', function(e){
			$(this).val( $('#price').val() );
		});

	});
</script>