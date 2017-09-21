<?php
ob_start();
include '../includes/functions.php';
?>

<?php
if(isset($_SESSION['key']) == '' ) {
    header("location:../login.php");
}
?>

<?php
include 'header.php';
?>
<style>
      /* Always set the map height explicitly to define the size of the div
      * element that contains the map. */
      #maps {
        height: 100%;
    }
</style>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bookings</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="col-lg-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active">
                <a href="#analytics" data-toggle="tab">Analytics</a>
            </li>
            <li>
                <a href="#graph" data-toggle="tab">Graphical View</a>
            </li>
            <li>
                <a href="#map" data-toggle="tab">Map</a>
            </li>
            <li>
                <a href="#activity" data-toggle="tab">Quotations</a>
            </li>
            <li>
                <a href="#devices" data-toggle="tab">Devices</a>
            </li>
            <li>
                <a href="payments" data-toggle="tab">Payments</a>
            </li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="analytics">
            <!-- Post -->
            <div class="post">

              <!-- /.user-block -->


              <div class="row">
                <div class="col-lg-12">
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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List of all bookings
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <?php

                                $sql = "SELECT * FROM views";
                                $res = mysqli_query($con, $sql);

                                if (mysqli_num_rows($res) > 0) {
                                    echo '
                                    <table id="bookings" class="table data-table">
                                    <thead>
                                    <tr>
                                    <th>ID</th>
                                    <th>Page</th>
                                    <th>IP</th>
                                    <th>Code</th>
                                    <th>Country</th>
                                    <th>Province</th>
                                    <th>City</th>
                                    <th>Zip Code</th>
                                    <th>ISP</th>
                                    <th>Organisation</th>
                                    <th>Time Zone</th>
                                    <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>';
                                    while ($row = mysqli_fetch_assoc($res)) {

                                        echo '
                                        <tr>
                                        <td>'.$row['id'].'</td>
                                        <td>'.$row['page'].'</td>
                                        <td>'.$row['ip'].'</td>
                                        <td>'.$row['countryCode'].'</td>
                                        <td>'.$row['country'].'</td>
                                        <td>'.$row['regionName'].'</td>
                                        <td>'.$row['city'].'</td>
                                        <td>'.$row['zip'].'</td>
                                        <td>'.$row['isp'].'</td>
                                        <td>'.$row['org'].'</td>
                                        <td>'.$row['timezone'].'</td>
                                        <td>'.date("M d, y",strtotime($row['date'])).'</td>
                                        </tr>';
                                    }
                                    echo '
                                    </tbody>
                                    </table>';
                                } else {
                                    echo '<div class="alert alert-warning">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>No Bookings found.</strong>
                                    </div>';
                                }
                                ?>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            <!-- /.row (nested) -->

            <!-- /.panel-body -->

        </p>

    </div>
    <!-- /.post -->


    <!-- /.post -->


    <!-- /.post -->
</div>
<!-- /.tab-pane -->
<div class="tab-pane" id="graph">
    <!-- The timeline -->


    <?php
    if(isset($_SESSION['key']) == '' ) {
        header("location:../login.php");
    }
    ?>

    <?php
    if(isset($_GET['id']) && $_GET['id'] != '') {

        $id = mysqli_real_escape_string($con, strip_tags(trim($_GET['id'])));

        if ($id) {
            $sql = "UPDATE quotation SET archive=1 WHERE id='".$id."'";
            mysqli_query($con, $sql);
            $_SESSION['success'] = 'Booking was archived successfully.';
        } else {
            $_SESSION['failure'] = 'An error occured, please try again.';
        }


    }
    ?>



    <!-- Page Content -->


    <!-- /.row -->
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
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
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        List of all Quotations
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">

                       <div class="row">
                        <div class="col-md-12">
                            <canvas id="stockcanvas" height="100%">
                                Your web-browser does not support the HTML 5 canvas element.
                            </canvas>
                        </div>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>

    <!-- /#page-wrapper -->

    <?php
    include 'footer.php';
    ?>
    <script type="text/javascript" src="../assets/js/analyticchart.js"></script>
</div>
<!-- /.tab-pane -->







<div class="tab-pane" id="map">
    <div class="row">
        <div class="col-md-12">
            <div id="maps"></div>
        </div>
    </div>
</div>
<script>
    var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

    function initMap() {
        var map = new google.maps.Map(document.getElementById('maps'), {
          center: new google.maps.LatLng(-33.863276, 151.207977),
          zoom: 12
      });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('../includes/maps_xml.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
            });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
            });
          });
        });
      }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
        }
    };

    request.open('GET', url, true);
    request.send(null);
}

function doNothing() {}
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMSkgPhpQfGqMGMdkY_bH0UxK3UDzFIYs&callback=initMap">
</script>




















<div class="active tab-pane" id="quotations">
    <!-- Post --></div>
    <div class="active tab-pane" id="devices">
        <!-- Post --></div>
        <div class="active tab-pane" id="payments">
            <!-- Post --></div>
            <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->

</section>
<!-- /.row -->

</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php
include 'footer.php';
?>
<script>
    function modal(id) {
        var data = {"id" : id};
        jQuery.ajax({
            url : '../includes/createquotemodal.php',
            method : "post",
            data : data,
            success : function(data) {
                jQuery('body').append(data);
                jQuery('#responseModal').modal('toggle');
            },
            error : function() {
                alert("Ooops! Something went wrong!");
            }
        });
    }
</script>
<script>
    function modal1(id) {
        var data = {"id" : id};
        jQuery.ajax({
            url : '../includes/editquotemodal.php',
            method : "post",
            data : data,
            success : function(data) {
                jQuery('body').append(data);
                jQuery('#responseModal').modal('toggle');
            },
            error : function() {
                alert("Ooops! Something went wrong!");
            }
        });
    }
</script>
<script>
    $(document).ready(function(){
        $('#bookings').DataTable();
    });
</script>









