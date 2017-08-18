<?php
include '../connection.php';
include '../include.php';

//Check if the id is available
if (!isset($_GET['id'])) {
	header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Allocate To</title>
	<link   href="../css/bootstrap.min.css" rel="stylesheet">
	<script src="../js/bootstrap.min.js"></script>
</head>
<body>

	<?php
	$diviceName = '';
	$model = '';
	$serialNumber = '';
	$recievedDate = '';
	$establishAmount = 0;
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
				<h1 style="font-family:AR BLANCA; text-align: center">ALLOCATE TO TECHNICIAN</h1>
			</div>
			<div class="row">
				<br><table class="table table-striped table-bordered">
				<tr>
					<td>Device Name:</td>
					<td><input type="text" name="divceName" value='<?php echo "$diviceName";?>' readonly required="please enter device name"/></td>
				</tr>
				<tr>
					<tr>
						<td>Model:</td>
						<td><input type="text" name="model" value='<?php echo "$model";?>' readonly required="please enter type"/><br></td>
					</tr>

					<tr>
						<td>serial Number:</td>
						<td> <input type="text" name="Snumber" value='<?php echo "$serialNumber";?>' readonly required="please enter serial Number"/></td>
					</tr>

					<td>Type:</td>
					<td> <select name="Dtype" value='<?php echo "$Dtype";?>'readonly required="please select model">
						//	<option value=\"$Dtype\">Hardware</option>
						<option value="Hardware">Hardware</option>
						<option value="Software">Software</option>
					</select></td>
				</tr>

				<tr>
					<td>Quantity: </td>
					<td><input type="text" name="recievedDate" value='<?php echo "$recievedDate";?>' readonly required="please enter recievedDate"/></td>
				</tr>
				<tr>
					<td>Quantity: </td>
					<td><input type="text" name="establishAmount" value='<?php echo "$establishAmount";?>'readonly required="please enter amount"/></td>
				</tr>


				<tr>
					<td>Techicain: </td>
					<td><select name="tech" required="please enter technician">
						<?php 
						$te = "select tname from tech";
						$ri = $con->query($te);
						while($tt = $ri->fetch_assoc()){
																//echo "<option value=\"owner1\">". $tt['tname']. "</option>";
							$tec  = $tt['tname'];
							echo "<option value=\"$tec\">". $tt['tname']. "</option>";
						}
						?>
					</td>
				</tr>

			</table>


		</div>
		<button type='submit' name ='submit' class="btn btn-success" value='submit'>submit</button><br>
		<a href="index.php" >back</a>
	</div>

</form>



<?php
if(isset($_POST['submit'])){

	$tech = $_POST['tech'];

	echo $insertd = "INSERT INTO `techrepair`(`diviceName`, `model`, `serialNumber`, `Dtype`, `recievedDate`,`amount`, `tname`) 
	VALUES ('$diviceName','$model', '$serialNumber', '$Dtype', '$recievedDate','$establishAmount', '$tech')";
	

	mysqli_query($con, $insertd);
	//$insert = $con->query($insertd) or die("failed to run query".mysql_errno());
	//
	//$ruun = $con->query($insertd) or die("failed to run query".mysql_errno());
	$delete = "Delete from customersaledevice where id= '$id'";
	$rundelete = $con->query($delete);
	header("location: techallocate.php");
}
?>

</body>
</html>
