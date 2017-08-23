
 <?php
 include "../../connection.php";
include '../../include.php';
 include '../../header.php';

 		if(isset($_POST['create'])){

   	$cname = $_POST["Cname"];
    $IdNo = $_POST["IdNo"];
    $num = $_POST["num"];
    $email = $_POST["email"];

 					/*echo $cname.'<br>';
 					echo $IdNo.'<br>';*/

       $sql = "insert into customerrepaire (Cname, idNo, num, email)
                                  values('$cname', '$IdNo', '$num', '$email')";
       $run = $con->query($sql);

 }
 header("Location: deviceSaleCreate.php");
  ?>
