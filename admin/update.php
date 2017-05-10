<?php
include 'functions.php';
?>

<?php
if(isset($_SESSION['key']) == '' ) {
    header("location:../login.php");
}
?>

<?php

if(isset($_POST['submit'])) {
    $email = md5(mysqli_real_escape_string($con, strip_tags(trim($_POST["email"]))));
    $location = md5(mysqli_real_escape_string($con, strip_tags(trim($_POST["location"]))));
    $password = md5(mysqli_real_escape_string($con, strip_tags(trim($_POST["password"]))));

    if($email != '' && $location != '' && $password != '') {

        $sql = "UPDATE user SET email='".$email."', location='".$location."', password='".$password."' WHERE id='".$_SESSION['user_id']."'";
        mysqli_query($con, $sql);
        $_SESSION['success'] = 'Successfully updated all details.';
        header("location:../logout.php");

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
                <h1 class="page-header">Your Details</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Update your details
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form role="form">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" value="<?php
                                        $res = mysqli_query($con, "SELECT * FROM user WHERE id='".$_SESSION['user_id']."' ");
                                        $row = mysqli_fetch_assoc($res);
                                        echo $row['email'];
                                        ?> " disabled="">
                                    </div>
                                    <div class="form-group">
                                        <label>Location</label>
                                        <input class="form-control" value="<?php
                                        $res = mysqli_query($con, "SELECT * FROM user WHERE id='".$_SESSION['user_id']."' ");
                                        $row = mysqli_fetch_assoc($res);
                                        echo $row['location'];
                                        ?> " disabled="">
                                    </div>
                                </form>
                            </div>
                            <!-- /.col-lg-6 (nested) -->

                            <div class="col-md-6">
                                <form role="form" method="post" id="form">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" class="form-control" value="<?php
                                        $res = mysqli_query($con, "SELECT * FROM user WHERE id='".$_SESSION['user_id']."' ");
                                        $row = mysqli_fetch_assoc($res);
                                        echo $row['email'];
                                        ?> ">
                                    </div>
                                    <div class="form-group">
                                        <label>Location</label>
                                        <input name="location" class="form-control" value="<?php
                                        $res = mysqli_query($con, "SELECT * FROM user WHERE id='".$_SESSION['user_id']."' ");
                                        $row = mysqli_fetch_assoc($res);
                                        echo $row['location'];
                                        ?> " id="geolocation">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input name="password" class="form-control" placeholder="Enter password" type="Password">
                                    </div>
                                    <button name="submit" type="submit" class="btn btn-primary">Submit Booking</button>
                                    <button type="reset" class="btn btn-default">Reset Booking</button>
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

<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&amp;key=AIzaSyDeSnzn_iwMZkhJrjDNYuTkPkfGeFdyWps"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

        <script src="../js/jquery.geocomplete.js"></script>

        <script>
          $('#geocomplete').geocomplete({
            details: '#form',
            detailsAttribute: "data-geo"
          });
        </script>

<?php
include 'footer.php';
?>