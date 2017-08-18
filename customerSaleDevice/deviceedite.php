<?php
include '../connection.php';
include '../include.php';

?>


</head>
<body>

<?php

	$id = $_GET['id'];
	$sql = "SELECT * FROM customersaledevice WHERE id ='$id'";
	$run = $con->query($sql);
	while($row = $run->fetch_assoc()){
		$diviceName = $row['diviceName'];
		$model = $row['model'];
		$serialNumber = $row['serialNumber'];
		$Dtype = $row['Dtype'];
		$recievedDate = $row['recievedDate'];
		$establishAmount = $row['establishAmount'];
	}
?>
	<form method="post">

				<div class="container">

			            <div class="row">
			                <h1 style="font-family:AR BLANCA; text-align: center"> EDIT RECODE</h1>
			            </div>
			            <div class="row">
			                <br><table class="table table-striped table-bordered">
												<tr>
													<td>Device Name:</td>
													<td><input type="text" name="divceName" value='<?php echo "$diviceName";?>' required="please enter device name"/></td>
												</tr>
												<tr>
												<tr>
													<td>Model:</td>
													<td><input type="text" name="model" value='<?php echo "$model";?>'required="please enter type"/><br></td>
												</tr>

												<tr>
													<td>serial Number:</td>
													<td> <input type="text" name="Snumber" value='<?php echo "$serialNumber";?>' required="please enter serial Number"/></td>
												</tr>

												<td>Type:</td>
													<td> <select name="Dtype" value='<?php echo "$Dtype";?>' required="please select model">
															<option value="Hardware">Hardware</option>
															<option value="Software">Software</option>
													</select></td>
												</tr>

												<tr>
													<td>Recieved Date: </td>
													<td><input type="text" name="recievedDate" value='<?php echo "$recievedDate";?>' required="please enter recievedDate"/></td>
												</tr>
												<tr>
													<td>Establish Amount: </td>
													<td><input type="text" name="establishAmount" value='<?php echo "$establishAmount";?>' required="please enter recievedDate"/></td>
												</tr>

			                </table>


			        </div>
										<button type='submit' name ='update' class="btn btn-success" value='update'>Edit</button><br>
										<a href="index.php" >back</a>
			    </div>

	</form>



  <?php
  if(isset($_POST['update'])){
   $id = $_GET['id'];

  $diviceName1 = $_POST['divceName'];
  $model1 = $_POST['model'];
  $serialNumber1 = $_POST['Snumber'];
  $Dtype1 = $_POST['Dtype'];
  $recievedDate1 = $_POST['recievedDate'];
  $establishAmount1 = $_POST['establishAmount'];

 	$sqledit1 ="UPDATE customersaledevice SET diviceName ='$diviceName1', model='$model1', serialNumber='$serialNumber1', Dtype='$Dtype1', recievedDate ='$recievedDate1',
  							 establishAmount ='$establishAmount1' WHERE id='$id'";
	//$sql1 = "UPDATE repairmaterial SET name='$name1', type='$type' description='$description',
	 //dateRecieved='$dateRecieved', quantity='$quantity' WHERE materialid='$id'";
  $runedite = $con->query($sqledit1);
  if(!$runedite){
    die('Could not Update data: '.mysql_error());
  }else{
    echo 'Updated successfull';
      }
			header("location: index.php");
  }
?>

</body>
</html>
