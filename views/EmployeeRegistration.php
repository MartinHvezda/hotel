<?php
    use app\controllers\EmployeeRegistrationController;
    $employeeRegistrationController = new EmployeeRegistrationController();
?>
<h1>Employee Registration</h1>

<form action="" method="post">
    <div class="mb-3">
        <label>First Name</label>
        <input type="text" name="firstname" class="form-control" >
    </div>
    <div class="mb-3">
        <label>Lastname</label>
        <input type="text" name="lastname" class="form-control" >
    </div>
    <div class="mb-3">
        <label>E-mail</label>
        <input type="email" name="email" class="form-control" >
    </div>
    <div class="mb-3">
        <label class="form-label">Phone Number</label>
        <input type="text" name="phonenumber" class="form-control" >
    </div>
    <div class="mb-3">
        <label>Job</label>
        <?php  echo $employeeRegistrationController->createSelect() ?>
    </div>
    <div class="mb-3">
        <label class="form-label">Hours Rate</label>
        <input type="text" name="hoursrate" class="form-control" >
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
