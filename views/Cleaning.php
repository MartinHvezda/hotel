<?php
    use app\controllers\CleaningController;
    $cleaningController = new CleaningController();
    ?>
<h1>Cleaning</h1>

<form action="" method="post">
    <div class="mb-3">
        <label>Maid</label>
        <?php  echo $cleaningController->createSelect() ?>
    </div>
    <div class="mb-3">
        <label>First Room</label>
        <input type="text" name="firstRoom" class="form-control" >
    </div>
    <div class="mb-3">
        <label>Hours</label>
        <input type="text" name="hours" class="form-control" >
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>


