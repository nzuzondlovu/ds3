<?php
//include '../../include.php';
include '../../header.php';
?>

	 <title>Show Allocation</title>
</head>
<body>
			<?php

			if(!isset($_GET['tname'])){
				header('Location: techallocate.php');
			}
			$tname = $_GET['tname'];
	$pp = "SELECT id, diviceName, model, serialNumber, Dtype, recievedDate FROM techrepair WHERE tname ='".$tname."'";
					       $r = $con->query($pp) or die("error: ". mysqli_error($con));
					       while($row = $r->fetch_assoc()){
					        echo '<tr>';
							 echo '<td>'. $row['diviceName'].'<br></td>';
							 echo '<td>'. $row['model'].'<br></td>';
							 echo '<td>'. $row['serialNumber'].'<br></td>';
							 echo '<td>'. $row['Dtype'].'<br></td>';
							echo '<td>'. $row['recievedDate'].'<br></td>';
							echo '<td>'.'<a href="deleteP.php?id='.$row["id"].'">Device Completed</a>'.'<br><br></td>';
							echo '</tr>'; 

							$id = $row['id'];
							$dn = $row['diviceName'];
							$mo = $row['model'];
							$sn = $row['serialNumber'];
							$dt = $row['Dtype'];

					$sql1 = "INSERT INTO shoprepair(dname,model, serialNumber, recievedDate, price,tname)
					 values('$dn','$mo','$sn','$dt','',$tname') where id = '$id'";
						$run1 = $con->query($sql1);

					  	$sql1 = "DELETE * FROM techrepair WHERE id = '$id'";
					  //$run2 = $con->query($sql1);	

					}



			//$sql1 = "INSERT INTO shoprepair(dname,model, serialNumber, recievedDate, price,tname) values() where id = '$id'";
			//$run1 = $con->query($sql1);

		  //	$sql1 = "DELETE * FROM techrepair WHERE id = '$id'";
		  //$run2 = $con->query($sql1);	

			?>

			<a href="techallocate.php">Back</a>

<?php include '../../footer.php';?>
</body>
</html>