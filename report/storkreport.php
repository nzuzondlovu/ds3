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
            <h2>Stocks</h2>

			<?php  
					 $sql = "SELECT * FROM `stork`";
					 $run = $con->query($sql);

					while ($row = $run->fetch_assoc()) {
						echo "<div>".$row['category']."<br>"; 
						echo $row['ProductName']."<br>"; 
						echo $row['Date']."<br>";
						echo $row['QuantityOnHand']."<br>";
						echo $row['quantity']."<br>";
						echo "</div>";

						}

			?>

              </div>
    </div> <!-- /container -->
    <?php include '../../footer.php';?>
  </body>
</html>