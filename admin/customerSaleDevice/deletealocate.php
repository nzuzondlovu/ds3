
<?php

include '../../connection.php';

	/*if (!isset($_GET['id'])) {
	header('Location: techallocate.php');
}*/
	$id = $_GET['id'];
	echo $id;

	$sql = "INSERT INTO shoprepair where id = '$id'";
	$run = $con->query($sql);

  $sql1 = "DELETE * FROM techrepair WHERE id = '$id'";
  //$run2 = $con->query($sql1);
?>
header('Location: techallocate.php');