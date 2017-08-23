<?php
include "../../connection.php";
    include '../../header.php';

 ?>
 
  <div id="google_translate_element"></div><script type="text/javascript">
  function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'af,en,xh,zh-CN,zu', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
  }
  </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


  <div class="container">
				<div class='row'>
                <h1 style='font-family:AR BLANCA; text-align: center'>Technician work</h1>
            </div>
            <div class="row">
                <br><table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Device Name</th>
                          <th>Model</th>
                          <th>Serial No</th>
                          <th>type</th>
                          <th>Date Recieved</th>
                          <th>Technician</th>
                        </tr>
                      </thead>
                      <tbody>
	               <?php

							$sql = "SELECT diviceName, model, serialNumber, Dtype, recievedDate, tname FROM techrepair";
					       $run = $con->query($sql) or die("error: ". mysqli_error($con));
					       while($row = $run->fetch_assoc()){
					        echo '<tr>';
							 echo '<td>'. $row['diviceName'].'</td>';
							 echo '<td>'. $row['model'].'</td>';
							 echo '<td>'. $row['serialNumber'].'</td>';
							 echo '<td>'. $row['Dtype'].'</td>';
							echo '<td>'. $row['recievedDate'].'</td>';
							echo '<td>'.'<a href="showallocate.php?tname='.$row["tname"].'">'. $row['tname'].'</a>'.'</td>'; 
							//echo '<td>'.'<a href="checkrepair.php?id='.$row['id'].'">Repaire Device.</a><br>'.'</td>';
							/*$t = "select tname from tech";
							$tx = $con->query($t);
							echo "<tr>". $row['tname'] ."</tr>";*/
							}
						?>
                      </tbody>
                </table>
                 <a href="techallocate.php" class="btn btn-success">back</a>
        </div>
    </div> <!-- /container -->

<?php include '../../footer.php';?>
  </body>
</html>
