<?php

$ip = $_SERVER['REMOTE_ADDR'];
$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));

if($query && $query['status'] == 'success') {

	echo $query['query'].'<br>';
	echo $query['countryCode'].'<br>';
	echo $query['country'].'<br>';
	echo $query['regionName'].'<br>';
	echo $query['city'].'<br>';
	echo $query['zip'].'<br>';
	echo $query['isp'].'<br>';
	echo $query['org'].'<br>';
	echo $query['as'].'<br>';
	echo $query['lat'].'<br>';
	echo $query['lon'].'<br>';
	echo $query['timezone'].'<br>';
} else {
	echo 'Unable to get location';
}

/*a:14:{
	s:11:"countryCode";s:2:"ZA";
	s:3:"isp";s:6:"Cell C";
	s:7:"country";s:12:"South Africa";
	s:6:"region";s:0:"";
	s:4:"city";s:19:"Sandton (Sandhurst)";
	s:3:"lat";d:-26.115400314331055;
	s:3:"org";s:11:"Neotel Ggsn";
	s:6:"status";s:7:"success";
	s:3:"zip";s:0:"";
	s:3:"lon";d:28.047500610351562;
	s:5:"query";s:13:"105.3.105.130";
	s:10:"regionName";s:7:"Gauteng";
	s:8:"timezone";s:19:"Africa/Johannesburg";
	s:2:"as";s:14:"AS37168 CELL-C";
}*/

?>
