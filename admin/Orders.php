<?php
ob_start();
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
				<h1 class="page-header">Orders</h1>
					
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">                      
                                <form action="Orders.php" role="form" method="post">
                                    <div class="form-group">
                                        <label>OrderID</label><br/>
										<td class="sidebar-search">
                           					 <label><div class="input-group custom-search-form">
              <input type="text" name="orde" class="form-control" placeholder="" value="">
            
												<span class="input-group-btn">
                                    	<button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i><label>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                                    </div>
                                   
      <button  type="submit" name="search"  class="btn btn-primary">Search</button>
      <button  type="submit" name="delete"  class="btn btn-primary">Cancel</button>
      
      	<?php
									if(isset($_POST['search']))
									{
										$name='';
										$name = mysqli_real_escape_string($con, strip_tags(trim($_POST['orde'])));

										$query="SELECT * FROM orders WHERE OrderID=$name";

										$result =mysqli_query($con,$query);

										if(mysqli_num_rows($result)> 0) {

											echo '
											<table class="table">
												<thead>
													<tr>
																<th>OrderID</th>
																<th>SupplierID</th>
																<th>SupplierName</th>
																<th>OrderDate</th>
																<th>Product</th>
																<th>Quantity</th>
																<th>Email</th>											
																<th>Total Price</th>		
													</tr>
												</thead>
												<tbody>';
													while ($row=mysqli_fetch_array($result)) {
													$button = '';
													$button1 = '';
							if ($row['OrderID'] != 0) {
							 		$button1 = '<a href="Orders.php?id='.$row['OrderID'].'" class="btn btn-primary">Update</a>';
									$button = '<a href="Orders.php?id='.$row['OrderID'].'"class="btn btn-primary">Cancel</a>';
									
											}

														echo '
														<tr>
																	<td>'.$row['OrderID'].'</td>
																	<td>'.$row['SupplierID'].'</td>
																	<td>'.$row['SupplierName'].'</td>
																	<td>'.$row['OrderDate'].'</td>	
																	<td>'.$row['Quantity'].'</td>											
																	<td>'.$row['productName'].'</td>
																	<td>'.$row['Email'].'</td>	
																	<td>'.$row['TotalPrice'].'</td>									
																																			
														</tr>';
													}

													echo '
												</tbody>
											</table>';
										} else {
											echo " Order Not Found";
										}	
									}

									?>
										<?php
									if(isset($_POST['delete']))
									{
										$name='';
										$name = mysqli_real_escape_string($con, strip_tags(trim($_POST['orde'])));

										$query="DELETE FROM orders WHERE OrderID=$name";

										$result =mysqli_query($con,$query);

									

											echo '
											<table class="table">
												<thead>
													
												</thead>
												<tbody>';
												

													echo '
												</tbody>
											</table>';

									}

									?>
      
      
      
					</div>					
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div class="table-responsive">
						
						
						
							<?php
							$num_rec_per_page=10;

							if (isset($_GET["page"])) {

								$page  = $_GET["page"];
							} else {

								$page=1;
							}					
							
							

							$start_from = ($page-1) * $num_rec_per_page;
							$sql = "SELECT * FROM orders ORDER BY OrderID DESC LIMIT $start_from, $num_rec_per_page";
							$res = mysqli_query($con, $sql);

							if (mysqli_num_rows($res) > 0) {
								echo '
								<table class="table">
									<thead>
										<tr>
											<th>OrderID</th>
											<th>SupplierID</th>
											<th>SupplierName</th>
											<th>OrderDate</th>
											<th>Product</th>
											<th>Quantity</th>
											<th>Email</th>											
											<th>Total Price</th>
																														
										</tr>
									</thead>
									<tbody>';
										while ($row = mysqli_fetch_assoc($res)) {

											$button = '';
											$button1 = '';
							if ($row['OrderID'] != 0) {
							 		$button1 = '<a href="makeOrder.php?id='.$row['OrderID'].'" class="btn btn-primary">Update</a>';
									$button = '<a href="Orders.php?id='.$row['OrderID'].'" class="btn btn-primary">Cancel</a>';
									
											}

											echo '
											<tr>
												<td>'.$row['OrderID'].'</td>
												<td>'.$row['SupplierID'].'</td>
												<td>'.$row['SupplierName'].'</td>
												<td>'.$row['OrderDate'].'</td>	
												<td>'.$row['Quantity'].'</td>											
												<td>'.$row['productName'].'</td>
												<td>'.$row['Email'].'</td>	
												<td>R'.$row['TotalPrice'].'</td>						
											</tr>';
											

										}
										echo '
									</tbody>
								</table>';
							} else {
								echo '<div class="alert alert-info">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>No Orders found.</strong>
							</div>';
						}
						

						$sql = "SELECT * FROM orders";
						$rs_result = mysqli_query($con, $sql); 
						$total_records = mysqli_num_rows($rs_result);  
						$total_pages = ceil($total_records / $num_rec_per_page);

						if ($total_pages == 0) {
							$total_pages = 1;
						}

						echo '
					</div>
					<div class="col-lg-12">
						<p align="center">
						<a class="btn btn-primary" href="?page=1">'."|<".'</a> '; 

							if ($page < 4) {
								for ($i=1; $i<$page; $i++) {
									echo '<a class="btn btn-primary" href="?page='.$i.'">'.$i.'</a> ';
								};
							} else {
								for ($i=($page-3); $i<$page; $i++) {
									echo '<a class="btn btn-primary" href="?page='.$i.'">'.$i.'</a> ';
								};
							}
							echo '<a class="btn btn-default" href="?page='.$page.'">'.$page.'</a> ';

							if ($page >= ($total_pages - 3)) {
								for ($i=($page+1); $i<=($total_pages); $i++) {
									echo '<a class="btn btn-primary" href="?page='.$i.'">'.$i.'</a> ';
								};
							} else {
								for ($i=($page+1); $i<=($page+3); $i++) {
									echo '<a class="btn btn-primary" href="?page='.$i.'">'.$i.'</a> ';
								};
							}

							echo '
							<a class="btn btn-primary" href="?page='.$total_pages.'">'.">|".'</a>
						</p>
					</div>';
					?>
					
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