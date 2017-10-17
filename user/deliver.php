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
if (isset($_GET['id']) && $_GET['id'] != '') {

}
?>
<?php

if(isset($_POST['submit'])) {


    $street = mysqli_real_escape_string($con, strip_tags(trim($_POST["strAddress"])));
    $id = mysqli_real_escape_string($con, strip_tags(trim($_POST["suburb"])));
    $area = '';
    $suburb='';
    $boxcode = mysqli_real_escape_string($con, strip_tags(trim($_POST["boxcode"])));
    $user_id=$_SESSION['email'];

    $sql = "SELECT * FROM area WHERE id='".$id."' ORDER BY suburbName ASC";
    $res = mysqli_query($con, $sql);
	if(mysqli_num_rows($res) > 0) {
    while($row = mysqli_fetch_assoc($res)) {
    $suburb=$row['suburb'];
    $area=$row['area'];
        }
                                        
    }

    if($street != '' && $suburb != '' && $area != '' && $boxcode != '') {
		$sql = "INSERT INTO Address(user_id,strAddress,suburb,boxcode,area) VALUES ('".$user_id."','".$street."','".$suburb."','".$boxcode."','".$area."') ";
        mysqli_query($con, $sql);
        $_SESSION['success'] = 'Your new postal address was added successfully.';
        header("Location: confirmDelivery.php");
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
				<h1 class="page-header">Change of Delivery Address</h1>
			</div>
				<div class="pull-left">
    					<?php

    					$sql1 = "SELECT * FROM user WHERE id='".$_SESSION['user_id']."'";
    					$res1 = mysqli_query($con, $sql1);

    					if(mysqli_num_rows($res1) > 0) {

    						while($row1 = mysqli_fetch_assoc($res1)) {
    							echo 
    							$row1['name'].'<br>'.
    							$row1['surname'].'<br>'.
    							$row1['cell'].'<br>'.
    							$row1['idnumber'].'<br>'.
    							$row1['email'].'<br>'.
    							$row1['location'];
    						}
    					} 
    					?>
    				</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Change Details
					</div>
					<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="row">
    			    <div class="col-lg-12">
    				  <div class="col-md-offset-3 col-md-6">
    				   <form role="form" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Street Address</label>
                                        <input name="strAddress" class="form-control" placeholder="Enter text">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Suburb</label>
                                        <select id="suburb" name="suburb" class="form-control select2" onchange="document.getElementById('area').value=this.value" required>
                                            <option value="" selected="selected">      <?php
                                            $sql = "SELECT * FROM suburb ORDER BY suburbName ASC";
                                            $res = mysqli_query($con, $sql);

                                            if(mysqli_num_rows($res) > 0) {
                                                while($row = mysqli_fetch_assoc($res)) {
                                                    echo '<option  value="'.$row['suburbName'].'">'.$row['suburbName'].'</option>';
                                                 
                                                }
                                                
                                            }
                                            ?></option>
                                   
                                        </select>
                                      
                                    </div>


                                     <div class="form-group">
                                        <label>City</label>
                                      	 <select id="area" name="area" class="form-control select2" onchange="document.getElementById('boxcode').value=this.value" required>
                                            <option value="" selected="selected">Select type</option>
                                            <?php
                                            $sql = "SELECT * FROM area ORDER BY cityName ASC";
                                            $res = mysqli_query($con, $sql);

                                            if(mysqli_num_rows($res) > 0    ) {
                                                while($row = mysqli_fetch_assoc($res)) {
                                                    echo '<option  value="'.$row['cityName'].','.$row['boxcode'].'">'.$row['cityName'].'</option>';
                                                 
                                                }
                                                
                                            }
                                            ?>
                                        </select>
                                      
                                    </div>
                                    <div class="form-group">
                                        <label>Area Code</label>
                                        <input id="boxcode" name="boxcode" class="form-control" value="" placeholder="Enter text" >
                                    </div>
                                   
                                    <button name="submit" type="submit" class="btn btn-primary">Submit Address</button>
                                    <button type="reset" class="btn btn-default">Reset Address</button>
                                </form> 
								<script type="text/javascript">
								window.onload=function() { 
  document.getElementById("suburb").onchange=function() {
    document.getElementById("area").value=this.options[this.selectedIndex].getAttribute("data-sync"); 
  }
  document.getElementById("suburb").onchange(); // trigger when loading
}
								</script>     
                    </div>
    				</div>
    			</div>
				<!-- /.table-responsive -->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php
include 'footer.php';
 ?>

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