<?php
ob_start();
include '../includes/functions.php';
?>

<?php
if(isset($_SESSION['user_id']) == '' ) {
    header("location:../login.php");
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
				<h1 class="page-header">Dashboard</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
     <!-- /.row -->


      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Bookings</span>
              <span class="info-box-number">              <?php
                                $sql = "SELECT * FROM job WHERE user='".$_SESSION['user_id']."'";
                                $rs_result = mysqli_query($con, $sql); //run the query
                                $cart = mysqli_num_rows($rs_result);
                                if ($cart < 0) {
                                    $cart = 0;
                                }
                                echo $cart;
                                ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
         <span class="info-box-icon bg-purple"><i class="fa fa-envelope-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Messages</span>
              <span class="info-box-number">   <?php
                                $sql = "SELECT * FROM query WHERE user_id='".$_SESSION['user_id']."'";
                                $rs_result = mysqli_query($con, $sql); //run the query
                                $cart = mysqli_num_rows($rs_result);
                                if ($cart < 0) {
                                    $cart = 0;
                                }
                                echo $cart;
                                ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Orders</span>
              <span class="info-box-number">         <?php
                                $sql = "SELECT * FROM cart WHERE user_id='".$_SESSION['user_id']."'";
                                $rs_result = mysqli_query($con, $sql); //run the query
                                $cart = mysqli_num_rows($rs_result);
                                if ($cart < 0) {
                                    $cart = 0;
                                }
                                echo $cart;
                                ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Delivery</span>
              <span class="info-box-number"><?php
                                $sql = "SELECT * FROM custdelivery WHERE custid='".$_SESSION['user_id']."'";
                                $rs_result = mysqli_query($con, $sql); //run the query
                                $cart = mysqli_num_rows($rs_result);
                                if ($cart < 0) {
                                    $cart = 0;
                                }
                                echo $cart;
                                ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>

      <!-- /.row -->    
    <!-- /.row -->
</div>
          <div class="panel-body">
            <div class="table-responsive">
   <?php
              $num_rec_per_page=10;

              if (isset($_GET["page"])) {

                $page  = $_GET["page"];
              } else {

                $page=1;
              }

              $start_from = ($page-1) * $num_rec_per_page;
             
                        $sql = "SELECT * FROM quotation WHERE archive = 0";
                        $res = mysqli_query($con, $sql);

                        if (mysqli_num_rows($res) > 0) {
                            echo '
                            <table id="quotes" class="table data-table">
                                <thead>
                                    <tr>
                                      
                                        <th>Device Name</th>
                                        <th>Serial Number</th>
                                        <th>Model</th>
                                        <th>Accessory</th>
                                     
                                        <th>Deposit</th>
                                        <th>Balance</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>

                                </thead>
                                <tbody>';
                                    while ($row = mysqli_fetch_assoc($res)) {

                                        $sql1 = "SELECT * FROM job WHERE id = '".$row['booking_id']."' AND archive = 0  And '".$_SESSION['user_id']."' = '".$row['user_book']."' ";
                                        $res1 = mysqli_query($con, $sql1);

                                        if (mysqli_num_rows($res1) > 0) {
                                            echo '
                                            <tr>
                                              
                                                <td>'.$row['name'].'</td>
                                                <td>'.$row['serial'].'</td>
                                                <td>'.$row['model'].'</td>
                                                <td>'.$row['accessory'].'</td>
                                                <td>'.$row['technician'].'</td>
                                                <td>'.$row['deposit'].'</td>
                                                <td>'.$row['balance'].'</td>
                                                <td>'.$row['total'].'</td>
                                                      <td>'.$row['status'].'</td>
                                                <td class="pull-right">
                                                    <a href="editquote.php?id='.$row['id'].'" class="label label-primary">Invoice</a>
                                                </td>
                                            </tr>';
                                        }                                                
                                    }
                                    echo '
                                </tbody>
                            </table>';
                        } else {
                            echo '<div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>No Quotations Found.</strong>
                        </div>';
                    }

            $sql = "SELECT * FROM job WHERE user ='".$_SESSION['user_id']."'";
            $rs_result = mysqli_query($con, $sql); 
            $total_records = mysqli_num_rows($rs_result);  
            $total_pages = ceil($total_records / $num_rec_per_page);

            if ($total_pages == 0) {
              $total_pages = 1;
            }

            echo '
          </div>
          <div class="col-lg-12">
            <p align="center">
            <a class="btn btn-primary" href="?page=1">'."|<".'</a> '; 

              if ($page < 4) {
                for ($i=1; $i<$page; $i++) {
                  echo '<a class="btn btn-primary" href="?page='.$i.'">'.$i.'</a> ';
                };
              } else {
                for ($i=($page-3); $i<$page; $i++) {
                  echo '<a class="btn btn-primary" href="?page='.$i.'">'.$i.'</a> ';
                };
              }
              echo '<a class="btn btn-default" href="?page='.$page.'">'.$page.'</a> ';

              if ($page >= ($total_pages - 3)) {
                for ($i=($page+1); $i<=($total_pages); $i++) {
                  echo '<a class="btn btn-primary" href="?page='.$i.'">'.$i.'</a> ';
                };
              } else {
                for ($i=($page+1); $i<=($page+3); $i++) {
                  echo '<a class="btn btn-primary" href="?page='.$i.'">'.$i.'</a> ';
                };
              }

              echo '
              <a class="btn btn-primary" href="?page='.$total_pages.'">'.">|".'</a>
            </p>
          </div>';
          ?>
        </div>
        <!-- /.table-responsive -->
      </div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php
include 'footer.php';
?>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>