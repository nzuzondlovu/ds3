<?php

include '../includes/functions.php';

if(isset($_POST['insert'])){

    $Email = $_POST["email"];
    $user_id=$_SESSION['user_id'];
    $Name = $_POST["name"];
    $Query = $_POST["description"];
     $feedback = $_POST["feedback"];
     $status="unanswered";

     
    $sql = "INSERT INTO query(user_id,email, name,Query,status,feedback) 
    				values('$user_id','$Email','$Name','$Query','$status','$feedback')";

    $run = $con->query($sql);
	
}
header("Location: query.php");

?>