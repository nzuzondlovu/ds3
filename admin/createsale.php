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

<!-- Page Content -->

<!-- /#page-wrapper -->
<body>
    <div id="page-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">CREATE CUSTOMER</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-lg-12">
        <div>
            <form action="createS.php" method="post">

              <div class="container">
                <div class="row">
                    <br><table class="table table-hover">
                    <tr>
                        <td>Customer Name:</td>
                        <td><input type="text" name="Cname" required="please enter name" placeholder="Enter customer name"/></td>
                    </tr>
                    <tr>
                        <td>ID Number:</td>
                        <td><input type="text" name="IdNo" required="please enter Idenity Number" placeholder="Enter ID number"/></td>
                    </tr>
                    <tr>
                        <td>Phone Number:</td>
                        <td><input type="text" name="num" required="please enter Phone Number" placeholder="Enter Phone number"/></td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td><input type="text" name="email" required="please enter email" placeholder="Enter email"/></td>
                    </tr>

                </table>

                <input type="submit" name="create" class="btn btn-primary" value="save"/><br><br>
                <a href="jobs.php">View<a>
                </div>
            </div>
        </form>
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