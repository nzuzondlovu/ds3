<?php
include 'admin/functions.php';
?>
<?php
include 'header.php';
?>
<?php

if(isset($_POST['submit']))
{
	$con=mysql_connect("localhost","root","");
	if(!$con)
	die('couldnt connnect'.mysql_error());
	mysql_select_db("shop",$con);
	
	$sql="INSERT INTO supid VALUES
	(
	'$_POST[supplierid]','$_POST[suppliername]','$_POST[address]','$_POST[email]','$_POST[contactnumber]','$_POST[productsupplied]'
	)";
	if(mysql_query($sql,$con))
	echo header("Location: about.php");
	else 
	echo"error adding record";
	mysql_close($con);
	
}


?>

<html>
<body>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Add Supplier</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div>
                    
                                    </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Enter Supplier details
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-6">
                                <form role="form" method="post">
                                    <div class="form-group">
                                        <label>Supplier ID</label>
                                        <input name="supplierid" class="form-control" placeholder="Enter text">
                                    </div>
                                   <div class="form-group">
                                        <label>Supplier Name</label>
                                        <input name="suppliername" class="form-control" placeholder="Enter text">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" class="form-control" placeholder="Enter text">
                                    </div>
                                    <div class="form-group">
                                        <label>Product Supplied</label>
                                        <input name="productsupplied" class="form-control" placeholder="Enter text">
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input name="address" class="form-control" placeholder="Enter text">
                                    </div>
                                    <div class="form-group">
                                        <label>Contact Number</label>
                                        <input name="contactnumber" class="form-control" placeholder="Enter text">
                                    </div>
                                    
                                   
                                    <button name="submit" type="submit" class="btn btn-primary">Submit Details</button>
                                    
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


    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>