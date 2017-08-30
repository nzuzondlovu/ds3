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
      <?php
      $tname = $_GET['tname'];
                            $dn = $_POST['diviceName'];
                            $mo = $_POST['model'];
                            $sn = $_POST['serialNumber'];
                            

                    $sql1 = "INSERT INTO `shoprepaire`(`dname`, `type`, `serialnumber`, `recievedate`, `price`, `description`, `tname`) VALUES ('$dn','$mo','$sn','','','',' $tname'); where tname = '$tname'";
                        $run1 = $con->query($sql1);

                        $sql1 = "DELETE * FROM techrepair WHERE id = '".$id."'";
                      //$run2 = $con->query($sql1); 
                        echo $dn."<br>";
                        echo $mo."<br>";
                        echo $nn."<br>";


                    //header("Location: selldevice.php")


      ?>

 </div>
</div>
</body>


<?php
include 'footer.php';
?>