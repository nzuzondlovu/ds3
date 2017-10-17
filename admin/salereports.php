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
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=800, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 800px; font-size: 13px; font-family: arial;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>


<?php
$d1='';
$d2='';
if(isset($_POST['submit']))
{
	$d1= mysqli_real_escape_string($con, strip_tags(trim($_POST["d1"])));
	$d2= mysqli_real_escape_string($con, strip_tags(trim($_POST["d2"])));	
	

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
										<a href="javascript:Clickheretoprint()" style="font-size:20px;"><button class="btn btn-success btn-large"><i class="icon-print"></i> Print</button></a>
								</div>	
								</div>
							</div>
							<form action="salesreport.php" method="post">
<center><strong>From : <input type="date" style="width: 223px; padding:14px;" name="d1" class="tcal" value="" /> To: <input type="date" style="width: 223px; padding:14px;" name="d2" class="tcal" value="" />
 <button class="btn btn-info" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;" type="submit" name="submit"><i class="icon icon-search icon-large"></i> Search</button>
</strong></center>
</form>
<div class="content" id="content">
<div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px;">
Sales Report from&nbsp;<?php echo $d1 ?>&nbsp;to&nbsp;<?php echo $d2 ?>
</div>
						<div class="table-responsive">
							<?php
					     $sql = "SELECT * FROM sales WHERE date BETWEEN '$d1' AND '$d2' ";
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
											</tr>';
										}
										echo '
									</tbody>
								</table>';
							} else {
								echo '<div class="alert alert-info">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>No Invoices found.</strong>
							</div>';
						}
						?>
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
		$('#suppliers').DataTable();
	});
</script>
 
  <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
