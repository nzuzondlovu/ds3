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
    $model = mysqli_real_escape_string($con, strip_tags(trim($_POST["model"])));
    $serial = mysqli_real_escape_string($con, strip_tags(trim($_POST["serial"])));
    $type = mysqli_real_escape_string($con, strip_tags(trim($_POST["type"])));
    $date = mysqli_real_escape_string($con, strip_tags(trim($_POST["date"])));
    $amount = mysqli_real_escape_string($con, strip_tags(trim($_POST["amount"])));

    if($name != '' && $model != '' && $serial != '' && $type != '' && $date != '' && $amount != '') {

        $sql = "INSERT INTO customersaledevice (diviceName, model, serialNumber, Dtype, recievedDate, establishAmount)
        VALUES ('".$name."','".$model."', '".$serial."', '".$type."', '".$date."', '".$amount."')";
        mysqli_query($con, $sql);
        $_SESSION['success'] = 'Your Device was added successfully.';
        header("Location: jobs.php");

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
                <h1 class="page-header">Add Device</h1>
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
                        Insert Device details
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
                                        <label>Device Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter text...">
                                    </div>
                                    <div class="form-group">
                                        <label>Model</label>
                                        <input type="text" name="model" class="form-control" placeholder="Enter text...">
                                    </div>
                                    <div class="form-group">
                                        <label>Serial Number</label>
                                        <input type="text" name="serial" class="form-control" placeholder="Enter text...">
                                    </div>
                                    <div class="form-group">
                                        <label>Type</label>                                        
                                        <select name="type" class="form-control">
                                            <option value="" selected="selected">Select..</option>
                                            <option value="Hardware">Hardware</option>
                                            <option value="Software">Software</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="date" name="date" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label>Amount</label>
                                        <input type="number" name="amount" class="form-control" placeholder="Enter text...">
                                    </div>
                                    <button name="submit" type="submit" class="btn btn-primary">Add Device</button>
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