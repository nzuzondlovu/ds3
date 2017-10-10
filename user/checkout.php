<?php
include '../includes/functions.php';

if(isset($_SESSION['user_id']) == '' ) {
  header("location:../login.php");
}
?>
<!-- Bootstrap Core CSS -->
<link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="../assets/css/metisMenu.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="../assets/css/sb-admin-2.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<?php
$aids = [];
$payment_total = 0;
// check cookie exist
if ( isset( $_COOKIE['sids']) &&  $_COOKIE['sids'] !='') {
    $aids = explode(',',$_COOKIE['sids']) ;

// validate data
    foreach ($aids as $k => $val) {
        if (!is_numeric($val)) {
            unset($aids[$k]);
        }
    }
}

$pi = count($aids);
$ps = 'WHERE';
$_SESSION['cart_num'] = $pi;

for ($i=0; $i < $pi; $i++) {  

    if ($i == ($pi-1)) {
        $ps .= ' id='.$aids[$i];
    } else {
        $ps .= ' id='.$aids[$i].' OR';
    }

}

if ($pi == 0) {
    $ps = ' WHERE id=0';
}

?>
<div id="page-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Shopping Cart</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="pull-right">
                    <?php

                    $sql1 = "SELECT * FROM user WHERE id='".$_SESSION['user_id']."'";
                    $res1 = mysqli_query($con, $sql1);

                    if(mysqli_num_rows($res1) > 0) {

                        while($row1 = mysqli_fetch_assoc($res1)) {
                            echo 
                            $row1['name'].'<br>'.
                            $row1['surname'].'<br>'.
                            $row1['cell'].'<br>'.
                            $row1['idnumber'].'<br>'.
                            $row1['email'].'<br>'.
                            $row1['location'];
                        }
                    } 
                    ?>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        List of all orders
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="pull-right">
                                    <a href="../cart.php" class="btn btn-warning">Back to cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <?php
                            $num_rec_per_page=10;

                            if (isset($_GET["page"])) {

                                $page  = $_GET["page"];
                            } else {

                                $page=1;
                            }

                            $total = 0;
                            $start_from = ($page-1) * $num_rec_per_page;
                            $sql = "SELECT * FROM product $ps";
                            $res = mysqli_query($con, $sql);

                            if (mysqli_num_rows($res) > 0) {
                                echo '
                                <table class="table">
                                <thead>
                                <tr>
                                <th>ID</th>
                                <th>Product ID</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>';
                                while ($row = mysqli_fetch_assoc($res)) {

                                    $id = $row['id'];
                                    if ($_SESSION['cart_info'][$id]['quantity'] != null) {
                                        $row['quantity'] = $_SESSION['cart_info'][$id]['quantity'];
                                    } else {
                                        $row['quantity'] = 1;
                                    }

                                    $_SESSION['cart_info'][$row['id']] = $row;

                                    $tot = $row['price'] * $row['quantity'];
                                    $total = $total + $tot;
                                    echo '
                                    <tr>
                                    <td>'.$row['id'].'</td>
                                    <td>'.$row['prod_code'].'</td>
                                    <td>'.$row['name'].'</td>
                                    <td>'.date("M d, y",strtotime($row['date'])).'</td>
                                    <td>'.$row['quantity'].'</td>
                                    <td>R '.$row['price'].'</td>
                                    <td>R '.$tot.'</td>
                                    </tr>';
                                }
                                echo '                                          
                                </tbody>
                                </table>
                                <div class="pull-right">Total : R '.$total.'</div>';
                            } else {
                                echo '<div class="alert alert-info">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>No bookings found.</strong>
                                </div>';
                            }
                            ?>
                        </div>
                        <!-- /.table-responsive -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="pull-right">
                                    <form method="post" action="https://secure.payza.com/checkout" >
                                        <input type="hidden" name="ap_purchasetype" value="item"/> 
                                        <input type="hidden" name="ap_merchant" value="apdevforum@gmail.com"/> 
                                        <input type="hidden" name="ap_currency" value="ZAR"/>
                                        <?php
                                        $count = 0;
                                //apdevforum
                                        $sql = "SELECT * FROM product $ps";
                                        $res = mysqli_query($con, $sql);

                                        if (mysqli_num_rows($res) > 0) {

                                            while ($row = mysqli_fetch_assoc($res)) {

                                                $id = $row['id'];
                                                if ($_SESSION['cart_info'][$id]['quantity'] != null) {
                                                    $row['quantity'] = $_SESSION['cart_info'][$id]['quantity'];
                                                } else {
                                                    $row['quantity'] = 1;
                                                }

                                                $_SESSION['cart_info'][$row['id']] = $row;

                                                if ($count > 0) {
                                                    echo '
                                                    <br>
                                                    <input type="hidden" name="ap_itemname_'.$count.'" value="'.$row['name'].'"/>
                                                    <input type="hidden" name="ap_description_'.$count.'" value="'.date("M d, y",strtotime($row['date'])).'"/>
                                                    <input type="hidden" name="ap_itemcode_'.$count.'" value="'.$row['id'].'"/>
                                                    <input type="hidden" name="ap_quantity_'.$count.'" value="'.$row['quantity'].'"/>
                                                    <input type="hidden" name="ap_amount_'.$count.'" value="'.$row['price'].'"/>
                                                    ';
                                                } else if ($count == 0) {
                                                    echo '
                                                    <input type="hidden" name="ap_itemname" value="'.$row['name'].'"/>
                                                    <input type="hidden" name="ap_description" value="'.date("M d, y",strtotime($row['date'])).'"/>
                                                    <input type="hidden" name="ap_itemcode" value="'.$row['id'].'"/>
                                                    <input type="hidden" name="ap_quantity" value="'.$row['quantity'].'"/>
                                                    <input type="hidden" name="ap_amount" value="'.$row['price'].'"/>
                                                    ';
                                                }

                                                $count ++;
                                            }
                                        }
                                        echo '
                                        <input type="hidden" name="ap_taxamount" value="2.49"/>
                                        <input type="hidden" name="ap_additionalcharges" value="1.19"/>
                                        <input type="hidden" name="ap_shippingcharges" value="7.99"/> 
                                        <input type="hidden" name="ap_discountamount" value="4.99"/>
                                        <input type="hidden" name="ap_ipnversion" value="2"/>

                                        <input type="hidden" name="ap_returnurl" value="http://ds3.nzuzondlovu.com/user/thanks.php?id='.$_SESSION['user_id'].'" /> 
                                        <input type="hidden" name="ap_cancelurl" value="http://ds3.nzuzondlovu.com/user/cart.php" /> 
                                        <input type="image" name="ap_image" src="https://www.payza.com/images/payza-buy-now.png"/>
                                        </form>';
                                        ?>                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>