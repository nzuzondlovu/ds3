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
include 'header.php';
?>


<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
		
			<marquee>	<h1 class="page-header" >Enter your Query</h1> </marquee>
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
					     Enter personal details
					     </div>
			
					     <div class="panel-body"  background="bongs.jpg">
					    <div class="row" >
					     <div class="col-md-offset-3 col-md-6">


					     <form action="queryMeth.php" method = "post" >
							  </br>
							     <div class="group-data" >
							     
							     <div class="group-data" >
							     <label>Name</label>
							     <input type ="text" name="name" class="form-control" placeholder="Enter text" > 
							     </div>
							     </br>
							     <div class="group-data" >
							     <label>Email :</label>
							     <input type ="text"  name="email" class="form-control" placeholder="Enter text" >
							     </div>
							     </br>
							    
							    
							     <div class="group-data" >
							     <label>Query :  </label>
							     <textarea name="description" class="form-control" rows="3" placeholder="Enter text"></textarea>  
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
					    