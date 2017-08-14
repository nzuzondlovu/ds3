
 <?php
 include "connection.php";
 		if(isset($_POST['create'])){

   	$name = $_POST["Dname"];
       $type = $_POST["Dtype"];
       $description = $_POST["description"];
       $dateRecieved = $_POST["dateRecieved"];
       $quantity = $_POST["quantity"];

 					/**echo $name.'<br>';
 					echo $type.'<br>';
 					echo $description.'<br>';
 					echo $dateRecieved.'<br>';
 					echo $quantity.'<br>';*/

       $sql = "insert into repairmaterial (name, type, description, dateRecieved, quantity)
                                   values('$name', '$type', '$description', '$dateRecieved', '$quantity')";
        $run = $con->query($sql);

 			// $sql = "INSERT INTO repairmaterial V('$name', '$type', '$description', '$dateRecieved', '$quantity')";
        //$run = $con->query($sql) or die("error: ". mysqli_error($con));

 }
 header("Location: view.php");
  ?>
