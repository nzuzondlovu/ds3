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


    $name = mysqli_real_escape_string($con, strip_tags(trim($_POST["name"])));
    $serial = mysqli_real_escape_string($con, strip_tags(trim($_POST["serial"])));
    $type = mysqli_real_escape_string($con, strip_tags(trim($_POST["type"])));
    $description = mysqli_real_escape_string($con, strip_tags(trim($_POST["description"])));
    $date = date("Y-m-d H:i:s");
    $target_dir = "../uploads/";
    $url = basename( $_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $user = $_SESSION['user_id'];  
    $description2=""; 
    $date_in=  date("Y-m-d H:i:s");
     $date_out=  date("Y-m-d H:i:s");
    $status ="";
    $technician="";
    $archive=0;



    if($name !='' && $serial !='' && $type !='' && $description !=''){

       echo $sql = "INSERT INTO job(user, name, serial, type, pic_url, description, date,description2,date_in,status,technician,date_out,archive)
        VALUES('".$user."', '".$name."', '".$serial."', '".$type."', '".$url."', '".$description."', '".$date."','".$description2."','".$date_in."','".$status."','".$technician."','".$date_out."','".$archive."')";
        upload($url, $target_dir, $target_file, $sql, $con);

    }else{
        $_SESSION['failure'] = 'Make sure you have filled all fields.';
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
                <h1 class="page-header">Booking</h1>
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
                        Enter booking details
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-6">
                                <form role="form" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Device name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter text">
                                    </div>
                                    <div class="form-group">
                                        <label>Serial number</label>
                                        <input name="serial" class="form-control" placeholder="Enter text">
                                    </div>                                        
                                    <div class="form-group">
                                    <label>Device type</label>
                                        <select name="type" class="form-control">
                                            <option value="" selected="selected">Select type</option>
                                            <?php
                                            $sql = "SELECT * FROM category ORDER BY name ASC";
                                            $res = mysqli_query($con, $sql);

                                            if(mysqli_num_rows($res) > 0) {
                                                while($row = mysqli_fetch_assoc($res)) {
                                                    echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload picture</label>
                                        <input type="file" name="fileToUpload">
                                    </div>
                                    <div class="form-group">
                                        <label>What happened to the device</label>
                                        <textarea name="description" class="form-control" rows="3"></textarea>
                                    </div>
        
         <div class="form-group">
                <label>Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
                        <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Time picker:</label>

                  <div class="input-group">
                    <input type="text" class="form-control timepicker">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
                                    <button name="submit" type="submit" class="btn btn-primary">Submit Booking</button>
                                    <button type="reset" class="btn btn-default">Reset Booking</button>



                                </form>


                            </div>
                            <!-- /.col-lg-6 (nested) -->
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




    <!-- /.content -->
  </div>

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