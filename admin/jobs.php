  <?php
  ob_start();
  include '../includes/functions.php';
  ?>

  <?php
  if(isset($_SESSION['key']) == '' ) {
    header("location:../login.php");
  }
  ?>

  <?php
  include 'header.php';
  ?>
  <body>

    <div id="page-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">DEVICES TO BE FIXED</h1>
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-12">
            <div>
              <div class="container">

                <?php

                if (isset($_POST['search'])) {

                  $search = $_POST['tsearch'];

                  $sql= "SELECT * FROM customersaledevice WHERE diviceName = '".$search."'";
                  $run = $con->query($sql);
                }
                ?>

                <div class="row">
                  <br><table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Device Name</th>
                      <th>Model</th>
                      <th>Serial No</th>
                      <th>type</th>
                      <th>Date Recieved</th>
                      <th>Cost</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php

                   $sql = "SELECT * FROM customersaledevice ORDER BY id DESC";
                   $run = $con->query($sql) or die("error: ". mysqli_error($con));
                   while($row = $run->fetch_assoc()){
                    echo '<tr>';
                    echo '<td>'. $row['diviceName'].'</td>';
                    echo '<td>'. $row['model'].'</td>';
                    echo '<td>'. $row['serialNumber'].'</td>';
                    echo '<td>'. $row['Dtype'].'</td>';
                    echo '<td>'. $row['recievedDate'].'</td>';
                    echo '<td>'. $row['establishAmount'].'</td>';
                    echo '<td>'.'<a href="devicedelete.php?id='.$row['id'].'"><img src="../../img/deleteimg.png" alt="delete_image"></a>'." : ".
                    '<a href="deviceedite.php?id='.$row['id'].'"><img src="../../img/edit.png" alt="edit_image"></a>'.'......'.
                    '<a href="allocate.php?id='.$row['id'].'">Repaire Device.</a><br>'.'</td>';

                    echo '</tr>';
                  }

                  if(isset($_POST['check'])) {
                    header("location: allocate.php");
                  }

                  ?>
                </tbody>
              </table>
              <a href="createsale.php" class="btn btn-success">back</a>
              <a href="techalldevices.php" class="btn btn-success">All allocated devices</a>
            </div>
          </div> <!-- /container -->
        </div>
        <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
    </div>
  </div>
  </div>
  <!-- /.container-fluid -->
  </div>
  </body>

  <?php
  include 'footer.php';
  ?>
