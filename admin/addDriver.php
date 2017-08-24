<?php
include '../includes/functions.php';
?>

<?php
if(isset($_SESSION['key']) == '' ) {
    header("location:../login.php");
}
?>

<?php

if(isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($con, strip_tags(trim($_POST["name"])));
    $surname = mysqli_real_escape_string($con, strip_tags(trim($_POST["surname"])));
     $cell= mysqli_real_escape_string($con, strip_tags(trim($_POST["cell"])));
      $idnum= mysqli_real_escape_string($con, strip_tags(trim($_POST["idnum"])));
    $email = mysqli_real_escape_string($con, strip_tags(trim($_POST["email"])));
   


    
     if($name != '' && $surname != '' && $cell != '' && $idnum != '' && $email != '') {
     
	 $sql = "INSERT INTO drivers(name,surname,cell,idnumber,email)
        VALUES( '".$name."','".$surname."','".$cell."','".$idnum."','".$email."')";
        mysqli_query($con, $sql);
        $_SESSION['success'] = 'Your new driver was added successfully.';
        header("Location: drivers.php");
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
				<h1 class="page-header">Add New Driver</h1>
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
                        Enter Driver details
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-6">
                                <form role="form" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Driver name</label>
                                        <input name="name" class="form-control" placeholder="Enter text">
                                    </div>
                                    <div class="form-group">
                                        <label>Driver Surname</label>
                                         <input name="surname" class="form-control" placeholder="Enter text">
                                    </div>
                                     <div class="form-group">
                                        <label>Contact Number</label>
                                         <input name="cell" class="form-control" placeholder="Enter text">
                                    </div>
                                     <div class="form-group">
                                        <label>ID Number</label>
                                         <input name="idnum" class="form-control" placeholder="Enter text">
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address</label>
                                         <input name="email" class="form-control" placeholder="Enter text">
                                    </div>
                                   
                                    <button name="submit" type="submit" class="btn btn-primary">Submit Driver</button>
                                    <button type="reset" class="btn btn-default">Reset</button>
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
