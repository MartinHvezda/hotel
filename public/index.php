<?php

    use app\core\Application;
    use app\controllers\SiteController;
    use app\controllers\ReservationController;
    require_once __DIR__ . '/../vendor/autoload.php';


    $app = new Application(dirname(__DIR__));

    $app->router->get('/', [SiteController::class, 'home']);
    $app->router->get('/reservation', [SiteController::class, 'reservation']);
    $app->router->get('/roomsView', [SiteController::class, 'roomsView']);
    $app->router->get('/cleaning', [SiteController::class, 'cleaning']);
    $app->router->get('/cleaningView', [SiteController::class, 'cleaningView']);
    $app->router->post('/reservation', [ReservationController::class, 'createReservation']);


    $app->run();