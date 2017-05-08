<?php
include 'functions.php';
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
	header('Location: viewcat.php');
}

/**
* if(isset($_POST['submit'])) {
*  	
* 		$sql = "DELETE FROM category WHERE user_id= $id LIMIT 1"; 
*  		if (mysqli_query($con,$sql))
*   		{
*   			echo "Database updated successfully";
*   		}
* 		else
*  		 {
*   			echo "An error occurred: " . mysqli_error($con);
*  		 }

* 		
* 		$_SESSION['success'] = 'Category Deleted successfully.';
* 		header("Location: viewcat.php");
* 	}
*/
?>

<?php

$delete = '';

$sql = "SELECT * FROM category WHERE id=$id";
$res = mysqli_query($con, $sql);

if(mysqli_num_rows($res) > 0) {
	while($row = mysqli_fetch_assoc($res)) {
		$delete = '
		Category ID : '.$row['id'].'<br>
		Category Name : '.$row['name'].'<br>
		Category Type : '.$row['type'].'<br>
		Category Description : '.$row['description'].'<br>
		Date : '.date("M d, y",strtotime($row['date'])).'<br>
		';
		
	}
}
?>
<?php
    require 'database.php';
    $Id = 0;
     
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $id = $_POST['id'];
         
        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM category  WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: viewcat.php");
         
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
				<h1 class="page-header">Category Details</h1>
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
						Confirm Delete
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-6">
							<h2>Category details</h2>
							<?php
							echo $delete;
							?>
					
						<form class="form-horizontal" action="DeleteCat.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <p class="alert alert-error"><h4><strong>Are you sure to delete ?</strong></h4></p>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-danger">Yes</button>
                          <a class="btn" href="viewcat.php">No</a>
                        </div>
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