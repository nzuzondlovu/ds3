<?php
ob_start();
include '../includes/functions.php';
?>

<?php
if(isset($_SESSION['key']) == '' ) {
  header("location:../login.php");
}


if (isset($_GET['id']) && $_GET['id'] != null) {

  $id = mysqli_real_escape_string($con, strip_tags(trim($_GET["id"])));

} else {

  header('Location: jobs.php');
}


$sql = "SELECT * FROM customersaledevice WHERE id ='$id'";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);

$name = $row['diviceName'];
$model = $row['model'];
$serial = $row['serialNumber'];
$type = $row['Dtype'];
$date = $row['recievedDate'];
$amount = $row['establishAmount'];

$cat = '
ID : '.$row['id'].'<br>
Device Name : '.$name.'<br>
Model : '.$model.'<br>
Serial : '.$serial.'<br>
Type : '.$type.'<br>
Recieved Date : '.$date.'<br>
Price : R'.$amount.'<hr>
Customer Name : '.$row['Cname'].'<br>
ID Number : '.$row['idNo'].'<br>
Cell Number : '.$row['num'].'<br>
Email Address : '.$row['email'].'
';


if(isset($_POST['submit'])){

  $tech = mysqli_real_escape_string($con, strip_tags(trim($_POST['technician'])));

  if ($tech != '') {

    $sql = "INSERT INTO techrepair(diviceName, model, serialNumber, Dtype, recievedDate, amount, tname) 
    VALUES ('$name','$model', '$serial', '$type', '$date','$amount', '$tech')";
    mysqli_query($con, $sql);
    header("location: allocated.php");

  } else {

    $_SESSION['failure'] = "Please choose a technician.";
  }  
}

?>

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
	Cpmputer & Electronics	<br>
	Smith Street, Durban	<br>	<br>
	</center>

	</div>
	<div style="width: 136px; float: left; height: 70px;">
	<table cellpadding="3" cellspacing="0" style="font-family: arial; font-size: 12px;text-align:left;width : 100%;">

		<tr>
			<td>OR No. :</td>
			<td><?php echo $invoice ?></td>
		</tr>
		<tr>
			<td>Date :</td>
			<td><?php echo $date ?></td>
		</tr>
	</table>
	
	</div>
	<div class="clearfix"></div>
	</div>
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
					$id=$_GET['invoice'];
					$result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
					$result->bindParam(':userid', $id);
					$result->execute();
					for($i=0; $row = $result->fetch(); $i++){
				?>
				<tr class="record">
				<td><?php echo $row['product_code']; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['qty']; ?></td>
				<td>
				<?php
				$ppp=$row['price'];
				echo formatMoney($ppp, true);
				?>
				</td>
				<td>
				<?php
				$ddd=$row['discount'];
				echo formatMoney($ddd, true);
				?>
				</td>
				<td>
				<?php
				$dfdf=$row['amount'];
				echo formatMoney($dfdf, true);
				?>
				</td>
				</tr>
				<?php
					}
				?>
			
				<tr>
					<td colspan="5" style=" text-align:right;"><strong style="font-size: 12px;">Total: &nbsp;</strong></td>
					<td colspan="2"><strong style="font-size: 12px;">
					<?php
					$sdsd=$_GET['invoice'];
					$resultas = $db->prepare("SELECT sum(amount) FROM sales_order WHERE invoice= :a");
					$resultas->bindParam(':a', $sdsd);
					$resultas->execute();
					for($i=0; $rowas = $resultas->fetch(); $i++){
					$fgfg=$rowas['sum(amount)'];
					echo formatMoney($fgfg, true);
					}
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
					echo formatMoney($amount, true);
					}
					?>
					</strong></td>
				</tr>
			
		</tbody>
	</table>
	
</div>
  <!-- /.container-fluid -->
</div>
<!-- Page Content -->
<!-- /#page-wrapper -->

<?php
include 'footer.php';
?>
<script type="text/javascript">

  $( document ).ready( function () {
    $( "#techForm" ).validate( {
      rules: {
        technician: "required"
      },
      messages: {
        technician: "Please select a technician"
      },
      errorElement: "em",
      errorPlacement: function ( error, element ) {
          // Add the `help-block` class to the error element
          error.addClass( "help-block" );

          if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.parent( "label" ) );
          } else {
            error.insertAfter( element );
          }
        },
        highlight: function ( element, errorClass, validClass ) {
          $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
          $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
        }
      });
  });
</script>