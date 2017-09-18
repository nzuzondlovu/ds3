<?php
include_once 'functions.php';

if (isset($_POST['id']) && $_POST['id'] != null) {
  $id = mysqli_real_escape_string($con, strip_tags(trim($_POST['id'])));

  $cust = '';
 

  $sql = "SELECT * FROM custdelivery WHERE deliveryID='".$id."'";
  $res = mysqli_query($con, $sql);

  if (mysqli_num_rows($res) > 0) {

    $row = mysqli_fetch_assoc($res);

    $cust = '
    Name : '.$row['custname'].'<br>
    Cell Number : '.$row['custcell'].'<br>
    Street Address : '.$row['strAddress'].'<br>
    Suburb : '.$row['suburb'].'<br>
    Area : '.$row['area'].'<br>
    Boxcode : '.$row['boxcode'].'<br>
    Date of Request : '.$row['dateofRequest'].'<br>
    Date of Delivery : '.$row['dateofDelivery'];
  }
 
}
?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAr6eySEntWqEQ-8rcERGKlVYmh-8HF7D4"></script>
<script src="./js/application.js" type="text/javascript"></script>
<?php ob_start(); ?>
<!-- Modal -->
<div class="modal fade " id="locationModal" tabindex="-1" role="dialog" aria-labelledby="locationModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" onclick="closeModal()" aria-label="Close"><span class="fa fa-close" aria-hidden="true"></span> Close</button>
        <h4 class="modal-title" id="locationModalLabel">Customer Location</h4>
      </div>
      <div class="modal-body" id="map_canvas">
       
        </div>
      </div>  
    </div>    
  </div>      
</div>        
<!-- /.Modal -->
<script>      
  function closeModal() {
    jQuery('#locationModal').modal('hide');
    setTimeout(function() {
      jQuery('#locationModal').remove();
    },500);   
  }           
</script>     
<?php echo ob_get_clean(); ?>