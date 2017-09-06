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

if(isset($_POST['customer'])) {

  $name = mysqli_real_escape_string($con, strip_tags(trim($_POST["name"])));
  $id = mysqli_real_escape_string($con, strip_tags(trim($_POST["id"])));
  $phone = mysqli_real_escape_string($con, strip_tags(trim($_POST["phone"])));
  $email = mysqli_real_escape_string($con, strip_tags(trim($_POST["email"])));

  if ($id != '' && $name != '' && $phone != '' && $email != '') {

    $sql = 'INSERT INTO customerrepaire (Cname, idNo, num, email) VALUES("'.$name.'", "'.$id.'", "'.$phone.'", "'.$email.'")';
    mysqli_query($con, $sql);
    $_SESSION['success'] = 'User was added successfully.';
  } else {
    $_SESSION['failure'] = 'An error occured, please try again.';
  }
  


}
?>

<?php
if(isset($_POST['device'])) {

  $name = mysqli_real_escape_string($con, strip_tags(trim($_POST["name"])));
  $model = mysqli_real_escape_string($con, strip_tags(trim($_POST["model"])));
  $serial = mysqli_real_escape_string($con, strip_tags(trim($_POST["serial"])));
  $type = mysqli_real_escape_string($con, strip_tags(trim($_POST["type"])));
  $date = mysqli_real_escape_string($con, strip_tags(trim($_POST["date"])));
  $price = mysqli_real_escape_string($con, strip_tags(trim($_POST["price"])));
  
  if($name != '' && $model != '' && $serial != '' && $type != '' && $date != '' && $price != '') {

    $sql = 'INSERT INTO customersaledevice (diviceName, model, serialNumber, Dtype, recievedDate, establishAmount) VALUES("'.$name.'", "'.$model.'", "'.$serial.'", "'.$type.'", "'.$date.'", "'.$price.'")';
    mysqli_query($con, $sql);
    $_SESSION['success'] = 'Your new Promotional Product was added successfully.';
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
    <div class="modal fade" id="addItem" tabindex="-1" role="dialog" aria-labelledby="addItemLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="fa fa-close" aria-hidden="true"></span> Close</button>
            <h4 class="modal-title" id="addItemLabel">Add Customer</h4>
          </div>
          <div class="modal-body">
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Customer name</label>
                <input name="name" class="form-control" placeholder="Enter text">
              </div>
              <div class="form-group">
                <label>ID number</label>
                <input name="id" class="form-control" placeholder="Enter text">
              </div>
              <div class="form-group">
                <label>Phone number</label>
                <input name="phone" class="form-control" placeholder="Enter text">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input name="email" class="form-control" placeholder="Enter text">
              </div>
              <button name="customer" type="submit" class="btn btn-primary">Submit Customer</button>
              <button type="reset" class="btn btn-default">Reset Form</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.Modal -->

    <!-- Modal -->
    <div class="modal fade" id="addDevice" tabindex="-1" role="dialog" aria-labelledby="addDeviceLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="fa fa-close" aria-hidden="true"></span> Close</button>
            <h4 class="modal-title" id="addItemLabel">Add Device</h4>
          </div>
          <div class="modal-body">
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="">
              </div>
              <div class="form-group">
                <label>Model</label>
                <input type="text" name="model" class="form-control" value="">
              </div>
              <div class="form-group">
                <label>Serial</label>
                <input type="text" name="serial" class="form-control" value="">
              </div>
              <div class="form-group">
                <label>Type</label>
                <select name="type" class="form-control">
                  <option value="" selected="selected">Select type</option>
                  <option value="Hardware">Hardware</option>
                  <option value="Software">Software</option>
                </select>
              </div>
              <div class="form-group">
                <label>Date</label>
                <input type="date" name="date" class="form-control" value="">
              </div>
              <div class="form-group">
                <label>Price</label>
                <input type="number" name="price" class="form-control" value="">
              </div>
              <button name="device" type="submit" class="btn btn-primary">Submit Device</button>
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
        <div class="panel panel-default">
          <div class="panel-heading">
            List of all waitlist devices
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="pull-right">
                  <button class="btn btn-success" data-toggle="modal" data-target="#addItem"> Add Customer</button>
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

                      echo '
                      <tr>
                        <td>'.$row['id'].'</td>
                        <td>'.$row['diviceName'].'</td>
                        <td>'.$row['model'].'</td>
                        <td>'.$row['serialNumber'].'</td>
                        <td>'.$row['Dtype'].'</td>
                        <td>R '.$row['establishAmount'].'</td>                        
                        <td>'.date("M d, y",strtotime($row['recievedDate'])).'</td>
                        <td class="pull-right">
                          <a class="btn btn-danger" href="?id='.$row['id'].'"><span class="fa fa-trash"> Delete</span></a>
                          <button class="btn btn-warning" onclick="modal('.$row['id'].')"><span class="fa fa-pencil"> Edit</button>
                          <!--<a class="btn btn-info" href="checkrepair.php?id='.$row['id'].'"><span class="fa fa-cogs"> Repair device</a>-->
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