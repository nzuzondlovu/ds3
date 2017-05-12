
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h2 style="font-family:AR BLANCA">ALL suppliers</h2>
            </div>
            <div class="row">
              
      
                <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                         <th>Company name</th>
                          <th>product supplied</th>
                          <th>cell</th>
                          <th>emal</th>
                          <th>address</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                       include 'database.php';
                       $pdo = Database::connect();
                       
                      
                       $sql = 'SELECT supplierid,suppliername,productsupplied,contactnumber,email,address FROM supid ORDER BY supplierid DESC';
                       foreach ($pdo->query($sql) as $row) {
                                echo '<tr>';
                                echo '<td>'. $row['suppliername'] . '</td>';
                                echo '<td>'. $row['productsupplied'] . '</td>';
                                echo '<td>'. $row['contactnumber']. '</td>';
                                echo '<td>'. $row['email']. '</td>';
                                echo '<td>'. $row['address']. '</td>';
                                echo '<td width=260>';
                                echo '<a class="btn btn-success" href="update.php?id='.$row['supplierid'].'">Update</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete.php?id='.$row['supplierid'].'">Delete</a>';
                                 echo ' ';
                                echo '<a class="btn btn-danger" href="delete.php?id='.$row['supplierid'].'">Make order</a>';
                                echo '</td>';
                                echo '</tr>';
                       }
                       Database::disconnect();
                      ?>
                      </tbody>
                </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>
        