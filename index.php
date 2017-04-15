<?php
include 'admin/functions.php';
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

                $sql = "SELECT * FROM category ORDER BY name ASC";
                $res = mysqli_query($con, $sql);

                if (mysqli_num_rows($res) > 0) {

                    while ($row = mysqli_fetch_assoc($res)) {

                        echo '<a href="#" class="list-group-item">'.$row['name'].'</a>';
                    }
                }

                ?>
            </div>
        </div>

        <div class="col-md-9">

            <div class="row carousel-holder">

                <div class="col-md-12">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="slide-image" src="http://placehold.it/800x300" alt="">
                            </div>
                            <div class="item">
                                <img class="slide-image" src="http://placehold.it/800x300" alt="">
                            </div>
                            <div class="item">
                                <img class="slide-image" src="http://placehold.it/800x300" alt="">
                            </div>
                        </div>
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>

            </div>

            <div class="row">                    
                <?php

                $sql = "SELECT * FROM product ORDER BY id DESC LIMIT 12";
                $res = mysqli_query($con, $sql);

                if (mysqli_num_rows($res) > 0) {

                    while ($row = mysqli_fetch_assoc($res)) {

                        echo '
                        <div class="col-sm-4 col-lg-4 col-md-4">
                            <div class="thumbnail">
                                <img src="'.$row['pic_url'].'" alt="'.$row['name'].'">
                                <div class="caption">
                                    <h4 class="pull-right">R'.$row['price'].'</h4>
                                    <h4><a href="item.php">'.$row['name'].'</a>
                                    </h4>
                                    <p>'.$row['description'].'</p>
                                </div>
                                <div class="ratings">
                                    <p class="pull-right">15 reviews</p>
                                    <p>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star-empty"></span>
                                    </p>
                                </div>
                            </div>
                        </div>';
                    }
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