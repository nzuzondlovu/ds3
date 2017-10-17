<?php
ob_start();
include '../includes/functions.php';
include '../includes/geolocation.php';
?>

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
<?php
include 'header.php';
?>
<style>
      /* Always set the map height explicitly to define the size of the div
      * element that contains the map. */
      #map {
        height: 100%;
    }
</style>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Analytics</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

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
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active">
                    <a href="#analytics" data-toggle="tab">Analytics</a>
                </li>
                <li>
                    <a href="#graph" data-toggle="tab">Graphical View</a>
                </li>
                <li>
                    <a href="#maps" data-toggle="tab">Map View</a>
                </li>
            </ul>
        </div>
        <div class="tab-content">


          <div class="active tab-pane" id="analytics">
            <div class="post">
              <div class="row">
                <div class="col-lg-12">                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List of all visitors
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="tab-pane" id="graph">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Visitor Graphical View
                    </div>
                    <div class="panel-body">
                        <canvas id="stockcanvas" height="100%">
                            Your web-browser does not support the HTML 5 canvas element.
                        </canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="tab-pane" id="maps">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Visitor Map View
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <?=$locations;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
include 'footer.php';
?>
 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMSkgPhpQfGqMGMdkY_bH0UxK3UDzFIYs&sensor=false"></script>
  <script type="text/javascript">
  <?php
  $x=0; $y=1;
   while($x<$id): ?>
  $(function(){
    navigator.geolocation.getCurrentPosition(success, error);
    function success(position){
      //getting the coordinates
      var lat = "<?=$lat[$x];?>";//position.coords.latitude;
      var long = "<?=$long[$x];?>";//position.coords.longitude;
      $('latitude').html(lat);
      $('longitude').html(long);
      var latlon = new google.maps.LatLng(lat,long);
      //create map
      var mapOptions = {
         zoom: 16,
         center: latlon,
         mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      var map =  new google.maps.Map(document.getElementById("maps<?=$y;?>"), mapOptions);
      var marker = new google.maps.Marker({
        position: latlon,
        map: map,
        title: "I was Here",
        draggable: true,
        animation: google.maps.Animation.BOUNCE
      });
            var latlng = new google.maps.LatLng(<?=$lat[$x];?>, <?=$long[$x];?>);
            //var infowindow = new google.maps.InfoWindow;
            var geocoder = new google.maps.Geocoder;
            geocoder.geocode({'latLng': latlng}, function(results, status) {
                if(status == google.maps.GeocoderStatus.OK) {
                    if(results[0]) {
                        $('#address<?=$y;?>').text(results[0].formatted_address);
                    } else {
                        alert("No results found");
                    }
                } else {
                    var error = {
                        'ZERO_RESULTS': 'Kunde inte hitta adress'
                    }
                    // alert('Geocoder failed due to: ' + status);
                    $('#address<?=$y;?>').html('<span class="color-red">' + error[status] + '</span>');
                }
            });
    }
    function error(){
      $('maps<?=$y;?>').html("Your network connection was interrupted");
    }
  });
  <?php
  $x++; $y++;
  endwhile; ?>
  </script>
<script>
    $(document).ready(function(){
        $('#bookings').DataTable();
    });
</script>
<script type="text/javascript" src="../assets/js/analyticchart.js"></script>
