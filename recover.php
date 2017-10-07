<?php
include 'includes/functions.php';
?>

<?php
if(isset($_POST['submit'])) {
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

                $_SESSION['success'] = 'Check your messages and email inbox or spam folder for your new password.';

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
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Recover - <?php echo $sitename; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="assets/css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
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
                        <div class="panel-heading">
                            <h3 class="panel-title">Recover Lost Password</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit" name="submit" class="btn btn-lg btn-primary btn-block">Recover</button>
                                    <div class="checkbox">
                                        <label>
                                            <a href="login.php">Login to your account</a><br>
                                            <a href="register.php">Register new account</a><br>
                                            <a href="index.php">Home</a>
                                        </label>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="assets/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="assets/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="assets/js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="assets/js/sb-admin-2.js"></script>

    </body>

    </html>
