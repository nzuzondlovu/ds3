<?php
ob_start();
include '../includes/functions.php';
?>
<?php
if(isset($_SESSION['user_id']) == '' ) {
    header("location:../login.php");
}
?>

<?php
if(isset($_POST['insert'])){

     $feedback = $_POST["feedback"];
     $status="answered";

     $id = $_GET['id'];
	echo $sql = "UPDATE query SET status='".$status."', feedback='".$feedback."' WHERE id='".$id."'";
    $run = $con->query($sql);
	
	header("Location: feedback.php");
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
		
			<marquee>	<h1 class="page-header" >Enter feedback</h1> </marquee>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div>
                 <?php if(isset($_SESSION['failure']) && $_SESSION['failure'] != '') { ?>
                <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <?php echo $_SESSION['failure']; unset($_SESSION['failure']); ?>
				     </div>
                    <?php } ?>

                    <?php if(isset($_SESSION['success']) && $_SESSION['success'] != '') { ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                    </div>
                    <?php } ?>   
					</div>
					
					  <div class="panel panel-default" >
					  <dic class="panel-heading" >
					     feedback

					     </div>
			
					     <div class="panel-body"  background="bongs.jpg">
					    <div class="row" >
					     <div class="col-md-offset-3 col-md-6">


					     <form action="" method = "post" >
							  </br>
							     <div class="group-data" >
							     
							     
							     </br>

							     <?php 
							     	$id = $_GET['id'];
							     	$res = mysqli_query($con, "SELECT * FROM query WHERE id='$id'");

							     		while ($row= $res->fetch_assoc()) {
							     			$Nam=  $row['name'];
							     			$emai=  $row['email'];
							     			$query=  $row['query'];
							     		}

							     ?>
							       <div class="form-group">
                                        <label>Name</label>
                                        <input name="name" class="form-control" value='<?php echo "$Nam"; ?>' disabled="">
                                    </div>
							     
							      <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" class="form-control" value='<?php echo "$emai"; ?>' disabled="">
                                    </div>
							    
							     
							    
							      <div class="form-group">
                                        <label>Query</label>
                                        <input name="query" class="form-control" value='<?php echo "$query";?>' disabled="">
                                    </div>
                                    </br>
                                    <div class="group-data" >
							     <label>Feedback</label>
							      <textarea name="feedback" class="form-control" rows="3" placeholder="enter text"></textarea>  
							     </div>
							     </br>
							    <input type="submit" name="insert"  class="btn btn-primary" value="SEND "></input>
							    
							    
					     </form>
                            </div>
                            <!-- /.col-lg-6 (nested) -->
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
					    