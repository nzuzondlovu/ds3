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

if(isset($_POST['submit'])) {

    $street = mysqli_real_escape_string($con, strip_tags(trim($_POST["strAddress"])));
    $id = mysqli_real_escape_string($con, strip_tags(trim($_POST["suburb"])));
    $area = '';
    $suburb='';
    $boxcode = mysqli_real_escape_string($con, strip_tags(trim($_POST["boxcode"])));
    $user_id=$_SESSION['user_id'];

    $sql = "SELECT * FROM postal WHERE id='".$id."' ORDER BY suburb ASC";
    $res = mysqli_query($con, $sql);
	if(mysqli_num_rows($res) > 0) {
    while($row = mysqli_fetch_assoc($res)) {
    $suburb=$row['suburb'];
    $area=$row['area'];
        }
                                        
    }

    if($street != '' && $suburb != '' && $area != '' && $boxcode != '') {
		$sql = "INSERT INTO postaldelivery(user_id,strAddress,suburb,boxcode,area) VALUES ('".$user_id."','".$street."','".$suburb."','".$boxcode."','".$area."') ";
        mysqli_query($con, $sql);
        $_SESSION['success'] = 'Your new postal address was added successfully.';
        header("Location: confirmDelivery.php");
    }else {
        $_SESSION['failure'] = 'Please fill in all fields.';
    }
}
?>
<?php
include 'header.php';
?>
<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Change of Delivery Address</h1>
			</div>
				<div class="pull-left">
    					<?php

    					$sql1 = "SELECT * FROM user WHERE id='".$_SESSION['user_id']."'";
    					$res1 = mysqli_query($con, $sql1);

    					if(mysqli_num_rows($res1) > 0) {

    						while($row1 = mysqli_fetch_assoc($res1)) {
    							echo 
    							$row1['name'].'<br>'.
    							$row1['surname'].'<br>'.
    							$row1['cell'].'<br>'.
    							$row1['idnumber'].'<br>'.
    							$row1['email'].'<br>'.
    							$row1['location'];
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
						Change Details
					</div>
					<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="row">
    			    <div class="col-lg-12">
    				  <div class="col-md-offset-3 col-md-6">
    				   <form role="form" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Street Address</label>
                                        <input name="strAddress" class="form-control" placeholder="Enter text">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Suburb Name</label>
                                        <select id="suburb" name="suburb" class="form-control" onchange="document.getElementById('area').value=this.value" required>
                                            <option value="" selected="selected">Select type</option>
                                            <?php
                                            $sql = "SELECT * FROM postal ORDER BY suburb ASC";
                                            $res = mysqli_query($con, $sql);

                                            if(mysqli_num_rows($res) > 0) {
                                                while($row = mysqli_fetch_assoc($res)) {
                                                    echo '<option  value="'.$row['id'].'">'.$row['suburb'].'</option>';
                                                 
                                                }
                                                
                                            }
                                            ?>
                                        </select>
                                      
                                    </div>
                                     <div class="form-group">
                                        <label>Area</label>
                                      	 <select id="area" name="area" class="form-control" onchange="document.getElementById('boxcode').value=this.value" required>
                                            <option value="" selected="selected">Select type</option>
                                            <?php
                                            $sql = "SELECT * FROM postal ORDER BY suburb ASC";
                                            $res = mysqli_query($con, $sql);

                                            if(mysqli_num_rows($res) > 0) {
                                                while($row = mysqli_fetch_assoc($res)) {
                                                    echo '<option  value="'.$row['boxcode'].'">'.$row['area'].'</option>';
                                                 
                                                }
                                                
                                            }
                                            ?>
                                        </select>
                                      
                                    </div>
                                    <div class="form-group">
                                        <label>Boxcode</label>
                                        <input id="boxcode" name="boxcode" class="form-control" value="" placeholder="Enter text" >
                                    </div>
                                   
                                    <button name="submit" type="submit" class="btn btn-primary">Submit Address</button>
                                    <button type="reset" class="btn btn-default">Reset Address</button>
                                </form> 
								<script type="text/javascript">
								window.onload=function() { 
  document.getElementById("suburb").onchange=function() {
    document.getElementById("area").value=this.options[this.selectedIndex].getAttribute("data-sync"); 
  }
  document.getElementById("suburb").onchange(); // trigger when loading
}
								</script>     
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
