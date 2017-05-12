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
    $type = mysqli_real_escape_string($con, strip_tags(trim($_POST["type"])));
    $description = mysqli_real_escape_string($con, strip_tags(trim($_POST["description"])));
    $price = mysqli_real_escape_string($con, strip_tags(trim($_POST["price"])));
    $target_dir = "../uploads/";
    $url = basename( $_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $user = $_SESSION['user_id'];
    $date = date("Y-m-d H:i:s");

    $sql = "INSERT INTO product(user, name, description, type, price, pic_url, date)
        VALUES('".$user."', '".$name."', '".$description."', '".$type."', '".$price."', '".$url."', '".$date."')";

    upload($url, $target_dir, $target_file, $sql, $con);

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
				<h1 class="page-header">Add Product</h1>
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
                        Enter item details
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-6">
                                <form role="form" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Device name</label>
                                        <input name="name" class="form-control" placeholder="Enter text">
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
                                        <label>Device price</label>
                                        <input name="price" class="form-control" placeholder="Enter text">
                                    </div>
                                    <div class="form-group">
                                        <label>Upload picture</label>
                                        <input type="file" name="fileToUpload">
                                    </div>
                                    <div class="form-group">
                                        <label>Device description</label>
                                        <textarea name="description" class="form-control" rows="3"></textarea>
                                    </div>
                                    <button name="submit" type="submit" class="btn btn-primary">Submit Device</button>
                                    <button type="reset" class="btn btn-default">Reset Device</button>
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