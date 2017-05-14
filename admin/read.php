<?php
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM product where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h2 style="font-family:AR BLANCA" >Read a Stork</h2>
                    </div>
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label" style="font-family:AR BLANCA"><h3>Product Name</h3></label>
                        <div class="controls">
                            <label class="checkbox">
                                <h3><?php echo $data['name'];?></h3>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" style="font-family:AR BLANCA"><h3>Description</h3></label>
                        <div class="controls">
                            <label class="checkbox">
                                <h3><?php echo $data['description'];?></h3>
                            </label>
                        </div>
                      </div>
                        <div class="form-actions">
                          <a class="btn" href="index.php">Back</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>