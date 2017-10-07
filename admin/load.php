<?php
include '../includes/functions.php';

$price='';
	$name='';
if(isset($_POST['submit']))
{
	$bcode = $_SESSION['barcode'];
	$b=$_SESSION['brand'];
	$n=$_SESSION['name'];
	$p=$_SESSION['price'];
	$q=$_SESSION['qty'];
	$name=$b.' '.$n;
	$price=$p*$q;
	
	if($bcode != '' && $name != '' && $p != '' && $q != '') {

		$sql = "INSERT INTO custsaleprod(prodname,barcode,qty,price,total_price) VALUES('".$name."','".$bcode."','".$q."', '".$p."','".$price."')";
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'Your new order has been added successfully.';
		header("Location: makesale.php");
	}else {
		$_SESSION['failure'] = 'Please fill in all fields.';
	}

}



?>