<?php
ob_start();
include '../includes/functions.php';
?>

<?php
if(isset($_SESSION['key']) == '' ) {
  header("location:../login.php");
}


if (isset($_GET['id']) && $_GET['id'] != null) {

  $id = mysqli_real_escape_string($con, strip_tags(trim($_GET["id"])));

} else {

  header('Location: jobs.php');
}


$sql = "SELECT * FROM customersaledevice WHERE id ='$id'";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);

$name = $row['diviceName'];
$model = $row['model'];
$serial = $row['serialNumber'];
$type = $row['Dtype'];
$date = $row['recievedDate'];
$amount = $row['establishAmount'];

$cat = '
ID : '.$row['id'].'<br>
Device Name : '.$name.'<br>
Model : '.$model.'<br>
Serial : '.$serial.'<br>
Type : '.$type.'<br>
Recieved Date : '.$date.'<br>
Price : R'.$amount.'<hr>
Customer Name : '.$row['Cname'].'<br>
ID Number : '.$row['idNo'].'<br>
Cell Number : '.$row['num'].'<br>
Email Address : '.$row['email'].'
';


if(isset($_POST['submit'])){

  $tech = mysqli_real_escape_string($con, strip_tags(trim($_POST['technician'])));

  if ($tech != '') {

    $sql = "INSERT INTO techrepair(diviceName, model, serialNumber, Dtype, recievedDate, amount, tname) 
    VALUES ('$name','$model', '$serial', '$type', '$date','$amount', '$tech')";
    mysqli_query($con, $sql);
    header("location: allocated.php");

  } else {

    $_SESSION['failure'] = "Please choose a technician.";
  }  
}

?>

<?php
include 'header.php';
?>

<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Allocate</h1>
      </div>
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
            Choose technician for device
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="pull-right">
                  <a href="jobs.php" class="btn btn-warning"> Jobs</a>
                </div>
              </div>
            </div>   

            <div class="col-md-6">
              <h2>Details</h2>
              <?php
              echo $cat;
              ?>
            </div>

            <div class="col-md-6">
              <form id="techForm" role="form" method="post">
                <div class="form-group">
                  <label>Choose technician</label>
                  <select name="technician" class="form-control">
                    <option value="" selected="selected">Select technician</option>
                    <?php
                    $sql = "SELECT * FROM technician";
                    $res = mysqli_query($con, $sql);

                    if(mysqli_num_rows($res) > 0) {
                      while($row = mysqli_fetch_assoc($res)) {
                        echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                      }
                    }
                    ?>
                  </select>
                </div>
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-default">Reset Form</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- Page Content -->
<!-- /#page-wrapper -->

<?php
include 'footer.php';
?>
<script type="text/javascript">

  $( document ).ready( function () {
    $( "#techForm" ).validate( {
      rules: {
        technician: "required"
      },
      messages: {
        technician: "Please select a technician"
      },
      errorElement: "em",
      errorPlacement: function ( error, element ) {
          // Add the `help-block` class to the error element
          error.addClass( "help-block" );

          if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.parent( "label" ) );
          } else {
            error.insertAfter( element );
          }
        },
        highlight: function ( element, errorClass, validClass ) {
          $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
          $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
        }
      });
  });
</script>