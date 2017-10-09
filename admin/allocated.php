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

<style>
  .flip3D{ width:240px; height:200px; margin:10px; float:left; }
  .flip3D > .front{
    position:absolute;
    transform: perspective( 600px ) rotateY( 0deg );
    background:#FC0; width:240px; height:200px; border-radius: 7px;
    backface-visibility: hidden;
    transition: transform .5s linear 0s;
  }
  .flip3D > .back{
    position:absolute;
    transform: perspective( 600px ) rotateY( 180deg );
    background: #80BFFF; width:240px; height:200px; border-radius: 7px;
    backface-visibility: hidden;
    transition: transform .5s linear 0s;
  }
  .flip3D:hover > .front{
    transform: perspective( 600px ) rotateY( -180deg );
  }
  .flip3D:hover > .back{
    transform: perspective( 600px ) rotateY( 0deg );
  }
  #imgc{
    width: 240px; height: 200px;  border: 2px solid #a1a1a1;
    border-radius: 5px;
  }

</style>


<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Technician Work</h1>
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
            List of all technician work
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div class="col-lg-12">
              <div class="pull-right">
                <a class="btn btn-warning" href="jobs.php"> Jobs</a>
              </div>
            </div>
            <div class="col-md-12">

              <?php

              $sql = "SELECT * FROM technician";
              $res = mysqli_query($con, $sql);

              if (mysqli_num_rows($res) > 0) {

                while ($row = mysqli_fetch_assoc($res)) {

                  echo '
                  <div class="col-mg-4">
                    <div class="flip3D">
                      <div class="back">
                        <a href="tech.php?tname='.$row['name'].'">
                          <h1 style="text-align: center">View Devices</h1>
                        </a>
                      </div>
                      <div class="front">
                        <h1 style="text-align: center">'.$row['name'].'</h1>
                      </div>
                    </div>
                  </div>';
                }

              } else {
                echo '<div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>No technician found.</strong>
              </div>';
            }
            ?>
          </div>
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