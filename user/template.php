    <?php
    include '../admin/functions.php';
    ?>
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <div id="page-wrapper">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-12">
    				<h1 class="page-header">Shopping Cart</h1>
    			</div>
    			<!-- /.col-lg-12 -->
    		</div>
    		<!-- /.row -->
    		<div class="row">
    			<div class="col-lg-12">
    				<div class="pull-right">
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
    			</div>
    			<div class="col-lg-12">
    				<div class="panel panel-default">
    					<div class="panel-heading">
    						List of all orders
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

    							$total = 0;
    							$start_from = ($page-1) * $num_rec_per_page;
    							$sql = "SELECT * FROM cart WHERE user_id ='".$_SESSION['user_id']."' ORDER BY id DESC LIMIT $start_from, $num_rec_per_page";
    							$res = mysqli_query($con, $sql);

    							if (mysqli_num_rows($res) > 0) {
    								echo '
    								<table class="table">
    									<thead>
    										<tr>
    											<th>ID</th>
    											<th>Product ID</th>
    											<th>Name</th>
    											<th>Date</th>
    											<th>Quantity</th>
    											<th>Price</th>
    											<th>Total</th>
    										</tr>
    									</thead>
    									<tbody>';
    										while ($row = mysqli_fetch_assoc($res)) {

    											$tot = $row['price'] * $row['num'];
    											$total = $total + $tot;
    											echo '
    											<tr>
    												<td>'.$row['id'].'</td>
    												<td>'.$row['prod_id'].'</td>
    												<td>'.$row['name'].'</td>
    												<td>'.date("M d, y",strtotime($row['date'])).'</td>
    												<td>'.$row['num'].'</td>
    												<td>R '.$row['price'].'</td>
    												<td>R '.$tot.'</td>
    											</tr>';
    										}
    										echo '    										
    									</tbody>
    								</table>
    								<div class="pull-right">Total : R '.$total.'</div>';
    							} else {
    								echo '<div class="alert alert-info">
    								<button type="button" class="close" data-dismiss="alert">&times;</button>
    								<strong>No bookings found.</strong>
    							</div>';
    						}
    						?>
    					</div>
    					<!-- /.table-responsive -->
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>