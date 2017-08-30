<?php
ob_start();
include 'includes/functions.php';
?>

<?php

if(isset($_POST['register'])) {
    $name = mysqli_real_escape_string($con, strip_tags(trim($_POST["name"])));
    $surname = mysqli_real_escape_string($con, strip_tags(trim($_POST["surname"])));
    $cell = mysqli_real_escape_string($con, strip_tags(trim($_POST["cell"])));
    $idnumber = mysqli_real_escape_string($con, strip_tags(trim($_POST["idnumber"])));
    $location = mysqli_real_escape_string($con, strip_tags(trim($_POST["location"])));
    $email = mysqli_real_escape_string($con, strip_tags(trim($_POST["email"])));
    $password = md5(mysqli_real_escape_string($con, strip_tags(trim($_POST["password"]))));
    $role = '';

    if($name !='' && $surname !='' && $cell !='' && $idnumber !='' && $location !='' && $email !='' && $password !=''){

        $sql = "INSERT INTO user(name, surname, cell, idnumber, location, email, password, role)
        VALUES('".$name."', '".$surname."', '".$cell."', '".$idnumber."', '".$location."', '".$email."', '".$password."', '".$role."')";
        mysqli_query($con, $sql);
        $_SESSION['success'] = 'You have been registered succesfully, please log in.';
        header("Location: login.php");

    }else{
        $_SESSION['failure'] = 'Make sure you have filled all fields.';
    }
}


if(isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, strip_tags(trim($_POST["email"])));
    $password = md5(mysqli_real_escape_string($con, strip_tags(trim($_POST["password"]))));

    $id = 0;
    $id1 = 0;

    $sql = "SELECT * FROM user WHERE email='".$email."' AND password='".$password."'";
    $res = mysqli_query($con, $sql);


    if(mysqli_num_rows($res) > 0) {

        $sql1 = "SELECT * FROM blocked WHERE email='".$email."' AND password='".$password."'";
        $res1 = mysqli_query($con, $sql1);

        if(mysqli_num_rows($res1) > 0) {

            while($row1 = mysqli_fetch_assoc($res1)) {
                $id1 = $row1['id'];
            }
        }

        $user_details = mysqli_fetch_assoc($res);
        $_SESSION['user_id'] = $user_details['id'];

        if ($_SESSION['user_id'] != $id1) {

            $_SESSION['name'] = $user_details['name'];
            $_SESSION['surname'] = $user_details['surname'];
            $_SESSION['location'] = $user_details['location'];
            $_SESSION['idnumber'] = $user_details['idnumber'];
            $_SESSION['cell'] = $user_details['cell'];
            $_SESSION['email'] = $user_details['email'];
            $_SESSION['success'] = 'Welcome to \''.$sitename.'\' user dashboard.';

            if ($user_details['role'] != '') {
                $_SESSION['key'] = $user_details['name'];
                $_SESSION['type'] = $user_details['role'];
                header("Location: admin/index.php");
            } else {
                if (isset($_GET['id']) && $_GET['id'] != '') {
                    $sql = "UPDATE cart SET user_id='".$_SESSION['user_id']."' WHERE prod_id='".$_GET['id']."' AND date='".$_SESSION['pDate']."'";
                    mysqli_query($con, $sql);
                    header('Location: item.php?id='.$_GET['id']);
                } else {
                    header("Location: user/index.php");
                }                
            }

        } else {
            session_destroy();
            $_SESSION['failure'] = '<strong>This account is blocked.</strong> Please contact <strong>info@'.$siteaddress.'</strong>.';
        }
    } else {
        session_destroy();
        $_SESSION['failure'] = '<strong>Invalid login credentials.</strong> Please try submitting again.';
    }
}


if(isset($_POST['recover'])) {
    $email = mysqli_real_escape_string($con, strip_tags(trim($_POST["email"])));
    $id1 = 0;

    if ($email != '') {
        $sql = "SELECT * FROM user WHERE email='".$email."'";
        $res = mysqli_query($con, $sql);

        if(mysqli_num_rows($res) > 0) {

            $sql1 = "SELECT * FROM blocked WHERE email='".$email."'";
            $res1 = mysqli_query($con, $sql1);

            if(mysqli_num_rows($res1) > 0) {

                while($row1 = mysqli_fetch_assoc($res1)) {
                    $id1 = $row1['user_id'];
                }
            }

            $user_details = mysqli_fetch_assoc($res);
            $_SESSION['user_id'] = $user_details['id'];

            if ($_SESSION['user_id'] != $id1) {

                $to = $email;
                $pass = substr(str_shuffle(MD5(microtime())), 0, 10);
                $subject = "Reset Password";
                $msg = "You requested your $sitename password to be reset:\n
                email : $to \n
                password :' $pass \n
                \n  ' Please contact info@$siteaddress if you didn't make the request. \n
                Follow this link http://www.$siteaddress/login.php to login.";
                $msg = wordwrap($msg, 70);
                $headers =  'MIME-Version: 1.0' . "\r\n";
                $headers .= 'From:  <info@'.$siteaddress.'>' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                $sql = "UPDATE user SET password='".md5($pass)."' WHERE id='".$_SESSION['user_id']."'";
                mysqli_query($con, $sql);

                mail($to, $subject, $msg, $headers);

                $_SESSION['success'] = 'Check your email inbox or spam folder for your new password.';

            } else {
                session_destroy();
                $_SESSION['failure'] = '<strong>This account is blocked.</strong> Please contact <strong>info@'.$siteaddress.'</strong>.';
            }
        } else {
            session_destroy();
            $_SESSION['failure'] = '<strong>Entered email address does not exist.</strong> Please try submitting again.';
        }
    } else {
        session_destroy();
        $_SESSION['failure'] = '<strong>No entered email address.</strong> Please try submitting again.';
    }

}
?>


<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $sitename; ?></title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
  </head>
  <body>

    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <?php

                            if (isset($_SESSION['user_id'])) {

                                echo '
                                <li><a href="user/"><i class="fa fa-user"></i> My Account</a></li>                            
                                <!--<li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>-->
                                <li><a href="cart.php"><i class="fa fa-user"></i> My Cart</a></li>
                                <li><a href="checkout.php"><i class="fa fa-user"></i> Checkout</a></li>';
                            } else {

                                echo '<li><a data-toggle="modal" data-target="#login"><i class="fa fa-user"></i> Login</a></li>';
                            }

                            ?>                            
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">ZAR </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">ZAR</a></li>
                                    <li><a href="#">INR</a></li>
                                    <li><a href="#">GBP</a></li>
                                </ul>
                            </li>

                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->

    <div>
        <?php if(isset($_SESSION['failure']) && $_SESSION['failure'] != '') { ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $_SESSION['failure']; unset($_SESSION['failure']); ?>
        </div>
        <?php } ?>

        <?php if(isset($_SESSION['success']) && $_SESSION['success'] != '') { ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
        </div>
        <?php } ?>
    </div>
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="./"><img src="img/logo.png"></a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cart.php">Cart - <span class="cart-amunt">R0.00</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">0</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="shop.php">Shop page</a></li>
                        <li><a href="product.php">Single product</a></li>
                        <li><a href="cart.php">Cart</a></li>
                        <li><a href="checkout.php">Checkout</a></li>
                        <li><a href="#">Category</a></li>
                        <li><a href="#">Others</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->