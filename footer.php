<div class="footer-top-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="footer-about-us">
                    <h2>i<span>Nfinity</span></h2>
                    <p> </p>   <div class="footer-social">
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
                        <?php
                        if (isset($_SESSION['user_id'])) {
                            echo '
                            <li><a href="user/update.php">My account</a></li>
                            <li><a href="user/index.php">My dashboard</a></li>
                            <li><a href="user/bookings.php">My bookings</a></li>
                            ';
                        } else {
                            echo '
                            <li><a data-toggle="modal" data-target="#login">Login to account</a></li>
                            <li><a href="register.php">Register new account</a></li>
                            ';
                        }
                        
                        ?>
                        
                   
                    </ul>                        
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">Categories</h2>
                    <ul>
                    <?php
                        $sql = "SELECT * FROM category";
                        $res = mysqli_query($con, $sql);

                        if (mysqli_num_rows($res) > 0) {

                            while ($row = mysqli_fetch_assoc($res)) {

                                echo '<li><a href="shop.php?cat='.$row['name'].'">'.$row['name'].'</a></li>';
                            }
                        } else {

                            echo '<li><a href="#">No Categories Found</a></li>';
                        }
                        ?>
                    </ul>                        
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-newsletter">
                    <h2 class="footer-wid-title">Newsletter</h2>
                    <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your inbox!</p>
                    <div class="newsletter-form">
                        <form method="post">
                            <input type="email"  name="newsemail" placeholder="Type your email">
                            <button name="newsletter" type="submit">Subscribe</button>
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
                    <p>&copy; 2017 iNfinity. All Rights Reserved. <a href="http://www.freshdesignweb.com" target="_blank">infinity.co.za</a></p>
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
                                <a href="recover.php">Recover Lost Password</a><br>
                                <a href="register.php">Register your account</a><br>
                            </label>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="registerLabel">
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
                        <!-- Change this to a button or input when using this as a form --
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
</div> -->

<!-- <div class="modal fade" id="recover" tabindex="-1" role="dialog" aria-labelledby="recoverLabel">
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
                    <!-- Change this to a button or input when using this as a form --
                    <button type="submit" name="recover" class="btn btn-lg btn-primary btn-block">Recover</button>
                    <div class="checkbox">
                        <label>
                            <a data-toggle="modal" data-target="#login">Login to your account</a><br>
                            <a href="register.php">Register new account</a>
                        </label>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
</div> -->
<!-- /.Modal -->
<?php include 'includes/ip_locator.php'; ?>
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
<script src="assets/js/functions.js"></script>

<!-- Slider -->
<script type="text/javascript" src="assets/js/bxslider.min.js"></script>
<script type="text/javascript" src="assets/js/script.slider.js"></script>
</body>
</html>