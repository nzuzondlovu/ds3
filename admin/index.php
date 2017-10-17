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
include 'header.php';
?>

<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">


    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
      </div>
      <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <!-- /.row -->

    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-book"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Bookings</span>
            <span class="info-box-number">          
              <?php
              $sql = "SELECT * FROM job";
              indexCount($con, $sql);
              ?>                                  
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
         <span class="info-box-icon bg-purple"><i class="fa fa-envelope-o"></i></span>

         <div class="info-box-content">
          <span class="info-box-text">Reviews</span>
          <span class="info-box-number"> 
            <?php
            $sql = "SELECT * FROM review WHERE  seen=0";
            indexCount($con, $sql);
                                //seen
            ?>                                  
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-shopping-basket"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Orders</span>
          <span class="info-box-number">
            <?php
            $sql = "SELECT * FROM cart";
            indexCount($con, $sql);
            ?>                                  
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-group"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Users</span>
          <span class="info-box-number">
            <?php
            $sql = "SELECT * FROM user";
            indexCount($con, $sql);
            ?>                                  
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

  </div>
</div>



<?php 
include('connect.php');
$result = $db->prepare("SELECT * FROM product ORDER BY qty_sold DESC");
$result->execute();
$rowcount = $result->rowcount();
?>

<?php 
include('connect.php');
$result = $db->prepare("SELECT * FROM product where qty < 10 ORDER BY id DESC");
$result->execute();
$rowcount123 = $result->rowcount();

?>





<div class="row">

    <!-- /.col -->
  </div>
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php
include 'footer.php';
?>