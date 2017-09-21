<?php
header('Content-Type: application/json');

include 'functions.php';

$query = mysqli_query($con, "SELECT page, COUNT(*) AS num FROM views GROUP BY page");

$data = array();

foreach ($query as $row) {
	
	$data[] = $row;
}

print json_encode($data);
?>
