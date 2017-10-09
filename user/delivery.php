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

if(isset($_POST['submit'])) {

	$driver = mysqli_real_escape_string($con, strip_tags(trim($_POST["driver"])));
	$del = mysqli_real_escape_string($con, strip_tags(trim($_POST["del"])));
	$name = mysqli_real_escape_string($con, strip_tags(trim($_POST["name"])));
	$cell = mysqli_real_escape_string($con, strip_tags(trim($_POST["cell"])));
	$dateD = mysqli_real_escape_string($con, strip_tags(trim($_POST["dateD"])));
	$strAddr = mysqli_real_escape_string($con, strip_tags(trim($_POST["strA"])));
    $suburb= mysqli_real_escape_string($con, strip_tags(trim($_POST["suburb"])));
    $area = mysqli_real_escape_string($con, strip_tags(trim($_POST["area"])));
    $boxcode= mysqli_real_escape_string($con, strip_tags(trim($_POST["boxcode"])));
	
	    $status= mysqli_real_escape_string($con, strip_tags(trim($_POST["status"])));
	
	
	$location=$strAddr." ,".$suburb." , ".$area;

	if($driver != '' ) {

		echo $sql="INSERT INTO driverdelivery(driverID,deliveryID,dateofDelivery,custname,custcell,location,area,status)
		VALUES('".$driver."','".$del."','".$dateD."', '".$name."','".$cell."','".$location."','".$boxcode."','".$status."')";
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'Successfully updated details.';
		header("Location: delivery.php");

	} else {
		$_SESSION['failure'] = 'Please fill in all fields';
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

if(isset($_POST['locsubmit'])) {

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
$gen_code= 'DLV-'.createRandomPassword()  ;

	$AreaCode = mysqli_real_escape_string($con, strip_tags(trim($_POST["AreaCode"])));
	$idnumber = mysqli_real_escape_string($con, strip_tags(trim($_POST["idnumber"])));
	$Month = mysqli_real_escape_string($con, strip_tags(trim($_POST["Month"])));



	if($gen_code != '' ) {

		echo $sql="INSERT INTO driver_loc(gen_code,AreaCode,idnumber,Month)
		VALUES('".$gen_code."','".$AreaCode."','".$idnumber."', '".$Month."')";
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'Successfully updated details.';
		header("Location: drivers.php");

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
                          <button onclick="modal('.$row['deliveryID'].')" class="label label-warning">Confirm</button> 
                        
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
	function modal(id) {
		var data = {"id" : id};
		jQuery.ajax({
			url : '../includes/drivermodal.php',
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