
 <?php
 include "../connection.php";

 		if(isset($_POST['create'])){

    //$IdNo = $_GET["IdNo"];

   	$dname = $_POST["Dname"];
    $model = $_POST["model"];
    $SerialNo = $_POST["SerialNo"];
    $Dtype = $_POST["Dtype"];
    $dateRecieved = $_POST["dateRecieved"];
    $EAmount = $_POST["EAmount"];

 					echo $dname.'<br>';
 					echo $model.'<br>';
          echo $SerialNo.'<br>';
          echo $Dtype.'<br>';
          echo $dateRecieved.'<br>';
          echo $EAmount.'<br>';

      echo  $sql = "insert into customersaledevice (diviceName, model, serialNumber, Dtype, recievedDate, establishAmount)
                                          values('$dname', '$model', '$SerialNo', '$Dtype','$dateRecieved', '$EAmount')";
      	$run = $con->query($sql);
		//mysqli_query($con, $sql);
 }
 header("Location: index.php");
  ?>
