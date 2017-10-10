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
		$sql = "UPDATE user SET blocked=1 WHERE id='".$id."'";
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'User was blocked successfully.';
	} else {
		$_SESSION['failure'] = 'An error occured, please try again.';
	}	
}
?>

<?php
if(isset($_GET['ub']) && $_GET['ub'] != '') {

	$id = mysqli_real_escape_string($con, strip_tags(trim($_GET['ub'])));

	if ($id) {
		$sql = "UPDATE user SET blocked=0 WHERE id='".$id."'";
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'User was unblocked successfully.';
	} else {
		$_SESSION['failure'] = 'An error occured, please try again.';
	}	
}
?>

<?php
if(isset($_POST['user'])) {

	$id = mysqli_real_escape_string($con, strip_tags(trim($_POST["id"])));
	$role = mysqli_real_escape_string($con, strip_tags(trim($_POST["role"])));
	$name = mysqli_real_escape_string($con, strip_tags(trim($_POST["name"])));
	$surname = mysqli_real_escape_string($con, strip_tags(trim($_POST["surname"])));
	$cell = mysqli_real_escape_string($con, strip_tags(trim($_POST["cell"])));
	$idnumber = mysqli_real_escape_string($con, strip_tags(trim($_POST["idnumber"])));
	$email= mysqli_real_escape_string($con, strip_tags(trim($_POST["email"])));
	$speciality = mysqli_real_escape_string($con, strip_tags(trim($_POST["speciality"])));
	
	if($role != '') {

		$sql = "UPDATE user SET role='".$role."' WHERE id='".$id."'";
		mysqli_query($con, $sql);

		if ($role == 'technician') {

			$sql = "INSERT INTO technician(name, surname, email, speciality)
			VALUES( '".$name."', '".$surname."', '".$email."', '".$speciality."')";
			mysqli_query($con, $sql);
			$_SESSION['success'] = 'Your new technician was added successfully.';
		}
		else if ($role == 'driver')
		{
		 $sql = "INSERT INTO drivers(name,surname,cell,idnumber,email)
			VALUES( '".$name."', '".$surname."','".$cell."','".$idnumber."', '".$email."')";
			mysqli_query($con, $sql);
			$_SESSION['success'] = 'Your new driver was added successfully.';	
		}

		$_SESSION['success'] = 'Your user role was updated successfully.';
	}else {
		$_SESSION['failure'] = 'Please fill in all role field.';
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
				<h1 class="page-header">Users</h1>
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
			</div>
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						List of all users
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">						
						<div class="table-responsive">
							<?php

							$sql = "SELECT * FROM user";
							$res = mysqli_query($con, $sql);

							if (mysqli_num_rows($res) > 0) {
								echo '
								<table id="users" class="table">
									<thead>
										<tr>
											<th>ID</th>
											<th>Name</th>
											<th>Surname</th>
											<th>Contact #</th>
											<th>ID Number</th>
											<th>Email</th>
											<th>Address</th>
											<th>Role</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>';
										while ($row = mysqli_fetch_assoc($res)) {

											$button = '<a href="?id='.$row['id'].'" class="btn btn-danger">Block User</a>';
											
											if ($row['blocked'] > 0) {
												$button = '<a href="?ub='.$row['id'].'" class="btn btn-success">Unblock User</a>';
											}

											echo '
											<tr>
												<td>'.$row['id'].'</td>
												<td>'.$row['name'].'</td>
												<td>'.$row['surname'].'</td>
												<td>'.$row['cell'].'</td>
												<td>'.$row['idnumber'].'</td>
												<td>'.$row['email'].'</td>
												<td>'.$row['location'].'</td>
												<td>'.$row['role'].'</td>
												<td class="pull-right">
													<button onclick="modal('.$row['id'].')" class="btn btn-primary">Update User Role</button>   '.$button.'
												</td>
											</tr>';
										}
										echo '
									</tbody>
								</table>';
							} else {
								echo '<div class="alert alert-info">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>No User found.</strong>
							</div>';
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
	function modal(id) {
		var data = {"id" : id};
		jQuery.ajax({
			url : '../includes/usersmodal.php',
			method : "post",
			data : data,
			success : function(data) {
				jQuery('body').append(data);
				jQuery('#usersModal').modal('toggle');
			},
			error : function() {
				alert("Ooops! Something went wrong!");
			}
		});
	}
</script>
<script>
	$(document).ready(function(){
		$('#users').DataTable();
	});
</script>