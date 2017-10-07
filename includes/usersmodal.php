<?php
include_once 'functions.php';
if (isset($_POST['id']) && $_POST['id'] != null) {
  $id = mysqli_real_escape_string($con, strip_tags(trim($_POST["id"])));

  $cat = '';
  $name = '';
  $surname = '';
  $cell='';
  $idnumber='';
  $email = '';

  $sql = "SELECT * FROM user WHERE id=$id";
  $res = mysqli_query($con, $sql);

  if(mysqli_num_rows($res) > 0) {
    while($row = mysqli_fetch_assoc($res)) {
      $cat = '
      ID : '.$row['id'].'<br>
      Name : '.$row['name'].'<br>
      Surname : '.$row['surname'].'<br>
      Contact # : '.$row['cell'].'<br>
      ID Number : '.$row['idnumber'].'<br>
      Email : '.$row['email'].'<br>
      Address : '.$row['location'].'<br>
      Current Role : '.$row['role'].'
      ';
      $name = $row['name'];
      $surname = $row['surname'];
      $cell=$row['cell'];
      $idnumber=$row['idnumber'];
      $email = $row['email'];   
    }
  }
}
?>
<?php ob_start(); ?>
<!-- Modal -->
<div class="modal fade " id="usersModal" tabindex="-1" role="dialog" aria-labelledby="usersModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" onclick="closeModal()" aria-label="Close"><span class="fa fa-close" aria-hidden="true"></span> Close</button>
        <h4 class="modal-title" id="usersModalLabel">Edit User</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <h2>User details</h2>
            <?php
            echo $cat;
            ?>
          </div>

          <div class="col-md-6">
            <form role="form" method="post">
              <div class="form-group">
                <label>Choose Role</label>
                <select name="role" class="form-control">
                  <option value="" selected="selected">Select role</option>
                  <option value="admin" >Admin</option>
                  <option value="clerk" >Clerk</option>
                  <option value="technician" >Technician</option>
                  <option value="driver" >Driver</option>
                </select>
              </div>
              <div class="form-group">
                <label>Technician Specialty</label>
                <select name="speciality" class="form-control">
                  <option value="" selected="selected">Select speciality (Technician only)</option>
                  <option value="Hardware" >Hardware Technician</option>
                  <option value="Software" >Software Technician</option>
                  <option value="Both" > Hardware & Software Technician</option>
                </select>                                        
              </div>
              <input type="text" name="id" value="<?= $id; ?>" hidden="hidden" />
              <input type="text" name="name" value="<?= $name; ?>" hidden="hidden" />
              <input type="text" name="surname" value="<?= $surname; ?>" hidden="hidden" />
              <input type="text" name="cell" value="<?= $cell; ?>" hidden="hidden" />
              <input type="text" name="idnumber" value="<?= $idnumber; ?>" hidden="hidden" />
              <input type="text" name="email" value="<?= $email; ?>" hidden="hidden" />
              
              <button name="user" type="submit" class="btn btn-primary">Update Role</button>
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
    jQuery('#usersModal').modal('hide');
    setTimeout(function() {
      jQuery('#usersModal').remove();
    },500);
  }
</script>
<?php echo ob_get_clean(); ?>