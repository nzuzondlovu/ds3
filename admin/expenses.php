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

if(isset($_POST['submit'])) {

    $rent = mysqli_real_escape_string($con, strip_tags(trim($_POST["rent"])));
    $utility = mysqli_real_escape_string($con, strip_tags(trim($_POST["utility"])));
    $insurance = mysqli_real_escape_string($con, strip_tags(trim($_POST["insurance"])));
    $fees = mysqli_real_escape_string($con, strip_tags(trim($_POST["fees"])));
    $tax = mysqli_real_escape_string($con, strip_tags(trim($_POST["tax"])));
    $interest = mysqli_real_escape_string($con, strip_tags(trim($_POST["interest"])));
    $maintenance = mysqli_real_escape_string($con, strip_tags(trim($_POST["maintenance"])));
    $travel = mysqli_real_escape_string($con, strip_tags(trim($_POST["travel"])));
    $mande = mysqli_real_escape_string($con, strip_tags(trim($_POST["mande"])));
    $training = mysqli_real_escape_string($con, strip_tags(trim($_POST["training"])));
    $date = date('Y-m-d');

    $sql = "INSERT INTO expenses(rent, utility, insurance, fees, tax, interest, maintenance, travel, mande, training, date) VALUES('".$rent."', '".$utility."', '".$insurance."', '".$fees."', '".$tax."', '".$interest."', '".$maintenance."', '".$travel."', '".$mande."', '".$travel."', '".$date."')";
    mysqli_query($con, $sql);
    $_SESSION['success'] = 'Successfully added all expenses.';
    header("location: cashflow.php");
}
?>

<?php
include 'header.php';
?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Company Expenses</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Fill in company expenses
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Rent</h4>
                                <p>Rent covers the cost of office space, storage and retail areas</p>
                                <h4>Utilities</h4>
                                <p>These are your electricity, telephone and internet services</p>
                                <h4>Insurance</h4>
                                <p>Policies insure a business against property loss and liability</p>
                                <h4>Fees</h4>
                                <p>These are your charges for business registrations and renewals. Fees also cover the professional services of accountants, attorneys, bookkeepers, tax preparers, consultants, advisers and payroll firms</p>
                                <h4>Taxes</h4>
                                <p>Local business taxes and business property taxes are deductibe on federal tax return</p>
                                <h4>Interest</h4>
                                <p>The cost of borrowing money, or interest, for loans, credit and mortgages for business use</p>
                                <h4>Maintenance</h4>
                                <p>The costs of cleaning work areas and repairing equipment, such as computers</p>
                                <h4>Travel</h4>
                                <p>This includes costs such as transportation, parking fees and car rentals</p>
                                <h4>Meals & Entertainment</h4>
                                <p>These include costs of customer and employee entertainment and snacks</p>
                                <h4>Training</h4>
                                <p>This includes all costs on training and education in the company</p>
                            </div>
                            <!-- /.col-lg-6 (nested) -->

                            <div class="col-md-6">
                                <form role="form" method="post" id="form">
                                    <div class="form-group">
                                        <label for="rent">Rent</label>
                                        <input type="number" name="rent" id="rent" required="required" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="utility">Utilities</label>
                                        <input type="number" name="utility" id="utility" required="required" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="insurance">Insurance</label>
                                        <input type="number" name="insurance" id="insurance" required="required" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="fees">Fees</label>
                                        <input type="number" name="fees" id="fees" required="required" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="tax">Taxes</label>
                                        <input type="number" name="tax" id="tax" required="required" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="interest">Interest</label>
                                        <input type="number" name="interest" id="interest" required="required" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="maintenance">Maintenance</label>
                                        <input type="number" name="maintenance" id="maintenance" required="required" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="travel">Travel</label>
                                        <input type="number" name="travel" id="travel" required="required" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="mande">Meals & Entertainment</label>
                                        <input type="number" name="mande" id="mande" required="required" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="training">Training</label>
                                        <input type="number" name="training" id="training" required="required" class="form-control">
                                    </div>
                                    <button name="submit" type="submit" class="btn btn-primary">Submit Expenses</button>
                                    <button type="reset" class="btn btn-default">Reset From</button>
                                </form>
                            </div>
                            <!-- /.col-lg-6 (nested) -->
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php
include 'footer.php';
?>