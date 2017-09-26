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
if(isset($_GET['id']) && $_GET['id'] != '') {

  $id = mysqli_real_escape_string($con, strip_tags(trim($_GET['id'])));

  if ($id) {
    $sql = "UPDATE job SET archive=1 WHERE id='".$id."'";
    //mysqli_query($con, $sql);
    $_SESSION['success'] = 'Booking was archived successfully.';
  } else {
    $_SESSION['failure'] = 'An error occured, please try again.';
  } 
}
?>

<?php

if(isset($_POST['submit'])) {

  $description = mysqli_real_escape_string($con, strip_tags(trim($_POST["description"])));

  if($description != '') {

    $sql = "INSERT INTO query(user_id,email, name,Query,status,feedback) VALUES('".$_SESSION['user_id']."','".$_SESSION['email']."','".$_SESSION['name']."','".$description."','unanswered',' ')";
    mysqli_query($con, $sql);
    $_SESSION['success'] = 'Your query was added successfully.';
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
        <h1 class="page-header">Feedback</h1>
      </div>
      <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <!-- Modal -->
     <div class="modal fade" id="viewItem" tabindex="-1" role="dialog" aria-labelledby="viewItemLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span> Close</button>
            <h4 class="modal-title" id="addItemLabel">FeedBack</h4>
          </div>
          <div class="modal-body">
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Query</label>
                <textarea name="description" class="form-control" rows="5"></textarea>
              </div>
              <button name="submit" type="submit" class="btn btn-primary">Reply</button>
              <button type="reset" class="btn btn-default">Reset Form</button>
            </form>
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade" id="addItem" tabindex="-1" role="dialog" aria-labelledby="addItemLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span> Close</button>
            <h4 class="modal-title" id="addItemLabel">Submit Query</h4>
          </div>
          <div class="modal-body">
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Query</label>
                <textarea name="description" class="form-control" rows="5"></textarea>
              </div>
              <button name="submit" type="submit" class="btn btn-primary">Submit Query</button>
              <button type="reset" class="btn btn-default">Reset Form</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.Modal -->


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
      
          <div class="panel-heading">
            List of all responses
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="pull-right">
                  <button class="btn btn-success" data-toggle="modal" data-target="#addItem"> Submit Query</button>
                </div>
              </div>
            </div> 

            <div class="table-responsive">
            <?php
                                $sql = "SELECT * FROM query WHERE user_id='".$_SESSION['user_id']."'";
                                $rs_result = mysqli_query($con, $sql); //run the query
                                $cart = mysqli_num_rows($rs_result);
                                if ($cart < 0) {
                                    $cart = 0;
                                }
                              
                                ?>
                                  <?php 
        include('connect.php');
        $result = $db->prepare("SELECT * FROM query where status like'unanswered' And user_id='".$_SESSION['user_id']."' ORDER BY id DESC");
        $result->execute();
        $sent = $result->rowcount();
     

      ?>
                              <?php 
        include('connect.php');
        $result = $db->prepare("SELECT * FROM query where status like'answered' And user_id='".$_SESSION['user_id']."' ORDER BY id DESC");
        $result->execute();
        $feedback = $result->rowcount();
        
      ?>

              <?php

              $sql = "SELECT * FROM query WHERE user_id = '".$_SESSION['user_id']."'";
              $res = mysqli_query($con, $sql);

              if (mysqli_num_rows($res) > 0) {
                echo '

    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a data-toggle="modal" data-target="#addItem" class="btn btn-primary btn-block margin-bottom">Compose</a>

          <div class="box box-solid"> 
            <div class="box-header with-border">
              <h3 class="box-title">Folders</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><i class="fa fa-inbox"></i> Feedback
                  <span class="label label-primary pull-right"> '.$feedback.'</span></a></li>

                <li><a href="#"><i class="fa fa-envelope-o"></i> Query     <span class="label label-success pull-right"> '.$sent.'</span></a></li>

                <li><a href="#"><i class="fa fa-file-text-o"></i>  '.$row['email'].'</a></li>
                <li><a href="#"><i class="fa fa-filter"></i> Total Sent <span class="label label-warning pull-right">'.$cart.'</span></a>
                </li>
                <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          <div class="box box-solid">
         
         
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Inbox</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Search Mail">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <div class="pull-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>

                   <div class="table-responsive mailbox-messages">
                <table id="bookings" class="table table-hover table-striped">
      
                 
                    </tr>
                  </thead>
                  <tbody>';
                    while ($row = mysqli_fetch_assoc($res)) {

                      echo '
                        
                <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                    <td class="mailbox-name"><a data-toggle="modal" data-target="#viewItem">'.$row['name'].'</a></td>
                    <td class="mailbox-subject"><b>'.$row['query'].'</b> - '.$row['feedback'].'
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date">'.$row['status'].'</td>
             
              </tr>
                    ';
                    }
                    echo '


                  </tbody>
                </table>
                </div>
                         </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <div class="pull-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
            </div>
                ';
              } else {
                echo '<div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>No Feedback found.</strong>
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

<script>
  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

    //Handle starring for glyphicon and font awesome
    $(".mailbox-star").click(function (e) {
      e.preventDefault();
      //detect type
      var $this = $(this).find("a > i");
      var glyph = $this.hasClass("glyphicon");
      var fa = $this.hasClass("fa");

      //Switch states
      if (glyph) {
        $this.toggleClass("glyphicon-star");
        $this.toggleClass("glyphicon-star-empty");
      }

      if (fa) {
        $this.toggleClass("fa-star");
        $this.toggleClass("fa-star-o");
      }
    });
  });
</script>