<?php
$sitename = 'Infinity';
$siteaddress = '';
session_start();
//"localhost","thehewri_main","SzlqF-n,X2m$","thehewri_master"
$con = mysqli_connect("localhost","nzuzor1","hohi74Ro", "shop");

function head($type)
{
	$_SESSION['kind'] = 'Admin';

	if ($type == 'technician') {

		$_SESSION['kind'] = 'Technician';
	} else if ($type == 'clerk') {

		$_SESSION['kind'] = 'Clerk';
	}
}

function user($type)
{
	
	$menu = '
	<li>
		<a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
	</li>
	<li>
		<a href="#"><i class="fa fa-book fa-fw"></i> Bookings<span class="fa arrow"></span></a>
		<ul class="nav nav-second-level">
			<li>
				<a href="bookings.php">View Bookings</a>
			</li>
			<li>
				<a href="quotations.php">View Quotations</a>
			</li>
		</ul>
		<!-- /.nav-second-level -->
	</li>
	<li>
		<a href="#"><i class="fa fa-shopping-basket fa-fw"></i> Products<span class="fa arrow"></span></a>
		<ul class="nav nav-second-level">
			<li>
				<a href="products.php">View Products</a>
			</li>
			<li>
				<a href="categories.php">View Categories</a>
			</li>
			<li>
				<a href="promotions.php">View Promotions</a>
			</li>
			<li>
				<a href="reviews.php">Product Reviews</a>
			</li>
		</ul>
		<!-- /.nav-second-level -->
	</li>
	<li>
		<a href="#"><i class="fa fa-truck fa-fw"></i> Deliveries<span class="fa arrow"></span></a>
		<ul class="nav nav-second-level">
		<li>
		<a href="viewD.php"> View Deliveries</a>
		</li>
		<li>
		<a href="drivers.php"> View Drivers</a>
		</li>
		</ul>
		<!-- /.nav-second-level -->
	</li>
	<li>
		<a href="#"><i class="fa fa-group fa-fw"></i> Customer Sales<span class="fa arrow"></span></a>
		<ul class="nav nav-second-level">
			<li>
				<a href="custIndex.php">Devices to be fixed</a>
			</li>
		</ul>
		<!-- /.nav-second-level -->
	</li>
	
	<li>
		<a href="#"><i class="fa fa-files-o fa-fw"></i> Stock<span class="fa arrow"></span></a>
		<ul class="nav nav-second-level">
			<li>
				<a href="stocktable.php">View Stock</a>
			</li>
			<li>
				<a href="stockgraph.php">View Stock Graph</a>
			</li>
			<li>
				<a href="orders.php">View Orders</a>
			</li>
			<li>
				<a href="suppliers.php">View Suppliers</a>
			</li>
		</ul>
		<!-- /.nav-second-level -->
	</li>


	<li>
		<a href="#"><i class="fa fa-recycle fa-fw"></i>Device Recylce<span class="fa arrow"></span></a>
		<ul class="nav nav-second-level">
			<li>
				<a href="jobs.php">Waitlist</a>
			</li>
			<li>
				<a href="createsale.php">Recycle Sales</a>
			</li>
				
				<li>
				<a href="allocated.php">Allocated</a>
			</li>		
		
		</ul>
		<!-- /.nav-second-level -->
	</li>
	<li>
		<a href="#"><i class="fa fa-money fa-fw"></i> Cash Flow<span class="fa arrow"></span></a>
		<ul class="nav nav-second-level">
			<li>
				<a href="#">Cart <span class="fa arrow"></span></a>
				<ul class="nav nav-third-level">
					<li>
						<a href="cart.php">Table</a>
					</li>
					<li>
						<a href="cartgraph.php">Bar Graph</a>
					</li>
				</ul>
				<!-- /.nav-third-level -->
			</li>
			<li>
				<a href="#">Expenses <span class="fa arrow"></span></a>
				<ul class="nav nav-third-level">
					<li>
						<a href="expense.php">Table</a>
					</li>
					<li>
						<a href="expensegraph.php">Pie Chart</a>
					</li>
				</ul>
				<!-- /.nav-third-level -->
			</li>
			<li>
				<a href="#">Salaries <span class="fa arrow"></span></a>
				<ul class="nav nav-third-level">
					<li>
						<a href="salary.php">Table</a>
					</li>
					<li>
						<a href="salarychart.php">Bar Graph</a>
					</li>
				</ul>
				<!-- /.nav-third-level -->
			</li>
		</ul>
		<!-- /.nav-second-level -->
	</li>
	<li>
		<a href="users.php"><i class="fa fa-table fa-fw"></i> List All Users</a>
	</li>
	<li>
		<a href="update.php"><i class="fa fa-user fa-fw"></i> Update Details</a>
	</li>
	<li>
			<a href="../../index.php"><i class="fa fa-cogs fa-fw"></i>Customer Devices</a>
		</li>
		<li>
			<a href="../../techallocate.php"><i class="fa fa-cogs fa-fw"></i>Insert customer Info</a>
		</li>
		<li>
			<a href="../../createCustomer.php"><i class="fa fa-cogs fa-fw"></i>Customer Devices</a>
		</li>
		<li>
			<a href="../../techallocate.php"><i class="fa fa-cogs fa-fw"></i> Allocate to technician</a>
		</li>
		<li>
			<a href="../../view.php"><i class="fa fa-cogs fa-fw"></i> Repair Meterial</a>
		</li>
		<li>
			<a href="../../create.php"><i class="fa fa-cogs fa-fw"></i> Create Order</a>
		</li>';

	if ($type == 'technician') {

		$menu = '
		<li>
			<a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
		</li>	
		<li>
			<a href="bookings.php"><i class="fa fa-table fa-fw"></i> Create Quotation</a>
		</li>
		<li>
			<a href="viewquot.php"><i class="fa fa-table fa-fw"></i> View Quotation</a>
		</li>	
		<li>
			<a href="items.php"><i class="fa fa-edit fa-fw"></i> Products</a>		
		</li>
		<li>
			<a href="update.php"><i class="fa fa-cogs fa-fw"></i> Update Details</a>
		</li>
		<li>
			<a href="../../techallocate.php"><i class="fa fa-cogs fa-fw"></i> Allocate to technician</a>
		</li>';
	} else if ($type == 'clerk') {

		$menu = '
		<li>
			<a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
		</li>
		<li>
			<a href="bookings.php"><i class="fa fa-edit fa-fw"></i> Bookings</a>
		</li>
		<li>
			<a href="addTech.php"><i class="fa fa-edit fa-fw"></i> Add Technician</a>
		</li>
		<li>
			<a href="viewtech.php"><i class="fa fa-edit fa-fw"></i> View Technicians</a>
		</li>
		<li>
		<a href="viewD.php"><i class="fa fa-edit fa-fw"></i>Deliveries</a>
		</li>
		<li>
		<a href="drivers.php"><i class="fa fa-edit fa-fw"></i>Drivers</a>
		</li>
		<li>
			<a href="quotation.php"><i class="fa fa-table fa-fw"></i> Create Quotation</a>
		</li>
		<li>
			<a href="viewquot.php"><i class="fa fa-table fa-fw"></i> View Quotation</a>
		</li>
		<li>
			<a href="items.php"><i class="fa fa-edit fa-fw"></i> Products</a>
		</li>
		<li>
			<a href="update.php"><i class="fa fa-cogs fa-fw"></i> Update Details</a>
		</li>
		<li>
			<a href="../../index.php"><i class="fa fa-cogs fa-fw"></i>Customer Devices</a>
		</li>
		<li>
			<a href="../../techallocate.php"><i class="fa fa-cogs fa-fw"></i>Insert customer Info</a>
		</li>
		<li>
			<a href="../../createCustomer.php"><i class="fa fa-cogs fa-fw"></i>Customer Devices</a>
		</li>
		<li>
			<a href="../../techallocate.php"><i class="fa fa-cogs fa-fw"></i> Allocate to technician</a>
		</li>
		<li>
			<a href="../../view.php"><i class="fa fa-cogs fa-fw"></i> Repair Meterial</a>
		</li>
		<li>
			<a href="../../create.php"><i class="fa fa-cogs fa-fw"></i> Create Order</a>
		</li>';
	}
	
	echo $menu;
}

function upload($url, $target_dir, $target_file, $sql, $con)
{
	@mkdir("../uploads/");
	$uploadOk = 1;

	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

// Check if file already exists
	if (file_exists($target_file)) {
		$a = 1;
		for ($i=0; $i < $a; $i++) {
			$target_file = $target_dir.$a.basename($_FILES["fileToUpload"]["name"]);
			if (file_exists($target_file)) {
				$a++;
			} else {
				$i = $a;
				$url = $a.basename($_FILES["fileToUpload"]["name"]);
			}
		}
	}
// Check file size
	if ($_FILES["fileToUpload"]["size"] > 2000000) {
		$_SESSION['failure'] = "Sorry, your file is too large.";
		$uploadOk = 0;
	}
// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		$_SESSION['failure'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	$uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	$_SESSION['failure'] .= "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
} else {
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		
		mysqli_query($con,$sql);
		$_SESSION['success'] = "The file <b>".$url. "</b> has been uploaded.";
	} else {
		$_SESSION['failure'] = "Sorry, there was an error uploading your file.";
	}
}
}

function catagory($con)
{

	$sql = "SELECT * FROM category ORDER BY name ASC";
	$res = mysqli_query($con, $sql);

	if (mysqli_num_rows($res) > 0) {

		while ($row = mysqli_fetch_assoc($res)) {

			echo '<a href="?cat='.$row['name'].'" class="list-group-item">'.$row['name'].'</a>';
		}
	}
}

function pagination($con, $sql, $num_rec_per_page, $page)
{
	$rs_result = mysqli_query($con, $sql); 
	$total_records = mysqli_num_rows($rs_result);  
	$total_pages = ceil($total_records / $num_rec_per_page);

	if ($total_pages == 0) {
		$total_pages = 1;
	} else {
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
	}
	
}

function cart($id, $title, $price, $quantity, $con)
{
	$date = date("Y-m-d H:i:s");

	if (isset($_SESSION['user_id'])) {

		$sql = "SELECT * FROM cart WHERE user_id='".$_SESSION['user_id']."' AND prod_id='".$id."'";
		$res = mysqli_query($con, $sql);
		$tot = mysqli_num_rows($res);

		if ($tot > 1) {
			echo $sql = "UPDATE cart SET num=num+'".$quantity."'";
			//mysqli_query($con, $sql);
		} else {
			$sql = "INSERT INTO cart(user_id, prod_id, name, price, num, date)
			VALUES('".$_SESSION['user_id']."', '".$id."', '".$title."', '".$price."', '".$quantity."', '".$date."')";
			mysqli_query($con, $sql);
		}

		$sql = "SELECT * FROM cart WHERE user_id='".$_SESSION['user_id']."' ORDER BY prod_id";
		$res = mysqli_query($con, $sql);

		if (mysqli_num_rows($res) > 0) {

			while ($row = mysqli_fetch_assoc($res)) {
				$_SESSION['cart'] .= '
				<li>
					<a href="item.php?id='.$id.'">
						<div>
							'.$row['name'].'
							<span class="pull-right text-muted small">R '.$row['price'].'</span>
						</div>
					</a>
				</li>
				<li class="divider"></li>';
			}
		}
		
	} else {

		$sql = "INSERT INTO cart(user_id, prod_id, name, price, num, date)
		VALUES('', '".$id."', '".$title."', '".$price."', '".$quantity."', '".$date."')";
		mysqli_query($con, $sql);
		$_SESSION['pDate'] = $date;
		header('Location: login.php?id='.$id);
	}
	
}

function indexCount($con, $sql)
{
	$rs_result = mysqli_query($con, $sql);
	$num = mysqli_num_rows($rs_result);
	if ($num < 0) {
		$num = 0;
	}
	echo $num;
}

?>
