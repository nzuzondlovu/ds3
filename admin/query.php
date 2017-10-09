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

$id = mysqli_real_escape_string($con, strip_tags(trim($_POST["id"])));
  $feedback = mysqli_real_escape_string($con, strip_tags(trim($_POST["feedback"])));

  if($feedback != '') {

    $sql = "UPDATE query SET feedback = '".$feedback."', status = 'answered' WHERE id='".$id."'";
    mysqli_query($con, $sql);
    $_SESSION['success'] = 'Your feedback was added successfully.';
    header("Location: feedback.php");
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
        <h1 class="page-header">Queries</h1>
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
            List of all user quaries
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <!-- <div class="row">
              <div class="col-lg-12">
                <div class="pull-right">
                  <a class="btn btn-warning" href="feedback.php"> Feedback</a>
                </div>
              </div>
            </div>  -->
           
            <div class="table-responsive">
            <section class="content">
              <div class="row">
                <!-- /.col -->
                <div class="col-md-12">
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Inbox</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                      <div class="table-responsive mailbox-messages">
                        <table id="bookings" class="table table-hover table-striped">
                          <thead>
                          </thead>
                          <tbody>
                            <?php

                            $sql = 'SELECT * FROM query ORDER BY id DESC';
                            $res = mysqli_query($con, $sql);

                            if (mysqli_num_rows($res) > 0) {

                              while ($row = mysqli_fetch_assoc($res)) {

                                echo '
                                <tr>
                                <td class="mailbox-name"><a data-toggle="modal" data-target="#viewItem">'.$row['name'].'</a></td>
                                <td class="mailbox-subject"><b>'.$row['query'].'</b>';

                                $sql1 = 'SELECT * FROM feedback WHERE query_id='.$row['id'].'';
                                $res1 = mysqli_query($con, $sql1);

                                if (mysqli_num_rows($res1) > 0) {

                                  while ($row1 = mysqli_fetch_assoc($res1)) {

                                    if ($row1['user_id'] == $_SESSION['user_id']) {

                                      echo '<pre class="text-success bg-primary">'.$row1['feedback'].'</pre>';
                                    } else {

                                      echo '<pre class="text-success bg-info">'.$row1['feedback'].'</pre>';
                                    }                                  
                                  }
                                }

                                echo '
                                </td>
                                <td class="mailbox-attachment"></td>
                                <td class="mailbox-date">'.date('D M y',strtotime($row['date'])).'<br><a href="feedbackreply.php?id='.$row['id'].'&ud='.$_SESSION['user_id'].'" class="btn btn-default btn-sm"><i class="fa fa-share"></i></a></td>
                                </tr>
                                ';

                              }

                            } else {

                              echo '
                              <div class="alert alert-info">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <strong>No bookings found.</strong>
                              </div>
                              ';
                            }

                            ?>

                          </tbody>
                        </table>
                      </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer no-padding">
                      <!-- /.pull-right -->
                    </div>
                  </div>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.panel-body -->
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
  function modal(id) {
    var data = {"id" : id};
    jQuery.ajax({
      url : '../includes/querymodal.php',
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