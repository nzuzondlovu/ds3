<?php
include 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	 <meta charset="utf-8">
	 <title>Edite Details</title>
	 <link   href="css/bootstrap.min.css" rel="stylesheet">
	 <script src="js/bootstrap.min.js"></script>
</head>
<body>

<?php

	$id = $_GET['id'];
	$sql = "SELECT * FROM repairmaterial WHERE materialid ='$id'";
	$run = $con->query($sql);
	while($row = $run->fetch_assoc()){
		$name = $row['name'];
		$type = $row['type'];
		$description = $row['description'];
		$dateRecieved = $row['dateRecieved'];
		$quantity = $row['quantity'];
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
													<td><input type="text" name="name" value='<?php echo "$name";?>' required="please enter device name"/></td>
												</tr>
												<tr>
													<td>Type:</td>
													<td> <select name="type" value='<?php echo "$type";?>' required="please select type">
															<option value="Hardware">Hardware</option>
															<option value="Software">Software</option>
													</select></td>
												</tr>
												<tr>
													<td>Description:</td>
													<td> <input type="text" name="description" value='<?php echo "$description";?>' required="please enter date Recieved"/></td>
												</tr>
												<tr>
													<td>Date Recieved:</td>
													<td><input type="text" name="dateRecieved" value='<?php echo "$dateRecieved";?>'required="please enter date recieved"/><br></td>
												</tr>
												<tr>
													<td>Quantity: </td>
													<td><input type="text" name="quantity" value='<?php echo "$quantity";?>' required="please enter quantity"/></td>
												</tr>

			                </table>


			        </div>
										<button type='submit' name ='update' class="btn btn-success" value='update'>Edit</button><br>
										<a href="view.php" >back</a>
			    </div>

	</form>



  <?php
  if(isset($_POST['update'])){
   $id = $_GET['id'];

  $name1 = $_POST['name'];
  $type1 = $_POST['type'];
  $description1 = $_POST['description'];
  $dateRecieved1 = $_POST['dateRecieved'];
  $quantity1 = $_POST['quantity'];

 	$sqledit ="UPDATE repairmaterial SET name ='$name1', type='$type1', description ='$description1',
  							 dateRecieved ='$dateRecieved1',quantity ='$quantity1' WHERE materialid='$id'";
	//$sql1 = "UPDATE repairmaterial SET name='$name1', type='$type' description='$description',
	 //dateRecieved='$dateRecieved', quantity='$quantity' WHERE materialid='$id'";
  $runedite = $con->query($sqledit);
  if(!$runedite){
    die('Could not Update data: '. mysql_error());
  }else{
    echo 'Updated successfull';
      }
			header("Location: view.php");
  }
?>

</body>
</html>
