<?php
ob_start();
include 'functions.php';
?>

<?php

if (isset($_GET['id']) && $_GET['id'] != null) {
	$id = mysqli_real_escape_string($con, strip_tags(trim($_GET["id"])));
} else {
	header('Location: suppliers.php');
}
?>

<?php
if(isset($_POST["submit"]))
{
 $sql="insert into orders VALUES
 (
 '$_POST[orderid]','$_POST[iD]','$_POST[sName]','$_POST[orderdate]','$_POST[quan]','$_POST[prod]',
 '$_POST[email]','$_POST[price]')";
 if(mysqli_query($con,$sql))
    echo "inserted to orders";
else 
    echo "unable to insert";

header('Location: Orders.php');

}
?> 



<?php

$promo = '';
$ID = '';
$QA = '';
$OD = '';
$PO = '';

echo $sql = "SELECT * FROM suppliers WHERE id=$id";
$res = mysqli_query($con, $sql);

if(mysqli_num_rows($res) > 0) {
	while($row = mysqli_fetch_assoc($res)) {
		$ID = ''.$row['id'].'';
		
		$QA = ''.$row['productName'].'';
		
		$OD = ''.$row['Quantity'].'';

		$OD = ''.$row['OrderDate'].'';
		
		$PO = ''.$row['promo_price'].'';
		
		
		
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
    <h1 class="page-header">Order Request</h1>
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Orders
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-offset-3 col-md-6">
                        <form role="form" method="post">
                            <div class="form-group">
                                <label>SupplierID </label>	
                                <input type="text" class="form-control" name="iD" placeholder="" value="<?php echo $ID; ?>" readonly="readonly"><br/>
                                <label>SupplierName</label>
                                <input type="text" class="form-control"  name="sName" placeholder="" value="<?php echo $QA; ?>" readonly="readonly"><br/>
                                <label>Email</label>
                                <input type="text" class="form-control" name="email"  placeholder="" value="<?php echo $OD; ?>" readonly="readonly"><br/>
                                <label>Product</label>
                                <input type="text" class="form-control" name="prod"  placeholder="" value="<?php echo $PO; ?>" readonly="readonly"><br/>
                                <label>Quantity</label>	
                                <input type="text" class="form-control"  name="quan"  placeholder=""><br/>
                                <label>OrderID</label>
                                <input type="text" class="form-control"  name="orderid"   placeholder=""><br/>
                                <label>OrderDate</label>
                                <input type="date" class="form-control"  name="orderdate" placeholder=""><br/> 
                                <label>Total Price</label>
                                <input type="text" class="form-control"  name="price" placeholder="R0.00"><br/>            			


                                <button name="submit"  href="Orders.php" type="submit" class="btn btn-primary">Submit Order</button>



                            </div>
                            <!-- /input-group -->
                        </li>
                    </div>


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

</body>

</html>
