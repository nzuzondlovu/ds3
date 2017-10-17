<?php
include '../includes/functions.php';
if(isset($_SESSION['user_id']) == '' ) {
	header("location:../login.php");
}

if (!isset($_GET['id']) && !isset($_GET['ud'])) {
	header('Location: viewfeedback.php');
} else {
	$id = $_GET['id'];
	$ud = $_GET['ud'];
}


if (isset($_POST['submit'])) {
	
	$reply = mysqli_real_escape_string($con, strip_tags(trim($_POST["reply"])));
	$date = date('Y-m-d H:m:s');

	if ($reply != '') {
		$sql = 'INSERT INTO feedback(query_id, user_id, feedback, date) VALUES("'.$id.'", "'.$ud.'", "'.$reply.'", "'.$date.'")';
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'Your reply has been sent.';
		header('Location: viewfeedback.php');
	} else {
		
		$_SESSION['failure'] = 'Please fill in the reply field.';
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
				<h1 class="page-header">Reply</h1>
				<div class="row">
					<div class="col-lg-12">
						<div class="pull-right">
							<a class="btn btn-success" href="viewfeedback.php"> View Queries</a>
						</div>
					</div>
				</div> 
				<div class="col-lg-12">
					<form role="form" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Reply</label>
							<textarea name="reply" class="form-control" rows="3" required="required"></textarea>
						</div>
						<button name="submit" type="submit" class="btn btn-primary">Submit Reply</button>
						<button type="reset" class="btn btn-default">Reset Form</button>
					</form>
				</div>
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