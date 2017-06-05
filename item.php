<?php
include 'includes/functions.php';
?>

<?php

$title = '';
$price = '';

if (isset($_GET['id']) && $_GET['id'] != '') {

    $id = (int)mysqli_real_escape_string($con, strip_tags(trim($_GET['id'])));
    $sql = "SELECT * FROM product WHERE id='".$id."'";
    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) > 0) {

        $row = mysqli_fetch_assoc($res);
        $title = $row['name'];
        $price = $row['price'];

    } else {
        header('location:index.php');
    }
} else {
    header('location:index.php');
}

?>

<?php

if (isset($_POST['quantity'])) {
    $quantity = (int)mysqli_real_escape_string($con, strip_tags(trim($_POST['num'])));
    //$amount = $price * $quantity;

    cart($id, $title, $price, $quantity, $con);
}
?>

<?php

if (isset($_POST['review'])) {
    $name = mysqli_real_escape_string($con, strip_tags(trim($_POST['name'])));
    $message = mysqli_real_escape_string($con, strip_tags(trim($_POST['message'])));
    $date = date("Y-m-d H:i:s");
    $user = 0;
    $rate = 0;

    if ($name != '' && $message != '') {
        $sql = "INSERT INTO review(prod_id, user, name, message, rate, date)
        VALUES('".$id."', '".$user."', '".$name."', '".$message."', '".$rate."', '".$date."')";
        mysqli_query($con,$sql);
        $_SESSION['success'] = 'Your review has been successfully added.';
    } else {
        $_SESSION['failure'] = 'Please fill in all fields.';
    }
    

    
}
?>

<?php
include 'header.php';
?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-md-3">
            <p class="lead"><?php echo $sitename; ?></p>
            <div class="list-group">
                <?php
                catagory($con);
                ?>
            </div>
        </div>

        <div class="col-md-9">
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
            <div class="thumbnail">
                <?php
                echo '
                <img class="img-responsive" src="uploads/'.$row['pic_url'].'" alt="">
                <div class="caption-full">                
                    <h4 class="pull-right">R '.$row['price'].'</h4>
                    <h4><a href="#">'.$row['name'].'</a>
                    </h4>
                    <p>'.$row['description'].'</p>
                    <div class="col-md-3 pull-right">
                        <form method="post">
                            <dl>
                                <dt class="sidebar-search">
                                    <div class="input-group custom-search-form">
                                        <input type="number" name="num" class="form-control" placeholder="Enter Quantity">
                                        <span class="input-group-btn">
                                            <button name="quantity" type="submit" class="btn btn-info"><i class="fa fa-shopping-cart"></i></button>
                                        </span>
                                    </div>
                                    <!-- /input-group -->
                                </dt>
                            </dl>
                        </form>
                    </div>
                </div><br>
                <div class="ratings">
                    <p class="pull-right">3 reviews</p>
                    <p>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star-empty"></span>
                        4.0 stars
                    </p>
                </div>';
                ?>                
            </div>

            <div class="well">

                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <form method="POST">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea type="text" rows="3" name="message" class="form-control"></textarea>
                            </div>
                            <div class="text-right">
                                <button name="review" type="submit" class="btn btn-success">Leave a Review</button>
                            </div>
                        </form>
                    </div>
                </div>               

                <hr>

                <?php
                $num_rec_per_page=10;

                if (isset($_GET["page"])) {

                    $page  = $_GET["page"];
                } else {

                    $page=1;
                }

                $start_from = ($page-1) * $num_rec_per_page;
                $sql = "SELECT * FROM review WHERE prod_id=$id ORDER BY id DESC LIMIT $start_from, $num_rec_per_page";
                $res = mysqli_query($con, $sql);

                if (mysqli_num_rows($res) > 0) {

                    while ($row = mysqli_fetch_assoc($res)) {
                        echo '
                        <div class="row">
                            <div class="col-md-12">
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star-empty"></span>
                                '.$row['name'].'
                                <span class="pull-right">'.date("M d, y",strtotime($row['date'])).'</span>
                                <p>'.$row['message'].'</p>
                            </div>
                        </div>

                        <hr>';
                    }
                } else {
                    echo '<div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>No reviews found.</strong>
                </div>';
            }

            ?>
        </div>

    </div>

</div>

</div>
<!-- /.container -->
<?php
include 'footer.php';
?>