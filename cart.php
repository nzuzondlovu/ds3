<?php
include 'header.php';
?>

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Shopping Cart</h2>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Page title area -->


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Search Products</h2>
                    <form action="#">
                        <input type="text" placeholder="Search products...">
                        <input type="submit" value="Search">
                    </form>
                </div>
                
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Products</h2>
                    <?php
                    $sql = "SELECT * FROM product ORDER BY id DESC LIMIT 4";
                    $res = mysqli_query($con, $sql);

                    if (mysqli_num_rows($res) > 0) {

                        while ($row = mysqli_fetch_assoc($res)) {

                            $promo = '<ins>R'.$row['promo_price'].'</ins> <del>R'.$row['price'].'</del>';

                            if ($row['promo_price'] == '0.00') {

                                $promo = '<ins>R'.$row['price'].'</ins>';
                            }

                            echo '
                            <div class="thubmnail-recent">
                                <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
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
                    <div class="woocommerce">
                        <form method="post" action="#">
                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="cart_item">
                                        <td class="product-remove">
                                            <a title="Remove this item" class="remove" href="#">×</a> 
                                        </td>

                                        <td class="product-thumbnail">
                                            <a href="single-product.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="img/product-thumb-2.jpg"></a>
                                        </td>

                                        <td class="product-name">
                                            <a href="single-product.html">Ship Your Idea</a> 
                                        </td>

                                        <td class="product-price">
                                            <span class="amount">£15.00</span> 
                                        </td>

                                        <td class="product-quantity">
                                            <div class="quantity buttons_added">
                                                <input type="button" class="minus" value="-">
                                                <input type="number" size="4" class="input-text qty text" title="Qty" value="1" min="0" step="1">
                                                <input type="button" class="plus" value="+">
                                            </div>
                                        </td>

                                        <td class="product-subtotal">
                                            <span class="amount">£15.00</span> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="actions" colspan="6">
                                            <div class="coupon">
                                                <label for="coupon_code">Coupon:</label>
                                                <input type="text" placeholder="Coupon code" value="" id="coupon_code" class="input-text" name="coupon_code">
                                                <input type="submit" value="Apply Coupon" name="apply_coupon" class="button">
                                            </div>
                                            <input type="submit" value="Update Cart" name="update_cart" class="button">
                                            <input type="submit" value="Checkout" name="proceed" class="checkout-button button alt wc-forward">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>

                        <div class="cart-collaterals">


                            <div class="cross-sells">
                                <h2>You may be interested in...</h2>
                                <ul class="products">
                                    <li class="product">
                                        <a href="single-product.html">
                                            <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="img/product-2.jpg">
                                            <h3>Ship Your Idea</h3>
                                            <span class="price"><span class="amount">£20.00</span></span>
                                        </a>

                                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="single-product.html">Select options</a>
                                    </li>

                                    <li class="product">
                                        <a href="single-product.html">
                                            <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="img/product-4.jpg">
                                            <h3>Ship Your Idea</h3>
                                            <span class="price"><span class="amount">£20.00</span></span>
                                        </a>

                                        <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="single-product.html">Select options</a>
                                    </li>
                                </ul>
                            </div>


                            <div class="cart_totals ">
                                <h2>Cart Totals</h2>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span class="amount">£15.00</span></td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>Shipping and Handling</th>
                                            <td>Free Shipping</td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span class="amount">£15.00</span></strong> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                            <form method="post" action="#" class="shipping_calculator">
                                <h2><a class="shipping-calculator-button" data-toggle="collapse" href="#calcalute-shipping-wrap" aria-expanded="false" aria-controls="calcalute-shipping-wrap">Calculate Shipping</a></h2>

                                <section id="calcalute-shipping-wrap" class="shipping-calculator-form collapse">

                                    <p class="form-row form-row-wide">
                                        <select rel="calc_shipping_state" class="country_to_state" id="calc_shipping_country" name="calc_shipping_country">
                                            <?php
                                                $sql = "SELECT * FROM country ORDER BY name ASC";
                                                $res = mysqli_query($con, $sql);

                                                if(mysqli_num_rows($res) > 0) {
                                                    while($row = mysqli_fetch_assoc($res)) {
                                                        echo '<option value="'.$row['code'].'">'.$row['name'].'</option>';
                                                    }
                                                }
                                                ?>
                                        </select>
                                    </p>

                                    <p class="form-row form-row-wide"><input type="text" id="calc_shipping_state" name="calc_shipping_state" placeholder="State / county" value="" class="input-text"> </p>

                                    <p class="form-row form-row-wide"><input type="text" id="calc_shipping_postcode" name="calc_shipping_postcode" placeholder="Postcode / Zip" value="" class="input-text"></p>


                                    <p><button class="button" value="1" name="calc_shipping" type="submit">Update Totals</button></p>

                                </section>
                            </form>


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