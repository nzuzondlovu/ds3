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
		<a href="viewcat.php"><i class="fa fa-edit fa-fw"></i> Categories</a>
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
}

function cart($id, $title, $amount)
{
	$request = array('id'=>$id, 'title'=>$title, 'amount'=>$amount);
	$_SESSION['cart'] .= '
	<li>
		<a href="item.php?id='.$id.'">
			<div>
				'.$title.'
				<span class="pull-right text-muted small">R '.$amount.'</span>
			</div>
		</a>
	</li>
	<li class="divider"></li>';
}

?>
