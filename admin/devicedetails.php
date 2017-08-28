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

<form action="ddInsert.php" method="post">

  <div class="container">

            <div class="row">
                <h1 style="font-family:AR BLANCA; text-align: center"> CREATE DETAILS</h1>
            </div>
            <div class="row">
                <br><table class="table table-striped table-bordered">
                                    
                                    <tr>
                                        <td>Device Name:</td>
                                        <td><input type="text" name="Dname" required="please enter name" placeholder="Enter Device name"/></td>
                                    </tr>
                                    <tr>
                                        <td>Model:</td>
                                        <td><input type="text" name="model" required="please enter model" placeholder="Enter model"/></td>
                                    </tr>
                                    <tr>
                                        <td>Serial No:</td>
                                        <td><input type="text" name="SerialNo" required="please enter serial number" placeholder="Enter serial number"/><br></td>
                                    </tr>
                                    <tr>
                                        <td>Type:</td>
                                        <td><select name="Dtype" required="please enter a number" placeholder="Select type">
                                                <option value="Hardware">Hardware</option>
                                                <option value="Software">Software</option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td>Date recieved: </td>
                                        <td>
                                        
                                <input alighn="right" type="submit" name="create" class="btn btn-success" value="save"/>
                                        <input type="text" name="dateRecieved" required="please enter Date recieved" placeholder="Enter Date recieved"/></td>
                                    </tr>
                                    <tr>
                                        <td>Establish Amount: </td>
                                        <td>
                                        <input type="text" name="EAmount" required="please enter Establish Amount" placeholder="Enter Establish Amount"/> </td>
                                    </tr>
                </table>

                                <input alighn="right" type="submit" name="create" class="btn btn-success" value="save"/><br><br>
                            
        </div>
    </div>
</form>

</body>
<!-- Page Content -->

<!-- /#page-wrapper -->

<?php
include 'footer.php';
?>