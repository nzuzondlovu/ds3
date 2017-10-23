<?php
include_once 'functions.php';

if (isset($_POST['id']) && $_POST['id'] != null) {
  $id = mysqli_real_escape_string($con, strip_tags(trim($_POST['id'])));


  $cust = '';
 

  $sql = "SELECT * FROM drivers WHERE driverID='".$id."'";
  $res = mysqli_query($con, $sql);

  if (mysqli_num_rows($res) > 0) {

    $row = mysqli_fetch_assoc($res);

    $cust = '


     Driver Name:'.$row['name'].'<br>


  Area Code : '.$row['surname'];
  $name= $row['name'];
    $surname= $row['surname'];
      $email= $row['email'];
        $cell= $row['cell'];
          $idnumber= $row['idnumber'];






  }
 
}
?>

<?php ob_start(); ?>
<!-- Modal -->
<div class="modal fade " id="LocModal" tabindex="-1" role="dialog" aria-labelledby="LocModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" onclick="closeModal()" aria-label="Close"><span class="fa fa-close" aria-hidden="true"></span> Close</button>
        <h4 class="modal-title" id="LocModalLabel">Generate Location</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
                <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url(' dist/img/photo2.png') center center;">
              <h2 class="widget-user-username"> <b ><?php  echo $name; echo " "; echo $surname ?></b>  </h2>
              <h5 class="widget-user-desc"><b ><?php  echo $email;  ?></b> </h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="dist/img/user3-128x128.jpg" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">
                      Month
                 </h5>
                    <span class="description-text">     <?php
                           $year = date("M Y");
                           echo $year;

                 
                  ?></span>
                  </div>
                  <!-- /.description-block -->

                    
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">ID Number</h5>
                    <span class="description-text"><?php  echo $idnumber;  ?></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">Cell No</h5>
                    <span class="description-text"><?php  echo $cell;  ?></span>
                    <span class="description-text"></span>
                  </div>
                  <!-- /.description-block -->
                </div>

                <!-- /.col -->
              </div>
                 <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#"> Total <span class="pull-right badge bg-blue">  <?php
                                  $sql = "SELECT * FROM driverdelivery WHERE driverID= $idnumber ";
                                  indexCount($con, $sql);
                                  ?> </span></a></li>
                <li><a href="#">Pending <span class="pull-right badge bg-aqua"><?php
                                  $sql = "SELECT * FROM driverdelivery WHERE driverID= $idnumber and status='Pending' ";
                                  indexCount($con, $sql);
                                  ?></span></a></li>
                <li><a href="#"> Delivered <span class="pull-right badge bg-green"><?php
                                  $sql = "SELECT * FROM driverdelivery WHERE driverID= $idnumber and status='Delivered'";
                                  indexCount($con, $sql);
                                  ?></span></a></li>
                <li><a href="#"> On Road<span class="pull-right badge bg-red"><?php
                                  $sql = "SELECT * FROM driverdelivery WHERE driverID= $idnumber and status='OnRoad' ";
                                  indexCount($con, $sql);
                                  ?></span></a></li>
              </ul>
            </div>
              <!-- /.row -->
            </div>
          </div>
       
          </div>
          <div class="col-md-6">
            <form role="form" method="post">
       
                 <div class="form-group">
                <label>Search Area Code</label>
                <select class="form-control select2" multiple="multiple" name="AreaCode" data-placeholder="Enter Area Code"
                        style="width: 100%;">
                  <option>  <?php
                  $sql = "SELECT * FROM area";
                  $res = mysqli_query($con, $sql);

                  if(mysqli_num_rows($res) > 0) {
                    while($row = mysqli_fetch_assoc($res)) {

                      echo '<option value="'.$row['boxcode'].' '.$row['cityName'].' "> '.$row['cityName'].' , '.$row['boxcode'].' </option>';
                    }
                  }
                  ?></option>
                
                </select>
              </div>
                    <div class="form-group">
                <label>Select Month</label>
                <select name="Month" class="form-control">
         
                  <?php
                  $sql = "SELECT * FROM months ORDER BY m_ID ";
                  $res = mysqli_query($con, $sql);
              
                  $year = date("Y");

                  if(mysqli_num_rows($res) > 0) {
                    while($row = mysqli_fetch_assoc($res)) {
                      echo '<option value="'.$row['m_Name'].' - '.$year.'">'.$row['m_Name'].' - '.$year.'</option>';
                    }
                  }
                  ?>
                </select>
              </div>

              <input type="text" name="idnumber" value="<?php echo $idnumber; ?>" hidden>

				 <button name="locsubmit" type="submit" class="btn btn-primary">Submit Allocation</button>                                                                  
              <button type="reset" class="btn btn-default">Reset</button>
            </form>
          </div>
        </div>
      </div>  
    </div>    
  </div>      
</div>        
<!-- /.Modal -->
<script>      
  function closeModal() {
    jQuery('#LocModal').modal('hide');
    setTimeout(function() {
      jQuery('#LocModal').remove();
    },500);   
  }           
</script>     
<?php echo ob_get_clean(); ?>

<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">

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