<?php
ob_start();
include '../admin/functions.php';
?>

<?php
if(isset($_SESSION['user_id']) == '' ) {
	header("location:../login.php");
}
?>

<?php
if (isset($_GET['id']) && $_GET['id'] != '') {

}
?>

<?php
include 'header.php';
?>
<?php

if(isset($_POST['submit'])) {

   
	$suburb = mysqli_real_escape_string($con, strip_tags(trim($_POST["suburb"])));
    $boxcode = mysqli_real_escape_string($con, strip_tags(trim($_POST["boxcode"])));
    $strcode = mysqli_real_escape_string($con, strip_tags(trim($_POST["strcode"])));
    $area = mysqli_real_escape_string($con, strip_tags(trim($_POST["area"])));
  
  if($suburb != '' && $boxcode != '' && $strcode != '' && $area != '') 
	{
  	$sql = "INSERT INTO postal(suburb,boxcode ,strcode, area)
     VALUES( '".$suburb."', '".$boxcode."', '".$strcode."', '".$area."')";
	mysqli_query($con, $sql);
 $_SESSION['success'] = 'Your new address was added successfully.';
   header("Location: addPost.php");
  }
else 
	{
     $_SESSION['failure'] = 'Please fill in all fields.';
 }
  

}


?>
<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Change of Delivery Address</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						List of all orders
					</div>
					<!-- /.panel-heading -->
					<div class="row">
    			<div class="col-lg-12">
				<div class="pull-left">
    				  <div class="col-md-offset-3 col-md-6">
                                <form role="form" method="post">
                                    /**
* 										<div class="form-group">
*                                         <label>Suburb name</label>
*                                         <input name="suburb" class="form-control" placeholder="Enter text">
*                                     </div>
*                                     <div class="form-group">
*                                      <label>Box code</label>                                         
*                                      <input name="boxcode" class="form-control" placeholder="Enter text">
* 									</div>
*                                     <div class="form-group">
*                                         <label>Street code</label>
*                                         <input name="strcode" class="form-control" placeholder="Enter text"> 
*                                     </div>
*                                     <div class="form-group">
*                                     	<label>Area</label>
*                                     	<input name="area" class="form-control" placeholder="Enter text">
*                                     </div>
*/									
										<textarea name="txtDis" width="50" height="100" />
                                     <button name="submit" type="submit" class="btn btn-primary">Submit </button>
                                    <button type="reset" class="btn btn-default">Reset</button>
                                </form>
                            </div>
    				</div>
    			</div>
				<!-- /.table-responsive -->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
</div>
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->


<?php
include 'footer.php';
 ?>
