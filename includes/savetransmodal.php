
<?php
ob_start();
include '../includes/functions.php';
?>

<?php
if(isset($_SESSION['key']) == '' ) {
  header("location:../login.php");
}
?>


<?php
$id='';
if (isset($_POST['id']) && $_POST['id'] != null) {
  $id = mysqli_real_escape_string($con, strip_tags(trim($_POST['id'])));
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
	}
</script>

<!-- Modal -->
<div class="modal fade " id="saveTransModal" tabindex="-1" role="dialog" aria-labelledby="saveTransModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span> Close</button>
        <h4 class="modal-title" id="saveTransModalLabel">Payment Details</h4>
      </div>
      <div class="modal-body">
    
													<div class="modal-body">
														<form role="form" method="post" enctype="multipart/form-data">


															<div class="form-group">
															<label>Customer Name</label>
                    										<input type="text" name="custname" class="form-control" value="">
															</div>

															<div class="form-group">
																<label>Payment Method</label>
                    												<input type="radio" name="type"  value="cash"/>Cash
                    												<input type="radio" name="type"  value="card"/>Card

															</div>
															<div class="form-group">
															<label>Amount Paid</label>
                    									<input type="text" id="txt1" name="amt" onkeyup="sum();" class="form-control" value="">
															</div>
														
															
															<input type="text" id="txt2" onkeyup="sum();" name="total" value="<?php echo $id?>" hidden >
															<div class="form-group">
															<label>Change</label>
                    										<input type="text" id="txt3" name="change" class="form-control" value="">
															</div>
															<div class="form-group">
															<label>Cashier</label>
                    										<select name="cashier" class="form-control">
                      										<option value="" selected="selected">Select Cashier</option>
                      											<?php
                      												$role='admin';
                      													$sql = "SELECT * FROM user WHERE role LIKE '%".$role."%' ORDER BY name ASC";
                      													$res = mysqli_query($con, $sql);

                      													if(mysqli_num_rows($res) > 0) {
                        												while($row = mysqli_fetch_assoc($res)) {
                         												 echo '<option value="'.$row['name'].'">'.$row['name'].' '.$row['surname'].'</option>';
                        														}
                      															}		
                      												?>
                    											</select>
																	</div>
															<div class="form-group">
															  <input type="text" name="date" value="<?php echo date('Y-m-d', strtotime('today')); ?>" hidden>
															<button name="btnSubmit" type="submit" class="btn btn-primary"><a href="preview.php?id=<?php echo $id;?>" ><i class="fa fa-save fa-fw"></i>Save</a> </button>
														
															<button type="reset" class="btn btn-default">Reset</button>
														</form>
													</div>
												</div>
											</div>
										</div>

  <!-- /.Modal -->
 
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