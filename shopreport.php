
<?php
include "connection.php";

 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equip-quiv="content-type" content="text/html"; charset="utf-8"/>
    <link   href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

     <script type="text/javascript" src="jquery-3.2.1.js"></script>   
    <div id="google_translate_element"></div><script type="text/javascript">
  function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'af,en,xh,zh-CN,zu', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
  }
  </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <title>Repaire</title>
</head>

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

				 include 'connection.php';

				 $sql = "SELECT * FROM `shoprepaire`";
				 $run = $con->query($sql);

				while ($row = $run->fetch_assoc()) {
					echo "<div>".$row['dname']."<br>"; 
					echo $row['model']."<br>"; 
					echo $row['serialnumber']."<br>";
					echo $row['recievedate']."<br>";
					echo $row['price']."<br>";
					echo "</div>";

					}

			?>
              </div>
    </div> <!-- /container -->
  </body>
</html>

