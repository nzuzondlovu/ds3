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
      header("Location: delivery.php");

    } else {
      $_SESSION['failure'] = 'Please fill in all fields';
    }
  }
  ?>

   


      <!-- Main content -->
      <section class="content">

        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
              <div class="box-body box-profile">
        

           

                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item">
                    <b>Delivered</b> <a class="pull-right">   <?php
                                  $sql = "SELECT * FROM driverdelivery WHERE status='Delivered'";
                                  indexCount($con, $sql);
                                  ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Pending</b> <a class="pull-right"> <?php
                                  $sql = "SELECT * FROM driverdelivery where status ='Pending'";
                                  indexCount($con, $sql);
                                  ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>On Road</b> <a class="pull-right"> <?php
                                  $sql = "SELECT * FROM driverdelivery WHERE status='OnRoad'";
                                  indexCount($con, $sql);
                                  ?></a>
                  </li>
                    <li class="list-group-item">
                    <b>Total</b> <a class="pull-right"> <?php
                                  $sql = "SELECT * FROM driverdelivery ";
                                  indexCount($con, $sql);
                                  ?></a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- About Me Box -->
    
   
            <!-- /.box -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#activity" data-toggle="tab">Pending</a></li>
                <li><a href="#timeline" data-toggle="tab">Location</a></li>
                <li><a href="#settings" data-toggle="tab">Allocated</a></li>
                <li><a href="#drivers" data-toggle="tab">Drivers</a></li>
                      <li><a href="#loc" data-toggle="tab">Driver Locations</a></li>


              </ul>
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                  <div class="col-md-12">

              
                
            
              

              </div>
          
           <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Pending Deliveries</h3>

              </div>
              <div class="table-responsive no-margin">
                <?php

                $sql = "SELECT * FROM custdelivery ";
                $res = mysqli_query($con, $sql);

                if (mysqli_num_rows($res) > 0) {
                  echo '
                   
        
                

                  <table id="bookings" class="table data-table no-margin ">
                    <thead>
                      <tr>
                    
                        <th>Name</th>
                        <th>Number</th>
                      
                      
                        <th>Code</th>
                      
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>';
                      while ($row = mysqli_fetch_assoc($res)) {

                        echo '
                        <tr class="text-red">
                        
                          <td>'.$row['custname'].'</td>
                          <td>'.$row['custcell'].'</td>
                      
                          <td> <span class="label label-danger">'.$row['boxcode'].'</span></td>
                      
                          <td>'.date("M d, y",strtotime($row['dateofDelivery'])).'</td>
                          <td class=" pull-right">
                            <button onclick="modal('.$row['deliveryID'].')" class="label label-warning">Allocate</button> 
                          
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
              ?>
            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- /.panel-body -->
        </div>
       
           
                <!-- /.tab-pane -->
                <div class="tab-pane" id="timeline">
                   <div class="col-md-12">

                             </div>
                               <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Driver Locations </h3>

              </div>
           
              
                          <div class="table-responsive no-margin">
                           <?php

                              $sql = "SELECT * FROM drivers ";
                              $res = mysqli_query($con, $sql);

                              if (mysqli_num_rows($res) > 0) {
                                  echo '
                                  <table id="area" class="table data-table no-margin  ">
                                      <thead>
                                          <tr>
                                      
                                          
                                              <th width="20px">Name</th>
                                              <th width="20px">Surname</th>

                                              <th width="20px">ID Number</th>
                                              <th width="20px">Cel No</th>
                                      
                                                  <th width="20px">Action</th>
                                          </tr>
                                      </thead                                     <tbody>';
                                          while ($row = mysqli_fetch_assoc($res)) {

                                              echo '
                                              <tr>
                                              
                                                  <td>'.$row['name'].'</td>
                                              
                                                  <td>'.$row['surname'].'</td>
                                                  <td>'.$row['idnumber'].'</td>
                                              
                                                  <td>'.$row['cell'].'</td>
                                              
                                                  <td class=" pull-right">
                                                      <button onclick="modal1('.$row['driverID'].')" class="label label-warning">Assign</button> 
                                                       <a href="DeleteDelivery.php?id='.$row['driverID'].'" class="label label-danger">Delete</a>
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
                          ?>
                      </div>
                      <!-- /.table-responsive -->
                  </div>
                  <!-- /.panel-body -->
              </div>
              <div class="tab-pane" id="loc">
                  <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Driver Locations</h3>

               
              </div>
              <!-- /.box-header -->
              <div class="box-body no-padding">
                <div class="row">
                  <div class="col-md-12 col-sm-8">
                    <div class="pad">
                      <!-- Map will be created here -->
                      <div id="" style="height: 325px;">  
                        <?php

                $sql = "SELECT * FROM driver_loc ";
                $res = mysqli_query($con, $sql);  

                if (mysqli_num_rows($res) > 0) {
                  echo '
            <table id="bookings" class="table data-table">
                    <thead>
                      <tr>

                        <th>Location ID</th>
                  
                       <th>Location</th>
                        <th>Month</th>
            

                    
                        
                      </tr>
                    </thead>
                    <tbody>';
                      while ($row = mysqli_fetch_assoc($res)) {

                        echo '
                        <tr>
                          <td>'.$row['gen_code'].'</td>
                    
                        
                          <td>'.$row['AreaCode'].'</td>
                          <td>'.$row['Month'].'</td>
                       
                              <td class=" pull-right">
                               

                          
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
                
                <!-- /.tab-pane -->
  <div class="tab-pane" id="settings">
                          <div class="col-md-12">
            <!-- MAP & BOX PANE --></div>
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Allocated Deliveries</h3>

               
              </div>
              <!-- /.box-header -->
              <div class="box-body no-padding">
                <div class="row">
                  <div class="col-md-12 col-sm-8">
                    <div class="pad">
                      <!-- Map will be created here -->
                      <div id="" style="height: 325px;">  <?php

                $sql = "SELECT * FROM driverdelivery ";
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
             
                   <div class="tab-pane" id="drivers">
                          <div class="table-responsive">  
                <?php

                $sql = "SELECT * FROM drivers";
                $res = mysqli_query($con, $sql);

                if (mysqli_num_rows($res) > 0) {
                  echo '
                  <table id="drv" class="table data-table no-margin">
                    <thead>
                      <tr>
                        <th>Driver ID</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Cell Number</th>
                        <th>Id Number</th>
                        <th>Email</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>';
                      while ($row = mysqli_fetch_assoc($res)) {

                        echo '
                        <tr>
                          <td>'.$row['driverID'].'</td>
                          <td>'.$row['name'].'</td>
                          <td>'.$row['surname'].'</td>
                          <td>'.$row['cell'].'</td>
                          <td>'.$row['idnumber'].'</td>
                          <td>'.$row['email'].'</td>
                          <td class=" pull-right">
                            <a href="DeleteDriver.php?id='.$row['driverID'].'" class="btn btn-danger">Delete</a>
                          </td>
                        </tr>';
                      }
                      echo '
                    </tbody>
                  </table>';
                } else {
                  echo '<div class="alert alert-info">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>No products found.</strong>
                </div>';
              }
              ?>
            </div>
                    ...
                   </div>
                <!-- /.tab-pane -->
              </div>
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