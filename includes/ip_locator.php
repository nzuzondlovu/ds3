<?php

$ip = $_SERVER['REMOTE_ADDR'];
$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
$page = $_SERVER['REQUEST_URI'];
$date = date("Y-m-d H:i:s");

if($query && $query['status'] == 'success') {
	
	echo $sql = 'INSERT INTO views(page, ip, countryCode, country, regionName, city, zip, isp, org, as1, lat, lon, timezone, date) 
	VALUES ("'.$page.'", "'.$query['query'].'", "'.$query['countryCode'].'", "'.$query['country'].'", "'.$query['regionName'].'", "'.$query['city'].'", "'.$query['zip'].'", "'.$query['isp'].'", "'.$query['org'].'", "'.$query['as'].'", "'.$query['lat'].'", "'.$query['lon'].'", "'.$query['timezone'].'", "'.$date.'")';
	mysqli_query($con, $sql);

} else {

	echo $sql = 'INSERT INTO views(page, ip, countryCode, country, regionName, city, zip, isp, org, as1, lat, lon, timezone, date) 
	VALUES ("'.$page.'", "Annonymous", "Annonymous", "Annonymous", "Annonymous", 0, "Annonymous", "Annonymous", "Annonymous", "Annonymous", "Annonymous", "Annonymous", "Annonymous", "'.$date.'")';
	mysqli_query($con, $sql);
}

?>