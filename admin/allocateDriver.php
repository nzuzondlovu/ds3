<?php
include 'admin/functions.php';
?>

<?php
if(isset($_SESSION['key']) == '' ) {
	header("location:../login.php");
}
?>
<?php
if (isset($_GET['id']) && $_GET['id'] != null) {
	$id = (int)$_GET["id"];
} else {
	header('Location: viewD.php');
}

$id = mysqli_real_escape_string($con, strip_tags(trim($_GET['id'])));
	$sql = "SELECT * FROM custdelivery WHERE deliveryID='".$id."'";
	$res = mysqli_query($con, $sql);

	if (mysqli_num_rows($res) > 0) {

		while ($row = mysqli_fetch_assoc($res)) {

			$_SESSION['deliveryID'] = $row['deliveryID'];
			$_SESSION['custname'] = '<strong>Name:</strong> '.$row['custname'].'<br><strong>Cell Number:</strong> '.
			$row['custcell'].'<br><strong>Street Address:</strong> '.
			$row['strAddress'].'<br><strong>Suburb:</strong> '.
			$row['suburb'].'<br><strong>Area: </strong>'.
			$row['area'].'<br><strong>Boxcode:</strong>'.
			$row['boxcode'].'<br><strong>Date of Request:</strong> '.
			$row['dateofRequest'].'<br><strong>Date of Delivery:</strong> '.
			$row['dateofDelivery'];
			
		}
	}
?>
<?php

if(isset($_POST['submit'])) {
	$deliveryID= $_SESSION['deliveryID'];
    $name = mysqli_real_escape_string($con, strip_tags(trim($_POST["name"])));
    $cell= mysqli_real_escape_string($con, strip_tags(trim($_POST["cell"])));
    $strAddr = mysqli_real_escape_string($con, strip_tags(trim($_POST["strAddr"])));
    $suburb= mysqli_real_escape_string($con, strip_tags(trim($_POST["suburb"])));
    $area = mysqli_real_escape_string($con, strip_tags(trim($_POST["area"])));
    $boxcode= mysqli_real_escape_string($con, strip_tags(trim($_POST["boxcode"])));
    $dateD = mysqli_real_escape_string($con, strip_tags(trim($_POST["dateD"])));
	$driver = mysqli_real_escape_string($con, strip_tags(trim($_POST["driver"])));

$location=$strAddr. " ," .$suburb. " ," .$area. ", " .$boxcode;


	if($driver != '' ) {

		$sql="INSERT INTO driverdelivery(driverID,deliveryID,custname,custcell,dateofDelivery,location)
        VALUES('".$driver."','".$deliveryID."', '".$name."','".$cell."','".$dateD."','".$location."')";
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'Successfully updated details.';
		header("Location: drivers.php");

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
				<h1 class="page-header">Allocate Driver</h1>
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
						Enter update details
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-offset-3 col-md-6">
								<form role="form" method="post">
									<div class="form-group">
										<label>Customer details</label>
										<p>
											<?php
											echo $_SESSION['custname'];
											?>
										</p>
									</div>
									<div class="form-group">
										<label>Choose Driver</label>
										<select name="driver" class="form-control">
											<option value="" selected="selected">Select Driver</option>
											<?php
											$sql = "SELECT * FROM drivers";
											$res = mysqli_query($con, $sql);

											if(mysqli_num_rows($res) > 0) {
												while($row = mysqli_fetch_assoc($res)) {
													echo '<option value="'.$row['driverID'].'">'.$row['name'].'</option>';
												}
											}
											?>
										</select>
									</div>
									 <input name="dateD" class="form-control" value="<?php
                                        $res = mysqli_query($con, "SELECT * FROM custdelivery WHERE deliveryID='".$_SESSION['deliveryID']."' ");
                                        $row = mysqli_fetch_assoc($res);
                                        echo $row['dateofDelivery'];
                                        ?> " style="display: none" >
                                        <input name="name" class="form-control" value="<?php
                                        $res = mysqli_query($con, "SELECT * FROM custdelivery WHERE deliveryID='".$_SESSION['deliveryID']."' ");
                                        $row = mysqli_fetch_assoc($res);
                                        echo $row['custname'];
                                        ?> " style="display: none" >
                                         <input name="cell" class="form-control" value="<?php
                                        $res = mysqli_query($con, "SELECT * FROM custdelivery WHERE deliveryID='".$_SESSION['deliveryID']."' ");
                                        $row = mysqli_fetch_assoc($res);
                                        echo $row['custcell'];
                                        ?> " style="display: none" >
                                        
                                         <input name="strAddr" class="form-control" value="<?php
                                        $res = mysqli_query($con, "SELECT * FROM custdelivery WHERE deliveryID='".$_SESSION['deliveryID']."' ");
                                        $row = mysqli_fetch_assoc($res);
                                        echo $row['strAddress'];
                                        ?> " style="display: none" >
                                         <input name="suburb" class="form-control" value="<?php
                                        $res = mysqli_query($con, "SELECT * FROM custdelivery WHERE deliveryID='".$_SESSION['deliveryID']."' ");
                                        $row = mysqli_fetch_assoc($res);
                                        echo $row['suburb'];
                                        ?> " style="display: none" >
                                         <input name="area" class="form-control" value="<?php
                                        $res = mysqli_query($con, "SELECT * FROM custdelivery WHERE deliveryID='".$_SESSION['deliveryID']."' ");
                                        $row = mysqli_fetch_assoc($res);
                                        echo $row['area'];
                                        ?> " style="display: none" >
                                         <input name="boxcode" class="form-control" value="<?php
                                        $res = mysqli_query($con, "SELECT * FROM custdelivery WHERE deliveryID='".$_SESSION['deliveryID']."' ");
                                        $row = mysqli_fetch_assoc($res);
                                        echo $row['boxcode'];
                                        ?> " style="display: none" >
									<button name="submit" type="submit" class="btn btn-primary">Submit Allocation</button>
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
