<?php

include '../admin/functions.php';

if(isset($_POST['insert'])){

    $Email = $_GET["email"];
    $Name = $_GET["name"];
    $Query = $_GET["description"];
     $feedback = $_GET["feedback"];

     $id = $_POST['id'];

     
    $sql = "INSERT INTO query(email, name,Query,feedback) 
    				values('$Email','$Name','$Query','$feedback') WHERE id='$id'";

    $run = $con->query($sql);
	
}
header("Location: feedback.php");

?>