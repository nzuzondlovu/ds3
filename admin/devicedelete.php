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
<?php
			IF(ISSET($_GET['id'])){
		$id = $_GET['id'];
		
		$sql = "DELETE FROM customersaledevice WHERE id ='$id'";
		$run =  $con->query($sql);
		header("Location: jobs.php?deletedsuccessful");
		}


?>
?>