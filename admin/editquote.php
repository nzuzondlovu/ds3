<script>
function sum() {
            var txtFirstNumberValue = document.getElementById('txt1').value;
            var txtSecondNumberValue = document.getElementById('txt2').value;
            var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt3').value = result;
				
            }
			
			 var txtFirstNumberValue = document.getElementById('txt11').value;
            var result = parseInt(txtFirstNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt22').value = result;				
            }
			
			 var txtFirstNumberValue = document.getElementById('txt11').value;
            var txtSecondNumberValue = document.getElementById('txt33').value;
            var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt55').value = result;
				
            }
			
			 var txtFirstNumberValue = document.getElementById('txt4').value;
			 var result = parseInt(txtFirstNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt5').value = result;
				}
			
        }
</script>
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
	header('Location: quotations.php');
}


if(isset($_POST['submit'])) {

	$description = mysqli_real_escape_string($con, strip_tags(trim($_POST["desc"])));
	$deposit = mysqli_real_escape_string($con, strip_tags(trim($_POST["deposit"])));
	$balance = mysqli_real_escape_string($con, strip_tags(trim($_POST["balance"])));
	$total = mysqli_real_escape_string($con, strip_tags(trim($_POST["total"])));
	$status = mysqli_real_escape_string($con, strip_tags(trim($_POST["status"])));

	
	if($deposit != '' && $balance != '' && $total != '' && $description != '' && $status != '' ) {

		$sql = "UPDATE quotation SET description='".$description."', deposit='".$deposit."', balance='".$balance."', total='".$Total."', status='".$status."' WHERE id='".$id."'";
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'Your Quotation was updated successfully.';
		header("Location: quotations.php");
	}else {
		$_SESSION['failure'] = 'Please fill in all fields.';
	}
}
?>

<?php

$cat = '';
$dep = '';
$bal = '';
$tot = '';
$sta = '';
$des = '';
$date = date("D-Y/m/d h:i:s ");
    $user = $_SESSION['user_id'];  

$sql = "SELECT * FROM quotation WHERE id=$id ";
$res = mysqli_query($con, $sql);

if(mysqli_num_rows($res) > 0) {
	while($row = mysqli_fetch_assoc($res)) {
		$cat = '
		



					    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> AdminLTE, Inc.
            <small class="pull-right">'.$date.'</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Invoice Created By 
          <address>
            <strong> '. $_SESSION['name'].'  '.  $_SESSION['surname'].'</strong><br>
            '. $_SESSION['location'].'<br>
       
            Phone: '. $_SESSION['cell'].'<br>
            Email:     '. $_SESSION['email'].'
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong>John Doe</strong><br>
            795 Folsom Ave, Suite 600<br>
            San Francisco, CA 94107<br>
            Phone: (555) 539-1037<br>
            Email: john.doe@example.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice: '.$row['quote_code'].'</b><br>
          <br>
          <b>Booking ID:</b> '.$row['job_code'].'<br>
          <b>Payment Due:</b> 2/22/2014<br>
           <b>Status:</b> '.$row['status'].'<br>
          <b>Account:</b> 968-34567
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
             <th>Device</th>
              <th>Model</th>
             
              <th>Serial #</th>
              <th>Description</th>
              <th>Technician</th>
            </tr>
            </thead>
            <tbody>
           
              <td>'.$row['name'].'</td>
                 <td>'.$row['model'].'</td>
              <td>'.$row['serial'].'</td>
              <td>'.$row['accessory'].'</td>
              <td>'.$row['technician'].'</td>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">

           <p class="text-muted well well-sm no-shadow" style="margin-top: 10px; ">
<b style= "word-wrap: break-word;min-width: 120px;max-width: 10px;" >
       '.$row['description'].'
       </b>
          </p>
          <p class="lead">Payment Methods:</p>
          <img src="dist/img/credit/visa.png" alt="Visa">
          <img src="dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="dist/img/credit/american-express.png" alt="American Express">
          <img src="dist/img/credit/paypal2.png" alt="Paypal">

       
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Amount Due 2/22/2014</p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Deposit:</th>
                <td>R '.$row['deposit'].'</td>
              </tr>
              <tr>
            
              </tr>
              <tr>
                <th>Balance:</th>
                <td>R '.$row['balance'].'</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>R '.$row['total'].'</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="#" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
    </section>
		';
		$dep = $row['deposit'];
		$bal = $row['balance'];
		$tot = $row['total'];
		$sta = $row['status'];
		$des = $row['description'];
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
				
				
						<div class="row">
							<div class="col-lg-12">
								<?php
								echo $cat;
								?>
							
							</div>
							<div class="col-md-6">
								
								
							</div>

			
							<!-- /.col-lg-6 (nested) -->
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