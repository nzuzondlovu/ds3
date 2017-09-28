<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Dashboard - <?php echo $sitename; ?></title>

  <!-- Bootstrap Core CSS -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="../assets/css/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="../assets/css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <link href="../assets/datatables/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">

  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
        <link rel="stylesheet" href="../assets/css/skins/_all-skins.min.css">


<<<<<<< HEAD

  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>

=======
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
>>>>>>> 911ccd41d496a4caa27b6d71eafbbeea09d349c7

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
        <span class="logo-lg"><b></b>LTE</span>
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
                                  <a href="#"> </a>
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

                <!-- /.navbar-top-links -->

                <div class="navbar-danger sidebar" role="navigation">
                  <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                          <input type="text" class="form-control" placeholder="Search...">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                              <i class="fa fa-search"></i>
                            </button>
                          </span>
                        </div>
                        <!-- /input-group -->
                      </li>
                      <?php
                      $type = $_SESSION['type'];
                      user($type);
                      ?>
                    </ul>
                  </div>
                  <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
              </nav>




              <script src="bower_components/jquery/dist/jquery.min.js"></script>
              <!-- Bootstrap 3.3.7 -->
              <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
              <!-- AdminLTE App -->
              <script src="dist/js/adminlte.min.js"></script>


              <script src="bower_components/jquery/dist/jquery.min.js"></script>
              <!-- Bootstrap 3.3.7 -->
              <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
              <!-- Select2 -->
              <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
              <!-- InputMask -->
              <script src="plugins/input-mask/jquery.inputmask.js"></script>
              <script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
              <script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
              <!-- date-range-picker -->
              <script src="bower_components/moment/min/moment.min.js"></script>
              <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
              <!-- bootstrap datepicker -->
              <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
              <!-- bootstrap color picker -->
              <script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
              <!-- bootstrap time picker -->
              <script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
              <!-- SlimScroll -->
              <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
              <!-- iCheck 1.0.1 -->
              <script src="plugins/iCheck/icheck.min.js"></script>
              <!-- FastClick -->
              <script src="bower_components/fastclick/lib/fastclick.js"></script>
              <!-- AdminLTE App -->
              <script src="dist/js/adminlte.min.js"></script>
              <!-- AdminLTE for demo purposes -->
              <script src="dist/js/demo.js"></script>
              <!-- Page script -->
              <script>
                $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
    {
      ranges   : {
        'Today'       : [moment(), moment()],
        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate  : moment()
    },
    function (start, end) {
      $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>   