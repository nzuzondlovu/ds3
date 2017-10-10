<?php
ob_start();
include '../includes/functions.php';
?>

<?php
if(isset($_SESSION['user_id']) == '' ) {
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
        <h1 class="page-header"></h1>
      </div>
      <!-- /.col-lg-12 -->
    </div>
    <div class="table-responsive">
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

    if(isset($_POST['btnCon'])) {
      $status = (mysqli_real_escape_string($con, strip_tags(trim($_POST["status"]))));

      $del = (mysqli_real_escape_string($con, strip_tags(trim($_POST["del"]))));



      if($status != '') {


       echo $sql = "UPDATE driverdelivery SET status='".$status."'  WHERE deliveryID= '".$del."' ";
       mysqli_query($con, $sql);
       $_SESSION['success'] = 'Successfully updated all details.';
       

     } else {
      $_SESSION['failure'] = 'Please fill in all fields';
    }
  }
  ?>


  


  <!-- Main content -->
  <section class="content">

    <div class="row">

      <!-- /.col -->
      <div class="col-md-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#settings" data-toggle="tab">Deliveries</a></li>
            


          </ul>
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
              
              <div class="col-md-12">
                <!-- MAP & BOX PANE --></div>
                <div class="box box-success">
                  <div class="box-header with-border">
                    <h3 class="box-title">Confirm Deliveries</h3>

                    
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <div class="row">
                      <div class="col-md-12 col-sm-8">
                        <div class="pad">
                          <!-- Map will be created here -->
                          <div id="" style="height: 325px;">  <?php

                          $sql = "SELECT * FROM driverdelivery WHERE custcell=  '".$_SESSION['cell']."' AND status='On Road' ";
                          $res = mysqli_query($con, $sql);

                          if (mysqli_num_rows($res) > 0) {
                            echo '
                            <table id="del" class="table data-table no-margin">
                            <thead>
                            <tr>

                            <th>Driver</th>
                            
                            <th>Date</th>
                            
                            <th>Address</th>
                            <th> Postal Code</th>

                            <th> Status</th>

                            <th> Confirm</th>
                            
                            </tr>
                            </thead>
                            <tbody>';
                            while ($row = mysqli_fetch_assoc($res)) {

                              echo '
                              <tr>
                              <td>'.$row['driverID'].'</td>
                              <td>'.date("M d, y",strtotime($row['dateofDelivery'])).'</td>
                              
                              <td>'.$row['location'].'</td>
                              <td>'.$row['area'].'</td>
                              <td>'.$row['status'].'</td> 
                              <td class=" pull-right">
                              

                              <button onclick="modalx('.$row['deliveryID'].')" class="label label-warning">Confirm</button> 
                              
                              </td>
                              
                              </tr>';
                            }
                            echo '
                            </tbody>
                            </table>';
                          } else {
                            echo '<div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>No deliveries found.</strong>
                            </div>';
                          }
                          ?> </div>

                        </div>
                      </div>
                      <!-- /.col -->
                      
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </div>
                  <!-- /.box-body -->
                </div>


              </div>
              <!-- /.panel-body -->
            </div>
            
            

            
            <!-- /.tab-pane -->

            
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.panel -->

  <!-- /#page-wrapper -->

  <?php
  include 'footer.php';
  ?>

  <script>
   function modal1(id) {
    var data = {"id" : id};
    jQuery.ajax({
     url : '../includes/genlocmodal.php',
     method : "post",
     data : data,
     success : function(data) {
      jQuery('body').append(data);
      jQuery('#LocModal').modal('toggle');
    },
    error : function() {
      alert("Ooops! Something went wrong!");
    }
  });
  }
</script>
<script>
  $(document).ready(function(){
    $('#driverloc').DataTable();
  });
</script>
<script>
  function modalx(id) {
    var data = {"id" : id};
    jQuery.ajax({
      url : '../includes/conmodal.php',
      method : "post",
      data : data,
      success : function(data) {
        jQuery('body').append(data);
        jQuery('#driverModal').modal('toggle');
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
<script>
  $(document).ready(function(){
    $('#area').DataTable();
  });
</script>
<script>
  $(document).ready(function(){
    $('#del').DataTable();
  });
</script>
<script>
  $(document).ready(function(){
    $('#drv').DataTable();
  });
</script>

<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
<!-- jvectormap -->
<link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">  
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">