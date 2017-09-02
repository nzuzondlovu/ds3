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
				<h1 class="page-header">Suppliers Reports</h1>
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
				                <a href="shopreport.php" class="btn btn-lg btn-primary col-md-6">Cart</a><br><br><br>
				               <a href="suppliersreport.php" class="btn btn-lg btn-primary col-md-6">Suppliers</a><br><br><br>
				               <a href="salaryreport.php" class="btn btn-lg btn-primary col-md-6">Salaries</a><br><br><br>
				                
				              </div>
              <div class= "col-md-8">
              <h2>List of Suppliers</h2>
			<?php  
				 $sql = "SELECT * FROM `suppliers`";
				 $run = $con->query($sql);

				while ($row = $run->fetch_assoc()) {
					echo "<div align='center' class='col-md-6' 
					style='background-color: #fff;
						  border-radius: 2px;
						  display: inline-block;
						  height: auto;
						  padding-top: 2%;
						  padding-bottom: 2%;
						  margin: 1rem;
						  position: relative;
						  width: auto;
						  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
						'>>";
					echo"<b>Name </b>". $row['name']."<br>"; 
					echo"<b>Product </b>". $row['product']."<br>"; 
					echo "<b>ContactNumber </b>".$row['contactNumber']."<br>";  
					echo "<b>Email </b>".$row['email']."<br>"; 
					echo "<b>Website </b>".$row['website']."<br>";
					echo "<b>Address </b>".$row['address']."<br>";
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