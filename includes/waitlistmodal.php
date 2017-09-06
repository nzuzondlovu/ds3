<?php
include_once 'functions.php';

if (isset($_POST['id']) && $_POST['id'] != null) {
  $id = mysqli_real_escape_string($con, strip_tags(trim($_POST['id'])));

  $promo = '';
  $nam = '';
  $typ = '';
  $pri = '';
  $mod = '';
  $dat = '';
  $ser = '';

  $sql = "SELECT * FROM customersaledevice WHERE id=$id";
  $res = mysqli_query($con, $sql);

  if(mysqli_num_rows($res) > 0) {
    while($row = mysqli_fetch_assoc($res)) {
      $promo = '
      ID : '.$row['id'].'<br>
      Name : '.$row['diviceName'].'<br>
      Model : '.$row['model'].'<br>
      Serial : '.$row['serialNumber'].'<br>
      Type : '.$row['Dtype'].'<br>
      Date : '.date("M d, y",strtotime($row['recievedDate'])).'<br>
      Description : R '.$row['establishAmount'].'<br>';

      $nam = $row['diviceName'];
      $typ = $row['Dtype'];
      $pri = $row['establishAmount'];
      $dat = $row['recievedDate'];
      $mod = $row['model'];
      $ser = $row['serialNumber'];
    }
  }
}
?>

<?php ob_start(); ?>
<!-- Modal -->
<div class="modal fade " id="waitlistModal" tabindex="-1" role="dialog" aria-labelledby="waitlistModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" onclick="closeModal()" aria-label="Close"><span class="fa fa-close" aria-hidden="true"></span> Close</button>
        <h4 class="modal-title" id="waitlistModalLabel">Edit Device</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <h2>Device details</h2>
            <?php
            echo $promo;
            ?>
          </div>

          <div class="col-md-6">
            <form role="form" method="post">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $nam; ?>">
              </div>
              <div class="form-group">
                <label>Model</label>
                <input type="text" name="model" class="form-control" value="<?php echo $mod; ?>">
              </div>
              <div class="form-group">
                <label>Serial</label>
                <input type="text" name="serial" class="form-control" value="<?php echo $ser; ?>">
              </div>
              <div class="form-group">
                <label>Type</label>
                <select name="type" class="form-control">
                  <option value="<?php echo $typ; ?>" selected="selected">Select type</option>
                  <option value="Hardware">Hardware</option>
                  <option value="Software">Software</option>
                </select>
              </div>
              <div class="form-group">
                <label>Date</label>
                <input type="date" name="date" class="form-control" value="<?php echo $dat; ?>">
              </div>
              <div class="form-group">
                <label>Price</label>
                <input type="number" name="price" class="form-control" value="<?php echo $pri; ?>">
              </div>
              <input type="text" name="id" value="<?= $id; ?>" hidden="hidden" />
              <button name="edit" type="submit" class="btn btn-primary">Update Device</button>
              <button type="reset" class="btn btn-default">Reset Form</button>
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
    jQuery('#waitlistModal').modal('hide');
    setTimeout(function() {
      jQuery('#waitlistModal').remove();
    },500);
  }
</script>
<?php echo ob_get_clean(); ?>