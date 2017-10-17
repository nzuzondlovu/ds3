<?php
$sql = mysqli_query($con, "SELECT * FROM views WHERE lat <> 'Annonymous'");
$locations  = ''; $id = 0;
$mapholderArgs = $lat = $long = array();
while($loc = mysqli_fetch_assoc($sql)):
  $id += 1;
  $locations .= '<div id="wrap">
  <div class="panel panel-info panel-horizontal">
  <div class="panel-heading" id="maps'.$id.'" style="height:650px;">
  </div>
  <div class="panel-body col-md-8">
  <address id="address'.$id.'">
  </address>
  </div>
  </div>
  </div>';
  $mapholderArgs[] .= 'maps'.$id;
  $lat[] .= $loc['lat'];
  $long[] .=$loc['lon'];
endwhile;
?>