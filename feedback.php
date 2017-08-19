<?php
include 'functions.php';
?>

<?php
if(isset($_SESSION['key']) == '' ) {
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
		
			<marquee>	<h1 class="page-header" >FeedBack</h1> </marquee>
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
					     FEEDBACK
					     </div>
			
					     <div class="panel-body"  background="bongs.jpg">
					    <div class="row" >
					     <div class="col-md-offset-2 col-md-6">

					     <div class="container">

            <div class="row">
                <h1 style="font-family:AR BLANCA; text-align: center"> </h1>
            </div>
            <div class="row">
                <br><table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Query</th>
                          <th>Feedback
                         </th>
                        </tr>
                      </thead>
                      <tbody>
	      
                      		 <?php
                      		 
                                $sql="SELECT * from query";
                                $run = $con->query($sql);

                                while ($row= $run->fetch_assoc()) {
                                    echo'<tr>';
                                    echo '<td>'.$row['name'].'</td>';
                                    echo '<td>'.$row['email'].'</td>';
                                    echo '<td>'.$row['query'].'</td>';
                                      

             						echo '<td><a href="response.php?id='.$row['id'].'">FeedBack</a></td>';
                                    echo'</tr>';
                                }
                                ?>
                      </tbody>
                </table>
        </div>
    </div> <!-- /container -->
  
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
					    