  <?php
$servername = "localhost";
$username = "root";
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, "");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
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
$password = "password";
$dbname = "shop";

// Create connection
$conn = new mysqli($servername, $username, "", $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
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
$sql = "CREATE TABLE `wallpaper` (
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
$conn->close();
?> 
