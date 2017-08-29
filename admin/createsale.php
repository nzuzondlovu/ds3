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
include 'header.php';
?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Create Sale</h1>
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
                        Insert Customer details
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="pull-right">
                                    <a href="jobs.php" class="btn btn-warning">Devices</a>
                                </div>
                            </div>
                            <div class=" col-md-offset-3 col-md-6">
                                <form role="form" method="post">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label>ID Number</label>
                                        <input type="number" name="id" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label>Number</label>
                                        <input type="text" name="number" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" >
                                    </div>
                                    <button name="submit" type="submit" class="btn btn-primary">Add Customer</button>
                                    <button type="reset" class="btn btn-default">Reset Form</button>
                                </form>
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