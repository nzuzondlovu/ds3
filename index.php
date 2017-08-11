<?php
include "connection.php";

 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
  <div id="google_translate_element"></div><script type="text/javascript">
  function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'af,en,xh,zh-CN,zu', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
  }
  </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


  <div class="container">

            <div class="row">
                <h1 style="font-family:AR BLANCA; text-align: center">DEVICES TO BE FIXED</h1>
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
                          <th>Cost</th>
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
              echo '<td>'. $row['establishAmount'].'</td>';
							echo '<td>'.'<a href="devicedelete.php?id='.$row['id'].'"><img src="img/deleteimg.png" alt="delete_image"></a>'." : ".
								'<a href="deviceedite.php?id='.$row['id'].'"><img src="img/edit.png" alt="edit_image"></a>'.'......'.
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

  </body>
</html>
