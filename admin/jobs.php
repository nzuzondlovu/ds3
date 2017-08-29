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
  if(isset($_GET['del']) && $_GET['del'] != '') {

    $id = mysqli_real_escape_string($con, strip_tags(trim($_GET['del'])));

    if ($id) {
      $sql = "DELETE FROM customersaledevice WHERE WHERE id='".$id."'";
      mysqli_query($con, $sql);
      $_SESSION['success'] = 'Device was deleted successfully.';
    } else {
      $_SESSION['failure'] = 'An error occured, please try again.';
    }
  }

  ?>

  <?php
  include 'header.php';
  ?>

  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Waitlist</h1>
        </div>
        <!-- /.col-lg-12 -->
      </div>
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
              List of all devices to be fixed
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
              <div class="table-responsive">
                <?php

                $sql = "SELECT * FROM customersaledevice";
                $res = mysqli_query($con, $sql);

                if (mysqli_num_rows($res) > 0) {
                  echo '
                  <table id="bookings" class="table data-table">
                    <thead>
                      <tr>
                        <th>Device Name</th>
                        <th>Model</th>
                        <th>Serial No</th>
                        <th>type</th>
                        <th>Date Recieved</th>
                        <th>Cost</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>';
                      while ($row = mysqli_fetch_assoc($res)) {

                        echo '
                        <tr>
                          <td>'.$row['diviceName'].'</td>
                          <td>'.$row['model'].'</td>
                          <td>'.$row['serialNumber'].'</td>
                          <td>'.$row['Dtype'].'</td>
                          <td>'.date("M d, y",strtotime($row['recievedDate'])).'</td>
                          <td>'.$row['establishAmount'].'</td>
                          <td class="pull-right">
                            <a class="btn btn-danger" href="?del='.$row['id'].'"><span class="fa fa-trash"></span> Delete</a> <a class="btn btn-warning" href="editdevice.php?id='.$row['id'].'"><span class="fa fa-pencil"></span> Edit</a> <a class="btn btn-success" href="allocatedevice.php?id='.$row['id'].'"><span class="fa fa-mail-reply"></span> Allocate</a>
                          </td>
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
  $(document).ready(function(){
    $('#bookings').DataTable();
  });
</script>