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

if(isset($_POST['submit'])) {
    $email = md5(mysqli_real_escape_string($con, strip_tags(trim($_POST["email"]))));
    $location = md5(mysqli_real_escape_string($con, strip_tags(trim($_POST["location"]))));
    $password = md5(mysqli_real_escape_string($con, strip_tags(trim($_POST["password"]))));

    if($email != '' && $location != '' && $password != '') {

        $sql = "UPDATE user SET email='".$email."', location='".$location."', password='".$password."' WHERE id='".$_SESSION['user_id']."'";
        mysqli_query($con, $sql);
        $_SESSION['success'] = 'Successfully updated all details.';
        header("location:../logout.php");

    } else {
        $_SESSION['failure'] = 'Please fill in all fields';
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
				<h1 class="page-header"></h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<!-- /.row -->
        <div class="row">
            <div class="col-lg-12">



    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="dist/img/user4-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?php
                                        $res = mysqli_query($con, "SELECT * FROM user WHERE id='".$_SESSION['user_id']."' ");
                                        $row = mysqli_fetch_assoc($res);
                                        echo$row['name']; echo " "; echo $row['surname'];
                                        ?></h3>



              <p class="text-muted text-center">  <strong><i class="fa fa-map-marker margin-r-5"></i> <?php
                                        $res = mysqli_query($con, "SELECT * FROM user WHERE id='".$_SESSION['user_id']."' ");
                                        $row = mysqli_fetch_assoc($res);
                                        echo$row['location']; echo " "; 
                                        ?> </strong></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b><?php
                                        $res = mysqli_query($con, "SELECT * FROM job WHERE id='".$_SESSION['user_id']."' ");
                                        $row = mysqli_fetch_assoc($res);
                                        echo$row['serial']; echo " "; 
                                        ?>
                                            
                                        </b> <a class="pull-right"><?php
                                        $res = mysqli_query($con, "SELECT * FROM job WHERE id='".$_SESSION['user_id']."' ");
                                        $row = mysqli_fetch_assoc($res);
                                        echo$row['status']; echo " "; 
                                        ?></a>
                </li>
                <li class="list-group-item">
                  <b>Devices</b> <a class="pull-right"> </a>
                </li>
                <li class="list-group-item">
                  <b>Delivery</b> <a class="pull-right">13,287</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>...</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Settings</a></li>
              <li><a href="#timeline" data-toggle="tab">Bookings</a></li>
              <li><a href="#settings" data-toggle="tab">Delivery</a></li>
              <li class="quotations"><a href="#activity" data-toggle="tab">Quotations</a></li>
              <li><a href="#devices" data-toggle="tab">Devices</a></li>
              <li><a href="payments" data-toggle="tab">Payments</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
              
                  <!-- /.user-block -->
                
                 
                        <div class="row">
                            <div class="col-md-6">
                                <form role="form">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" value="<?php
                                        $res = mysqli_query($con, "SELECT * FROM user WHERE id='".$_SESSION['user_id']."' ");
                                        $row = mysqli_fetch_assoc($res);
                                        echo $row['email'];
                                        ?> " disabled="">
                                    </div>
                                    <div class="form-group">
                                        <label>Location</label>
                                        <input class="form-control" value="<?php
                                        $res = mysqli_query($con, "SELECT * FROM user WHERE id='".$_SESSION['user_id']."' ");
                                        $row = mysqli_fetch_assoc($res);
                                        echo $row['location'];
                                        ?> " disabled="">
                                    </div>
                                </form>
                            </div>
                            <!-- /.col-lg-6 (nested) -->

                            <div class="col-md-6">
                                <form role="form" method="post">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" class="form-control" value="<?php
                                        $res = mysqli_query($con, "SELECT * FROM user WHERE id='".$_SESSION['user_id']."' ");
                                        $row = mysqli_fetch_assoc($res);
                                        echo $row['email'];
                                        ?> ">
                                    </div>
                                    <div class="form-group">
                                        <label>Location</label>
                                        <input name="location" class="form-control" value="<?php
                                        $res = mysqli_query($con, "SELECT * FROM user WHERE id='".$_SESSION['user_id']."' ");
                                        $row = mysqli_fetch_assoc($res);
                                        echo $row['location'];
                                        ?> ">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input name="password" class="form-control" placeholder="Enter password" type="Password">
                                    </div>
                                    <button name="submit" type="submit" class="btn btn-primary">Save Details</button>
                               
                                </form>
                            </div>
                            <!-- /.col-lg-6 (nested) -->
                        </div>
                        <!-- /.row (nested) -->
               
                    <!-- /.panel-body -->
             
                  </p>
    
                </div>
                <!-- /.post -->

           
                <!-- /.post -->

      
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
            <div class="table-responsive">
              <?php
              $num_rec_per_page=10;

              if (isset($_GET["page"])) {

                $page  = $_GET["page"];
              } else {

                $page=1;
              }

              $start_from = ($page-1) * $num_rec_per_page;
              $sql = "SELECT * FROM job WHERE user ='".$_SESSION['user_id']."' ORDER BY id DESC LIMIT $start_from, $num_rec_per_page";
              $res = mysqli_query($con, $sql);

              if (mysqli_num_rows($res) > 0) {
                echo '
                <table class="table">
                  <thead>
                    <tr>
                    
                      <th>Device name</th>
                      <th>Serial</th>
                      <th>Type</th>
                      <th>Picture</th>
                      <th>Description</th>
                      <th>Date in</th>
                      <th>Status</th>
                      <th>Technician</th>
                      <th>Date out</th>
                    </tr>
                  </thead>
                  <tbody>';
                    while ($row = mysqli_fetch_assoc($res)) {

                      echo '
                      <tr>
                        
                        <td>'.$row['name'].'</td>
                        <td>'.$row['serial'].'</td>
                        <td>'.$row['type'].'</td>
                        <td> <img src="../uploads/'.$row['pic_url'].'" class="img-rounded" alt="Cinque Terre" width="20" height="20"></td>
                        <td>'.$row['description'].'</td>
                        <td>'.date("M d, y",strtotime($row['date_in'])).'</td>
                        <td>'.$row['status'].'</td>
                        <td>'.$row['technician'].'</td>
                        <td>'.date("M d, y",strtotime($row['date_out'])).'</td>
                      </tr>';
                    }
                    echo '
                  </tbody>
                </table>';
              } else {
                echo '<div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>No bookings found.</strong>
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
              </div>
              <!-- /.tab-pane -->

                  <div class="active tab-pane" id="quotations">
                <!-- Post --></div>
                    <div class="active tab-pane" id="devices">
                <!-- Post --></div>
                    <div class="active tab-pane" id="payments">
                <!-- Post --></div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>

    <!-- /.content -->
  </div>       <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

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