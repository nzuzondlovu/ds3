<?php
    require 'database.php';
 
    $id = null;
    if ( !empty($_GET['supplierid'])) {
        $id = $_REQUEST['supplierid'];
    }
     
    if ( null==$id ) {
        header("Location: one.php");
    }
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $nameError = null;
        $productNameError = null;
        $quantityOnHandError = null;
         
        // keep track post values
        $category = $_POST['suppliername'];
         
        // validate input
        $valid = true;
        if (empty($name)) {
            $nameError = 'Please enter category';
            $valid = false;
        }
         
        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE supid  set suppliername = ? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($name);
            Database::disconnect();
            header("Location: one.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM supid where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        
        $name = $data['suppliername'];
        $email = $data['emal'];
        $mobile = $data['contactnumber'];
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
                        <h3>Update a Customer</h3>
                    </div>
             
                    <form class="form-horizontal" action="update.php?id=<?php echo $batchId?>" method="post">
                      <div class="control-group <?php echo !empty($categoryError)?'error':'';?>">
                        <label class="control-label">category</label>
                        <div class="controls">
                            <input name="category" type="text"  placeholder="category" value="<?php echo !empty($category)?$category:'';?>">
                            <?php if (!empty($categoryError)): ?>
                                <span class="help-inline"><?php echo $categoryError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($productNameError)?'error':'';?>">
                        <label class="control-label">product Name</label>
                        <div class="controls">
                            <input name="productName" type="text" placeholder="product Name" value="<?php echo !empty($productName)?		$productName:'';?>">
                            <?php if (!empty($productNameError)): ?>
                                <span class="help-inline"><?php echo $productNameError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($quantityOnHandError)?'error':'';?>">
                        <label class="control-label">quantity On Hand</label>
                        <div class="controls">
                            <input name="mobile" type="text"  placeholder="quantity On Hand" value="<?php echo !empty($quantityOnHand)?		$quantityOnHand:'';?>">
                            <?php if (!empty($quantityOnHandError)): ?>
                                <span class="help-inline"><?php echo $quantityOnHandError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Update</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>        