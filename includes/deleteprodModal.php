<?php
include_once 'functions.php';

if (isset($_POST['id']) && $_POST['id'] != null) {
  $id = mysqli_real_escape_string($con, strip_tags(trim($_POST['id'])));

  $cust = '';
 

  $sql = "SELECT * FROM custsaleprod WHERE id='".$id."'";
  $res = mysqli_query($con, $sql);

  if (mysqli_num_rows($res) > 0) {

    $row = mysqli_fetch_assoc($res);

    $cust = 'Product Barcode:  '.$row['barcode'].'</br>
				Product Name: '.$row['prodname'].'</br>
				Quantity :	'.$row['qty'].'</br>
				Price:	R'.$row['price'];
  }
 
}
?>

<?php ob_start(); ?>
<!-- Modal -->
<div class="modal fade " id="deleteProdModal" tabindex="-1" role="dialog" aria-labelledby="deleteProdModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" onclick="closeModal()" aria-label="Close"><span class="fa fa-close" aria-hidden="true"></span> Close</button>
        <h4 class="modal-title" id="deleteProdModalLabel">Allocate Driver</h4>
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
                <input type="hidden" name="prodID" value="<?php echo $id;?>"/>
									<p ><h4><strong>Are you sure to delete ?</strong></h4></p>
									<div class="form-actions">
										<button type="submit" name="delete" class="btn btn-danger">Yes</button>
										<a class="btn btn-primary" onclick="closeModal()">No</a>
						</div>
              </div>
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
    jQuery('#deleteProdModal').modal('hide');
    setTimeout(function() {
      jQuery('#deleteProdModal').remove();
    },500);   
  }           
</script>     
<?php echo ob_get_clean(); ?>