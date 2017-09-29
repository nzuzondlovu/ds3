<?php
include 'header.php';
?>

<?php

$pid = '';
$type = '';

if (isset($_GET["id"]) && $_GET['id'] != '') {

    $pid  = mysqli_real_escape_string($con, strip_tags(trim($_GET["id"])));

    $sql = "SELECT * FROM product WHERE id=".$pid."";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($res);
    $type = $row['type'];

} else {

    header("Location: shop.php");
}
?>

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Shop</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Search Products</h2>
                    <form action="">
                        <input type="text" placeholder="Search products...">
                        <input type="submit" value="Search">
                    </form>
                </div>

                <div class="single-sidebar">
                    <h2 class="sidebar-title">Products</h2>
                    <?php
                    $sql = "SELECT * FROM product WHERE type='".$type."' ORDER BY id DESC LIMIT 4";
                    $res = mysqli_query($con, $sql);

                    if (mysqli_num_rows($res) > 0) {

                        while ($row = mysqli_fetch_assoc($res)) {

                            $promo = '<ins>R'.$row['promo_price'].'</ins> <del>R'.$row['price'].'</del>';

                            if ($row['promo_price'] == '0.00') {

                                $promo = '<ins>R'.$row['price'].'</ins>';
                            }

                            echo '
                            <div class="thubmnail-recent">
                                <img src="uploads/'.$row['pic_url'].'" class="recent-thumb" alt="">
                                <h2><a href="product.php?id='.$row['id'].'">'.$row['name'].'</a></h2>
                                <div class="product-sidebar-price">
                                    '.$promo.'
                                </div>                             
                            </div>';
                        }

                    } else {

                        echo '
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>No titles found.</strong>
                        </div>';
                    }
                    ?>
                </div>

                <div class="single-sidebar">
                    <h2 class="sidebar-title">Recent Posts</h2>
                    <ul>
                        <?php
                        $sql = "SELECT * FROM product ORDER BY id DESC LIMIT 5";
                        $res = mysqli_query($con, $sql);

                        if (mysqli_num_rows($res) > 0) {

                            while ($row = mysqli_fetch_assoc($res)) {

                                echo '
                                <li><a href="product.php?id='.$row['id'].'">'.$row['name'].'</a></li>';
                            }

                        } else {

                            echo '
                            <div class="alert alert-info">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>No titles found.</strong>
                            </div>';
                        }
                        ?>
                    </ul>
                </div>
            </div>

            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="product-breadcroumb">
                        <?php
                        $sql = "SELECT * FROM product WHERE id=".$pid." ORDER BY id DESC LIMIT 5";
                        $res = mysqli_query($con, $sql);

                        if (mysqli_num_rows($res) > 0) {

                            while ($row = mysqli_fetch_assoc($res)) {

                                $promo = '<ins>R'.$row['promo_price'].'</ins> <del>R'.$row['price'].'</del>';

                                if ($row['promo_price'] == '0.00') {

                                    $promo = '<ins>R'.$row['price'].'</ins>';
                                }

                                echo '
                                <a href="index.php">Home</a>
                                <a href="shop.php?cat='.$row['type'].'">'.$row['type'].'</a>
                                <a href="#">'.$row['name'].'</a>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="product-images">
                                        <div class="product-main-img">
                                            <img src="uploads/'.$row['pic_url'].'" alt="">
                                        </div>

                                        <div class="product-gallery">
                                            <img src="uploads/'.$row['pic_url'].'" alt="">
                                            <img src="uploads/'.$row['pic_url'].'" alt="">
                                            <img src="uploads/'.$row['pic_url'].'" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="product-inner">
                                        <h2 class="product-name">'.$row['name'].'</h2>
                                        <div class="product-inner-price">
                                            '.$promo.'
                                        </div>    

                                            <div class="quantity">
                                                <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                            </div>
                                            <a class="add_to_cart_button" ref="'.$row['id'].'" href="cart.php">Add to cart</a>

                                        <div class="product-inner-category">
                                            <p>Category: <a href="shop.php?cat='.$row['type'].'">'.$row['type'].'</a>. Tags: <a href="">awesome</a>, <a href="">best</a>, <a href="">sale</a>, <a href="">shoes</a>. </p>
                                        </div> 

                                        <div role="tabpanel">
                                            <ul class="product-tab" role="tablist">
                                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                    <h2>Product Description</h2>  
                                                    <p>'.$row['description'].'</p>
                                                </div>                                           
                                                <div role="tabpanel" class="tab-pane fade" id="profile">
                                                    <h2>Reviews</h2>
                                                    <div class="submit-review">
                                                        <p><label for="name">Name</label> <input name="name" type="text"></p>
                                                        <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                        <div class="rating-chooser">
                                                            <p>Your rating</p>

                                                            <div class="rating-wrap-post">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                        </div>
                                                        <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                        <p><input type="submit" value="Submit"></p>
                                                    </div>
                                                </div>
                                            </div>';
                                        }
                                    }  else {

                                        echo '
                                        <div class="alert alert-info">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            <strong>Product not found.</strong>
                                        </div>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="related-products-wrapper">
                        <h2 class="related-products-title">Related Products</h2>
                        <div class="related-products-carousel">
                            <?php
                            $sql = "SELECT * FROM product LIMIT 32";
                            $res = mysqli_query($con, $sql);

                            if (mysqli_num_rows($res) > 0) {

                                while ($row = mysqli_fetch_assoc($res)) {

                                    if ($pid != $row['id']) {

                                        $promo = '<ins>R'.$row['promo_price'].'</ins> <del>R'.$row['price'].'</del>';

                                        if ($row['promo_price'] == '0.00') {

                                            $promo = '<ins>R'.$row['price'].'</ins>';
                                        }

                                        echo '
                                        <div class="single-product">
                                            <div class="product-f-image">
                                                <img src="uploads/'.$row['pic_url'].'" alt="">
                                                <div class="product-hover">
                                                    <a class="add-to-cart-link add_to_cart_button" ref="'.$row['id'].'" href="cart.php"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                    <a href="?id='.$row['id'].'" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                                </div>
                                            </div>

                                            <h2><a href="?id='.$row['id'].'">'.$row['name'].'</a></h2>

                                            <div class="product-carousel-price">
                                                '.$promo.'
                                            </div> 
                                        </div>';
                                    }
                                }

                            } else {

                                echo '
                                <div class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>No titles found.</strong>
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

<?php
include 'footer.php';
?>