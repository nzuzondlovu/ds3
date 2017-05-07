<?php
$sitename = 'Infinity';
$siteaddress = '';
session_start();

$con = mysqli_connect("localhost","nzuzor1","hohi74Ro", "shop");

function user($type)
{
	$menu = '
	<li>
		<a href="../admin/"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
	</li>
	<li>
		<a href="bookings.php"><i class="fa fa-table fa-fw"></i> View Bookings</a>
	</li>
	<li>
		<a href="cats.php"><i class="fa fa-edit fa-fw"></i> Categories</a>
	</li>
	<li>
		<a href="additem.php"><i class="fa fa-edit fa-fw"></i> Add Product</a>
	</li>
	<li>
		<a href="items.php"><i class="fa fa-table fa-fw"></i> View Products</a>
	</li>
	<li>
		<a href="promo.php"><i class="fa fa-table fa-fw"></i> Promotional Items</a>
	</li>
	<li>
		<a href="update.php"><i class="fa fa-cogs fa-fw"></i> Update Details</a>
	</li>';

	if ($type == 'tech') {
		$menu = 'hello tech';
	} else if ($type == 'clerk') {
		$menu = 'hello clerk';
	}
	
	echo $menu;
}

?>
