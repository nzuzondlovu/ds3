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

$open = 0;

//Calculation of cart sales
$cart1 = 0.00;

$sql = 'SELECT SUM(num) AS num, price FROM cart GROUP BY name';
$res = mysqli_query($con, $sql);

if (mysqli_num_rows($res) > 0) {
	
	while ($row = mysqli_fetch_assoc($res)) {

		$sum = ($row['num'] * $row['price']);
		$cart1 = $cart1 + $sum;
	}
}

//Calculation of customer sale devices
$sale = 0;

$sql = 'SELECT SUM(establishAmount) AS amount FROM customersaledevice';
$res = mysqli_query($con, $sql);

if (mysqli_num_rows($res) > 0) {
	
	$row = mysqli_fetch_assoc($res);

	$sale= $row['amount'];
}

//Calculation of quotations
$quot = 0;

$sql = 'SELECT SUM(balance) as amount FROM quotation';
$res = mysqli_query($con, $sql);

if (mysqli_num_rows($res) > 0) {
	
	$row = mysqli_fetch_assoc($res);

	$quot= $row['amount'];
}

//Calculation of technician repairs
$tech = 0;

$sql = 'SELECT SUM(amount) AS total FROM techrepair';
$res = mysqli_query($con, $sql);

if (mysqli_num_rows($res) > 0) {
	
	$row = mysqli_fetch_assoc($res);

	$tech= $row['total'];
}


//Calculation of stock orders
$orde = 0;

$sql = 'SELECT SUM(totalPrice) AS total FROM orders';
$res = mysqli_query($con, $sql);

if (mysqli_num_rows($res) > 0) {
	
	$row = mysqli_fetch_assoc($res);

	$orde= $row['total'];
}

//Calculation of user salaries/wages
$sala = 0;

$sql = "SELECT * FROM salary";
$res = mysqli_query($con, $sql);

if (mysqli_num_rows($res) > 0) {

	while ($row = mysqli_fetch_assoc($res)) {

		$user = '';
		$bonus = '';
		$deduct = '';
		$total = '';
		$dtotal = '';

		$sql1 = "SELECT * FROM user WHERE id='".$row['emp_id']."'";
		$res1 = mysqli_query($con, $sql1);

		if (mysqli_num_rows($res1) > 0) {

			$row1 = mysqli_fetch_assoc($res1);
			$user = $row1['name'].' '.$row1['surname'];
		}

		$sql1 = "SELECT * FROM bonus WHERE id='".$row['bonus_id']."'";
		$res1 = mysqli_query($con, $sql1);

		if (mysqli_num_rows($res1) > 0) {

			$row1 = mysqli_fetch_assoc($res1);
			$total = $row1['basic_salary'] + $row1['bonus'];
			$bonus = 'Bonus: R'.$row1['bonus'];
		}

		$sql1 = "SELECT * FROM deduction WHERE id='".$row['deduct_id']."'";
		$res1 = mysqli_query($con, $sql1);

		if (mysqli_num_rows($res1) > 0) {

			$row1 = mysqli_fetch_assoc($res1);
			$dtotal = $row1['med_aid'] + $row1['uif'] + $row1['pension'];
			$deduct = 'Medical Aid: R'.$row1['med_aid'].'<br>UIF: R'.$row1['uif'].'<br>Pension: R'.$row1['pension'].'
			<br>Total: R'.$dtotal;
		}

		$total = $dtotal + $total;
		$sala = $sala + $total;

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
				<h1 class="page-header">Cash Flow</h1>
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
						Company Cash Flow Statement
					</div>
					<div class="col-lg-12">
						<div class="pull-right">
							<button onclick="javascript:printDiv('printablediv')" class="btn btn-warning"><span class="fa fa-print"></span> Print</button>
						</div>
					</div>
					<div class="panel-body" id="printablediv">
						<div class="row">
							<div class="col-md-offset-10 col-md-2 pull-right">
								<table>
									<tr>
										<td width="70%">For the Year Ending:</td>
										<td width="15%">12/31/16</td>
									</tr>
									<tr>
										<td>Year Openning Cash:</td>
										<td>R <?php echo $open; ?></td>
									</tr>
								</table>
							</div>
							<p>.</p>
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table data-table table-bordered" width="100%">
										<thead>
											<tr>
												<td width="85%">Operation</td>
												<td width="25%">Amount</td>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><b>Inflow</b></td>
												<td></td>
											</tr>
											<tr>
												<td>Online Sales</td>
												<td>R <?php echo $cart1; ?></td>
											</tr>
											<tr>
												<td>Refurbished Devices</td>
												<td>R <?php echo $sale; ?></td>
											</tr>
											<tr>
												<td>Devices Repaired (Quotes)</td>
												<td>R <?php echo $quot; ?></td>
											</tr>
											<tr>
												<td>Technician Repairs</td>
												<td>R <?php echo $tech; ?></td>
											</tr>
											<tr>
												<td><b>Net Cash from Inflow</b></td>
												<td><b>R <?php echo ($cart1 + $sale + $quot + $tech); ?></b></td>
											</tr>
											<tr>
												<td><b>Outflow</b></td>
												<td></td>
											</tr>
											<tr>
												<td>Orders</td>
												<td>(R <?php echo $orde; ?>)</td>
											</tr>
											<tr>
												<td>Salaries</td>
												<td>(R <?php echo $sala; ?>)</td>
											</tr>
											<tr>
												<td><b>Net Cash from Outflow</b></td>
												<td><b>(R <?php echo ($orde + $sala); ?>)</b></td>
											</tr>
											<tr>
												<td><b>Net Increase in Cash</b></td>
												<td><b>R <?php echo (($cart1 + $sale + $quot + $tech) - ($orde + $sala)); ?></b></td>
											</tr>
										</tbody>									
									</table>
								</div>
							</div>
							<div class="col-md-offset-10 col-md-2 pull-right">
								<table>
									<tr>
										<td width="70%">Cash at End of Year:</td>
										<td width="23%">R <?php echo ($open + (($cart1 + $sale + $quot + $tech) - ($orde + $sala))); ?></td>
									</tr>
								</table>
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
<script language="javascript" type="text/javascript">
	function printDiv(divID) {
    //Get the HTML of div
    var divElements = document.getElementById(divID).innerHTML;
    //Get the HTML of whole page
    var oldPage = document.body.innerHTML;

    //Reset the page's HTML with div's HTML only
    document.body.innerHTML = 
    "<html><head><title></title></head><body>" + 
    divElements + "</body>";

    //Print Page
    window.print();

    //Restore orignal HTML
    document.body.innerHTML = oldPage;          
}
</script>
<?php
include 'footer.php';
?>