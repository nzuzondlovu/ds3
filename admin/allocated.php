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
if(isset($_POST['submit'])){

  $name = mysqli_real_escape_string($con, strip_tags(trim($_POST["name"])));
  $id = mysqli_real_escape_string($con, strip_tags(trim($_POST["id"])));
  $number = mysqli_real_escape_string($con, strip_tags(trim($_POST["number"])));
  $email = mysqli_real_escape_string($con, strip_tags(trim($_POST["email"])));

  if($name != '' && $id != '' && $number != '' && $email != '') {

    $sql = "INSERT INTO customerrepaire(Cname, idNo, num, email)
    VALUES ('".$name."','".$id."', '".$number."', '".$email."')";
    mysqli_query($con, $sql);
    $_SESSION['success'] = 'Your customer was added successfully.';
    header("Location: devicedetails.php");

  }else {
    $_SESSION['failure'] = 'Please fill in all fields.';
  }

}

?>

<?php
$l = 'Luthos';
$s = 'Simo';
$n = 'Nzuzo';
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
        <h1 class="page-header">Allocated Technicians</h1>
      </div>
      <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
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
            Technician allocation details
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="pull-right">
                  <a href="jobs.php" class="btn btn-warning">Devices</a>
                </div>
              </div>

              <div class="col-md-12">
                <?php

                $sql = "SELECT DISTINCT(tname) FROM techrepair";
                $res = mysqli_query($con, $sql);

                if (mysqli_num_rows($res) > 0) {

                  while ($row = mysqli_fetch_assoc($res)) {

                    echo '
                    <div class="col-mg-4">
                      <div class="flip3D" style="width: 400px;">
                        <div class="back">
                          <a href="tech.php?tname='.$row['tname'].'">
                            <h1><p align="center">View Devices</p></h1>
                          </a>
                        </div>
                        <div class="front">
                          <h1><p align="center">'.$row['tname'].'</p></h1>
                        </div>
                      </div>
                    </div>';

                  }
                } else {
                  echo '
                  <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>No allocations found.</strong>
                  </div>';
                }

                ?>
              </div>
              <!-- /.col-lg-6 (nested) -->
            </div>
            <!-- /.row (nested) -->
          </div>
          <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
      </div>
      <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php
include 'footer.php';
?>