<?php
      
    //include '../../include.php';
    include '../../header.php';
?>
    <title>Fix Device</title>

  <div class="container">

            <div class="row">
                <h1 style="font-family:AR BLANCA; text-align: center">DEVICES TO BE FIXED</h1>
            </div>
       
               <?php

  if (isset($_POST['search'])) {
    
    $search = $_POST['tsearch'];

    $sql= "SELECT * FROM customersaledevice WHERE diviceName = '".$search."'";
    $run = $con->query($sql);
  }
?>

            <div class="row">
                <br><table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Device Name</th>
                          <th>Model</th>
                          <th>Serial No</th>
                          <th>type</th>
                          <th>Date Recieved</th>
                        </tr>
                      </thead>
                      <tbody>
	               <?php

							$sql = "SELECT * FROM customersaledevice ORDER BY id DESC";
					       $run = $con->query($sql) or die("error: ". mysqli_error($con));
					       while($row = $run->fetch_assoc()){
					        echo '<tr>';
							 echo '<td>'. $row['diviceName'].'</td>';
							 echo '<td>'. $row['model'].'</td>';
							echo '<td>'. $row['serialNumber'].'</td>';
							echo '<td>'. $row['Dtype'].'</td>';
							echo '<td>'. $row['recievedDate'].'</td>';
							echo '<td>'.'<a href="devicedelete.php?id='.$row['id'].'"><img src="../../img/deleteimg.png" alt="delete_image"></a>'." : ".
								'<a href="deviceedite.php?id='.$row['id'].'"><img src="../../img/edit.png" alt="edit_image"></a>'.'......'.
                '<a href="checkrepair.php?id='.$row['id'].'">Repaire Device.</a><br>'.'</td>';

							echo '</tr>';
							}

              if(isset($_POST['check'])) {
                header("location: checkrepair.php");
                }

 ?>
                      </tbody>
                </table>
                 <a href="createCustomer.php" class="btn btn-success">back</a>
        </div>
    </div> <!-- /container -->
<?php include '../../footer.php';?>
  </body>
</html>
