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
<link href="../css/calender.css" type="text/css" rel="stylesheet" />
 <?php
 if (isset($_POST['submit']))
 {
  	$userID= $_SESSION['user_id'];
    $name = mysqli_real_escape_string($con, strip_tags(trim($_POST["name"])));
    $cell= mysqli_real_escape_string($con, strip_tags(trim($_POST["cell"])));
    $strAddr = mysqli_real_escape_string($con, strip_tags(trim($_POST["strAddr"])));
    $suburb= mysqli_real_escape_string($con, strip_tags(trim($_POST["suburb"])));
     $area = mysqli_real_escape_string($con, strip_tags(trim($_POST["area"])));
    $boxcode= mysqli_real_escape_string($con, strip_tags(trim($_POST["boxcode"])));
    $dateR = mysqli_real_escape_string($con, strip_tags(trim($_POST["dateR"])));
    $dateD = mysqli_real_escape_string($con, strip_tags(trim($_POST["dateD"])));
    
   
     if($userID != '' && $name != '' && $cell != '' && $strAddr != '' && $suburb != '' && $area != '' && $boxcode != '' && $dateR != ''&& $dateD != '') {
     
	 $sql = "INSERT INTO custdelivery(custID,custname,custcell,strAddress,suburb,area,boxcode,dateofRequest,dateofDelivery)
        VALUES('".$userID."','".$name."','".$cell."','".$strAddr."','".$suburb."','".$area."','".$boxcode."','".$dateR."','".$dateD."')";
        mysqli_query($con, $sql);
        $_SESSION['success'] = 'Your delivery request was added successfully.';
        header("Location: index.php");
    }else {
        $_SESSION['failure'] = 'Please fill in all fields.';
    }
   
  
}
        
    ?>
<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Delivery Confirmation</h1>
			</div>
			<div class="pull-left">
    		<?php

    					$sql1 = "SELECT * FROM postaldelivery WHERE user_id='".$_SESSION['user_id']."'";
    					$res1 = mysqli_query($con, $sql1);

    					if(mysqli_num_rows($res1) > 0) {

    						while($row1 = mysqli_fetch_assoc($res1)) {
    							echo 
    							$row1['strAddress'].'<br>'.
    							$row1['suburb'].'<br>'.
    							$row1['boxcode'].'<br>'.
    							$row1['area'];
    						}
    					} 
    					?>
    				</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Delivery Date 
					</div>
					<!-- /.panel-heading -->
					<div class="row">
    			<div class="col-lg-12">
				<div class="pull-left">
    				  <div class="col-md-offset-3 col-md-6">
                                <form role="form" method="post">
                                
                                  <?php
									include 'calender.php';
 
									$calendar = new Calendar();
 
									echo $calendar->show();
									
									?>
									
									 <input name="email" class="form-control" value="<?php
                                        $res = mysqli_query($con, "SELECT * FROM user WHERE id='".$_SESSION['user_id']."' ");
                                        $row = mysqli_fetch_assoc($res);
                                        echo $row['email'];
                                        ?> " style="display: none" >
                                         <input name="name" class="form-control" value="<?php
                                        $res = mysqli_query($con, "SELECT * FROM user WHERE id='".$_SESSION['user_id']."' ");
                                        $row = mysqli_fetch_assoc($res);
                                        echo $row['name'];
                                        ?> " style="display: none" >
                                         <input name="cell" class="form-control" value="<?php
                                        $res = mysqli_query($con, "SELECT * FROM user WHERE id='".$_SESSION['user_id']."' ");
                                        $row = mysqli_fetch_assoc($res);
                                        echo $row['cell'];
                                        ?> " style="display: none" >
                                        
                                         <input name="strAddr" class="form-control" value="<?php
                                        $res = mysqli_query($con, "SELECT * FROM postaldelivery WHERE user_id='".$_SESSION['user_id']."' ");
                                        $row = mysqli_fetch_assoc($res);
                                        echo $row['strAddress'];
                                        ?> " style="display: none" >
                                         <input name="suburb" class="form-control" value="<?php
                                        $res = mysqli_query($con, "SELECT * FROM postaldelivery WHERE user_id='".$_SESSION['user_id']."' ");
                                        $row = mysqli_fetch_assoc($res);
                                        echo $row['suburb'];
                                        ?> " style="display: none" >
                                         <input name="area" class="form-control" value="<?php
                                        $res = mysqli_query($con, "SELECT * FROM postaldelivery WHERE user_id='".$_SESSION['user_id']."' ");
                                        $row = mysqli_fetch_assoc($res);
                                        echo $row['area'];
                                        ?> " style="display: none" >
                                         <input name="boxcode" class="form-control" value="<?php
                                        $res = mysqli_query($con, "SELECT * FROM postaldelivery WHERE user_id='".$_SESSION['user_id']."' ");
                                        $row = mysqli_fetch_assoc($res);
                                        echo $row['boxcode'];
                                        ?> " style="display: none" >
                                         
                                        
									Date of Request: <input type="text" name="dateR" value="<?php echo date("Y-m-d")?>" size="8" readonly=""></br>
									Date of Delivery: <input type="text" name="dateD" value="<?php echo date('Y-m-d', strtotime('+7 days'))?>" size="8"  readonly=""></br>
                                     <button name="submit" type="submit" class="btn btn-primary">Confirm </button>
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
