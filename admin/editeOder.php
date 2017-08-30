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
				<h1 class="page-header">EDIT RECODE</h1>				
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
								</div>
							</div>
							<div class="table-responsive">
								
								<?php

								$id = $_GET['id'];
								$sql = "SELECT * FROM repairmaterial WHERE materialid ='$id'";
								$run = $con->query($sql);
								while($row = $run->fetch_assoc()){
									$name = $row['name'];
									$type = $row['type'];
									$description = $row['description'];
									$dateRecieved = $row['dateRecieved'];
									$quantity = $row['quantity'];
								}
								?>
								<form method="post">

									<div class="container">
										<div class="row">
											<br><table class="table table-striped table-bordered">
											<tr>
												<td>Device Name:</td>
												<td><input type="text" name="name" value='<?php echo "$name";?>' required="please enter device name"/></td>
											</tr>
											<tr>
												<td>Type:</td>
												<td> <select name="type" value='<?php echo "$type";?>' required="please select type">
													<option value="Hardware">Hardware</option>
													<option value="Software">Software</option>
												</select></td>
											</tr>
											<tr>
												<td>Description:</td>
												<td> <input type="text" name="description" value='<?php echo "$description";?>' required="please enter date Recieved"/></td>
											</tr>
											<tr>
												<td>Date Recieved:</td>
												<td><input type="text" name="dateRecieved" value='<?php echo "$dateRecieved";?>'required="please enter date recieved"/><br></td>
											</tr>
											<tr>
												<td>Quantity: </td>
												<td><input type="text" name="quantity" value='<?php echo "$quantity";?>' required="please enter quantity"/></td>
											</tr>

										</table>


									</div>
									<button type='submit' name ='update' class="btn btn-primary" value='update'>Edit</button><br>
									<a href="viewMaterial.php" >back</a>
								</div>

							</form>



							<?php
							if(isset($_POST['update'])){
								$id = $_GET['id'];

								$name1 = $_POST['name'];
								$type1 = $_POST['type'];
								$description1 = $_POST['description'];
								$dateRecieved1 = $_POST['dateRecieved'];
								$quantity1 = $_POST['quantity'];

								$sqledit ="UPDATE repairmaterial SET name ='$name1', type='$type1', description ='$description1',
								dateRecieved ='$dateRecieved1',quantity ='$quantity1' WHERE materialid='$id'";
	//$sql1 = "UPDATE repairmaterial SET name='$name1', type='$type' description='$description',
	 //dateRecieved='$dateRecieved', quantity='$quantity' WHERE materialid='$id'";
								$runedite = $con->query($sqledit);
								if(!$runedite){
									die('Could not Update data: '. mysql_error());
								}else{
									echo 'Updated successfull';
								}
								header("Location: viewMaterial.php");
							}
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