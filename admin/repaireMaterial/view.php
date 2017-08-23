<?php
//include "../connection.php";
include '../../header.php';
 ?>
  <div class="container">

            <div class="row">
                <h1 style="font-family:AR BLANCA; text-align: center"> Repairs Material</h1>
            </div>
             <a href="create.php" class="btn btn-success">Order</a>
            <div class="row">
                <br><table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Type</th>
                          <th>Description</th>
                          <th>Date Recieved</th>
                          <th>Quantity</th>
                        </tr>
                      </thead>
                      <tbody>
	               <?php

							$sql = "SELECT * FROM repairmaterial ORDER BY materialid DESC";
					       $run = $con->query($sql) or die("error: ". mysqli_error($con));
					       while($row = $run->fetch_assoc()){
					        echo '<tr>';
							 echo '<td>'. $row['name'].'</td>';
							 echo '<td>'. $row['type'].'</td>';
							echo '<td>'. $row['description'].'</td>';
							echo '<td>'. $row['dateRecieved'].'</td>';
							echo '<td>'. $row['quantity'].'</td>';
							echo '<td>'.'<a href="delete.php?id='.$row['materialid'].'"><img src="../../img/deleteimg.png" alt="delete_image"></a>'." : ".
								'<a href="edite.php?id='.$row['materialid'].'"><img src="../../img/edit.png" alt="edit_image"></a>'.'</td>';

							echo '</tr>';
							}


 ?>
                      </tbody>
                </table>
        </div>
    </div> <!-- /container -->
    <?php include '../../footer.php';?>
  </body>
</html>
