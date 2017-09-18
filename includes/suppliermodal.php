<?php
include_once 'functions.php';

if (isset($_POST['id']) && $_POST['id'] != null) {
  $id = mysqli_real_escape_string($con, strip_tags(trim($_POST['id'])));

  $cust = '';
 

  $name = '';
$product = '';
$email = '';

$sql = "SELECT * FROM suppliers WHERE id=$id";
$res = mysqli_query($con, $sql);
  if (mysqli_num_rows($res) > 0) {

    $row = mysqli_fetch_assoc($res);

    $cust = '
	ID : '.$row['id'].'<br>
		Name : '.$row['name'].'<br>
		Email : '.$row['email'].'<br>
		Website : <a href="'.$row['website'].'" target="blank">'.$row['website'].'</a><br>
		Notes : '.$row['notes'];
		$name = $row['name'];
		$product = $row['notes'];
		$email = $row['email'];
  }
 
}
?>

<?php ob_start(); ?>
<!-- Modal -->
<div class="modal fade " id="supplierModal" tabindex="-1" role="dialog" aria-labelledby="supplierModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" onclick="closeModal()" aria-label="Close"><span class="fa fa-close" aria-hidden="true"></span> Close</button>
        <h4 class="modal-title" id="supplierModalLabel">Add Supplier Order</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <?php
            echo $cust;
            ?>
          </div>
          <div class="col-md-6">
            <form role="form" action="incoming.php" method="post">
              <div class="form-group">
                <label>Brand Name</label>
				<input type="text" name="bname" class="form-control" placeholder="Enter Brand Name">
              </div>
              <div class="form-group">
                <label>Generic Name</label>
				<input type="text" name="bname" class="form-control" placeholder="Or Device Model">
              </div>
    			<div class="form-group">
				<label>Order Quantity</label>
				<input type="number" name="quantity" class="form-control" placeholder="Enter quantity">
				</div>	
				 <button name="submit" type="submit" class="btn btn-info"><i class="fa fa-plus fa-fw"></i>Add</button>                                                                  
              <button type="reset" class="btn btn-default">Reset</button>
            </form>
           
            <div class="table-responsive">
							<?php
							$num_rec_per_page=10;

							if (isset($_GET["page"])) {

								$page  = $_GET["page"];
							} else {

								$page=1;
							}

							$start_from = ($page-1) * $num_rec_per_page;
							$sql = "SELECT * FROM orders";
							$res = mysqli_query($con, $sql);

							if (mysqli_num_rows($res) > 0) {
								echo '
								<table id="suppliers" class="table">
									<thead>
										<tr>
											<th>ID</th>
											<th>Name</th>
											<th>Contact #</th>
											<th>Email</th>
											<th>Website</th>
											<th>Address</th>
											<th>Notes</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>';
										while ($row = mysqli_fetch_assoc($res)) {											

											echo '
											<tr>
												<td>'.$row['id'].'</td>
												<td>'.$row['name'].'</td>
												<td>'.$row['contactNumber'].'</td>
												<td>'.$row['email'].'</td>
												<td><a target="blank" href="'.$row['website'].'">'.$row['website'].'</a></td>
												<td>'.$row['address'].'</td>
												<td>'.$row['notes'].'</td>
												<td class="pull-right">
													<button onclick="modal('.$row['id'].')" class="btn btn-warning">Make Order</button>   <a href="editsupplier.php?id='.$row['id'].'" class="btn btn-primary">Update Supplier</a>
												</td>
											</tr>';
										}
										echo '
									</tbody>
								</table>';
							} else {
								echo '<div class="alert alert-info">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>No products found.</strong>
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
<!-- /.Modal -->
<script>      
  function closeModal() {
    jQuery('#supplierModal').modal('hide');
    setTimeout(function() {
      jQuery('#supplierModal').remove();
    },500);   
  }           
</script>     
<?php echo ob_get_clean(); ?>