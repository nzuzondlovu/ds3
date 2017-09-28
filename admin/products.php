

<?php
ob_start();
include '../includes/functions.php';
?>

<?php
if(isset($_SESSION['key']) == '' ) {
	header("location:../login.php");
}
?>




<script>
function sum() {
            var txtFirstNumberValue = document.getElementById('txt1').value;
            var txtSecondNumberValue = document.getElementById('txt2').value;
            var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt3').value = result;
				
            }
			
			 var txtFirstNumberValue = document.getElementById('txt11').value;
            var result = parseInt(txtFirstNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt22').value = result;				
            }
			
			 var txtFirstNumberValue = document.getElementById('txt11').value;
            var txtSecondNumberValue = document.getElementById('txt33').value;
            var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt55').value = result;
				
            }
			
			 var txtFirstNumberValue = document.getElementById('txt4').value;
			 var result = parseInt(txtFirstNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt5').value = result;
				}
			
        }
</script>
<?php




if(isset($_POST['btnPromo'])) {
	$price = mysqli_real_escape_string($con, strip_tags(trim($_POST["price"])));
	$start = mysqli_real_escape_string($con, strip_tags(trim($_POST["start"])));
	$end = mysqli_real_escape_string($con, strip_tags(trim($_POST["end"])));
	$date = date("Y-m-d");
	$id = mysqli_real_escape_string($con, strip_tags(trim($_POST["id"])));
	
	if($price != '' && $start != '' && $end != '') {

		if ($start < $date) {
			$_SESSION['failure'] = 'Entered start date has past already.';

		} else if ($end > $start) {

	 $sql = " UPDATE product SET promo_price='".$price."', promo_date1='".$start."', promo_date2='".$end."' WHERE id='".$id."'";
			mysqli_query($con, $sql);
			$_SESSION['success'] = 'Your new Promotional Product was added successfully.';
			header("Location: products.php");
		} else {
			$_SESSION['failure'] = 'Entered end date has past already.';
		}		
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
                <h1 class="page-header">Products</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>






        <div class="col-lg-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Products</a></li>
              <li><a href="#timeline" data-toggle="tab">Catergories</a></li>
              <li><a href="#settings" data-toggle="tab">Promotional</a></li>
         
              <li><a href="#devices" data-toggle="tab">Reviews</a></li>
              <li><a href="payments" data-toggle="tab">Payments</a></li>
              
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
              
                  <!-- /.user-block -->
                
                 
                     <div class="row">
            <div class="col-lg-12">




		<div class="row">
			<div class="col-lg-8">
				<h1 class="page-header" align="center">



<?php

if(isset($_POST['btnSubmit']))
 {

$archive=0;
$promo_price=0;
 	$promo_date1 = date("Y-m-d H:i:s");
	$name = mysqli_real_escape_string($con, strip_tags(trim($_POST["name"])));
	$type = mysqli_real_escape_string($con, strip_tags(trim($_POST["type"])));
	$description = mysqli_real_escape_string($con, strip_tags(trim($_POST["description"])));
	$price = mysqli_real_escape_string($con, strip_tags(trim($_POST["price"])));
	$brandname = mysqli_real_escape_string($con, strip_tags(trim($_POST["brandname"])));
	$supplier = mysqli_real_escape_string($con, strip_tags(trim($_POST["supplier"])));
	$oPrice = mysqli_real_escape_string($con, strip_tags(trim($_POST["oPrice"])));
	$profit = mysqli_real_escape_string($con, strip_tags(trim($_POST["profit"])));
		$onhand_qty  = mysqli_real_escape_string($con, strip_tags(trim($_POST["profit"])));
	$qty = mysqli_real_escape_string($con, strip_tags(trim($_POST["qty"])));
	 	$promo_date2 =date("Y-m-d H:i:s");






	$target_dir = "../uploads/";
	$url = basename( $_FILES["fileToUpload"]["name"]);
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$user = $_SESSION['user_id'];
	$date = date("Y-m-d H:i:s");

/*INSERT INTO `product`(`id`, `user`, `name`, `description`, `type`, `price`, `promo_price`, `pic_url`, `date`, `promo_date1`, `promo_date2`, `archive`, `onhand_qty`, `qty`, `qty_sold`, `supplier`, `brandname`, `oPrice`, `profit`, `brand_name`, `generic_name`, `supplierID`, `order_price`, `barcode`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14],[value-15],[value-16],[value-17],[value-18],[value-19],[value-20],[value-21],[value-22],[value-23],[value-24])


*/	 $sql = "INSERT INTO product(user, name, description, type, price, pic_url, date,onhand_qty,qty,supplier,brandname,oPrice,profit,promo_price,promo_date1,promo_date2,archive)


	VALUES('$user', '$name', '$description', '$type', '$price', '$url', '$date','$onhand_qty','$qty','$supplier', '$brandname', 
	 '$oPrice', '$profit','$promo_price','$promo_date1','$promo_date2','$archive')";


	     mysqli_query($con, $sql);

	          $_SESSION['success'] = 'Your new driver was added successfully.';
        header("Location: products.php");
	upload($url, $target_dir, $target_file, $sql, $con);



}
?>

<?php
if(isset($_GET['id']) && $_GET['id'] != '') {

	$id = mysqli_real_escape_string($con, strip_tags(trim($_GET['id'])));

	if ($id) {
		$sql = "UPDATE product SET archive=1 WHERE id='".$id."'";
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'Product was archived successfully.';
	} else {
		$_SESSION['failure'] = 'An error occured, please try again.';
	}	
}
?>




			<?php 
				include('connect.php');
				$result = $db->prepare("SELECT * FROM product ORDER BY qty_sold DESC");
				$result->execute();
				$rowcount = $result->rowcount();
			?>
			
			<?php 
				include('connect.php');
				$result = $db->prepare("SELECT * FROM product where qty < 10 ORDER BY id DESC");
				$result->execute();
				$rowcount123 = $result->rowcount();

			?>


				<div style="text-align:center;">
			Total Number of Products:  <font color="green" style="font:bold 22px 'Aleo';">[<?php echo $rowcount;?>]</font>
			</div>
			
			<div style="text-align:center;">
			<font style="color:rgb(255, 95, 66);; font:bold 22px 'Aleo';">[<?php echo $rowcount123;?>]</font> Products are below QTY of 10 
			</div>

				</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->

		<!-- Modal -->
		<div class="modal fade" id="addItem" tabindex="-1" role="dialog" aria-labelledby="addItemLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span> Close</button>
						<h4 class="modal-title" id="addItemLabel">Add Product</h4>
					</div>
					<div class="modal-body">
						<form role="form" method="post" enctype="multipart/form-data">
						

								<div class="form-group">
								<label>Brand Name</label>
								<input name="brandname" class="form-control" placeholder="Enter text">
							</div>

								<div class="form-group">
								<label>Generic Name</label>
								<input name="name" class="form-control" placeholder="Enter text">

							</div>


							<div class="form-group">
								<label>Selling Price</label>
							
								<input class="form-control" type="text" id="txt1" name="price" onkeyup="sum();" Required placeholder="R0.00">
							</div>
							<div class="form-group">
								<label>Original Price</label>
								<input class="form-control"  type="text" id="txt2"  name="oPrice" onkeyup="sum();" Required placeholder="R0.00">
							</div>
					
						
							<div class="form-group">
								<label>Profit</label>	
										<input type="text" id="txt3" class="form-control" name="profit" readonly>		
						


							</div>

							

								<div class="form-group">
								<label>Quantity</label>
								<input type="number" name="qty" class="form-control" placeholder="Enter text">
							</div>

							<div class="form-group">
								<label>Select Catagory</label>
								<select name="type" class="form-control">
									<option value="" selected="selected">Select type</option>
									<?php
									$sql = "SELECT * FROM category ORDER BY name ASC";
									$res = mysqli_query($con, $sql);

									if(mysqli_num_rows($res) > 0) {
										while($row = mysqli_fetch_assoc($res)) {
											echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
										}
									}
									?>
								</select>
							</div>

								<div class="form-group">
								<label>Select Supplier</label>
								<select name="supplier" class="form-control">
									<option value="" selected="selected">Select Supplier</option>
									<?php
									$sql = "SELECT * FROM suppliers ORDER BY name ASC";
									$res = mysqli_query($con, $sql);

									if(mysqli_num_rows($res) > 0) {
										while($row = mysqli_fetch_assoc($res)) {
											echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
										}
									}
									?>
								</select>
							</div>
						
							<div class="form-group">
								<label>Upload picture</label>
								<input type="file" name="fileToUpload">
							</div>
							<div class="form-group">
								<label>Device description</label>
								<textarea name="description" class="form-control" rows="3"></textarea>
							</div>
							<button name="btnSubmit" type="submit" class="btn btn-primary">Save </button>
							<button type="reset" class="btn btn-default">Reset</button>
						</form>
					</div>
				</div>
			</div>
		</div>













		<!-- /.Modal -->

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
		
					</div>
					<!-- /.panel-heading -->

						<div class="row">
							<div class="col-lg-12">
								<div class="pull-right">
								    <div class="input-group input-group-sm" >
                  

                  <div class="input-group-btn">
                    <button  class="btn btn-default"  data-toggle="modal" data-target="#addItem"><i class="fa fa-th"></i></button>

                    	<button class="btn btn-success" data-toggle="modal" data-target="#addItem"> Add Product</button>

                  </div>
                </div>
								</div>
							</div>
						</div>
						<div class="table-responsive">					 <div class="row">
        <div class="col-xs-12">

          <div class="box">

            <div class="box-header">
        

              <div class="box-tools">
            
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">

							<?php

							$sql = "SELECT * FROM product WHERE archive = 0";
							$res = mysqli_query($con, $sql);

							if (mysqli_num_rows($res) > 0) {
								echo '
								<table id="products"  class="table table-bordered table-hover">
									<thead>
										<tr>
										
											<th>Name</th>
											
											<th>type</th>
											<th>Price</th>
										
											<th>Date</th>
											<th>Promo
											  	
										</tr>
									</thead>
									<tbody>';
										while ($row = mysqli_fetch_assoc($res)) {

											$button = '<a onclick="promoModal('.$row['id'].')" class="label label-primary">Make Promo</a>   <a onclick="productModal('.$row['id'].')"  class="label label-info">Edit</a>';
											
											if ($row['promo_price'] > 0) {



												$button = '<a onclick="promoModal('.$row['id'].')"  class="label label-info">Edit Promo</a>   <a onclick="productModal('.$row['id'].')"  class="label label-primary">Edit</a>';


											}

											echo '
											<tr>
									
												<td>'.$row['name'].'</td>
											
												<td>'.$row['type'].'</td>
												<td>'.$row['price'].'</td>
										
												<td>'.date("M d, y",strtotime($row['date'])).'</td>
												<td>'.$button.'   <a href="?id='.$row['id'].'" class="label label-warning">Archive</a></td>
											</tr>';
										}
										echo '
									</tbody>
								</table>';
							} else {
								echo '<div class="alert alert-info">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>No products found.</strong>
							</div>';
						}
						?>

					</div>
					<!-- /.table-responsive -->
			
			<!-- /.panel -->
		</div>

            </div>
            <!-- /.panel -->
        </div>
    </div>
                        <!-- /.row (nested) -->
               
                    <!-- /.panel-body -->
             
                  </p>
    
                </div>
                <!-- /.post -->

           
                <!-- /.post -->

      
                <!-- /.post -->
         
              </div>












              </div>

              </div>
<script>
    $(document).ready(function(){
        $('#products').DataTable();
    });
</script>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->


<?php
if(isset($_SESSION['key']) == '' ) {
	header("location:../login.php");
}
?>

<?php

if(isset($_POST['btnCat'])) {

	$name = mysqli_real_escape_string($con, strip_tags(trim($_POST["name"])));
	$type = mysqli_real_escape_string($con, strip_tags(trim($_POST["type"])));
	$description = mysqli_real_escape_string($con, strip_tags(trim($_POST["description"])));
	$date = date("Y-m-d H:i:s");
	$archive =0;



	if($name != '' && $type != '' && $description != '') {

	 $sql = "INSERT INTO category(name, type, description, dateCreated,archive)
		VALUES('".$name."', '".$type."','".$description."' , '".$date."', '".$archive."')";
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'Your new category was added successfully.';
		header("Location: products.php");
		//Location: /dns/dns_soa_edit.php?id={$zone_id}
	}else {
		$_SESSION['failure'] = 'Please fill in all fields.';
	}
}
?>

<?php
if(isset($_GET['id']) && $_GET['id'] != '') {

	$id = mysqli_real_escape_string($con, strip_tags(trim($_GET['id'])));

	if ($id) {
		$sql = "UPDATE category SET archive=1 WHERE id='".$id."'";
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'Category was archived successfully.';
	} else {
		$_SESSION['failure'] = 'An error occured, please try again.';
	}
	
	
}
?>



<!-- Page Content -->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Categories</h1>				
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<!-- /.row -->

		<!-- Modal -->
		<div class="modal fade" id="addCat" tabindex="-1" role="dialog" aria-labelledby="addCatLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span> Close</button>
						<h4 class="modal-title" id="addCatLabel">Add Category</h4>
					</div>
					<div class="modal-body">
						<form role="form" method="post">
							<div class="form-group">
								<label>Category name</label>
								<input name="name" class="form-control" placeholder="Enter name">
							</div>
							<div class="form-group">
								<label>Category type</label>
								<select name="type" class="form-control">
									<option value="" selected="selected">Select type</option>
									<option value="Hardware" >Hardware</option>
									<option value="Software" >Software</option>
								</select>
							</div>
							<div class="form-group">
								<label>Category description</label>
								<textarea name="description" class="form-control" rows="3"></textarea>
							</div>
							<button name="btnCat" type="submit" class="btn btn-primary">Submit Category</button>
							<button type="reset" class="btn btn-default">Reset Category</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /.Modal -->

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
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
			
					<div class="panel-heading">
					

						<div class="row">
							<div class="col-lg-12">
								<div class="pull-right">
								    <div class="input-group input-group-sm" >
                  

                  <div class="input-group-btn">
                    <button  class="btn btn-default"  data-toggle="modal" data-target="#addItem"><i class="fa fa-th"></i></button>
	<button class="btn btn-success" data-toggle="modal" data-target="#addCat"> Add Category</button>

                  </div>
                </div>
								</div>
							</div>
						</div>
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
					
						<div class="table-responsive">
							<?php

							$sql = "SELECT * FROM category WHERE archive = 0";
							$res = mysqli_query($con, $sql);

							if (mysqli_num_rows($res) > 0) {
								echo '								
								<table id="category" class="table table-bordered table-hover">
									<thead>
										<tr>
									
											<th>Name</th>
											<th>Type</th>
											<th>Description</th>
											<th>Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>';
										while ($row = mysqli_fetch_assoc($res)) {

											echo '
											<tr>
											
												<td>'.$row['name'].'</td>
												<td>'.$row['type'].'</td>
												<td>'.$row['description'].'</td>
												<td>'.date("M d, y",strtotime($row['dateCreated'])).'</td>
												<td class="pull-right">
													<a href="editcat.php?id='.$row['id'].'" class="label label-primary">Edit </a>  
													<a href="?id='.$row['id'].'" class="label label-warning">Archive </a>
												</td>
											</tr>';
										}
										echo '
									</tbody>
								</table>';
							} else {
								echo '<div class="alert alert-info">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>No categories found.</strong>
							</div>';
						}
						?>
					</div>
					<!-- /.table-responsive -->
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>


<!-- /#page-wrapper -->


<script>
	$(document).ready(function(){
		$('#category').DataTable();
	});
</script>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">


<?php
if(isset($_SESSION['key']) == '' ) {
	header("location:../login.php");
}
?>



<?php
 



if(isset($_POST['btnPromo'])) {
	$price = mysqli_real_escape_string($con, strip_tags(trim($_POST["price"])));
	$start = mysqli_real_escape_string($con, strip_tags(trim($_POST["start"])));
	$end = mysqli_real_escape_string($con, strip_tags(trim($_POST["end"])));
	$date = date("Y-m-d");
	$id = mysqli_real_escape_string($con, strip_tags(trim($_POST["id"])));
	
	if($price != '' && $start != '' && $end != '') {

		if ($start < $date) {
			$_SESSION['failure'] = 'Entered start date has past already.';

		} else if ($end > $start) {

			echo 	$sql = "UPDATE product SET promo_price='".$price."', promo_date1='".$start."', promo_date2='".$end."' WHERE id='".$id."'";
			//mysqli_query($con, $sql);
			//$_SESSION['success'] = 'Your new Promotional Product was added successfully.';
			//header("Location: promotions.php");
		} else {
			$_SESSION['failure'] = 'Entered end date has past already.';
		}		
	}else {
		$_SESSION['failure'] = 'Please fill in all fields.';
	}
}
?>
<!-- Page Content -->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Promotional Products</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						List of all promotional products
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
					<div class="row">
						


						</div>
						<div class="table-responsive">
							<?php
							
							$sql = "SELECT * FROM product WHERE promo_price > 0 AND archive = 0";
							$res = mysqli_query($con, $sql);

							if (mysqli_num_rows($res) > 0) {
								echo '
								<table id="promo" class="table">
									<thead>
										<tr>
										
											
											<th>Details</th>
											<th>Promo Price</th>
											<th>Promo Dates</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>';
										while ($row = mysqli_fetch_assoc($res)) {

											$details = $row['name'].'<br>'.$row['type'].'<br> R '.$row['price'];

											$dates = date("M d, y",strtotime($row['promo_date1'])).' - '.date("M d, y",strtotime($row['promo_date2']));
											echo '
											<tr>
											
												<td>'.$details.'</td>
												<td> R '.$row['promo_price'].'</td>
												<td>'.$dates.'</td>
											
												<td><a onclick="promoModal('.$row['id'].')"  class="label label-info">Edit Promo</a></td>
											</tr>';
										}
										echo '
									</tbody>
								</table>';
							} else {
								echo '<div class="alert alert-info">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>No products found.</strong>
							</div>';
						}
						?>
					</div>
					<!-- /.table-responsive -->
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
	</div>

<script>
	$(document).ready(function(){
		$('#promo').DataTable();
	});
</script>
              </div>
             
                    <div class="tab-pane" id="devices">




<?php
if(isset($_SESSION['key']) == '' ) {
	header("location:../login.php");
}
?>

<?php
if(isset($_GET['id']) && $_GET['id'] != '') {

	$id = mysqli_real_escape_string($con, strip_tags(trim($_GET['id'])));
	$sql = "UPDATE review SET seen=1 WHERE id='".$id."'";
	$res = mysqli_query($con, $sql);
}
?>

<?php
if(isset($_GET['ar']) && $_GET['ar'] != '') {

	$ar = mysqli_real_escape_string($con, strip_tags(trim($_GET['ar'])));

	if ($ar) {
		$sql = "UPDATE review SET archive=1 WHERE id='".$ar."'";
		mysqli_query($con, $sql);
		$_SESSION['success'] = 'Booking was archived successfully.';
	} else {
		$_SESSION['failure'] = 'An error occured, please try again.';
	}	
}
?>




		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Reviews</h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
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
				<div class="panel panel-default">
					<div class="panel-heading">
						List of all product reviews
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div class="table-responsive">
							<?php

							$sql = "SELECT * FROM review WHERE archive = 0";
							$res = mysqli_query($con, $sql);

							if (mysqli_num_rows($res) > 0) {
								echo '
								<table id="review" class="table data-table">
									<thead>
										<tr>
										
											<th>Product</th>
											<th>User ID</th>
											<th>Name</th>
											<th>Message</th>
											<th>Rating</th>
											<th>Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>';
										while ($row = mysqli_fetch_assoc($res)) {

											$prodD = '';
											$button = '';

											$sql2 = "SELECT * FROM product WHERE id='".$row['prod_id']."'";
											$res2 = mysqli_query($con, $sql2);
											if (mysqli_num_rows($res2) > 0) {
												while ($row2 = mysqli_fetch_assoc($res2)) {
													$prodD = 'Name: '.$row2['name'].'<br>Type: '.$row2['type'].'<br>Price: R '.$row2['price'].'<br>Description: '.$row2['description'];
												}
											}else {
												$prodD = 'Product does not exist!';
											}

											if ($row['seen'] == 0) {
												$button = '<a href="?id='.$row['id'].'" class="btn btn-primary">Mark as Seen</a>';
											}

											echo '
											<tr>
												
												<td>'.$prodD.'</td>
												<td>'.$row['user'].'</td>
												<td>'.$row['name'].'</td>
												<td>'.$row['message'].'</td>
												<td>'.$row['rate'].'</td>
												<td>'.date("M d, y",strtotime($row['date'])).'</td>
												<td class="pull-right">'.$button.'  <a href="?ar='.$row['id'].'" class="btn btn-warning">Archive</a></td>
											</tr>';
										}
										echo '
									</tbody>
								</table>';
							} else {
								echo '<div class="alert alert-info">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>No products found.</strong>
							</div>';
						}
					?>
				</div>
				<!-- /.table-responsive -->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
</div>

<!-- /#page-wrapper -->


<script>
	$(document).ready(function(){
		$('#review').DataTable();
	});
</script>
                <!-- Post --></div>
                    <div class="active tab-pane" id="payments">
                <!-- Post --></div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
        <!-- /.row -->

</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php
include 'footer.php';
?>
<script>
    function modal(id) {
        var data = {"id" : id};
        jQuery.ajax({
            url : '../includes/createquotemodal.php',
            method : "post",
            data : data,
            success : function(data) {
                jQuery('body').append(data);
                jQuery('#responseModal').modal('toggle');
            },
            error : function() {
                alert("Ooops! Something went wrong!");
            }
        });
    }
</script>
<script>
    function modal1(id) {
        var data = {"id" : id};
        jQuery.ajax({
            url : '../includes/editquotemodal.php',
            method : "post",
            data : data,
            success : function(data) {
                jQuery('body').append(data);
                jQuery('#responseModal').modal('toggle');
            },
            error : function() {
                alert("Ooops! Something went wrong!");
            }
        });
    }
</script>
<script>
    $(document).ready(function(){
        $('#bookings').DataTable();
    });
</script>

<script>
    function promoModal(id) {
        var data = {"id" : id};
        jQuery.ajax({
            url : '../includes/editpromomodal.php',
            method : "post",
            data : data,
            success : function(data) {
                jQuery('body').append(data);
                jQuery('#responseModal').modal('toggle');
            },
            error : function() {
                alert("Ooops! Something went wrong!");
            }
        });
    }
</script>

<script>
    function productModal(id) {
        var data = {"id" : id};
        jQuery.ajax({
            url : '../includes/editproductmodal.php',
            method : "post",
            data : data,
            success : function(data) {
                jQuery('body').append(data);
                jQuery('#responseModal').modal('toggle');
            },
            error : function() {
                alert("Ooops! Something went wrong!");
            }
        });
    }
</script>


	<!-- DataTables -->
	<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>




            <script>
  $(function () {
    $('#products').DataTable()

  })
</script>