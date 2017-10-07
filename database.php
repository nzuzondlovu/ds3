  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";


$conn = new mysqli($servername, $username, "");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "CREATE DATABASE shop";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
?> 


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";


$conn = new mysqli($servername, $username, "", $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "CREATE TABLE `category` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(15) NOT NULL,
`type` varchar(15) NOT NULL,
`description` varchar(100) NOT NULL,
`dateCreated` datetime,
PRIMARY KEY (`id`)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Catagory Created";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "
CREATE TABLE `job` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`user` int(11) NOT NULL,
`name` varchar(35) NOT NULL,
`serial` varchar(50) NOT NULL,
`type` varchar(30) NOT NULL,
`pic_url` varchar(100) NOT NULL,
`description` varchar(250) NOT NULL,
`description2` varchar(250) NOT NULL,
`date_in` datetime NOT NULL,
`status` varchar(20) NOT NULL,
`technician` varchar(35) NOT NULL,
`date_out` datetime NOT NULL,
`date` datetime NOT NULL,
PRIMARY KEY (`id`)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Job Created";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "
CREATE TABLE `product` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`user` int(11) NOT NULL,
`name` varchar(30) NOT NULL,
`description` varchar(100) NOT NULL,
`type` varchar(20) NOT NULL,
`price` decimal(7,2) NOT NULL,
`promo_price` decimal(7,2) NOT NULL,
`pic_url` varchar(100) NOT NULL,
`date` datetime NOT NULL,
`promo_date1` datetime NOT NULL,
`promo_date2` datetime NOT NULL,
PRIMARY KEY (`id`)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table product Created";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE `status` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(20) NOT NULL,
`description` varchar(100) NOT NULL,
PRIMARY KEY (`id`)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table status Created";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "
CREATE TABLE `user` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(25) NOT NULL,
`surname` varchar(25) NOT NULL,
`cell` varchar(13) NOT NULL,
`idnumber` varchar(13) NOT NULL,
`location` varchar(100) NOT NULL,
`email` varchar(35) NOT NULL,
`password` varchar(70) NOT NULL,
`role` varchar(10) NOT NULL,
PRIMARY KEY (`id`)
)
";

if ($conn->query($sql) === TRUE) {
    echo "Table User Created";
} else {
    echo "Error creating table: " . $conn->error;
}
$sql = "
CREATE TABLE `wallpaper` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(30) NOT NULL,
`pic_url` varchar(100) NOT NULL,
PRIMARY KEY (`id`)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table wallpaper Created";
} else {
    echo "Error creating table: " . $conn->error;
}
$sql = "
CREATE TABLE `review` (
`id` INT(11) NOT NULL AUTO_INCREMENT ,
`prod_id` INT(11) NOT NULL ,
`user` INT(11) NOT NULL ,
`name` VARCHAR(20) NOT NULL ,
`message` VARCHAR(160) NOT NULL ,
`rate` INT(1) NOT NULL ,
`date` DATETIME NOT NULL ,
PRIMARY KEY (`id`)
)
";

if ($conn->query($sql) === TRUE) {
    echo "Table Review Created";
} else {
    echo "Error creating table: " . $conn->error;
}


$sql = "
CREATE TABLE `cart` (
`id` INT(11) NOT NULL AUTO_INCREMENT ,
`user_id` INT(11) NOT NULL ,
`prod_id` INT(11) NOT NULL ,
`name` VARCHAR(50) NOT NULL ,
`price` DECIMAL(7,2) NOT NULL ,
`num` int(11) NOT NULL,
`date` DATETIME NOT NULL ,
PRIMARY KEY (`id`)
)

";

if ($conn->query($sql) === TRUE) {
    echo "Table cart Created";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "
CREATE TABLE `suppliers` (
`id` INT(11) NOT NULL AUTO_INCREMENT ,
`name` VARCHAR(50) NOT NULL ,
`product` VARCHAR(50) NOT NULL ,
`contactNumber` VARCHAR(15) NOT NULL ,
`email` VARCHAR(50) NOT NULL ,
`website` VARCHAR(50) NOT NULL ,
`address` VARCHAR(100) NOT NULL ,
PRIMARY KEY (`id`)
)

";

if ($conn->query($sql) === TRUE) {
    echo "Table Suppliers Created";
} else {
    echo "Error creating table: " . $conn->error;
}


$sql = "

CREATE TABLE `orders` (
`id` INT(11) NOT NULL AUTO_INCREMENT , 
`supplierID` INT(11) NOT NULL , 
`supplierName` VARCHAR(50) NOT NULL , 
`orderDate` DATETIME NOT NULL , 
`quantity` INT(11) NOT NULL , 
`productName` VARCHAR(50) NOT NULL , 
`email` VARCHAR(50) NOT NULL , 
`totalPrice` DECIMAL(7,2) NOT NULL , 
PRIMARY KEY (`id`)
)


";

if ($conn->query($sql) === TRUE) {
    echo "Table Orders Created";
} else {
    echo "Error creating table: " . $conn->error;
}
$sql = "
CREATE TABLE `technician` ( 
`id` INT(11) NOT NULL AUTO_INCREMENT , 
`name` VARCHAR(30) NOT NULL , 
`surname` VARCHAR(30) NOT NULL , 
`email` VARCHAR(50) NOT NULL , 
`speciality` VARCHAR(30) NOT NULL , 
PRIMARY KEY (`id`)
)

";

if ($conn->query($sql) === TRUE) {
    echo "Table technician Created";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql=" 
CREATE TABLE `quotation` ( 
`id` INT(11) NOT NULL AUTO_INCREMENT , 
`name` VARCHAR(50) NOT NULL , 
`serial` VARCHAR(50) NOT NULL , 
`model` VARCHAR(50) NOT NULL , 
`accessory` VARCHAR(50) NOT NULL , 
`technician` VARCHAR(50) NOT NULL , 
`description` VARCHAR(160) NOT NULL , 
`deposit` DECIMAL(7,2) NOT NULL , 
`balance` DECIMAL(7,2) NOT NULL , 
`total` DECIMAL(7,2) NOT NULL , 
`status` varchar(20) NOT NULL ,
PRIMARY KEY (`id`)
)
";

if ($conn->query($sql) === TRUE) {
    echo "Table quotation Created";
} else {
    echo "Error creating table: " . $conn->error;
}


$sql = "
CREATE TABLE `stork` ( 
`id` INT(11) NOT NULL AUTO_INCREMENT , 
`category` VARCHAR(50) NOT NULL , 
`productName` VARCHAR(50) NOT NULL , 
`QuantityOnHand` INT(11) NOT NULL , 
PRIMARY KEY (`id`)
)
";

if ($conn->query($sql) === TRUE) {
    echo "Table Stock Created";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "
CREATE TABLE repairmaterial(
materialid int(11) not null AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(225) not null,
type VARCHAR(225) not null,
description VARCHAR(128) not null,
dateRecieved datetime,
quantity int
)
";

if ($conn->query($sql) === TRUE) {
    echo "Table repairmaterial Created";
} else {
    echo "Error creating table: " . $conn->error;
}



$sql = "



CREATE TABLE customerSaleDevice(
id int(11) PRIMARY KEY AUTO_INCREMENT not null,
diviceName varchar(255) not null,
model varchar(255) not null,
serialNumber varchar(255) not null,
Dtype varchar(255) not null,
recievedDate varchar(255) not null,
establishAmount decimal(18,2) not null

)
";

if ($conn->query($sql) === TRUE) {
    echo "Table customerSaleDevice Created";
} else {
    echo "Error creating table: " . $conn->error;
}
$sql = "

CREATE TABLE tech(
id int(11) NOT null PRIMARY KEY AUTO_INCREMENT,
tname varchar(255),
sname varchar(255)
)
";

if ($conn->query($sql) === TRUE) {
    echo "Table tech Created";
} else {
    echo "Error creating table: " . $conn->error;
}
$sql = "
CREATE TABLE repairsale(
id int(11) NOT null PRIMARY KEY AUTO_INCREMENT,
dname varchar(255),
model varchar(255),
serialnumber varchar(255),
recievedate varchar(255),
amount decimal(18.2)
)
";

if ($conn->query($sql) === TRUE) {
    echo "Table repairsale Created";
} else {
    echo "Error creating table: " . $conn->error;
}


$sql = "


CREATE TABLE techrepair(
id int(11) PRIMARY KEY AUTO_INCREMENT not null,
diviceName varchar(255) not null,
model varchar(255) not null,
serialNumber varchar(255) not null,
Dtype varchar(255) not null,
recievedDate varchar(255) not null,
amount decimal(18,2) not null,
tname varchar(255)
)


";

if ($conn->query($sql) === TRUE) {
    echo "Table techrepair Created";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "

CREATE TABLE `bonus` ( 
`id` INT(11) NOT NULL AUTO_INCREMENT , 
`emp_id` INT(11) NOT NULL , 
`basic_salary` DECIMAL(7,2) NOT NULL , 
`bonus` DECIMAL(7,2) NOT NULL , 
`total` DECIMAL(7,2) NOT NULL , 
PRIMARY KEY (`id`)
) 
ENGINE = InnoDB;


";

if ($conn->query($sql) === TRUE) {
    echo "Table bonus Created";
} else {
    echo "Error creating table: " . $conn->error;
}




$sql = "


CREATE TABLE `salary` ( 
`id` INT(11) NOT NULL AUTO_INCREMENT , 
`emp_id` INT(11) NOT NULL , 
`norm_hours` INT(11) NOT NULL , 
`extra_hours` INT(11) NOT NULL , 
`hourly_pay` DECIMAL(7,2) NOT NULL , 
`bonus_id` INT(11) NOT NULL , 
`deduct_id` INT(11) NOT NULL , 
`total_salary` DECIMAL(7,2) NOT NULL , 
PRIMARY KEY (`id`)
) 
ENGINE = InnoDB;

";

if ($conn->query($sql) === TRUE) {
    echo "Table techrepair Created";
} else {
    echo "Error creating table: " . $conn->error;
}


$sql = "


CREATE TABLE `deduction` ( 
`id` INT(11) NOT NULL AUTO_INCREMENT , 
`emp_id` INT(11) NOT NULL , 
`med_aid` DECIMAL(7,2) NOT NULL , 
`uif` DECIMAL(7,2) NOT NULL , 
`pension` DECIMAL(7,2) NOT NULL , 
`total` DECIMAL(7,2) NOT NULL , 
PRIMARY KEY (`id`)
) 
ENGINE = InnoDB;
";

if ($conn->query($sql) === TRUE) {
    echo "Table techrepair Created";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "


CREATE TABLE `deduction` ( 
`id` INT(11) NOT NULL AUTO_INCREMENT , 
`emp_id` INT(11) NOT NULL , 
`med_aid` DECIMAL(7,2) NOT NULL , 
`uif` DECIMAL(7,2) NOT NULL , 
`pension` DECIMAL(7,2) NOT NULL , 
`total` DECIMAL(7,2) NOT NULL , 
PRIMARY KEY (`id`)
) 
ENGINE = InnoDB;
";

if ($conn->query($sql) === TRUE) {
    echo "Table deduction Created";
} else {
    echo "Error creating table: " . $conn->error;
}


$sql = "

CREATE TABLE `query`
( `id` INT(11) NOT NULL AUTO_INCREMENT , 
`user_id` INT(11) NOT NULL , `email` VARCHAR(35) NOT NULL ,
`name` VARCHAR(20) NOT NULL , `query` VARCHAR(175) NOT NULL , 
`status` VARCHAR(20) NOT NULL , `feedback` VARCHAR(175) NOT NULL ,
PRIMARY KEY (`id`)) ENGINE = InnoDB;
";

if ($conn->query($sql) === TRUE) {
    echo "Table Query Created";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 



