<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">
<div class="wrapper">


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

           <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">

       '.$row['description'].'
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
          <a href="invoice.php" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
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
</div>
<!-- ./wrapper -->
</body>
</html>
