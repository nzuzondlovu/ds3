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

<?php ob_start(); ?>
<!-- Modal -->
<div class="modal fade " id="driverModal" tabindex="-1" role="dialog" aria-labelledby="driverModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" onclick="closeModal()" aria-label="Close"><span class="fa fa-close" aria-hidden="true"></span> Close</button>
        <h4 class="modal-title" id="driverModalLabel">Allocate Driver</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <?php
            echo $cust;
            ?>
          </div>
          <div class="col-md-6">
            <form role="form" method="post">
              <div class="form-group">
                <label>Choose Driver</label>
                <select name="driver" class="form-control">
                  <option value="" selected="selected">Select Driver</option>
                  <?php
                  $sql = "SELECT * FROM drivers";
                  $res = mysqli_query($con, $sql);

                  if(mysqli_num_rows($res) > 0) {
                    while($row = mysqli_fetch_assoc($res)) {
                      echo '<option value="'.$row['idnumber'].'">'.$row['name'].'</option>';
                    }
                  }
                  ?>
                </select>
              </div>
    			<input type="text" name="del" value="<?php $res = mysqli_query($con, "SELECT * FROM custdelivery WHERE deliveryID=$id ");$row= mysqli_fetch_assoc($res);echo $row['deliveryID'];?> " style="display: none" />
            		
              <input type="text" name="name" value="<?php $res = mysqli_query($con, "SELECT * FROM custdelivery WHERE deliveryID=$id ");$row = mysqli_fetch_assoc($res);echo $row['custname'];?>" style="display: none" />
              
              <input type="text" name="cell" value="<?php $res = mysqli_query($con, "SELECT * FROM custdelivery WHERE deliveryID=$id ");$row = mysqli_fetch_assoc($res);echo $row['custcell']; ?>"  style="display: none"/>
              
              <input type="text" name="dateD" value="<?php $res = mysqli_query($con, "SELECT * FROM custdelivery WHERE deliveryID=$id ");$row = mysqli_fetch_assoc($res);echo $row['dateofDelivery'];?> " style="display: none" />
              
              <input type="text" name="strA" value="<?php $res = mysqli_query($con, "SELECT * FROM custdelivery WHERE deliveryID=$id ");$row = mysqli_fetch_assoc($res);echo $row['strAddress']; ?>"  style="display: none"/>
              
              <input type="text" name="suburb" value="<?php $res = mysqli_query($con, "SELECT * FROM custdelivery WHERE deliveryID=$id ");$row = mysqli_fetch_assoc($res);echo $row['suburb']; ?>"  style="display: none"/>
              
              <input type="text" name="area" value="<?php $res = mysqli_query($con, "SELECT * FROM custdelivery WHERE deliveryID=$id ");$row = mysqli_fetch_assoc($res);echo $row['area']; ?>"  style="display: none"/>
              
              <input type="text" name="boxcode" value="<?php $res = mysqli_query($con, "SELECT * FROM custdelivery WHERE deliveryID=$id ");$row = mysqli_fetch_assoc($res);echo $row['boxcode']; ?>"  style="display: none"/>
              
				 <button name="submit" type="submit" class="btn btn-primary">Submit Allocation</button>                                                                  
              <button type="reset" class="btn btn-default">Reset</button>
            </form>
          </div>
        </div>
      </div>  
    </div>    
  </div>      
</div>        
<!-- /.Modal -->
<script>      
  function closeModal() {
    jQuery('#driverModal').modal('hide');
    setTimeout(function() {
      jQuery('#driverModal').remove();
    },500);   
  }           
</script>     
<?php echo ob_get_clean(); ?>