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
    //mysqli_query($con, $sql);
    $_SESSION['success'] = 'Booking was archived successfully.';
  } else {
    $_SESSION['failure'] = 'An error occured, please try again.';
  } 
}
?>

<?php

if(isset($_POST['submit'])) {

  $description = mysqli_real_escape_string($con, strip_tags(trim($_POST["description"])));

  if($description != '') {

    $sql = "INSERT INTO query(user_id,email, name,Query,status,feedback) VALUES('".$_SESSION['user_id']."','".$_SESSION['email']."','".$_SESSION['name']."','".$description."','unanswered',' ')";
    mysqli_query($con, $sql);
    $_SESSION['success'] = 'Your query was added successfully.';
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
        <h1 class="page-header">Feedback</h1>
      </div>
      <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <!-- Modal -->
    <div class="modal fade" id="addItem" tabindex="-1" role="dialog" aria-labelledby="addItemLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span> Close</button>
            <h4 class="modal-title" id="addItemLabel">Submit Query</h4>
          </div>
          <div class="modal-body">
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Query</label>
                <textarea name="description" class="form-control" rows="5"></textarea>
              </div>
              <button name="submit" type="submit" class="btn btn-primary">Submit Query</button>
              <button type="reset" class="btn btn-default">Reset Form</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.Modal -->


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
            List of all responses
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="pull-right">
                  <button class="btn btn-success" data-toggle="modal" data-target="#addItem"> Submit Query</button>
                </div>
              </div>
            </div> 
            <div class="table-responsive">
              <?php

              $sql = "SELECT * FROM query WHERE user_id = '".$_SESSION['user_id']."'";
              $res = mysqli_query($con, $sql);

              if (mysqli_num_rows($res) > 0) {
                echo '
                <table id="bookings" class="table data-table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Query</th>
                      <th>Feedback</th>
                    </tr>
                  </thead>
                  <tbody>';
                    while ($row = mysqli_fetch_assoc($res)) {

                      echo '
                      <tr>
                        <td>'.$row['id'].'</td>
                        <td>'.$row['name'].'</td>
                        <td>'.$row['email'].'</td>
                        <td>'.$row['query'].'</td>
                        <td>'.$row['feedback'].'</td>
                      </tr>';
                    }
                    echo '
                  </tbody>
                </table>';
              } else {
                echo '<div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>No Feedback found.</strong>
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