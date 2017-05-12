<?php
ob_start();
include '../admin/functions.php';
?>

<?php
if(isset($_SESSION['user_id']) == '' ) {
    header("location:../login.php");
}
?>

<?php

if(isset($_POST['submit'])) {


    $name = mysqli_real_escape_string($con, strip_tags(trim($_POST["name"])));
    $serial = mysqli_real_escape_string($con, strip_tags(trim($_POST["serial"])));
    $type = mysqli_real_escape_string($con, strip_tags(trim($_POST["type"])));
    $description = mysqli_real_escape_string($con, strip_tags(trim($_POST["description"])));
    $date = date("Y-m-d H:i:s");
    $target_dir = "../uploads/";
    $url = basename( $_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $user = $_SESSION['user_id'];    

    if($name !='' && $serial !='' && $type !='' && $description !=''){

        $sql = "INSERT INTO job(user, name, serial, type, pic_url, description, date)
        VALUES('".$user."', '".$name."', '".$serial."', '".$type."', '".$url."', '".$description."', '".$date."')";
        upload($url, $target_dir, $target_file, $sql, $con);

    }else{
        $_SESSION['failure'] = 'Make sure you have filled all fields.';
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
				<h1 class="page-header">Booking</h1>
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
                        Enter booking details
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-6">
                                <form role="form" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Device name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter text">
                                    </div>
                                    <div class="form-group">
                                        <label>Serial number</label>
                                        <input name="serial" class="form-control" placeholder="Enter text">
                                    </div>                                        
                                    <div class="form-group">
                                    <label>Device type</label>
                                        <select name="type" class="form-control">
                                            <option value="" selected="selected">Select type</option>
                                            <?php
                                            $sql = "SELECT * FROM category ORDER BY name ASC";
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
                                        <label>Upload picture</label>
                                        <input type="file" name="fileToUpload">
                                    </div>
                                    <div class="form-group">
                                        <label>What happened to the device</label>
                                        <textarea name="description" class="form-control" rows="3"></textarea>
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

<?php
include 'footer.php';
?>