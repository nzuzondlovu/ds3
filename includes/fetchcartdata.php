<?php
header('Content-Type: application/json');

include 'functions.php';

$query = mysqli_query($con, "SELECT * FROM cart");

$data = array();

foreach ($query as $row) {
	
	$data[] = $row;
}

print json_encode($data);
?>