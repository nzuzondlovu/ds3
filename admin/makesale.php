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
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}

$invoice= 'RS-'.createRandomPassword();

	$sql = "SELECT * FROM custsaleprod ";
	$res = mysqli_query($con, $sql);

		if(mysqli_num_rows($res) > 0) {
		 
		while($row = mysqli_fetch_assoc($res)) {
				if($invoice == $row['barcode'] )
				{
					$invoice= 'RS-'.createRandomPassword();
				}
	}
}

$_SESSION['invoice']=$invoice;
?>
<?php
include 'header.php';
?>

<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sales</h1>
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
						List of Sales
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
					<div class="row">
							<div class="col-lg-12">
								<div class="pull-right">
									<a href="sales.php?id=<?php echo $_SESSION['invoice'];?>" class="btn btn-warning"><i class="fa fa-plus fa-fw"></i>New Transaction</a>

								</div>	
								</div>
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
							$sql = "SELECT * FROM sales ";
							$res = mysqli_query($con, $sql);

							if (mysqli_num_rows($res) > 0) {
								echo '
								<table id="suppliers" class="table">
									<thead>
										<tr>
											<th>Invoice Number</th>
											<th>Customer Name</th>
											<th>Payment Method</th>
											<th>Total Amount</th>
											<th>Cashier Name</th>
											<th>Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>';
										while ($row = mysqli_fetch_assoc($res)) {											

											echo '
											<tr>
												<td>'.$row['invoice_num'].'</td>
												<td>'.$row['custName'].'</td>
												<td>'.$row['payment_method'].'</td>
												<td>'.$row['total_amount'].'</td>
												<td>'.$row['cashier'].'</td>
												<td>'.$row['date'].'</td>
												<td class="pull-right">
											<button  onclick="modal('.$row['id'].')" class="btn btn-primary" ><i class="fa fa-trash fa-fw"></i>View Details</button>
													<button  onclick="modal('.$row['id'].')" class="btn btn-primary" ><i class="fa fa-trash fa-fw"></i>Delete Order</button>   
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
		$('#bookings').DataTable();
	});
</script>
 
  <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
