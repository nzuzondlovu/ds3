<?php

include '../includes/functions.php';

if(isset($_POST['insert'])){

    $Email = $_GET["email"];
    $Name = $_GET["name"];
    $Query = $_GET["description"];
     $feedback = $_POST["feedback"];
     $status="answered";

     $id = $_POST['id'];
	$sql = "UPDATE query SET status='".$status."', feedback='".$feedback."' WHERE id='".$id."'";

    $run = $con->query($sql);
	
}
header("Location: feedback.php");

?>