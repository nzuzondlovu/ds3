<?php
include '../../header.php';

 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	 <title>Device Info</title>
    <link   href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>
</head>

<body>
<form action="createMethod.php" method="post">
  <div class="container">

            <div class="row">
                <h1 style="font-family:AR BLANCA; text-align: center"> Order Product</h1>
            </div>
            <div class="row">
                <br><table class="table table-striped table-bordered">
									<tr>
										<td>Device Name:</td>
										<td><input type="text" name="Dname" required="please enter a number" placeholder="Enter Device name"/></td>
									</tr>
									<tr>
										<td>Type:</td>
										<td><select name="Dtype" required="please enter a number" placeholder="Select type">
												<option value="Hardware">Hardware</option>
												<option value="Software">Software</option>
											</select></td>
									</tr>
									<tr>
										<td>Description:</td>
										<td><input type="text" name="description" required="please enter a number" placeholder="Enter description"/></td>
									</tr>
									<tr>
										<td>Date Recieved:</td>
										<td><input type="text" name="dateRecieved" required="please enter a number" placeholder="Enter date recieved"/><br></td>
									</tr>
									<tr>
										<td>Quantity: </td>
										<td><input type="text" name="quantity" required="please enter a number" placeholder="Enter quantity"/></td>
									</tr>
                </table>

								<input type="submit" name="create" class="btn btn-success" value="save"/><br><br>
								<a href="view.php">Save<a>
        </div>
    </div>
</form>
<?php include '../../footer.php';?>
</body>


</html>
