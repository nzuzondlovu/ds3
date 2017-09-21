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

if (isset($_GET['id']) && $_GET['id'] != null) {
  $id = mysqli_real_escape_string($con, strip_tags(trim($_GET["id"])));
} else {
  header('Location: products.php');
}


if(isset($_POST['btnPromo'])) {
  $price = mysqli_real_escape_string($con, strip_tags(trim($_POST["price"])));
  $start = mysqli_real_escape_string($con, strip_tags(trim($_POST["start"])));
  $end = mysqli_real_escape_string($con, strip_tags(trim($_POST["end"])));
  $date = date("Y-m-d");
  
  if($price != '' && $start != '' && $end != '') {

    if ($start < $date) {
      $_SESSION['failure'] = 'Entered start date has past already.';

    } else if ($end > $start) {

     echo $sql = "UPDATE product SET promo_price='".$price."', promo_date1='".$start."', promo_date2='".$end."' WHERE id='".$id."'";
     // mysqli_query($con, $sql);
     // $_SESSION['success'] = 'Your new Promotional Product was added successfully.';
      //header("Location: promotions.php");
    } else {
      $_SESSION['failure'] = 'Entered end date has past already.';
    }   
  }else {
    $_SESSION['failure'] = 'Please fill in all fields.';
  }
}
?>


<!-- /#page-wrapper -->

