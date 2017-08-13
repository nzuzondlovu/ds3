<div class="footer-top-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="footer-about-us">
                    <h2>u<span>Stora</span></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
                    <div class="footer-social">
                        <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">User Navigation </h2>
                    <ul>
                        <li><a href="#">My account</a></li>
                        <li><a href="#">Order history</a></li>
                        <li><a href="#">Wishlist</a></li>
                        <li><a href="#">Vendor contact</a></li>
                        <li><a href="#">Front page</a></li>
                    </ul>                        
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">Categories</h2>
                    <ul>
                        <li><a href="#">Mobile Phone</a></li>
                        <li><a href="#">Home accesseries</a></li>
                        <li><a href="#">LED TV</a></li>
                        <li><a href="#">Computer</a></li>
                        <li><a href="#">Gadets</a></li>
                    </ul>                        
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-newsletter">
                    <h2 class="footer-wid-title">Newsletter</h2>
                    <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                    <div class="newsletter-form">
                        <form action="#">
                            <input type="email" placeholder="Type your email">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End footer top area -->

<div class="footer-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="copyright">
                    <p>&copy; 2015 uCommerce. All Rights Reserved. <a href="http://www.freshdesignweb.com" target="_blank">freshDesignweb.com</a></p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="footer-card-icon">
                    <i class="fa fa-cc-discover"></i>
                    <i class="fa fa-cc-mastercard"></i>
                    <i class="fa fa-cc-paypal"></i>
                    <i class="fa fa-cc-visa"></i>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End footer bottom area -->


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


<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span> Close</button>
                <h4 class="modal-title" id="loginLabel">Log In</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="post">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" type="password" value="">
                        </div>
                        <!-- Change this to a button or input when using this as a form -->
                        <button type="submit" name="login" class="btn btn-lg btn-primary btn-block">Login</button>
                        <div class="checkbox">
                            <label>
                                <a data-toggle="modal" data-target="#recover">Recover Lost Password</a><br>
                                <a data-toggle="modal" data-target="#register">Register your account</a><br>
                            </label>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="registerLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span> Close</button>
                <h4 class="modal-title" id="registerLabel">Register</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="post" id="form">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="Name" name="name" type="text" autofocus>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Surname" name="surname" type="text" value="">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Cell Number" name="cell" type="text" value="">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="ID Number" name="idnumber" type="number" value="">
                        </div>
                        <div class="form-group">
                            <input id="geocomplete" class="form-control" placeholder="Location" name="location" type="text" value="">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="E-mail" name="email" type="email" value="">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="password" type="password" value="">
                        </div>                                
                        <!-- Change this to a button or input when using this as a form -->
                        <button name="register" type="submit" class="btn btn-lg btn-primary btn-block">Register</button>
                        <div class="checkbox">
                            <label>
                                <a data-toggle="modal" data-target="#login">Login to your account</a>
                            </label>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="recover" tabindex="-1" role="dialog" aria-labelledby="recoverLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span> Close</button>
                <h4 class="modal-title" id="recoverLabel">Recover lost password</h4>
            </div>
            <div class="modal-body">
             <form role="form" method="post">
                <fieldset>
                    <div class="form-group">
                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                    </div>
                    <!-- Change this to a button or input when using this as a form -->
                    <button type="submit" name="recover" class="btn btn-lg btn-primary btn-block">Recover</button>
                    <div class="checkbox">
                        <label>
                            <a data-toggle="modal" data-target="#login">Login to your account</a><br>
                            <a data-toggle="modal" data-target="#register">Register new account</a>
                        </label>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
</div>
<!-- /.Modal -->

<!-- Latest jQuery form server -->
<script src="assets/js/jquery1.min.js"></script>

<!-- Bootstrap JS form CDN -->
<script src="assets/js/bootstrap.min.js"></script>

<!-- jQuery sticky menu -->
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/jquery.sticky.js"></script>

<!-- jQuery easing -->
<script src="assets/js/jquery.easing.1.3.min.js"></script>

<!-- Main Script -->
<script src="assets/js/main.js"></script>

<!-- Slider -->
<script type="text/javascript" src="assets/js/bxslider.min.js"></script>
<script type="text/javascript" src="assets/js/script.slider.js"></script>
</body>
</html>