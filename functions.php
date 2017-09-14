<?php
$sitename = 'Infinity';
$siteaddress = '';
session_start();

$con = mysqli_connect("localhost","root","", "shop");



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
		<a href="query.php"><i class="fa fa-table fa-fw"></i>query</a>
	</li>
	<li>
		<a href="feedback.php"><i class="fa fa-edit fa-fw"></i> Feedback</a>
	</li>
	<li>
		<a href="update.php"><i class="fa fa-cogs fa-fw"></i> Update Details</a>
	</li>';

	if ($type == 'tech') {
		$menu = '<li>
		<a href="bookings.php"><i class="fa fa-table fa-fw"></i> View Bookings</a>
	</li>
	<li>
		<a href="cats.php"><i class="fa fa-edit fa-fw"></i> Categories</a>
	</li>
	<li>
		<a href="additem.php"><i class="fa fa-edit fa-fw"></i> Add Product</a>
	</li>';
	} else if ($type == 'clerk') {
		$menu = '<li>
		<a href="bookings.php"><i class="fa fa-table fa-fw"></i> View Bookings</a>
	</li>
	<li>
		<a href="quotation.php"><i class="fa fa-edit fa-fw"></i>New Quotation</a>
	</li>
	
	<li>
		<a href="additem.php"><i class="fa fa-edit fa-fw"></i> Add Product</a>
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

?>
