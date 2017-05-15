<?php
ob_start();
include 'admin/functions.php';
?>

<?php
if(isset($_POST['submit'])) {
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

            if ($_SESSION['user_id'] == 1) {
                $_SESSION['key'] = $user_details['name'];
                $_SESSION['type'] = ''; //this part determines what options/privilleges the user gets
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

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login - <?php echo $sitename; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                            <h3 class="panel-title">Please Log In</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit" name="submit" class="btn btn-lg btn-primary btn-block">Login</button>
                                    <div class="checkbox">
                                        <label>
                                            <a href="recover.php">Recover Lost Password</a><br>
                                            <a href="register.php">Register your account</a><br>
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
        <script src="js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/sb-admin-2.js"></script>

    </body>

    </html>
