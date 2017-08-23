
<?php
//include "connection.php";

include '../../header.php';
 ?>
    <title>Repaire</title>
<body>
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
              <h2>Shop Products</h2>

			<?php 
				 $sql = "SELECT * FROM `shoprepaire`";
				 $run = $con->query($sql);

				while ($row = $run->fetch_assoc()) {
					echo "<div>".$row['dname']."<br>"; 
					echo $row['type']."<br>"; 
					echo $row['serialnumber']."<br>";
					echo $row['recievedate']."<br>";
					echo $row['price']."<br><br>";
					echo "</div>";

					}

			?>
              </div>
    </div> <!-- /container -->
    <?php include '../../footer.php';?>
  </body>
</html>

