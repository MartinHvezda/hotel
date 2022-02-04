<?php
    use app\controllers\OnlinePaymentController;
    $onlinePaymentController = new OnlinePaymentController(); ?>
<h1>Home</h1>

<form action="" method="post">
    <div class="mb-3">
        <label>Job</label>
        <?php  echo $onlinePaymentController->createSelect() ?>
    </div>
    <div class="mb-3">
        <label class="form-label">Card Number</label>
        <input type="text" name="cardnumber" class="form-control" >
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>