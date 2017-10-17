<?php
include_once 'functions.php';

if (isset($_POST['id']) && $_POST['id'] != null) {
  $id = mysqli_real_escape_string($con, strip_tags(trim($_POST["id"])));


  $cat = '';
  $dep = '';
  $bal = '';
  $tot = '';
  $sta = '';
  $des = '';

  $sql = "SELECT * FROM quotation WHERE id=$id";
  $res = mysqli_query($con, $sql);

  if(mysqli_num_rows($res) > 0) {
    while($row = mysqli_fetch_assoc($res)) {
      $cat = '
      ID : '.$row['id'].'<br>
      Device Name : '.$row['name'].'</br>
      Serial Number : '.$row['serial'].'</br>
      Model : '.$row['model'].'</br>
      Accessory : '.$row['accessory'].'</br>
      Technician : '.$row['technician'].'</br>
      Description : '.$row['description'].'</br>
      Deposit : R '.$row['deposit'].'</br>
      Balance : R '.$row['balance'].'</br>
      Total : R '.$row['total'].'</br>
      Status : '.$row['status'].'</td>
      ';
      $dep = $row['deposit'];
      $bal = $row['balance'];
      $tot = $row['total'];
      $sta = $row['status'];
      $des = $row['description'];
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
        <h4 class="modal-title" id="responseModalLabel">Edit Quote</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <h2>Qoutation details</h2>
            <?php
            echo $cat;
            ?>
          </div>

          <div class="col-md-6">
            <form id="editForm" role="form" method="post">
              <div class="form-group">
                <label>Deposit</label>              
                <input class="form-control" type="text" id="txt2" name="deposit" onkeyup="sum();"  required="required" placeholder="R0.00"  value="<?php echo $dep;?>">
              </div>
              <div class="form-group">
                <label>Total</label>
                <input class="form-control"  type="text" id="txt1"  name="total" onkeyup="sum();"  required="required" placeholder="R0.00"  value="<?php echo $tot;?>">
              </div>
              <div class="form-group">
                <label>Balance</label> 
                <input type="text" id="txt3" class="form-control" name="balance" onkeyup="sum();" readonly value="<?php echo $bal;?>" required="required">
              </div>
              <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                  <option value="<?php echo $sta;?>" selected="selected"><?php echo $sta;?></option>
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
                <textarea name="desc" class="form-control" rows="3"><?php echo $des;?></textarea>
              </div>
              <input type="number" name="id" value="<?php echo $id; ?>" hidden>
              <button name="editquote" type="submit" class="btn btn-primary">Submit Quotation</button>
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
      $( "#editForm" ).validate( {
        rules: {
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