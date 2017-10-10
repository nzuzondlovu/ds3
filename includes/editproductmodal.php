
<?php
ob_start();
include '../includes/functions.php';
?>

<?php
if(isset($_SESSION['key']) == '' ) {
  header("location:../login.php");
}
?>


<?php

  


if(isset($_POST['submit'])) {
  $price = mysqli_real_escape_string($con, strip_tags(trim($_POST["price"])));
  $bname = mysqli_real_escape_string($con, strip_tags(trim($_POST["start"])));
  $genname = mysqli_real_escape_string($con, strip_tags(trim($_POST["end"])));
    $type = mysqli_real_escape_string($con, strip_tags(trim($_POST["price"])));
  $description = mysqli_real_escape_string($con, strip_tags(trim($_POST["start"])));
 


  $date = date("Y-m-d");
  
  if($price != '' && $start != '' && $end != '') {

    if ($start < $date) {
      $_SESSION['failure'] = 'Entered start date has past already.';

    } else if ($end > $start) {
$//sql = "INSERT INTO product(user, name, description, type, price, pic_url, date,onhand_qty,qty,supplier,brandname,oPrice,profit,promo_price,promo_date1,promo_date2,archive)

      $sql = "UPDATE product SET price='".$price."', brandname='".$brandname."', name='".$name."' WHERE id='".$id."'";
      mysqli_query($con, $sql);
      $_SESSION['success'] = 'details successfully updated';
      header("Location: promotions.php");
    } else {
      $_SESSION['failure'] = '';
    }   
  }else {
    $_SESSION['failure'] = 'Please fill in all fields.';
  }
}
?>

<?php

$promo = '';
$gennam = '';
$brandnam = '';
$typ = '';
$pri = '';
$des = '';
 $id = mysqli_real_escape_string($con, strip_tags(trim($_POST['id'])));

$sql = "SELECT * FROM product WHERE id='".$id."' ";
$res = mysqli_query($con, $sql);

if(mysqli_num_rows($res) > 0) {
  while($row = mysqli_fetch_assoc($res)) {
    $promo = '

    ID : '.$row['id'].'<br>
    User : '.$row['idnumber'].'<br>
    Name : '.$row['brand_name'].','.$row['generic_name'].'<br>
    Type : '.$row['type'].'<br>
    Price : R '.$row['price'].'<br>
    Date : '.date("M d, y",strtotime($row['date'])).'<br>
    Description : '.$row['description'].'<br>
    <img class="img-responsive" src="../uploads/'.$row['pic_url'].'">';
    $gennam = $row['generic_name'];
    $brandnam = $row['brand_name'];
    $typ = $row['type'];
    $pri = $row['price'];
    $des = $row['description'];
  }
}
?>


<?php

if (isset($_POST['id']) && $_POST['id'] != null) 
{

  $id = mysqli_real_escape_string($con, strip_tags(trim($_POST['id'])));
  $sql = "SELECT * FROM product WHERE id='".$id."'";
  $res = mysqli_query($con, $sql);


  if (mysqli_num_rows($res) > 0) {

    while ($row = mysqli_fetch_assoc($res)) {

   $promo = ' 

  <div class="resume">
    <header class="page-header">
    <h1 class="page-title">Edit Details For Product  '.$row['prod_code'].' </h1>
    <small> <i class="fa fa-clock-o"></i> Product added on: <time> '.date("M d, y",strtotime($row['date'])).'</time></small>
  </header>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10 col-lg-offset-0 col-lg-12 ">
    <div class="panel panel-default">
      <div class="panel-heading resume-heading">
        <div class="row">
          <div class="col-lg-12">
            <div class="col-xs-12 col-sm-4">
              <figure>

                   <li class="list-group-item"><i class="fa fa-group"></i> '.$row['supplier'].'</li>
                   <br/>
                <img  src="../uploads/'.$row['pic_url'].'" class="img-thumbnail img-responsive" alt="Cinque Terre" width="300" height="300">
                     <li class="list-group-item"><i class="fa fa-money"> </i> Price- R '.$row['price'].' </li>
                <li class="list-group-item"><i class="fa fa-money"></i> Original Price- R '.$row['oPrice'].'.00</li>

     <li class="list-group-item"><i class="fa fa-money"></i> Profit- R '.$row['profit'].'.00</li>
          <li class="list-group-item"><i class="fa fa-envelope"></i> QTY- '.$row['qty'].'</li>
          

              </figure>
              
              <div class="row">
             
              </div>
              
            </div>

            <div class="col-xs-12 col-sm-8">
              <ul class="list-group">
         
                <li class="list-group-item"><i class="fa fa-tag"></i> '.$row['prod_code'].' </li>
                <li class="list-group-item"><i class="fa fa-user"></i> Added By -'.$row['idnumber'].'</li>
                               <li class="list-group-item"><i class="fa fa-briefcase"></i> '.$row['type'].'</li>
                <li class="list-group-item"><i class="fa fa-registered"></i> '.$row['brandname'].' , '.$row['name'].'</li>
                    

            

     <li class="list-group-item">
     </i>   
         <div class="bs-callout bs-callout-danger">
        <h4>Lates Orders</h4>
        <table class="table table-striped table-responsive ">
          <thead>
            <tr><th></th>
            <th></th>
            <th></th>
          </tr></thead>
          <tbody>
            <tr>
              <td></td>
              <td></td>
              <td> </td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td>    </td>
            </tr>
          </tbody>
        </table>
      </div></li>

       </ul>

            </div>
          </div>
        </div>
      </div>
  

      <div class="bs-callout bs-callout-danger">
        <h4 >   Description  </h4>
        <ul class="list-group">
          <a class="list-group-item inactive-link" href="#">
            

     '.$row['description'].'
   
     

          

          </a>

        </ul>
      </div>

    </div>

  </div>
</div>
    
</div>
';
    $gennam = $row['name'];
    $brandnam = $row['brandname'];
    $typ = $row['type'];
    $pri = $row['price'];
    $des = $row['description'];
        $op = $row['oPrice'];
    $prof = $row['profit'];
    }
  }
}

?>

<!-- Modal -->
<div class="modal fade " id="responseModal" tabindex="-1" role="dialog" aria-labelledby="responseModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" onclick="closeModal()" aria-label="Close"><span class="fa fa-close" aria-hidden="true"></span> Close</button>
        <h4 class="modal-title" id="responseModalLabel">Edit Product</h4>
      </div>
      <div class="modal-body">
        <div class="row">
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
  
            <div class="row">
              <div class="col-lg-12">
          
              </div>



</div>
              <div class="col-md-12">  <?php
                echo $promo;
                ?>
              </div>
    <div class="col-xs-12 col-sm-12">
             

                <form role="form" method="post">

              <div class="form-group">
            
           
    
        
          
            
    
      
            


       
                  <div class="form-group col-xs-12 col-sm-6">
                    <label>Brand Name</label>
                    <input type="text" name="brandname" class="form-control" value="<?php echo $brandnam; ?>">
                  </div>
                    <div class="form-group col-xs-12 col-sm-6">
                    <label>Generic Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $gennam; ?>">
                  </div>
                  <div class="form-group col-xs-12 col-sm-6">
                    <label>Device type</label>
                    <select name="type" class="form-control">
                      <option value="" selected="selected"><?php echo $typ; ?></option>
                      <?php
                      $sql = "SELECT * FROM category ORDER BY name ASC";
                      $res = mysqli_query($con, $sql);

                      if(mysqli_num_rows($res) > 0) {
                        while($row = mysqli_fetch_assoc($res)) {
                          echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                        }
                      }
                      ?>
                    </select>
                  </div>
   <div class="form-group  col-sm-6">
                    <label>Price</label>
                  <input class="form-control" type="text" id="txt1" name="price" onkeyup="sum();" value="<?php echo $pri; ?>">

      


                  </div> 
                   <div class="form-group col-xs-12 col-sm-6">

                    <label>Device description</label>
                    <textarea name="description" class="form-control" rows="3"><?php echo $des; ?></textarea>

                  </div>
                       

 <div class="row">
              <div class="col-lg-12">
               
                <div class="pull-right">
                <div class="form-group col-xs-12 col-sm-6">
                       <input type="text" name="id" value="<?= $id; ?>" hidden>
                  <button name="prodEdit" type="submit" class="btn btn-primary">Update Product</button>
                </div>
  <div class="form-group col-xs-12 col-sm-6">
                  <button type="reset" class="btn btn-default">Reset Form</button>

                </div>
                </div>
              </div>



</div>
       
                      
             
                </form>

              </div>
              <!-- /.col-lg-6 (nested) -->
            </div>
            <!-- /.row (nested) -->
          </div>
          <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
      </div>
      <!-- /.col-lg-12 -->
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
      $( "#quoteForm" ).validate( {
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