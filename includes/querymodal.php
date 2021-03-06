<?php
include_once 'functions.php';
$name = '';
$email = '';
$query = '';

if(isset($_POST['id']) && $_POST['id'] != '') {

  $id = mysqli_real_escape_string($con, strip_tags(trim($_POST['id'])));
  $sql = "SELECT * FROM query WHERE id='".$id."'";
  $res = mysqli_query($con, $sql);

  if (mysqli_num_rows($res) > 0) {

    while ($row = mysqli_fetch_assoc($res)) {

      $name = $row['name'];
      $email = $row['email'];
      $query = $row['query'];
    }
  }
}

?>


<?php ob_start(); ?>
<!-- Modal -->
    <div class="modal fade " id="responseModal" tabindex="-1" role="dialog" aria-labelledby="responseModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" onclick="closeModal()" aria-label="Close"><span class="fa fa-close" aria-hidden="true"></span> Close</button>
          
          </div>
          <div class="modal-body">
                
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Response</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
   

      <form id="responseForm" role="form" method="post">
              
                  <div class="form-group">
                    <label>Name</label>
                    <input value="<?php echo $name; ?>" class="form-control" type="text" disabled>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input value="<?php echo $email; ?>" class="form-control" type="text" disabled>
                  </div>                              
                  <div class="form-group">
                    <label>Query</label>
                    <input value="<?php echo $query; ?>" class="form-control" disabled>
                  </div>
                  <div class="form-group">
                    <label>Feedback</label>
                    <textarea id="feedback" name="feedback" class="form-control" rows="3" ></textarea>
                  </div>
                  <input type="text" name="id" value="<?= $id; ?>" hidden>
                 
                    <button  name="submit" type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
               
                           <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>

                </form>
            </div>
            <!-- /.box-body -->
       
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
         
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- /.Modal -->
<script>
  function closeModal() {
    jQuery('#responseModal').modal('hide');
    setTimeout(function() {
      jQuery('#responseModal').remove();
    },500);
  }
</script>
<script type="text/javascript">
  
  $( document ).ready( function () {
      $( "#responseForm" ).validate( {
        rules: {
          feedback: {
            required: true,
            minlength: 10,
            maxlength: 250
          }
        },
        messages: {
          feedback: {
            required: "Please enter a response to the customers query",
            minlength: "Your response has to be more than 10 characters",
            maxlength: "Your response cant be longer than 250 characters"
          }
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
          // Add the `help-block` class to the error element
          error.addClass( "help-block" );

          if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.parent( "label" ) );
          } else {
            error.insertAfter( element );
          }
        },
        highlight: function ( element, errorClass, validClass ) {
          $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
          $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
        }
      } );
    });
</script>
    <?php echo ob_get_clean(); ?>

<script src="../admin/plugins/iCheck/icheck.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    //Add text editor
    $("#compose-textarea").wysihtml5();
  });
</script>