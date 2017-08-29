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
  if(isset($_GET['tname']) && $_GET['tname'] != '') {

    $tname = mysqli_real_escape_string($con, strip_tags(trim($_GET['tname'])));

  }

  ?>

  <?php
  include 'header.php';
  ?>

  <div id="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Technician Allocation</h1>
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
              List of all devices allocated to <?php echo $tname; ?>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
              <div class="table-responsive">
                <div class="col-lg-12">
                  <div class="pull-right">
                    <a href="allocated.php" class="btn btn-warning">Devices</a>
                  </div>
                </div>
                <?php

                $sql = "SELECT * FROM techrepair WHERE tname ='".$tname."'";
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