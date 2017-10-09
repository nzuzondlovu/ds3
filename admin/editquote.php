
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

//Use quote id to get data
$sql = "SELECT * FROM quotation WHERE id=$id";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);

$quotecode = $row['quote_code'];
$jobcode = $row['job_code'];
$status = $row['status'];
$quotename = $row['name'];
$model = $row['model'];
$serial = $row['serial'];
$accessory = $row['accessory'];
$technician = $row['technician'];
$description = $row['description'];
$deposit = $row['deposit'];
$balance = $row['balance'];
$total = $row['total'];

//Use user id from quote to get data
$sql = 'SELECT * FROM user WHERE id='.$row['user_book'];
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);

$uname = $row['name'].' '.$row['surname'];
$uaddr = $row['location'];
$ucell = $row['cell'];
$uemai = $row['email'];

$dep = '';
$bal = '';
$tot = '';
$sta = '';
$des = '';
$date = date("D-Y/m/d h:i:s ");
$user = $_SESSION['user_id']; 

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
            <section class="invoice">
              <div id="printablediv">
                <!-- title row -->
                <div class="row">
                  <div class="col-xs-12">
                    <h2 class="page-header">
                      <i class="fa fa-globe"></i> Infinity, Inc.
                      <small class="pull-right"><?php echo $date; ?></small>
                    </h2>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                  <div class="col-sm-4 invoice-col">
                    <strong>Invoice Created By</strong>
                    <address>
                      <?php echo 
                      $_SESSION['name'].'  '.$_SESSION['surname'].'<br>'.
                      $_SESSION['location'].'<br>
                      Phone: '. $_SESSION['cell'].'<br>
                      Email:     '. $_SESSION['email']
                      ; ?>
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    <strong>To</strong>
                    <address>
                      <?php
                      echo
                      $uname.'<br>'.
                      $uaddr.'<br>
                      Phone: '.$ucell.'<br>
                      Email: '.$uemai;
                      ?>
                    </address>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 invoice-col">
                    <?php 
                    echo '
                    <b>Invoice: '.$quotecode.'</b><br>
                    <br>
                    <b>Booking ID:</b> '.$jobcode.'<br>
                    <b>Payment Due:</b> 2/22/2014<br>
                    <b>Status:</b> '.$status.'<br>
                    <b>Account:</b> 968-34567';
                    ?>
                  </div>
                </div>
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
                        <?php
                        echo '
                        <td>'.$quotename.'</td>
                        <td>'.$model.'</td>
                        <td>'.$serial.'</td>
                        <td>'.$accessory.'</td>
                        <td>'.$technician.'</td>';
                        ?>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-6">

                  <p class="text-muted well well-sm no-shadow" style="margin-top: 10px; ">
                    <b style= "word-wrap: break-word;min-width: 120px;max-width: 10px;" >
                      <?php echo $description; ?>
                    </b>
                  </p>
                    <!-- <p class="lead">Payment Methods:</p>
                    <img src="dist/img/credit/visa.png" alt="Visa">
                    <img src="dist/img/credit/mastercard.png" alt="Mastercard">
                    <img src="dist/img/credit/american-express.png" alt="American Express">
                    <img src="dist/img/credit/paypal2.png" alt="Paypal">-->
                  </div>
                  <!-- /.col -->
                  <div class="col-xs-6">
                    <p class="lead">Amount Due 2/22/2014</p>

                    <div class="table-responsive">
                      <table class="table">
                        <tr>
                          <th style="width:50%">Deposit:</th>
                          <?php
                          echo '
                          <td>R '.$deposit.'</td>
                          </tr>
                          <tr>
                          </tr>
                          <tr>
                          <th>Balance:</th>
                          <td>R '.$balance.'</td>
                          </tr>
                          <tr>
                          <th>Total:</th>
                          <td>R '.$total.'</td>';
                          ?>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-xs-12">
                  <button onclick="javascript:printDiv('printablediv')" class="btn btn-primary pull-right" style="margin-right: 5px;">
                    <i class="fa fa-download"></i> Generate PDF
                  </button>
                  <a class="btn btn-warning" href="bookings.php">Bookings</a>
                </div>
              </div>
            </section>
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