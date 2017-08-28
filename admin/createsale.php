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

<form action="createS.php" method="post">

  <div class="container">

            <div class="row">
                <h1 style="font-family:AR BLANCA; text-align: center"> CREATE CUSTOMER</h1>
            </div>
            <div class="row">
                <br><table class="table table-striped table-bordered">
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
                                        <td>        <input alighn="right" type="submit" name="create" class="btn btn-success" value="save"/><input type="text" name="email" required="please enter email" placeholder="Enter email"/></td>
                                    </tr>

                      </table>

                                <input type="submit" name="create" class="btn btn-success" value="save"/><br><br>
                                <a href="index.php">View<a>
        </div>
    </div>
</form>

</body>

<?php
include 'footer.php';
?>