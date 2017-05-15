<?php

ob_start();
include '../admin/functions.php';
?>

<?php
if(isset($_SESSION['user_id']) == '' ) {
	header("location:../login.php");
}

if(isset($_GET['id']) && $_GET['id'] != '') {

	$id = mysqli_real_escape_string($con, strip_tags(trim($_GET['id'])));
	$sql = "SELECT * FROM cart WHERE id='".$id."'";
	$res = mysqli_query($con, $sql);
	$num = 0;

	if (mysqli_num_rows($res) > 0) {

		$sql = "UPDATE cart SET num='".$num."' WHERE user_id='".$_GET['id']."'";
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'Successfully purchased your order.';
		header("Location: cart.php");
	} else {
		header("Location: cart.php");
	}
}

?>