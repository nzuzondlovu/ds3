<?php
include '../includes/functions.php';
?>

<?php
if(isset($_SESSION['key']) == '' ) {
    header("location:../login.php");
}
?>

<?php

if(isset($_POST['submit'])) {

include('connect.php');
        $name = mysqli_real_escape_string($con, strip_tags(trim($_POST["name"])));
    $type = mysqli_real_escape_string($con, strip_tags(trim($_POST["type"])));
    $description = mysqli_real_escape_string($con, strip_tags(trim($_POST["description"])));
    $price = mysqli_real_escape_string($con, strip_tags(trim($_POST["price"])));
    $brandname = mysqli_real_escape_string($con, strip_tags(trim($_POST["brandname"])));
    $supplier = mysqli_real_escape_string($con, strip_tags(trim($_POST["supplier"])));
    $oPrice = mysqli_real_escape_string($con, strip_tags(trim($_POST["oPrice"])));
    $profit = mysqli_real_escape_string($con, strip_tags(trim($_POST["profit"])));
        $onhand_qty  = mysqli_real_escape_string($con, strip_tags(trim($_POST["onhand_qty"])));
    $qty = mysqli_real_escape_string($con, strip_tags(trim($_POST["qty"])));


        $target_dir = "../uploads/";
    $url = basename( $_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
   
    $date = date("Y-m-d H:i:s");

     if($name != '' && $type != '' && $description != '' && $price != '' && $brandname != ''&& $supplier != ''&& $oPrice != ''
        && $profit != ''&& $onhand_qty != '' && $qty != '') {
     
     $sql = "INSERT INTO product(name, description, type, price, pic_url, date,onhand_qty,qty,qty_sold,supplier,brandname,oPrice,profit)

        VALUES( '".$name."','".$description."','".$type."','".$price."','".$brandname."','".$supplier."','".$oPrice."','".$profit."','".$onhand_qty."','".$qty."')";

        mysqli_query($db, $sql);
        $_SESSION['success'] = 'Your new driver was added successfully.';
        header("Location: products.php");
        upload($url, $target_dir, $target_file, $sql, $con);


    }else {
        $_SESSION['failure'] = 'Please fill in all fields.';
    }
    


}
?>

<?php
include 'header.php';
?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add New Driver</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <!-- /.row -->
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
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Enter Driver details
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-6">
        
                        <form role="form" method="post" enctype="multipart/form-data">
                        

                                <div class="form-group">
                                <label>Brand Name</label>
                                <input name="brandname" class="form-control" placeholder="Enter text">
                            </div>

                                <div class="form-group">
                                <label>Generic Name</label>
                                <input name="name" class="form-control" placeholder="Enter text">

                            </div>


                            <div class="form-group">
                                <label>Selling Price</label>
                            
                                <input class="form-control" type="text" id="txt1" name="price" onkeyup="sum();" Required placeholder="R0.00">
                            </div>
                            <div class="form-group">
                                <label>Original Price</label>
                                <input class="form-control"  type="text" id="txt2"  name="oPrice" onkeyup="sum();" Required placeholder="R0.00">
                            </div>
                    
                        
                            <div class="form-group">
                                <label>Profit</label>   
                                        <input type="text" id="txt3" class="form-control" name="profit" readonly>       
                        


                            </div>

                            

                                <div class="form-group">
                                <label>on Quantity</label>
                                <input type="number" name="qty" class="form-control" placeholder="Enter text">
                            </div>
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="number" name="onhand_qty" class="form-control" placeholder="Enter text">
                            </div>

                            <div class="form-group">
                                <label>Select Catagory</label>
                                <select name="type" class="form-control">
                                    <option value="" selected="selected">Select type</option>
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

                                <div class="form-group">
                                <label>Select Supplier</label>
                                <select name="supplier" class="form-control">
                                    <option value="" selected="selected">Select Supplier</option>
                                    <?php
                                    $sql = "SELECT * FROM suppliers ORDER BY name ASC";
                                    $res = mysqli_query($con, $sql);

                                    if(mysqli_num_rows($res) > 0) {
                                        while($row = mysqli_fetch_assoc($res)) {
                                            echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        
                            <div class="form-group">
                                <label>Upload picture</label>
                                <input type="file" name="fileToUpload">
                            </div>
                            <div class="form-group">
                                <label>Device description</label>
                                <textarea name="description" class="form-control" rows="3"></textarea>
                            </div>
                            <button name="submit" type="submit" class="btn btn-primary">Save </button>
                            <button type="reset" class="btn btn-default">Reset</button>
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
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<script>
function sum() {
            var txtFirstNumberValue = document.getElementById('txt1').value;
            var txtSecondNumberValue = document.getElementById('txt2').value;
            var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt3').value = result;
                
            }
            
             var txtFirstNumberValue = document.getElementById('txt11').value;
            var result = parseInt(txtFirstNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt22').value = result;                
            }
            
             var txtFirstNumberValue = document.getElementById('txt11').value;
            var txtSecondNumberValue = document.getElementById('txt33').value;
            var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt55').value = result;
                
            }
            
             var txtFirstNumberValue = document.getElementById('txt4').value;
             var result = parseInt(txtFirstNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt5').value = result;
                }
            
        }
</script>
<?php
include 'footer.php';
?>
