<?php
ob_start();
include_once 'functions.php';
?>

<?php
if(isset($_SESSION['key']) == '' ) {
  header("location:../login.php");
}
?>


<?php

if (isset($_POST['id']) && $_POST['id'] != null) 
{

  $id = mysqli_real_escape_string($con, strip_tags(trim($_POST['id'])));
  $sql = "SELECT * FROM product WHERE id='".$id."' ";
  $res = mysqli_query($con, $sql);


  if (mysqli_num_rows($res) > 0) {

    while ($row = mysqli_fetch_assoc($res)) {

   $promo = '
    ID : '.$row['id'].'<br>
    User : '.$row['user'].'<br>
    Name : '.$row['name'].'<br>
    Type : '.$row['type'].'<br>
    Price : R '.$row['price'].'<br>
    Date : '.date("M d, y",strtotime($row['date'])).'<br>
    Description : '.$row['description'].'<br>

    <img  src="../uploads/'.$row['pic_url'].'" class="img-thumbnail" alt="Cinque Terre" width="200" height="200">';
    }
  }
}

?>


<?php ob_start(); ?>
<!-- Modal -->
<div class="modal fade " id="responseModal" tabindex="-1" role="dialog" aria-labelledby="responseModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" onclick="closeModal()" aria-label="Close"><span class="fa fa-close" aria-hidden="true"></span> Close</button>
        <h4 class="modal-title" id="responseModalLabel">Promotional Item Details</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
          <div class="col-lg-12">
  

                <div class="pull-right">
                  <a href="products.php" class="btn btn-warning">Products</a>
                  <a href="promotions.php" class="btn btn-warning">Promotions</a>
                </div>
              </div>
            <h2>Device details</h2>
            <p>
            <?php
                echo $promo;
                ?>

                
            </p>
          </div>
          <div class="col-md-6">
           


                <form id="promoForm " role="form" method="post">
                  <div class="form-group">
                    <label>Promotional Price</label>
                    <input type="decimal" name="price" class="form-control" placeholder="Enter price">
                  </div>
                  <div class="form-group">
                    <label>Start Date</label>
                    <input type="date" name="start" class="form-control" placeholder="Enter date">
                  </div>
                  <div class="form-group">
                    <label>End Date</label>
                    <input type="date" name="end" class="form-control" placeholder="Enter date">
                  </div>
                          <input type="text" name="id" value="<?= $id; ?>" hidden>
                  <button name="btnPromo" type="submit" class="btn btn-primary">Submit Promotion</button>
                  <button type="reset" class="btn btn-default">Reset Promotion</button>
                </form>

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
      $( "#promoForm" ).validate( {
        rules: {
          model: {
            required: true,
            maxlength: 35
          },
          accessory: {
            required: true,
            maxlength: 250
          },
          technician: "required",
          deposit: {
            required: true,
            maxlength: 10
          },
          balance: {
            required: true,
            maxlength: 10
          },
          total: {
            required: true,
            maxlength: 10
          },
          status: "required",
          desc: {
            required: true,
            minlength: 10,
            maxlength: 250
          }
        },
        messages: {
          model: {
            required: "Please enter the model of the device",
            maxlength: "Your model cant be longer than 35 characters"
          },
          accessory: {
            required: "Please enter the accessoriesof the device",
            maxlength: "Your response cant be longer than 250 characters"
          },
          technician: "Please select a technician",
          deposit: {
            required: "Please enter a deposit amount",
            maxlength: "Please enter a valid amount"
          },
          balance: {
            required: "Please enter a balance amount",
            maxlength: "Please enter a valid amount"
          },
          total: {
            required: "Please enter the total amount",
            maxlength: "Please enter a valid amount"
          },
          status: "Please select a device status",
          desc: {
            required: "Please enter a description of the device",
            minlength: "Your description has to be more than 10 characters",
            maxlength: "Your description cant be longer than 250 characters"
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
      });
    });
  </script>
  <?php echo ob_get_clean(); ?>