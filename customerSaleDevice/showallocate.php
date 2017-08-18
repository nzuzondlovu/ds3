<?php
include '../include.php';
?>

	 <title>Show Allocation</title>
</head>
<body>
			<?php

			if(!isset($_GET['tname'])){
				header('Location: techallocate.php');
			}
			$tname = $_GET['tname'];
		$pp = "SELECT diviceName, model, serialNumber, Dtype, recievedDate FROM techrepair WHERE tname ='".$tname."'";
					       $r = $con->query($pp) or die("error: ". mysqli_error($con));
					       while($row = $r->fetch_assoc()){
					        echo '<tr>';
							 echo '<td>'. $row['diviceName'].'<br></td>';
							 echo '<td>'. $row['model'].'<br></td>';
							 echo '<td>'. $row['serialNumber'].'<br></td>';
							 echo '<td>'. $row['Dtype'].'<br></td>';
							echo '<td>'. $row['recievedDate'].'<br></td>';
							echo '<td>'.'<a href="showallocate.php?id='.$row["id"].'">delete</a>'.'<br><br></td>'; 

							echo '</tr>'; 
							}
			?>
			<a href="techallocate.php">Back</a>
</body>
</html>
