<?php
include 'header.php';
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
            <?php


            if (isset($_GET["page"])) {

                $page  = $_GET["page"];
            } else {

                $page=1;
            }
            $num_rec_per_page = 12;
            $start_from = ($page-1) * $num_rec_per_page;

            $sql = "SELECT * FROM product ORDER BY id DESC LIMIT $start_from, $num_rec_per_page";
            $res = mysqli_query($con, $sql);

            if (mysqli_num_rows($res) > 0) {

                while ($row = mysqli_fetch_assoc($res)) {

                    $promo = '<ins>R'.$row['promo_price'].'</ins> <del>R'.$row['price'].'</del>';

                    if ($row['promo_price'] == '0.00') {

                        $promo = '<ins>R'.$row['price'].'</ins>';
                    }
                    
                    echo '
                    <div class="col-md-3 col-sm-6">
                        <div class="single-shop-product">
                            <div class="product-upper">
                                      <img src="uploads/'.$row['pic_url'].'" width="195" heigh="243" class="img-rounded" >
                            </div>
                            <h2><a href="product.php?id='.$row['prod_code'].'">'.$row['brandname'].' '.$row['name'].'</a></h2>
                            <div class="product-carousel-price">
                                '.$promo.'
                            </div>  

                            <div class="product-option-shop">
                                <a class="add_to_cart_button" ref="'.$row['id'].'" href="cart.php">Add to cart</a>
                            </div>                       
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
        <!--<div class="col-md-3 col-sm-6">
            <div class="single-shop-product">
                <div class="product-upper">
                    <img src="img/product-2.jpg" alt="">
                </div>
                <h2><a href="">Apple new mac book 2015 March :P</a></h2>
                <div class="product-carousel-price">
                    <ins>$899.00</ins> <del>$999.00</del>
                </div>  

                <div class="product-option-shop">
                    <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Add to cart</a>
                </div>                       
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="single-shop-product">
                <div class="product-upper">
                    <img src="img/product-1.jpg" alt="">
                </div>
                <h2><a href="">Apple new mac book 2015 March :P</a></h2>
                <div class="product-carousel-price">
                    <ins>$899.00</ins> <del>$999.00</del>
                </div>  

                <div class="product-option-shop">
                    <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Add to cart</a>
                </div>                       
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="single-shop-product">
                <div class="product-upper">
                    <img src="img/product-3.jpg" alt="">
                </div>
                <h2><a href="">Apple new mac book 2015 March :P</a></h2>
                <div class="product-carousel-price">
                    <ins>$899.00</ins> <del>$999.00</del>
                </div>  

                <div class="product-option-shop">
                    <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Add to cart</a>
                </div>                       
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="single-shop-product">
                <div class="product-upper">
                    <img src="img/product-4.jpg" alt="">
                </div>
                <h2><a href="">Apple new mac book 2015 March :P</a></h2>
                <div class="product-carousel-price">
                    <ins>$899.00</ins> <del>$999.00</del>
                </div>  

                <div class="product-option-shop">
                    <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Add to cart</a>
                </div>                       
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="single-shop-product">
                <div class="product-upper">
                    <img src="img/product-2.jpg" alt="">
                </div>
                <h2><a href="">Apple new mac book 2015 March :P</a></h2>
                <div class="product-carousel-price">
                    <ins>$899.00</ins> <del>$999.00</del>
                </div>  

                <div class="product-option-shop">
                    <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Add to cart</a>
                </div>                       
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="single-shop-product">
                <div class="product-upper">
                    <img src="img/product-1.jpg" alt="">
                </div>
                <h2><a href="">Apple new mac book 2015 March :P</a></h2>
                <div class="product-carousel-price">
                    <ins>$899.00</ins> <del>$999.00</del>
                </div>  

                <div class="product-option-shop">
                    <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Add to cart</a>
                </div>                       
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="single-shop-product">
                <div class="product-upper">
                    <img src="img/product-3.jpg" alt="">
                </div>
                <h2><a href="">Apple new mac book 2015 March :P</a></h2>
                <div class="product-carousel-price">
                    <ins>$899.00</ins> <del>$999.00</del>
                </div>  

                <div class="product-option-shop">
                    <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Add to cart</a>
                </div>                       
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="single-shop-product">
                <div class="product-upper">
                    <img src="img/product-4.jpg" alt="">
                </div>
                <h2><a href="">Apple new mac book 2015 March :P</a></h2>
                <div class="product-carousel-price">
                    <ins>$899.00</ins> <del>$999.00</del>
                </div>  

                <div class="product-option-shop">
                    <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Add to cart</a>
                </div>                       
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="single-shop-product">
                <div class="product-upper">
                    <img src="img/product-2.jpg" alt="">
                </div>
                <h2><a href="">Apple new mac book 2015 March :P</a></h2>
                <div class="product-carousel-price">
                    <ins>$899.00</ins> <del>$999.00</del>
                </div>  

                <div class="product-option-shop">
                    <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Add to cart</a>
                </div>                       
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="single-shop-product">
                <div class="product-upper">
                    <img src="img/product-1.jpg" alt="">
                </div>
                <h2><a href="">Apple new mac book 2015 March :P</a></h2>
                <div class="product-carousel-price">
                    <ins>$899.00</ins> <del>$999.00</del>
                </div>  

                <div class="product-option-shop">
                    <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Add to cart</a>
                </div>                       
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="single-shop-product">
                <div class="product-upper">
                    <img src="img/product-3.jpg" alt="">
                </div>
                <h2><a href="">Apple new mac book 2015 March :P</a></h2>
                <div class="product-carousel-price">
                    <ins>$899.00</ins> <del>$999.00</del>
                </div>  

                <div class="product-option-shop">
                    <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Add to cart</a>
                </div>                       
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="single-shop-product">
                <div class="product-upper">
                    <img src="img/product-4.jpg" alt="">
                </div>
                <h2><a href="">Apple new mac book 2015 March :P</a></h2>
                <div class="product-carousel-price">
                    <ins>$899.00</ins> <del>$999.00</del>
                </div>  

                <div class="product-option-shop">
                    <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Add to cart</a>
                </div>                       
            </div>
        </div>-->
    </div>
    <?php

    $sql = "SELECT * FROM product";
    $res = mysqli_query($con, $sql); 
    $total_records = mysqli_num_rows($res);
    $total_pages = ceil($total_records / $num_rec_per_page);

    if ($total_pages == 0) {
        $total_pages = 1;
    }

    echo '
    <div class="row">
        <div class="col-md-12">
            <div class="product-pagination text-center">
                <nav>
                  <ul class="pagination">
                    <li>
                      <a href="?page=1" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>';
                if ($page < 4) {
                    for ($i=1; $i<$page; $i++) {
                        echo '<li><a href="?page='.$i.'">'.$i.'</a></li>';
                    };
                } else {
                    for ($i=($page-3); $i<$page; $i++) {
                        echo '<li><a href="?page='.$i.'">'.$i.'</a></li>';
                    };
                }
                echo '<li class="active"><a href="?page='.$page.'">'.$page.'</a></li>';

                if ($page >= ($total_pages - 3)) {
                    for ($i=($page+1); $i<=($total_pages); $i++) {
                        echo '<li><a href="?page='.$i.'">'.$i.'</a></li>';
                    };
                } else {
                    for ($i=($page+1); $i<=($page+3); $i++) {
                        echo '<li><a href="?page='.$i.'">'.$i.'</a></li>';
                    };
                }               
                echo '
                <li>
                  <a href="?page='.$total_pages.'" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>                        
</div>
</div>
</div>';

?>
</div>
</div>

<?php
include 'footer.php';
?>