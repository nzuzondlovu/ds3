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
										<a href="requestOrder.php" class="btn btn-primary">Make Order</a>
									</div>
								</div>
							</div>
							<div class="table-responsive">
							<div class="container">
             
            <div class="row">
                <br><table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Type</th>
                          <th>Description</th>
                          <th>Date Recieved</th>
                          <th>Quantity</th>
                        </tr>
                      </thead>
                      <tbody>
	               <?php

							$sql = "SELECT * FROM repairmaterial ORDER BY materialid DESC";
					       $run = $con->query($sql) or die("error: ". mysqli_error($con));
					       while($row = $run->fetch_assoc()){
					        echo '<tr>';
							 echo '<td>'. $row['name'].'</td>';
							 echo '<td>'. $row['type'].'</td>';
							echo '<td>'. $row['description'].'</td>';
							echo '<td>'. $row['dateRecieved'].'</td>';
							echo '<td>'. $row['quantity'].'</td>';
							echo '<td>'.'<a href="deleteOrder.php?id='.$row['materialid'].'"><img src="../img/deleteimg.png" alt="delete_image"></a>'." : ".
								'<a href="editeOder.php?id='.$row['materialid'].'"><img src="../img/edit.png" alt="edit_image"></a>'.'</td>';

							echo '</tr>';
							}


 ?>
                      </tbody>
                </table>
        </div>
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
<script>
	$(document).ready(function(){
		$('#orders').DataTable();
	});
</script>