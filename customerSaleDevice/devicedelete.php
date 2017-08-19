
<?php
include '../connection.php';
		IF(ISSET($_GET['id'])){
		$id = $_GET['id'];
		
		$sql = "DELETE FROM customersaledevice WHERE id ='$id'";
		$run =  $con->query($sql);
		header("Location: index.php?deletedsuccessful");
		}


?>