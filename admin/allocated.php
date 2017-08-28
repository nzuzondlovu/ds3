<html> <head> 

    <style>
.flip3D{ width:240px; height:200px; margin:10px; float:left; }
.flip3D > .front{
  position:absolute;
  transform: perspective( 600px ) rotateY( 0deg );
  background:#FC0; width:240px; height:200px; border-radius: 7px;
  backface-visibility: hidden;
  transition: transform .5s linear 0s;
}
.flip3D > .back{
  position:absolute;
  transform: perspective( 600px ) rotateY( 180deg );
  background: #80BFFF; width:240px; height:200px; border-radius: 7px;
  backface-visibility: hidden;
  transition: transform .5s linear 0s;
}
.flip3D:hover > .front{
  transform: perspective( 600px ) rotateY( -180deg );
}
.flip3D:hover > .back{
  transform: perspective( 600px ) rotateY( 0deg );
}
#imgc{
  width: 240px; height: 200px;  border: 2px solid #a1a1a1;
    border-radius: 5px;
}

</style>
</head><?php
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

  <div class="container">

    <div class='row'>
                <h1 style='font-family:AR BLANCA; text-align: center'>Technician's work</h1>
    </div>
          <?php
                 $l = 'Luthos';
                 $s = 'Simo';
                 $n = 'Nzuzo';
          ?>
      <div class="col-mg-12">
            <div class="col-mg-4">
                <div class="flip3D">
                  <div class="back">
                  <?php echo '<a href="tech.php?tname='.$l.'">'.
                    '<h1>View Devices</h1></a>'; ?></div>
                  <div class="front"><h1 style='font-family:AR BLANCA; text-align: center'>luthos</h1></div>
                </div>
            </div>

          <div class="col-mg-4">
            <div class="flip3D">
              <div class="back">
              <?php echo '<a href="tech.php?tname='.$s.'">'.
                '<h1>View Devices</h1></a>'; ?></div>
              <div class="front"><h1 style='font-family:AR BLANCA; text-align: center'>Simo</h1></div>
            </div>
          </div>

          <div class="col-mg-4">
            <div class="flip3D" style="width: 400px;">
              <div class="back">
              <?php echo '<a href="tech.php?tname='.$n.'">'.
                '<h1>View Devices</h1></a>'; ?></div>
              <div class="front"><h1 style='font-family:AR BLANCA; text-align: center'>Nzuzo</h1></div>
            </div>
          </div>
        <div>          
        </div>
    </div> <!-- /container -->
    <div class="row">
                
               <a href="index.php" class="btn btn-success">back</a>
               <a href="techalldevices.php" class="btn btn-success">All Devices</a>
          </div> 
    </div>
<!-- Page Content -->
<!-- /#page-wrapper -->

<?php
include 'footer.php';
?>
</html>
