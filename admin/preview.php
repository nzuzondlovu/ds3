<?php
ob_start();
include '../includes/functions.php';
?>

<?php
if(isset($_SESSION['key']) == '' ) {
  header("location:../login.php");
}

$invoice='';
if (isset($_GET['id']) && $_GET['id'] != null) {

  $id = mysqli_real_escape_string($con, strip_tags(trim($_GET["id"])));
  
  $invoice=$id;

} else {

  header('Location: sales.php');
}

$date='';
$prod_code='';
$prod_name='';
$prod_qty='';
$prod_price='';
$prod_disc='';
$prod_total='';
$tot='';
$pt='';
$cashier='';
$cust='';
$sql = "SELECT * FROM sales WHERE invoice_num LIKE '%".$id."%' ";
$res = mysqli_query($con, $sql);

if (mysqli_num_rows($res) > 0) {
	
	while ($row = mysqli_fetch_assoc($res)) {

		$invoice = $row['invoice_num'];
		$pt=$row['payment_method'];
		$tot= $row['total_amount'];
		$cash=$row['amount_paid'];
		$change=$row['change'];
		$cashier=$row['cashier'];
		$cust=$row['custName'];
		$date= $row['date'];
	
	}
}



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
include 'header.php';
?>

<div id="page-wrapper">
  <div class="container-fluid">
  	<div class="span10">

<div class="content" id="content">
<div style="margin: 0 auto; padding: 20px; width: 900px; font-weight: normal;">
	<div style="width: 100%; height: 190px;" >
	<div style="width: 900px; float: left;">
	<center><div style="font:bold 25px 'Aleo';">Sales Receipt</div>
	Computer & Electronics	<br>
	Smith Street, Durban	<br>	<br>
	</center>

	</div>
	<div style="width: 250px; float: left; height: 100px;">
	<table cellpadding="3" cellspacing="0" style="font-family: arial; font-size: 12px;text-align:left;width : 100%;">

		<tr>
			<td>Invoice No. :</td>
			<td><?php echo $invoice ?></td>
		</tr>
		<tr>
			<td>Date :</td>
			<td><?php echo $date ?></br></td>
			
		</tr>
		<tr >
			<td>Cashier Name :</br></td>
			<td><?php echo $cashier ?></td>
		</tr>
		<tr >
			<td>Customer Name :</br></td>
			<td><?php echo $cust?></td>
		</tr>
	</table>
	
	</div>
	<div class="clearfix"></div>
	</div>
	
  <!-- /.container-fluid -->
</div>
<!-- Page Content -->
<div style="width: 100%; margin-top:-70px;">
	<table border="1" cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 12px;	text-align:left;" width="100%">
		<thead>
			<tr>
				<th width="90"> Product Code </th>
				<th> Product Name </th>
				<th> Qty </th>
				<th> Price </th>
				<th> Discount </th>
				<th> Amount </th>
			</tr>
		</thead>
		<tbody>
			<?php
			$sql1 = "SELECT * FROM custsaleprod WHERE invoice_num LIKE '%".$invoice."%' ";
$res1 = mysqli_query($con, $sql1);

if (mysqli_num_rows($res1) > 0) {
	
	while ($row = mysqli_fetch_assoc($res1)) {

		$prod_code = $row['barcode'];
		$prod_name= $row['prodname'];
		$prod_qty= $row['qty'];
		$prod_price=$row['price'];
		$prod_disc=$row['discount'];
		$prod_total=$row['total_price'];


			?>
				<tr class="record">
				<td><?php echo $prod_code ?></td>
				<td><?php echo $prod_name ?></td>
				<td><?php echo $prod_qty ?></td>
				<td>
				<?php
				$ppp=$prod_price;
				echo formatMoney($ppp, true);
				?>
				</td>
				<td>
				<?php
				$ddd=$prod_disc;
				echo formatMoney($ddd, true);
				?>
				</td>
				<td>
				<?php
				$dfdf=$prod_total;
				echo formatMoney($dfdf, true);
				?>
				</td>
				</tr>
				<?php
				}
}

				?>
			
				<tr>
					<td colspan="5" style=" text-align:right;"><strong style="font-size: 12px;">Total: &nbsp;</strong></td>
					<td colspan="2"><strong style="font-size: 12px;">
					<?php
					$fgfg=$tot;
					echo formatMoney($fgfg, true);
					
					?>
					</strong></td>
				</tr>
				<?php if($pt=='cash'){
				?>
				<tr>
					<td colspan="5"style=" text-align:right;"><strong style="font-size: 12px; color: #222222;">Cash Tendered:&nbsp;</strong></td>
					<td colspan="2"><strong style="font-size: 12px; color: #222222;">
					<?php
					echo formatMoney($cash, true);
					?>
					</strong></td>
				</tr>
				<?php
				}
				?>
				<tr>
					<td colspan="5" style=" text-align:right;"><strong style="font-size: 12px; color: #222222;">
					<font style="font-size:20px;">
					<?php
					if($pt=='cash'){
					echo 'Change:';
					}
					if($pt=='credit'){
					echo 'Due Date:';
					}
					?>&nbsp;
					</strong></td>
					<td colspan="2"><strong style="font-size: 15px; color: #222222;">
					<?php
					function formatMoney($number, $fractional=false) {
						if ($fractional) {
							$number = sprintf('%.2f', $number);
						}
						while (true) {
							$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
							if ($replaced != $number) {
								$number = $replaced;
							} else {
								break;
							}
						}
						return $number;
					}
					if($pt=='credit'){
					echo $cash;
					}
					if($pt=='cash'){
					echo formatMoney($change, true);
					}
					?>
					</strong></td>
				</tr>
			
		</tbody>
	</table>
	
	</div>
	</div>
	
	</div>
	</div>
	
<div class="pull-right" style="margin-right:100px;">
		<a href="javascript:Clickheretoprint()" style="font-size:20px;"><button class="btn btn-success btn-large"><i class="icon-print"></i> Print</button></a>
		</div>	
</div>
</div>



<!-- /#page-wrapper -->

<?php
include 'footer.php';
?>
