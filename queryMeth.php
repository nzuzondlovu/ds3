<?php

include '../admin/functions.php';

if(isset($_POST['insert'])){

    $Email = $_POST["email"];
    $Name = $_POST["name"];
    $Query = $_POST["description"];
     $feedback = $_POST["feedback"];

     
    $sql = "INSERT INTO query(email, name,Query,feedback) 
    				values('$Email','$Name','$Query','$feedback')";

    $run = $con->query($sql);
	
}
header("Location: query.php");

?>