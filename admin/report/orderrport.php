
<?php
//include "connection.php";

include '../../header.php';
 ?>
    <title>Reports</title>
  <div class="container">
        </div>
        <div class= "col-md-6">
              <ol>
                <h1> Reports</h1>
                <li><a href="orderrport.php">Order</a></li>
                <li><a href="storkreport.php">Stork</a></li>
                <li><a href="shopreport.php">Shop</a></li>
              </ol>

              </div>
              <div class= "col-md-6">
              <h2>Orders</h2>

			<?php  
				 $sql = "SELECT * FROM `order`";
				 $run = $con->query($sql);

				while ($row = $run->fetch_assoc()) {
					echo "<div style='align: center;'>".$row['productname']."<br>"; 
					echo $row['Quantity']."<br>"; 
					echo $row['OrderDate']."<br>"; 
					echo "</div>";

					}
				?>

              </div>
    </div> <!-- /container -->
   <?php include '../../footer.php';?>
  </body>
</html>





