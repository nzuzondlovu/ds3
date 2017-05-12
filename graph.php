<!DOCTYPE html>
<html lang="en">
    <head>
		<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
        <title>Stork Graph</title>

    <script src="js/jquery.js" type="text/javascript"></script>


    <script type="application/javascript" src="js/awesomechart.js"> </script>

<?php
		mysql_select_db('shop',mysql_connect('localhost','root',''))or die(mysql_error());
?>

<body>
            <div class="container">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="hero-unit-table">
                            <div class="charts_container">
                                <div class="chart_container">
                                    <div class="alert alert-info">Different Products with Quantity</div>
                                    <canvas id="motorcycle_graph" width="1100" height="400">
                                        Your web-browser does not support the HTML 5 canvas element.
                                    </canvas>
                                </div>
                            </div>
						</div>




<script type="application/javascript">
    var motorcycle_chart = new AwesomeChart('motorcycle_graph');
    motorcycle_chart.data = [
    <?php
    $query = mysql_query("select * from product") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        ?>
        <?php echo $row['price'] . ','; ?>
    <?php }; ?>
    ];

    motorcycle_chart.labels = [
    <?php
    $query = mysql_query("select * from product") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        ?>
        <?php echo "'" . $row['name'] . "'" . ','; ?>
    <?php }; ?>
    ];
    motorcycle_chart.colors = ['gold', 'skyblue', '#FF6600', 'pink', 'darkblue', 'lightpink', 'green'];
    motorcycle_chart.randomColors = true;
    motorcycle_chart.animate = true;
    motorcycle_chart.animationFrames = 30;
    motorcycle_chart.draw();
</script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

		<div class="row" style="width: 1000px; margin: 0 auto;">
 				<p>
                   <a href="index.php" class="btn btn-success">Back</a>
        </p>
		</div>

    <!-- Trigger the modal with a button -->
 <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

 <!-- Modal -->
 <div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
 </div>

</body>
</html>
