<?php
include_once 'functions.php';

if (isset($_POST['id']) && $_POST['id'] != null) {
  $id = mysqli_real_escape_string($con, strip_tags(trim($_POST['id'])));

  $cust = '';


  $sql = "SELECT * FROM custdelivery WHERE deliveryID='".$id."'";
  $res = mysqli_query($con, $sql);

  if (mysqli_num_rows($res) > 0) {

    $row = mysqli_fetch_assoc($res);

    $cust = '
    Name : '.$row['custname'].'<br>
    Cell Number : '.$row['custcell'].'<br>
    Street Address : '.$row['strAddress'].'<br>
    Suburb : '.$row['suburb'].'<br>
    Area : '.$row['area'].'<br>
    Boxcode : '.$row['boxcode'].'<br>
    Date of Request : '.$row['dateofRequest'].'<br>
    Date of Delivery : '.$row['dateofDelivery'];
    $a= $row['boxcode'];

  }


}
?>

<?php ob_start(); ?>
<!-- Modal -->
<div class="modal fade " id="driverModal" tabindex="-1" role="dialog" aria-labelledby="driverModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" onclick="closeModal()" aria-label="Close"><span class="fa fa-close" aria-hidden="true"></span> Close</button>
        <h4 class="modal-title" id="driverModalLabel">Allocate Driver</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <?php
            echo $cust;
            ?>
          </div>
          <div class="col-md-6">
            <form role="form" method="post">
              <div class="form-group">
                <label>Choose Driver</label>
                <select name="driver" class="form-control">
                  <option value="" selected="selected">Select Driver</option>


                  <?php
                  $string = array();
                   $names = array();
                  $i = 0;
                  

                 $sql= " SELECT DISTINCT driver_loc.idnumber, driver_loc.AreaCode FROM driver_loc
JOIN custdelivery ON driver_loc.AreaCode = $a
WHERE custdelivery.boxcode = driver_loc.AreaCode  ORDER BY driver_loc.idnumber DESC";

                  $res = mysqli_query($con, $sql);

                  if(mysqli_num_rows($res) > 0) {

                    while($row = mysqli_fetch_assoc($res)) {

                      $sql1 = 'SELECT * FROM drivers WHERE idnumber='.$row['idnumber'];
                      $res1 = mysqli_query($con, $sql1);
                      $row1 = mysqli_fetch_assoc($res1);

$string[$i] = $row['idnumber'];
$names[$i] = $row1['name'];
$i++;                      
                    }
                  }
                  array_unique($string);
                  array_unique($names);
for ($s=0; $s < count($string); $s++) { 

 echo '<option value="'.$string[$s].'">'.$names[$s].'</option>';

}
                 
                  ?>

                </select>
              </div>

              <div class="form-group">
               <label>Delivery Status</label>
               <select class="form-control select2" name="status" multiple="multiple" data-placeholder="Enter Status"
               style="width: 100%;">
               <option>Pending</option>
               

             </select>
           </div>
           <input type="text" name="del" value="<?php $res = mysqli_query($con, "SELECT * FROM custdelivery WHERE deliveryID=$id ");$row= mysqli_fetch_assoc($res);echo $row['deliveryID'];?> " style="display: none" />

           <input type="text" name="name" value="<?php $res = mysqli_query($con, "SELECT * FROM custdelivery WHERE deliveryID=$id ");$row = mysqli_fetch_assoc($res);echo $row['custname'];?>" style="display: none" />

           <input type="text" name="cell" value="<?php $res = mysqli_query($con, "SELECT * FROM custdelivery WHERE deliveryID=$id ");$row = mysqli_fetch_assoc($res);echo $row['custcell']; ?>"  style="display: none"/>

           <input type="text" name="dateD" value="<?php $res = mysqli_query($con, "SELECT * FROM custdelivery WHERE deliveryID=$id ");$row = mysqli_fetch_assoc($res);echo $row['dateofDelivery'];?> " style="display: none" />

           <input type="text" name="strA" value="<?php $res = mysqli_query($con, "SELECT * FROM custdelivery WHERE deliveryID=$id ");$row = mysqli_fetch_assoc($res);echo $row['strAddress']; ?>"  style="display: none"/>

           <input type="text" name="suburb" value="<?php $res = mysqli_query($con, "SELECT * FROM custdelivery WHERE deliveryID=$id ");$row = mysqli_fetch_assoc($res);echo $row['suburb']; ?>"  style="display: none"/>

           <input type="text" name="area" value="<?php $res = mysqli_query($con, "SELECT * FROM custdelivery WHERE deliveryID=$id ");$row = mysqli_fetch_assoc($res);echo $row['area']; ?>"  style="display: none"/>

           <input type="text" name="boxcode" value="<?php $res = mysqli_query($con, "SELECT * FROM custdelivery WHERE deliveryID=$id ");$row = mysqli_fetch_assoc($res);echo $row['boxcode']; ?>"  style="display: none"/>

           <button name="submit" type="submit" class="btn btn-primary">Submit Allocation</button>                                                                  
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
    jQuery('#driverModal').modal('hide');
    setTimeout(function() {
      jQuery('#driverModal').remove();
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
