<?php
session_start();
session_destroy();
session_start();
$_SESSION['success'] = 'You are successfully logged out.';
header("location: index.php");
?>
