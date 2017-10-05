<!DOCTYPE html>
<html lang="en">

<head>

 <script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Dashboard - <?php echo $sitename; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>


<body class="hold-transition skin-yellow layout-boxed">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->  
      <span class="logo-lg"><b></b>C&E Panel</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success"> <?php
                                $sql = "SELECT * FROM query WHERE user_id='".$_SESSION['user_id']."'";
                                $rs_result = mysqli_query($con, $sql); //run the query
                                $cart = mysqli_num_rows($rs_result);
                                if ($cart < 0) {
                                    $cart = 0;
                                }
                                echo $cart;
                                ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have  <?php
                                $sql = "SELECT * FROM query WHERE user_id='".$_SESSION['user_id']."'";
                                $rs_result = mysqli_query($con, $sql); //run the query
                                $cart = mysqli_num_rows($rs_result);
                                if ($cart < 0) {
                                    $cart = 0;
                                }
                                echo $cart;
                                ?> messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-danger"> <?php
                                $sql = "SELECT * FROM query WHERE user_id='".$_SESSION['user_id']."'";
                                $rs_result = mysqli_query($con, $sql); //run the query
                                $cart = mysqli_num_rows($rs_result);
                                if ($cart < 0) {
                                    $cart = 0;
                                }
                                echo $cart; 
                                ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have  <?php
                                $sql = "SELECT * FROM query WHERE user_id='".$_SESSION['user_id']."'";
                                $rs_result = mysqli_query($con, $sql); //run the query
                                $cart = mysqli_num_rows($rs_result);
                                if ($cart < 0) {
                                    $cart = 0;
                                }
                                echo $cart;
                                ?>  Pending Deliveries</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-default"> <?php
                                $sql = "SELECT * FROM query WHERE user_id='".$_SESSION['user_id']."'";
                                $rs_result = mysqli_query($con, $sql); //run the query
                                $cart = mysqli_num_rows($rs_result);
                                if ($cart < 0) {
                                    $cart = 0;
                                }
                                echo $cart;
                                ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have  <?php
                                $sql = "SELECT * FROM query WHERE user_id='".$_SESSION['user_id']."'";
                                $rs_result = mysqli_query($con, $sql); //run the query
                                $cart = mysqli_num_rows($rs_result);
                                if ($cart < 0) {
                                    $cart = 0;
                                }
                                echo $cart;
                                ?> Wishlist</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php
                                        $res = mysqli_query($con, "SELECT * FROM user WHERE id='".$_SESSION['user_id']."' ");
                                        $row = mysqli_fetch_assoc($res);
                                        echo$row['name']; echo " "; echo $row['surname'];
                                        ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                 <?php
                                        $res = mysqli_query($con, "SELECT * FROM user WHERE id='".$_SESSION['user_id']."' ");
                                        $row = mysqli_fetch_assoc($res);
                                        echo$row['name']; echo " "; echo $row['surname']; echo "-" ;echo $row['location'];
                                        ?>
                  <small><?php
                                        $res = mysqli_query($con, "SELECT * FROM user WHERE id='".$_SESSION['user_id']."' ");
                                        $row = mysqli_fetch_assoc($res);
                                        echo " "; echo $row['email'];
                                        ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#"></a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#"></a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#"></a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="update.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>




  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">

          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php
                                        $res = mysqli_query($con, "SELECT * FROM user WHERE id='".$_SESSION['user_id']."' ");
                                        $row = mysqli_fetch_assoc($res);
                                        echo$row['name']; echo " "; echo $row['surname'];
                                        ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
          <li class="active">
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i><span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="cart.php"><i class="fa fa-shopping-cart fa-fw"></i><span>Cart</span></a>
                        </li>
                        <li>
                            <a href="bookings.php"><i class="fa fa-table fa-fw"></i> <span> Bookings</span></a>
                        </li>
                        <li>
                            <a href="book.php"><i class="fa fa-edit fa-fw"></i> <span> Create Booking </span></a>

                        </li>

                        <li>
                            <a href="viewFeedback.php"><i class="fa fa-question fa-fw"></i> <span> Query </span></a>
                        </li>
                        <li>
                            <a href="update.php"><i class="fa fa-cogs fa-fw"></i> <span> Profile</span></a>
                        </li>
      
        <!-- Optionally, you can add icons to the links -->

                    

          </ul>
        </li>

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
