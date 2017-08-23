<?php

	include 'connection.php';


	if (isset($_POST['search'])) {
		
		search = $_POST['tsearch'];

		$sql= "SELECT * FROM customersaledevice WHERE diviceName = '".$search."'";
		$run = $con->query($sql);
		header("Location: index.php");
	}
?>