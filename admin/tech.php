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

<body>
<div id="page-wrapper">
      <div class="container-fluid">
<div align="center">
    


            <?php

            if(!isset($_GET['tname'])){
                header('Location: techallocate.php');
            }
            $tname = $_GET['tname'];
    $pp = "SELECT id, diviceName, model, serialNumber, Dtype, recievedDate FROM techrepair WHERE tname ='".$tname."'";
                           $r = $con->query($pp) or die("error: ". mysqli_error($con));
                           echo "<div style='border-style: groove;'>";
                           while($row = $r->fetch_assoc()){
                            
                            echo '<tr>';
                             echo '<td><b>Device Name </b>'. $row['diviceName'].'<br></td>';
                             echo '<td><b>Type </b>'. $row['model'].'<br></td>';
                             echo '<td><b>Serial No </b>'. $row['serialNumber'].'<br></td>';
                             echo '<td><b>Type       </b>'. $row['Dtype'].'<br></td>';
                            echo '<td><b>Date Recieved  </b>'. $row['recievedDate'].'<br><br></td>';
                            //echo '<td>'.'<a href="finished.php?tname='.$tname.'">Device Completed</a>'.'<br><br></td>';
                            echo '<b><hr/></b>'; 
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
                      echo "<div>";


            $sql1 = "INSERT INTO shoprepair(dname,model, serialNumber, recievedDate, price,tname) values() where id = '$id'";
            $run1 = $con->query($sql1);

            $sql1 = "DELETE * FROM techrepair WHERE id = '$id'";
          //$run2 = $con->query($sql1); 

            ?>

            <a href="allocated.php" class="btn btn-primary btn-lg">Back</a>
            </div>
            </div>
            </div>
</body>


<?php
include 'footer.php';
?>