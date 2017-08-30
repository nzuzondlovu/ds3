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
                      <th>Cost</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                   $sql = "SELECT * FROM shoprepaire ORDER BY id DESC";
                   $run = $con->query($sql) or die("error: ". mysqli_error($con));
                   while($row = $run->fetch_assoc()){
                    echo '<tr>';
                    echo '<td>'. $row['dname'].'</td>';
                    echo '<td>'. $row['type'].'</td>';
                    echo '<td>'. $row['serialnumber'].'</td>';
                    echo '<td>'. $row['recievedate'].'</td>';
                    echo '<td>'. $row['price'].'</td>';
                    echo '<td>'.'<a href="devicedelete.php?id='.$row['id'].'"><img src="../../img/deleteimg.png" alt="delete_image"></a>'." : ".
                    '<a href="deviceedite.php?id='.$row['id'].'"><img src="../../img/edit.png" alt="edit_image"></a>'.'......'.'</td>';

                    echo '</tr>';
                  }

                  ?>
                </tbody>
              </table>
              <a href="techalldevices.php" class="btn btn-success">back</a>
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

