<?php
ob_start();
include '../includes/functions.php';
?>

<?php
if(isset($_SESSION['key']) == '' ) {
  header("location:../login.php");
}

$invoice='';
if (isset($_GET['id']) && $_GET['id'] != null) {

  $id = mysqli_real_escape_string($con, strip_tags(trim($_GET["id"])));
  
  $invoice=$id;

} else {

  header('Location: sales.php');
}

$sql = "SELECT * FROM sales WHERE invoice_num LIKE '%".$id."%' ";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);

$name = $row['diviceName'];
$model = $row['model'];
$serial = $row['serialNumber'];
$type = $row['Dtype'];
$date = $row['date'];
$amount = $row['establishAmount'];

$cat = '
ID : '.$row['id'].'<br>
Device Name : '.$name.'<br>
Model : '.$model.'<br>
Serial : '.$serial.'<br>
Type : '.$type.'<br>
Recieved Date : '.$date.'<br>
Price : R'.$amount.'<hr>
Customer Name : '.$row['Cname'].'<br>
ID Number : '.$row['idNo'].'<br>
Cell Number : '.$row['num'].'<br>
Email Address : '.$row['email'].'
';


if(isset($_POST['submit'])){

  $tech = mysqli_real_escape_string($con, strip_tags(trim($_POST['technician'])));

  if ($tech != '') {

    $sql = "INSERT INTO techrepair(diviceName, model, serialNumber, Dtype, recievedDate, amount, tname) 
    VALUES ('$name','$model', '$serial', '$type', '$date','$amount', '$tech')";
    mysqli_query($con, $sql);
    header("location: allocated.php");

  } else {

    $_SESSION['failure'] = "Please choose a technician.";
  }  
}

?>

<?php
include 'header.php';
?>

<div id="page-wrapper">
  <div class="container-fluid">
  	<div class="span10">

<div class="content" id="content">
<div style="margin: 0 auto; padding: 20px; width: 900px; font-weight: normal;">
	<div style="width: 100%; height: 190px;" >
	<div style="width: 900px; float: left;">
	<center><div style="font:bold 25px 'Aleo';">Sales Receipt</div>
	Computer & Electronics	<br>
	Smith Street, Durban	<br>	<br>
	</center>

	</div>
	<div style="width: 136px; float: left; height: 70px;">
	<table cellpadding="3" cellspacing="0" style="font-family: arial; font-size: 12px;text-align:left;width : 100%;">

		<tr>
			<td>OR No. :</td>
			<td><?php echo $invoice ?></td>
		</tr>
		<tr>
			<td>Date :</td>
			<td><?php echo $date ?></td>
		</tr>
	</table>
	
	</div>
	<div class="clearfix"></div>
	</div>
	
  <!-- /.container-fluid -->
</div>
<!-- Page Content -->
<!-- /#page-wrapper -->

<?php
include 'footer.php';
?>
<script type="text/javascript">

  $( document ).ready( function () {
    $( "#techForm" ).validate( {
      rules: {
        technician: "required"
      },
      messages: {
        technician: "Please select a technician"
      },
      errorElement: "em",
      errorPlacement: function ( error, element ) {
          // Add the `help-block` class to the error element
          error.addClass( "help-block" );

          if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.parent( "label" ) );
          } else {
            error.insertAfter( element );
          }
        },
        highlight: function ( element, errorClass, validClass ) {
          $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
          $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
        }
      });
  });
</script>