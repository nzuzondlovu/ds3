<?php
include "../../connection.php";

 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    
   <title>Tecnician work</title>
    <link   href="../../css/bootstrap.min.css" rel="stylesheet">
    <script src=".../../js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">

            <div class="row">
                <h1 style="font-family:AR BLANCA; text-align: center">DEVICES ON STORE</h1>
            </div>
            <a href="screate.php" class="btn btn-success">create</a>
            <div class="row">
                <br><table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Device Name</th>
                          <th>Type</th>
                          <th>Serial No</th>
                          <th>Date Recieved</th>
                          <th>Description</th>
                          <th>Cost</th>
                        </tr>
                      </thead>
                      <tbody>
                 <?php

              $sql = "SELECT * FROM shoprepaire ORDER BY id DESC";
                 $run = $con->query($sql) or die("error: ". mysqli_error($con));
                 while($row = $run->fetch_assoc()){
                  echo '<tr>';
               echo '<td>'. $row['dname'].'</td>';
               echo '<td>'. $row['type'].'</td>';
              echo '<td>'. $row['serialnumber'].'</td>';
              echo '<td>'. $row['recievedate'].'</td>';
              echo '<td>'. $row['description'].'</td>';
              echo '<td>'. $row['price'].'</td>';
              /*echo '<td>'.'<a href="devicedelete.php?id='.$row['id'].'"><img src="../img/deleteimg.png" alt="delete_image"></a>'." : ".
                '<a href="deviceedite.php?id='.$row['id'].'"><img src="../img/edit.png" alt="edit_image"></a>'.'</td>';*/

              echo '</tr>';
              }

              if(isset($_POST['check'])) {
                header("location: checkrepair.php");
                }

 ?>
                      </tbody>
                </table>
        </div>
    </div> <!-- /container -->
</body>