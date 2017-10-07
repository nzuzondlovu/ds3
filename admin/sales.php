<?php
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
	header('Location: makesale.php');
}
?>
<?php
$order='';
if(isset($_POST['submit']))
{
	$code = mysqli_real_escape_string($con, strip_tags(trim($_POST["barcode"])));
	
	$sql = "SELECT * FROM product WHERE id=$code";
	$res = mysqli_query($con, $sql);

		if(mysqli_num_rows($res) > 0) {
		 
		while($row = mysqli_fetch_assoc($res)) {
		 
		$order = 'Product Barcode:  '.$row['prod_code'].'</br>
				Brand Name: '.$row['brandname'].'</br>
				Generic Name:'.$row['name'].'</br>
				Quantity Available:	'.$row['onhand_qty'].'</br>
				Price:	R'.$row['price'].'';
				
		$_SESSION['barcode']=$row['prod_code'];
		$_SESSION['brand']=$row['brandname'];
		$_SESSION['name']=$row['name'];
		$_SESSION['price']=$row['price'];
		$_SESSION['qty']=$row['onhand_qty'];
		
		
	}
}

}
	$price='';
	$name='';
if(isset($_POST['add']))
{
	$bcode = $_SESSION['barcode'];
	$b=$_SESSION['brand'];
	$n=$_SESSION['name'];
	$p=$_SESSION['price'];
	$q=$_SESSION['qty'];
	
	$name=$b.' '.$n;
	$price=$p*($q);
	
	if($bcode != '' && $name != '' && $p != '' && $q != '') {

		$sql = "INSERT INTO custsaleprod(prodname,barcode,qty,price,total_price,invoice_num) VALUES('".$name."','".$bcode."','".$q."', '".$p."','".$price."','".$id."')";
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'Your new order has been added successfully.';
	}else {
		$_SESSION['failure'] = 'Please fill in all fields.';
	}

}

if(isset($_POST['delete']))
{
		$prodID=mysqli_real_escape_string($con, strip_tags(trim($_POST["prodID"])));
		$sql = "DELETE FROM custsaleprod  WHERE id =$prodID";
		$res = mysqli_query($con, $sql);
		$_SESSION['success'] = 'Your new order has been added successfully.';

	

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
				<h1 class="page-header">Make Customer Sale</h1>
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
						Point of Sale
					</div>
					<div class="panel-body">
						
							<div class="col-md-6">
								<div class="pull-left">
											<form role="form" action="" method="post">
												<lable>Select Product:</lable>
													<select name="barcode" >
													<option value="" selected="selected">Select Product</option>
														<?php
															$sql = "SELECT * FROM product ORDER BY name ASC";
															$res = mysqli_query($con, $sql);

															if(mysqli_num_rows($res) > 0) {
															while($row = mysqli_fetch_assoc($res)) {
															echo '<option value="'.$row['id'].'">'.$row['brandname'].' '.$row['name'].'</option>';
															}
															}
														?>
													</select>&nbsp&nbsp;
													
										</div>
										<input type="submit" name="submit" value="Submit">
											
										</form>
							</div>

							<div class="col-md-6">
								<form role="form" action="" method="post">
									<div class="col-md-6">
										<?php
										echo $order;
										?>
										</br><label>Quantity of Purchase</label>
										<input type="number" name="qty1" value="">
										 <button type="submit" name="add" class="btn btn-warning"><i class="fa fa-plus fa-fw"></i>Add</button>                                                              
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
							$sql = "SELECT * FROM custsaleprod WHERE invoice_num LIKE '%".$id."%'";
							$res = mysqli_query($con, $sql);

							if (mysqli_num_rows($res) > 0) {
								echo '
								<table id="suppliers" class="table">
									<thead>
										<tr colspan="6">
										  
										<th><h4>Invoice Number:<strong> '.$id.'</strong></h4></th>
										</tr>
										<tr>
											<th>Product Name</th>
											<th>Product code</th>
											<th>Quantity</th>
											<th>Product Price</th>
											<th>Total Amount</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>';
										while ($row = mysqli_fetch_assoc($res)) {											

											echo '
											<tr>
												<td>'.$row['prodname'].'</td>
												<td>'.$row['barcode'].'</td>
												<td>'.$row['qty'].'</td>
												<td>'.$row['price'].'</td>
												<td>'.$row['total_price'].'</td> 
												<td class="pull-right">
													<button  onclick="modal('.$row['id'].')" class="btn btn-primary" ><i class="fa fa-trash fa-fw"></i>Delete Product</button>   
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
							<div class="pull-right">
									<a href="orders.php" class="btn btn-warning"><i class="fa fa-save fa-fw"></i>Submit All Transaction</a>
								</div>
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
			url : '../includes/deleteprodModal.php',
			method : "post",
			data : data,
			success : function(data) {
				jQuery('body').append(data);
				jQuery('#deleteProdModal').modal('toggle');
			},
			error : function() {
				alert("Ooops! Something went wrong!");
			}
		});
	}
</script>
<script>
	$(document).ready(function(){
		$('#suppliers').DataTable();
	});
</script>
