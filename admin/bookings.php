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


if(isset($_POST['create'])) {

    $id = mysqli_real_escape_string($con, strip_tags(trim($_POST["id"])));
    $name = mysqli_real_escape_string($con, strip_tags(trim($_POST["name"])));
    $serial = mysqli_real_escape_string($con, strip_tags(trim($_POST["serial"])));
    $model = mysqli_real_escape_string($con, strip_tags(trim($_POST["model"])));
    $accessory = mysqli_real_escape_string($con, strip_tags(trim($_POST["accessory"])));
    $technician = mysqli_real_escape_string($con, strip_tags(trim($_POST["technician"])));
    $deposit = mysqli_real_escape_string($con, strip_tags(trim($_POST["deposit"])));
    $balance = mysqli_real_escape_string($con, strip_tags(trim($_POST["balance"])));
    $total = mysqli_real_escape_string($con, strip_tags(trim($_POST["total"])));
    $status = mysqli_real_escape_string($con, strip_tags(trim($_POST["status"])));
    $description = mysqli_real_escape_string($con, strip_tags(trim($_POST["desc"])));

    if( $model != '' && $accessory != '' && $technician != '' && $deposit != '' && $balance != '' && $total != '' && $status != '' && $description != '') {

        $sql = "INSERT INTO quotation(booking_id, name, serial, model, accessory, technician, description, deposit, balance, total, status) 
        VALUES ('".$id."', '".$name."', '".$serial."', '".$model."', '".$accessory."', '".$technician."', '".$description."', '".$deposit."', '".$balance."', '".$total."', '".$status."')";
        mysqli_query($con, $sql);
        $_SESSION['success'] = 'Your new Quotation is added successfully.';
        //header("Location: viewquot.php");
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
                <h1 class="page-header">Bookings</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>






        <div class="col-lg-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Bookings</a></li>
              <li><a href="#timeline" data-toggle="tab">Quotations</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
              
                  <!-- /.user-block -->
                
                 
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
              
                  
                    <!-- /.panel-heading -->
     
                        <div class="table-responsive">
                            <?php

                            $sql = "SELECT * FROM job WHERE archive = 0";
                            $res = mysqli_query($con, $sql);

                            if (mysqli_num_rows($res) > 0) {
                                echo '
                                <table id="bookings" class="table table-danger table-hover">
                                    <thead>
                                        <tr>
                                       
                                            <th>Name</th>
                                            <th>serial</th>
                                            <th>type</th>
                                            <th>Picture</th>
                                            
                                            <th>Date In</th>
                                        
                                            <th>Date Out</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                        while ($row = mysqli_fetch_assoc($res)) {

                                            $sql1 = "SELECT * FROM quotation WHERE booking_id = '".$row['id']."' AND archive = 0";
                                            $res1 = mysqli_query($con, $sql1);
                                            $btn = '<button onclick="modal('.$row['id'].')" class="label-primary label-primary"> Quotation</button>';

                                            if (mysqli_num_rows($res1) > 0) {

                                                $row1 = mysqli_fetch_assoc($res1);
                                                $btn = '<button onclick="modal1('.$row1['id'].')" class="label label-info">Review</button>';
                                            }

                                            echo '
                                            <tr>
                                               
                                                <td>'.$row['name'].'</td>
                                                <td>'.$row['serial'].'</td>
                                                <td>'.$row['type'].'</td>
                                                <td><img src="../uploads/'.$row['pic_url'].'" " class="img-thumbnail" alt="No Image" width="50" height="50"></td>
                                        
                                                <td>'.date("M d, y",strtotime($row['date_in'])).'</td>
                                             
                                                <td>'.date("M d, y",strtotime($row['date_out'])).'</td>
                                                <td>'.date("M d, y",strtotime($row['date'])).'</td>
                                                <td class="pull-right">
                                                    '.$btn.'  <a href="?id='.$row['id'].'" class="label label-warning">Archive</a>
                                                </td>
                                            </tr>';
                                        }
                                        echo '
                                    </tbody>
                                </table>';
                            } else {
                                echo '<div class="alert alert-warning">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>No Bookings found.</strong>
                            </div>';
                        }
                        ?>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
          <!-- /.row (nested) -->
               
                    <!-- /.panel-body -->
             
                  </p>
    
                </div>
                <!-- /.post -->

           
                <!-- /.post -->

      
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->


<?php
if(isset($_SESSION['key']) == '' ) {
    header("location:../login.php");
}
?>

<?php
if(isset($_GET['id']) && $_GET['id'] != '') {

    $id = mysqli_real_escape_string($con, strip_tags(trim($_GET['id'])));

    if ($id) {
        $sql = "UPDATE quotation SET archive=1 WHERE id='".$id."'";
        mysqli_query($con, $sql);
        $_SESSION['success'] = 'Booking was archived successfully.';
    } else {
        $_SESSION['failure'] = 'An error occured, please try again.';
    }
    
    
}
?>



<!-- Page Content -->


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
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List of all Quotations
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                             <div class="col-lg-12">
                                <div class="pull-right">
                                   <a href="bookings.php" class="btn btn-success"> Create Quotation</a>
                               </div>
                           </div>
                       </div>
                       <div class="table-responsive">
                        <?php

                        $sql = "SELECT * FROM quotation WHERE archive = 0";
                        $res = mysqli_query($con, $sql);

                        if (mysqli_num_rows($res) > 0) {
                            echo '
                            <table id="quotes" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                 
                                        <th>Device Name</th>
                                        <th>Serial Number</th>
                                        <th>Model</th>
                                        <th>Accessory</th>
                                        <th>Technician</th>
                                     <th> Booked</th>
                                        <th>Deposit</th>
                                        <th>Balance</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>

                                </thead>
                                <tbody>';
                                    while ($row = mysqli_fetch_assoc($res)) {

                                        $sql1 = "SELECT * FROM job WHERE id = '".$row['booking_id']."' AND archive = 0";
                                        $res1 = mysqli_query($con, $sql1);

                                        if (mysqli_num_rows($res1) > 0) {
                                            echo '
                                            <tr>
                                         
                                                <td>'.$row['name'].'</td>
                                                <td>'.$row['serial'].'</td>
                                                <td>'.$row['model'].'</td>
                                                <td>'.$row['accessory'].'</td>
                                                <td>'.$row['technician'].'</td>
                                              <td>'.$row['date'].'</td>
                                                <td>'.$row['deposit'].'</td>
                                                <td>'.$row['balance'].'</td>
                                                <td>'.$row['total'].'</td>
                                                <td class="pull-right">
                                                    <a href="editquote.php?id='.$row['id'].'" class="label label-primary">Edit Quotation</a>
                                                </td>
                                            </tr>';
                                        }                                                
                                    }
                                    echo '
                                </tbody>
                            </table>';
                        } else {
                            echo '<div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>No Quotations Found.</strong>
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

<!-- /#page-wrapper -->

<?php
include 'footer.php';
?>
<script>
    $(document).ready(function(){
        $('#quotes').DataTable();
    });
</script>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
                  <div class="active tab-pane" id="quotations">
                <!-- Post --></div>
                    <div class="active tab-pane" id="devices">
                <!-- Post --></div>
                    <div class="active tab-pane" id="payments">
                <!-- Post --></div>
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
        <!-- /.row -->

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
            url : '../includes/createquotemodal.php',
            method : "post",
            data : data,
            success : function(data) {
                jQuery('body').append(data);
                jQuery('#responseModal').modal('toggle');
            },
            error : function() {
                alert("Ooops! Something went wrong!");
            }
        });
    }
</script>
<script>
    function modal1(id) {
        var data = {"id" : id};
        jQuery.ajax({
            url : '../includes/editquotemodal.php',
            method : "post",
            data : data,
            success : function(data) {
                jQuery('body').append(data);
                jQuery('#responseModal').modal('toggle');
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
  $(function () {
    $('#quotes').DataTable()


  })
</script>
 
  <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

            <script>
  $(function () {
   
    $('#bookings').DataTable()
  })
</script>















