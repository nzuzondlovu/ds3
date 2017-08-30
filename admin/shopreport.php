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
if(isset($_GET['id']) && $_GET['id'] != '') {

	$id = mysqli_real_escape_string($con, strip_tags(trim($_GET['id'])));

	if ($id) {
		$sql = "UPDATE job SET archive=1 WHERE id='".$id."'";
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'Booking was archived successfully.';
	} else {
		$_SESSION['failure'] = 'An error occured, please try again.';
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
				<h1 class="page-header">Shop Reports</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
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
						Reports
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div class="table-responsive">
							<div class="container">

       							 </div>
        					<div class= "col-md-4">
				              
				                <h1> Menu Buttons</h1>
				                <a href="orderrport.php" class="btn btn-lg btn-primary col-md-6">Order</a><br><br><br>
				                <a href="stockreport.php" class="btn btn-lg btn-primary col-md-6">Stock</a><br><br><br>
				                <a href="shopreport.php" class="btn btn-lg btn-primary col-md-6">Shop</a><br><br><br>
				                
				              </div>
					              <div class= "col-md-6">
					              <h2>List of Shop Products</h2>
								<?php 
				 $sql = "SELECT * FROM `shoprepaire`";
				 $run = $con->query($sql);

				while ($row = $run->fetch_assoc()) {
					echo "<div align='center'>";
					echo "<p color='red'>Device Name</p>".$row['dname']."<br>"; 
					echo $row['type']."<br>";
					echo $row['serialnumber']."<br>";
					echo $row['recievedate']."<br>";
					echo $row['price']."<br>";
					echo "<hr>";
					echo "</div>";

					}

			?>
              </div>
    </div> <!-- /container -->
  
   						</div> <!-- /container -->
  
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