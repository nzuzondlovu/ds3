<?php
include '../includes/functions.php';
?>

<?php
if(isset($_SESSION['key']) == '' ) {
    header("location:../login.php");
}
?>

<?php

if (isset($_GET['id']) && $_GET['id'] != null) {
    $id = mysqli_real_escape_string($con, strip_tags(trim($_GET["id"])));
} else {
    header('Location: viewquot.php');
}

$name = '';
$serial = '';

if(isset($_GET['id']) && $_GET['id'] != '') {

    $id = mysqli_real_escape_string($con, strip_tags(trim($_GET['id'])));
    $sql = "SELECT * FROM job WHERE id='".$id."'";
    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) > 0) {

        while ($row = mysqli_fetch_assoc($res)) {

            $_SESSION['booking_id'] = $row['id'];
            $_SESSION['booking'] = 'Name: '.$row['name'].'<br>Serial: '.
            $row['serial'].'<br>Type: '.
            $row['type'].'<br>Status: '.
            $row['status'].'<br>Description: '.
            $row['description'].'<br>Date: '.
            date("M d, y",strtotime($row['date'])).'<br>
            <img class="img-responsive" src="../uploads/'.$row['pic_url'].'">';
            $name = $row['name'];
            $serial = $row['serial'];
        }
    }
}

if(isset($_POST['submit'])) {

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
        header("Location: viewquot.php");
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
				<h1 class="page-header">Create Quotation</h1>
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
                        Enter Quotation Details
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="pull-right">
                                    <a href="bookings.php" class="btn btn-warning">Bookings</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h2>Device details</h2>
                                <p>
                                    <?php
                                    echo $_SESSION['booking'];
                                    ?>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <form role="form" method="post">
                                    <div class="form-group">
                                        <label>Model</label>
                                        <input class="form-control" type="text" name="model" placeholder="Enter model">
                                    </div>
                                    <div class="form-group">
                                        <label>Accessory</label>
                                        <input class="form-control" type="text" name="accessory" placeholder="Enter accessories">
                                    </div>
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
                                    <div class="form-group">
                                        <label>Deposit</label>
                                        <input name="deposit" class="form-control" placeholder="Enter deposit">
                                    </div>
                                    <div class="form-group">
                                        <label>Balance</label>
                                        <input name="balance" class="form-control" placeholder="Enter balance">
                                    </div>
                                    <div class="form-group">
                                        <label>Total</label>
                                        <input name="total" class="form-control" placeholder="Enter total">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="" selected="selected">Select status</option>
                                            <?php
                                            $sql = "SELECT * FROM status ORDER BY name ASC";
                                            $res = mysqli_query($con, $sql);

                                            if(mysqli_num_rows($res) > 0) {
                                                while($row = mysqli_fetch_assoc($res)) {
                                                    echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="desc" class="form-control" rows="3"></textarea>
                                    </div>                                    
                                    <button name="submit" type="submit" class="btn btn-primary">Submit Quotation</button>
                                    <button type="reset" class="btn btn-default">Reset Quotation</button>
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