<?php
include 'functions.php';
?>
<?php
include 'header.php';
?>
<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Blank</h1>
			</div>
			<!-- /.col-lg-12 -->                       
                        
                         <div class="panel-body">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-6">
                                <form role="form" method="post">
                                    <div class="form-group">
                                        <label><h2> Technician Orders</h2></label><br/>
                                        <label>SupplierID </label>	
							<input type="text" class="form-control" name="siD" placeholder="Post"><br/>
                                        <label>SupplierName</label>
						<input type="text" class="form-control"  name="sName" placeholder="Post"  ><br/>
                                        <label>Email</label>
						<input type="text" class="form-control" name="email"  placeholder="Post" ><br/>
                                        <label>OrderID</label>
							<select name="Ordertype" class="form-control">
                                                                <?php
                                                                     for($i=1;$i<=5;$i++)
                                                                        echo"<option value='$i'>$i</option>";
                                                                     ?>    
                                                                   </select>                        
                                                
                                                
                                              <br/>  <label>Device Type</label>						                                        
                                                        <select name="Devicetype" class="form-control">
									<option value="PL" >Please Select Device</option>
									<option value="Desktop" >Desktop Computer</option>
                                                                        <option value="Laptop" >Laptop Computer</option>
                                                                         <option value="Tablet" >Tablet</option>
                                                                          <option value="CellPhone" >Cell Phone</option>
                                                                           <option value="Other" >Other Appliance</option>
								</select>
                                         <br/><label>Device Brand</label>
							 <select name="Brandtype" class="form-control">
									<option value="PS" >Please Select Device Brand</option>
									<option value="Dell" >Dell</option>
                                                                        <option value="Samsung" >Samsung</option>
                                                                         <option value="Asus" >Asus</option>
                                                                          <option value="HP" >HP</option>
                                                                           <option value="IBM" >IBM</option>
                                                                           <option value="Sony" >Sony</option>
                                                                           <option value="Apple" >Apple</option>    
                                                                   </select>								
                                       <br/> <label>Device Model</label>
							<input type="text" class="form-control"  name="deviceM"><br/>                                        
                                        <label>Order Date</label>
							<input type="date" class="form-control"  name="orderDate" ><br/>
                                         <label>Quantity</label>
							<select name="type" class="form-control">
                                                                <?php
                                                                     for($i=1;$i<=10;$i++)
                                                                        echo"<option value='$i'>$i</option>";
                                                                     ?>    
                                                                   </select>	
                                         
                                         <br/><label>Confirm Order By:</label><br/>
                                                        <input type="radio"   name="confirmOrder" placeholder="" value="Telephone">&nbsp;Telephone <br/>
                                                        <input type="radio"  name="confirmOrder" placeholder="" value="Email">&nbsp; Email<br/>
                                         <div class="form-group">
								
							</div>
                                        <br/><label>Total Price</label> 
							<input type="text" class="form-control"  name="price"  placeholder="R0.00"><br/>           			
												
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
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php
if(isset($_POST["submit"]))
{    
    $con=  mysqli_connect("localhost","root","","shop");
    if (!$con) {
        die('Could not connect'. mysql_error);
        mysqli_select_db("shop",$con);
    }

    if (isset($_POST["confirmOrder"])) {
        $ordersC = 'Y';
    } else {
        $ordersC = 'N';
    }

    echo   $sql="INSERT INTO techsuppliers VALUES
                ('$_POST[Ordertype]','$_POST[siD]','$_POST[sName]', '$_POST[email]','$_POST[Devicetype]','$_POST[Brandtype]','$_POST[deviceM]','$_POST[orderDate]','$_POST[type]','$_POST[confirmOrder]','$_POST[price]')";
    if (mysqli_query($con, $sql)) {
        echo "Record added";
    } else {
        echo "Unable To Add Record";
    }
} mysqli_close($con);

?>
<?php
include 'footer.php';
?>