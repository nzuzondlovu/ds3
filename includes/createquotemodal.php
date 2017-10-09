<?php
include_once 'functions.php';

$id = '';
$name = '';
$serial = '';
$user_book= '';


if (isset($_POST['id']) && $_POST['id'] != null) {

  $id = mysqli_real_escape_string($con, strip_tags(trim($_POST['id'])));
  $sql = "SELECT * FROM job WHERE id='".$id."'";
  $res = mysqli_query($con, $sql);

  if (mysqli_num_rows($res) > 0) {

    while ($row = mysqli_fetch_assoc($res)) {

      $_SESSION['booking_id'] = $row['id'];
      $_SESSION['booking'] = 'Name: '.$row['name'].'<br>Serial: '.
      $row['serial'].'<br>Type: '.
      $row['type'].'<br>Status: '.
      $row['status'].'<br>Description: '.
      $row['description'].'<br>USEr_ID: '. 
      $row['user'].'<br>Date: '. 
      date("M d, y",strtotime($row['date'])).' <br>
      <img class="img-responsive" src="../uploads/'.$row['pic_url'].'">';
      $name = $row['name'];

      $serial = $row['serial'];
      $user_book= $row['user'];
      $job_code= $row['job_code'];

    }
  }
}

?>

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

<?php ob_start(); ?>
<!-- Modal -->
<div class="modal fade " id="responseModal" tabindex="-1" role="dialog" aria-labelledby="responseModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" onclick="closeModal()" aria-label="Close"><span class="fa fa-close" aria-hidden="true"></span> Close</button>
        <h4 class="modal-title" id="responseModalLabel">Create Quote</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <h2>Device details</h2>
            <p>
              <?php
              echo $_SESSION['booking'];
              ?>
            </p>
          </div>
          <div class="col-md-6">
            <form id="quoteForm" role="form" method="post">
              <div class="form-group">
                <label>Model</label>
                <input class="form-control" type="text" name="model" placeholder="Enter model">
              </div>
<<<<<<< HEAD
            
                         <div class="form-group">
               <label>Accessory</label>
                <select class="form-control select2" name="accessory" multiple="multiple" data-placeholder="Select Accessories"
                        style="width: 100%;">
                  <option>Charger</option>
                  <option>Battery</option>
                  <option></option>
                  <option></option>
                  <option></option>
                  <option></option>
                  <option></option>
                </select>
              </div>
             
=======
              <div class="form-group">
                <label>Accessory</label>
                <input class="form-control" type="text" name="accessory" placeholder="Enter accessories">
                <div class="form-group">
                  <label>Multiple</label>
                  <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                    <option>Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
              </div>
>>>>>>> cb2a6b7effa7ea104d34de4cac24765ef271831b
              <div class="form-group">
                <label>Choose technician</label>
                <select name="technician" class="form-control">
                  <option value="" selected="selected">Select technician</option>
                  <?php
                  $sql = "SELECT * FROM technician";
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
                <label>Deposit</label>              
                <input class="form-control" type="text" id="txt2" name="deposit" onkeyup="sum();" Required placeholder="R0.00">
              </div>
              <div class="form-group">
                <label>Total</label>
                <input class="form-control"  type="text" id="txt1"  name="total" onkeyup="sum();" Required placeholder="R0.00">
              </div>
              <div class="form-group">
                <label>Balance</label> 
                <input type="text" id="txt3" class="form-control" name="balance" readonly>
              </div>
              <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                  <option value="" selected="selected">Select status</option>
                  <?php
                  $sql = "SELECT * FROM status ORDER BY name ASC";
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
                <label>Description</label>
                <textarea name="desc" class="form-control" rows="5"></textarea>
              </div>
              <input type="text" name="id" value="<?php echo $id; ?>" hidden>
              <input type="text" name="name" value="<?php echo $name; ?>" hidden>
              <input type="text" name="serial" value="<?php echo $serial; ?>" hidden>
              <input type="text" name="job_code" value="<?php echo $job_code; ?>" hidden>

              <input type="text" name="user_book" value="<?php echo $user_book;  ?>" hidden >

              <button name="create" type="submit" class="btn btn-primary">Submit Quotation</button>
              <button type="reset" class="btn btn-default">Reset Quotation</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.Modal -->
  <script>
    function closeModal() {
      jQuery('#responseModal').modal('hide');
      setTimeout(function() {
        jQuery('#responseModal').remove();
      },500);
    }
  </script>
  <script type="text/javascript">

    $( document ).ready( function () {
      $( "#quoteForm" ).validate( {
        rules: {
          model: {
            required: true,
            maxlength: 35
          },
          accessory: {
            required: true,
            maxlength: 250
          },
          technician: "required",
          deposit: {
            required: true,
            maxlength: 10
          },
          balance: {
            required: true,
            maxlength: 10
          },
          total: {
            required: true,
            maxlength: 10
          },
          status: "required",
          desc: {
            required: true,
            minlength: 10,
            maxlength: 250
          }
        },
        messages: {
          model: {
            required: "Please enter the model of the device",
            maxlength: "Your model cant be longer than 35 characters"
          },
          accessory: {
            required: "Please enter the accessoriesof the device",
            maxlength: "Your response cant be longer than 250 characters"
          },
          technician: "Please select a technician",
          deposit: {
            required: "Please enter a deposit amount",
            maxlength: "Please enter a valid amount"
          },
          balance: {
            required: "Please enter a balance amount",
            maxlength: "Please enter a valid amount"
          },
          total: {
            required: "Please enter the total amount",
            maxlength: "Please enter a valid amount"
          },
          status: "Please select a device status",
          desc: {
            required: "Please enter a description of the device",
            minlength: "Your description has to be more than 10 characters",
            maxlength: "Your description cant be longer than 250 characters"
          }
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
  <?php echo ob_get_clean(); ?>
<<<<<<< HEAD
  
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
=======
>>>>>>> cb2a6b7effa7ea104d34de4cac24765ef271831b
