
<?php
include '../../connection.php';
		IF(ISSET($_GET['id'])){
		$id = $_GET['id'];
		
		$sql = "DELETE FROM repairmaterial WHERE materialid ='$id'";
		$run =  $con->query($sql);
		header("Location: view.php?deletedsuccessful");
		}


?>