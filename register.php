<?php
ob_start();
include 'admin/functions.php';
?>

<?php

if(isset($_POST['submit'])) {
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
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register - <?php echo $sitename; ?></title>

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
                        </div>
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Register</h3>
                        </div>
                        <div class="panel-body">
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
                                    <button name="submit" type="submit" class="btn btn-lg btn-primary btn-block">Register</button>
                                    <div class="checkbox">
                                        <label>
                                            <a href="login.php">Login to your account</a>
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

        <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&amp;key=AIzaSyDeSnzn_iwMZkhJrjDNYuTkPkfGeFdyWps"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

        <script src="js/jquery.geocomplete.js"></script>

        <script>
          $('#geocomplete').geocomplete({
            details: '#form',
            detailsAttribute: "data-geo"
          });
        </script>

        <script src="js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/sb-admin-2.js"></script>

    </body>

    </html>
