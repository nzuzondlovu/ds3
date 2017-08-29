<?php
ob_start();
include '../includes/functions.php';
?>

<?php
if(isset($_SESSION['key']) == '' ) {
    header("location:../login.php");
}
?>

<?php
include 'header.php';
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cart Sales</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div>

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
</div>
</div>
</div>
</div>
<!-- /#page-wrapper -->

<?php
include 'footer.php';
?>
