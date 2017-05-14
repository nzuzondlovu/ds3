<?php
ob_start();
include 'functions.php';
?>

<?php
if(isset($_SESSION['key']) == '' ) {
    header("location:../login.php");
}
?>

<?php

if(isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($con, strip_tags(trim($_POST["name"])));
    $email = mysqli_real_escape_string($con, strip_tags(trim($_POST["email"])));
    $number = mysqli_real_escape_string($con, strip_tags(trim($_POST["number"])));
    $address = mysqli_real_escape_string($con, strip_tags(trim($_POST["address"])));
    $website = mysqli_real_escape_string($con, strip_tags(trim($_POST["website"])));
    $product = mysqli_real_escape_string($con, strip_tags(trim($_POST["product"])));

    if ($name != '' && $email != '' && $number != '' &&  $address != '' && $website != '' && $product != '') {

        $sql = "INSERT INTO suppliers(name, product, contactNumber, email, website, address)
        VALUES('".$name."', '".$product."', '".$number."', '".$email."', '".$website."', '".$address."')";
        mysqli_query($con, $sql);
        $_SESSION['success'] = 'You have successfully added a new supplier.';
        header("Location: suppliers.php");
    } else {
        $_SESSION['failure'] = 'Please fill in all the fields.';
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
				<h1 class="page-header">Add Supplier</h1>
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
                        Enter supplier details
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="pull-right">
                                    <a href="suppliers.php" class="btn btn-warning">Suppliers</a>
                                </div>
                            </div>
                            <div class="col-md-offset-3 col-md-6">
                                <form role="form" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter name">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label>Contact Number</label>
                                        <input type="text" name="number" class="form-control" placeholder="Enter number">
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control" placeholder="Enter address">
                                    </div>
                                    <div class="form-group">
                                        <label>Website</label>
                                        <input type="text" name="website" class="form-control" value="http://">
                                    </div>
                                    <div class="form-group">
                                        <label>Supplied Product</label>
                                        <input type="text" name="product" class="form-control" placeholder="Enter product">
                                    </div>
                                    <button name="submit" type="submit" class="btn btn-primary">Submit Supplier</button>
                                    <button type="reset" class="btn btn-default">Reset Supplier</button>
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