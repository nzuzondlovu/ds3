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
if(isset($_POST['submit'])) {

  $dname = mysqli_real_escape_string($con, strip_tags(trim($_POST["dname"])));
  $model = mysqli_real_escape_string($con, strip_tags(trim($_POST["model"])));
  $serial = mysqli_real_escape_string($con, strip_tags(trim($_POST["serial"])));
  $type = mysqli_real_escape_string($con, strip_tags(trim($_POST["type"])));
  $date = mysqli_real_escape_string($con, strip_tags(trim($_POST["date"])));
  $price = mysqli_real_escape_string($con, strip_tags(trim($_POST["price"])));
  $cname = mysqli_real_escape_string($con, strip_tags(trim($_POST["cname"])));
  $id = mysqli_real_escape_string($con, strip_tags(trim($_POST["id"])));
  $phone = mysqli_real_escape_string($con, strip_tags(trim($_POST["phone"])));
  $email = mysqli_real_escape_string($con, strip_tags(trim($_POST["email"])));

  function createRandomPassword() {
    $chars = "003232303232023232023456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;
    while ($i <= 7) {

      $num = rand() % 33;

      $tmp = substr($chars, $num, 1);

      $pass = $pass . $tmp;

      $i++; 

    }
    return $pass;
  }
  $job_code= 'JOB-'.createRandomPassword()  ;

  
  if($dname != '' && $model != '' && $serial != '' && $type != '' && $date != '' && $price != '' && $id != '' && $cname != '' && $phone != '' && $email != '') {

     $sql = 'INSERT INTO customersaledevice (diviceName, model, serialNumber, Dtype, recievedDate, establishAmount, Cname, idNo, num, email,job_code) VALUES("'.$dname.'", "'.$model.'", "'.$serial.'", "'.$type.'", "'.$date.'", "'.$price.'", "'.$cname.'", "'.$id.'", "'.$phone.'", "'.$email.'", "'.$job_code.'")';
    mysqli_query($con, $sql);
    $_SESSION['success'] = 'New Customer and Device details was added successfully.';
  }else {
    $_SESSION['failure'] = 'Please fill in all fields.';
  }
}
?>

<?php
if(isset($_GET['id']) && $_GET['id'] != '') {

  $id = mysqli_real_escape_string($con, strip_tags(trim($_GET['id'])));

  if ($id != '') {

    $sql = "DELETE FROM customersaledevice WHERE id='".$id."'";
    mysqli_query($con, $sql);
    $_SESSION['success'] = 'Device was deleted successfully.';
  } else {
    $_SESSION['failure'] = 'An error occured, fill in all fields and please try again.';
  } 
}
?>

<?php

if(isset($_POST['edit'])) {

  $id = mysqli_real_escape_string($con, strip_tags(trim($_POST["id"])));
  $name = mysqli_real_escape_string($con, strip_tags(trim($_POST["name"])));
  $model = mysqli_real_escape_string($con, strip_tags(trim($_POST["model"])));
  $serial = mysqli_real_escape_string($con, strip_tags(trim($_POST["serial"])));
  $type = mysqli_real_escape_string($con, strip_tags(trim($_POST["type"])));
  $date = mysqli_real_escape_string($con, strip_tags(trim($_POST["date"])));
  $price = mysqli_real_escape_string($con, strip_tags(trim($_POST["price"])));
  
  if($name != '' && $model != '' && $serial != '' && $type != '' && $date != '' && $price != '') {

    $sql = "UPDATE customersaledevice SET diviceName='".$name."', model='".$model."', serialNumber='".$serial."', Dtype='".$type."', recievedDate='".$date."', establishAmount='".$price."' WHERE id='".$id."'";
    mysqli_query($con, $sql);
    $_SESSION['success'] = 'Device was edited successfully.';
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
        <h1 class="page-header">Waitlist</h1>
      </div>
      <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <!-- Modal -->
    <div class="modal fade" id="addDevice" tabindex="-1" role="dialog" aria-labelledby="addDeviceLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="fa fa-close" aria-hidden="true"></span> Close</button>
            <h4 class="modal-title" id="addItemLabel">Add Device</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <form id="waitlistForm" role="form" method="post" enctype="multipart/form-data">
                <div class="col-md-6">            
                  <div class="form-group">
                    <label>Device Name</label>
                    <input type="text" name="dname" class="form-control" placeholder="Device name">
                  </div>
                  <div class="form-group">
                    <label>Device Model</label>
                    <input type="text" name="model" class="form-control" placeholder="Device model number">
                  </div>
                  <div class="form-group">
                    <label>Device Serial</label>
                    <input type="text" name="serial" class="form-control" placeholder="Device serial number">
                  </div>
                  <div class="form-group">
                    <label>Device Type</label>
                    <select name="type" class="form-control">
                      <option value="" selected="selected">Select type</option>
                      <option value="Hardware">Hardware</option>
                      <option value="Software">Software</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" class="form-control" placeholder="R0.00">
                  </div>
                  <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" class="form-control" >
                  </div>                  
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Customer name</label>
                    <input name="cname" class="form-control" placeholder="Customer full name">
                  </div>
                  <div class="form-group">
                    <label>ID number</label>
                    <input type="number" name="id" class="form-control" placeholder="Customer Identity number">
                  </div>
                  <div class="form-group">
                    <label>Phone number</label>
                    <input name="phone" class="form-control" placeholder="Customer cell number">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input name="email" class="form-control" placeholder="Customer email address">
                  </div>                          
                </div>
                <div class="col-lg-12">
                  <div class="col-md-6">
                    <button name="submit" type="submit" class="btn btn-primary btn-block">Submit Device</button>
                  </div>
                  <div class="col-md-6">
                    <button type="reset" class="btn btn-default btn-block">Reset Form</button>
                  </div>
                </div>
              </form>
            </div>
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
        <div class="panel panel-default">
          <div class="panel-heading">
            List of all waitlist devices
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="pull-right">
                  <a href="allocated.php" class="btn btn-warning"> Technicians</a>
                  <button class="btn btn-success" data-toggle="modal" data-target="#addDevice"> Add Device</button>
                </div>
              </div>
            </div>            
            <div class="table-responsive">              
              <?php

              $sql = "SELECT * FROM customersaledevice";
              $res = mysqli_query($con, $sql);

              if (mysqli_num_rows($res) > 0) {
                echo '  
                <table id="bookings" class="table data-table">
                <thead>
                <tr>
                <th>ID</th>
                <th>Device</th>
                <th>Model</th>
                <th>serial</th>
                <th>type</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Action</th>
                </tr>
                </thead>
                <tbody>';
                while ($row = mysqli_fetch_assoc($res)) {

                  $btn = '<a class="btn btn-info" href="allocate.php?id='.$row['id'].'"> Allocate</a>';
                  $sql1 = 'SELECT * FROM techrepair WHERE job_id='.$row['id'];
                  $res1 = mysqli_query($con, $sql1);

                  if (mysqli_num_rows($res1) > 0) {
                    
                    $btn = '';
                  }

                  echo '
                  <tr>
                  <td>'.$row['job_code'].'</td>
                  <td>'.$row['diviceName'].'</td>
                  <td>'.$row['model'].'</td>
                  <td>'.$row['serialNumber'].'</td>
                  <td>'.$row['Dtype'].'</td>
                  <td>R '.$row['establishAmount'].'</td>                        
                  <td>'.date("M d, y",strtotime($row['recievedDate'])).'</td>
                  <td class="pull-right">
                  <a class="btn btn-danger" href="?id='.$row['id'].'"> Delete</span></a>
                  <button class="btn btn-warning" onclick="modal('.$row['id'].')"> Edit</button>
                  '.$btn.'
                  </tr>';
                }
                echo '
                </tbody>
                </table>';
              } else {
                echo '<div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>No devices found.</strong>
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
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php
include 'footer.php';
?>
<script>
  function modal(id) {
    var data = {"id" : id};
    jQuery.ajax({
      url : '../includes/waitlistmodal.php',
      method : "post",
      data : data,
      success : function(data) {
        jQuery('body').append(data);
        jQuery('#waitlistModal').modal('toggle');
      },
      error : function() {
        alert("Ooops! Something went wrong!");
      }
    });
  }
</script>
<script>
  $(document).ready(function(){
    $('#bookings').DataTable();
  });
</script>
<script type="text/javascript">

  $( document ).ready( function () {
    $( "#waitlistForm" ).validate( {
      rules: {
        dname: {
          required: true,
          maxlength: 35
        },
        model: {
          required: true,
          maxlength: 35
        },
        serial: "required",
        type: "required",
        price: {
          required: true,
          maxlength: 35
        },
        date: "required",
        cname: {
          required: true,
          maxlength: 35
        },
        id: {
          required: true,
          minlength: 13,
          maxlength: 13
        },
        phone: {
          required: true,
          minlength: 11,
          maxlength: 12
        },
        email: {
          required: true,
          maxlength: 250
        }
      },
      messages: {
        dname: {
          required: "Please enter the name of the device",
          maxlength: "Your device name cant be longer than 35 characters"
        },
        model: {
          required: "Please enter the model of the device",
          maxlength: "Your model cant be longer than 35 characters"
        },
        serial: "Please enter device serial number.",
        type: "Please choose device type.",
        price: {
          required: "Please enter the price of the device",
          maxlength: "Your price cant be longer than 35 characters"
        },
        date: "Please select a date",
        cname: {
          required: "Please enter customer name",
          maxlength: "Your customer name cant be longer than 35 characters"
        },
        id: {
          required: "Please enter user identity number",
          maxlength: "Your identity number cant be longer than 13 characters",
          minlength: "Your identity number cant be shorter than 13 characters"
        },
        phone: {
          required: "Please enter customer cell phone number",
          minlength: "Your customer cell number cant be longer than 11 characters",
          maxlength: "Your customer cell number cant be longer than 12 characters"
        },
        email: {
          required: "Please enter customer email address",
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
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>