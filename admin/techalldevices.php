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
if(isset($_GET['id']) && $_GET['id'] != '') {

  $id = mysqli_real_escape_string($con, strip_tags(trim($_GET['id'])));

  if ($id) {
    $sql = "UPDATE job SET archive=1 WHERE id='".$id."'";
    mysqli_query($con, $sql);
    $_SESSION['success'] = 'Booking was archived successfully.';
  } else {
    $_SESSION['failure'] = 'An error occured, please try again.';
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
        <h1 class="page-header">Bookings</h1>
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
            Recycle Materail
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div class="table-responsive">
             <div class="container">
        <div class='row'>
                <h1 style='font-family:AR BLANCA; text-align: center'>Technician work</h1>
            </div>
            <div class="row">
                <br><table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Device Name</th>
                          <th>Model</th>
                          <th>Serial No</th>
                          <th>type</th>
                          <th>Date Recieved</th>
                          <th>Technician</th>
                        </tr>
                      </thead>
                      <tbody>
                 <?php

              $sql = "SELECT diviceName, model, serialNumber, Dtype, recievedDate, tname FROM techrepair";
                 $run = $con->query($sql) or die("error: ". mysqli_error($con));
                 while($row = $run->fetch_assoc()){
                  echo '<tr>';
               echo '<td>'. $row['diviceName'].'</td>';
               echo '<td>'. $row['model'].'</td>';
               echo '<td>'. $row['serialNumber'].'</td>';
               echo '<td>'. $row['Dtype'].'</td>';
              echo '<td>'. $row['recievedDate'].'</td>';
              echo '<td>'.'<a href="tech.php?tname='.$row["tname"].'">'. $row['tname'].'</a>'.'</td>'; 
              //echo '<td>'.'<a href="checkrepair.php?id='.$row['id'].'">Repaire Device.</a><br>'.'</td>';
              /*$t = "select tname from tech";
              $tx = $con->query($t);
              echo "<tr>". $row['tname'] ."</tr>";*/
              }
            ?>
                      </tbody>
                </table>
                 <a href="allocated.php" class="btn btn-success">back</a>
        </div>
    </div> <!-- /container -->

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