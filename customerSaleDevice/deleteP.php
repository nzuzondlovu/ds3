
<?php
include '../connection.php';
		IF(ISSET($_GET['id'])){
		$id = $_GET['id'];
		
		$sql = "DELETE FROM techrepair WHERE id ='$id'";
		$run =  $con->query($sql);
		
		/*$in = "INSERT INTO `shoprepaire`";
		$r =  $con->query($in);*/

header("Location: techallocate.php?deletedsuccessful");
		}
?>