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
include 'header.php';
?>

<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Orders</h1>				
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
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							Tools and Material
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<div class="pull-right">
									</div>
								</div>
							</div>
							<div class="table-responsive">

							<?php
								if(isset($_POST['create'])){

									$name = $_POST["Dname"];
									$type = $_POST["Dtype"];
									$description = $_POST["description"];
									$dateRecieved = $_POST["dateRecieved"];
									$quantity = $_POST["quantity"];

 					/**echo $name.'<br>';
 					echo $type.'<br>';
 					echo $description.'<br>';
 					echo $dateRecieved.'<br>';
 					echo $quantity.'<br>';*/

 					$sql = "insert into repairmaterial (name, type, description, dateRecieved, quantity)
 					values('$name', '$type', '$description', '$dateRecieved', '$quantity')";
 					$run = $con->query($sql);

 			// $sql = "INSERT INTO repairmaterial V('$name', '$type', '$description', '$dateRecieved', '$quantity')";
        //$run = $con->query($sql) or die("error: ". mysqli_error($con));

 				}
 				header("Location: viewMaterial.php");
 				?>

 			</div>
 			<!-- /.table-responsive -->
 		</div>
 		<!-- /.panel-body -->
 	</div>
 	<!-- /.panel -->
 </div>
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php
include 'footer.php';
?>
<script>
	$(document).ready(function(){
		$('#orders').DataTable();
	});
</script>