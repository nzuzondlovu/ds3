<?php
include '../includes/functions.php';
?>

<?php
if(isset($_SESSION['key']) == '' ) {
    header("location:../login.php");
}
?>

<?php
if(isset($_GET['id']) && $_GET['id'] != '') {

    $id = mysqli_real_escape_string($con, strip_tags(trim($_GET['id'])));

    if ($id) {
        $sql = "UPDATE quotation SET archive=1 WHERE id='".$id."'";
        mysqli_query($con, $sql);
        $_SESSION['success'] = 'Booking was archived successfully.';
    } else {
        $_SESSION['failure'] = 'An error occured, please try again.';
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
                <h1 class="page-header">Quotations</h1>              
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
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
            
                            <div class="row">
                             <div class="col-lg-12">
                                <div class="pull-right">
                                   <a href="bookings.php" class="btn btn-success"> Create Quotation</a>
                               </div>
                           </div>
                       </div>
                       <div class="table-responsive">
                        <?php

                        $sql = "SELECT * FROM quotation WHERE archive = 0";
                        $res = mysqli_query($con, $sql);

                        if (mysqli_num_rows($res) > 0) {
                            echo '
                            <table id="quotes" class="table data-table">
                                <thead>
                                    <tr>
                                      
                                        <th>Device Name</th>
                                        <th>Serial Number</th>
                                        <th>Model</th>
                                        <th>Accessory</th>
                                        <th>Technician</th>
                                        <th>Description</th>
                                        <th>Deposit</th>
                                        <th>Balance</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>

                                </thead>
                                <tbody>';
                                    while ($row = mysqli_fetch_assoc($res)) {

                                        $sql1 = "SELECT * FROM job WHERE id = '".$row['booking_id']."' AND archive = 0";
                                        $res1 = mysqli_query($con, $sql1);

                                        if (mysqli_num_rows($res1) > 0) {
                                            echo '
                                            <tr>
                                              
                                                <td>'.$row['name'].'</td>
                                                <td>'.$row['serial'].'</td>
                                                <td>'.$row['model'].'</td>
                                                <td>'.$row['accessory'].'</td>
                                                <td>'.$row['technician'].'</td>
                                                <td>'.$row['description'].'</td>
                                                <td>'.$row['deposit'].'</td>
                                                <td>'.$row['balance'].'</td>
                                                <td>'.$row['total'].'</td>
                                                <td class="pull-right">
                                                    <a href="editquote.php?id='.$row['id'].'" class="label label-primary">Edit Quotation</a>
                                                </td>
                                            </tr>';
                                        }                                                
                                    }
                                    echo '
                                </tbody>
                            </table>';
                        } else {
                            echo '<div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>No Quotations Found.</strong>
                        </div>';
                    }
                    ?>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div>

<!-- /#page-wrapper -->

<?php
include 'footer.php';
?>
<script>
    $(document).ready(function(){
        $('#quotes').DataTable();
    });
</script>