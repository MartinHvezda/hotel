<?php

    use app\core\Application;
    use app\controllers\SiteController;
    use app\controllers\ReservationController;
    use \app\controllers\EmployeeRegistrationController;
    use \app\controllers\OnlinePaymentController;
    require_once __DIR__ . '/../vendor/autoload.php';
    session_start();

    $app = new Application(dirname(__DIR__));

    $app->router->get('/', [SiteController::class, 'home']);
    $app->router->get('/reservation', [SiteController::class, 'reservation']);
    $app->router->get('/roomsView', [SiteController::class, 'roomsView']);
    $app->router->get('/cleaning', [SiteController::class, 'cleaning']);
    $app->router->get('/cleaningView', [SiteController::class, 'cleaningView']);
    $app->router->post('/reservation', [ReservationController::class, 'createReservation']);
    $app->router->get('/employeeRegistration', [SiteController::class, 'employeeRegistration']);
    $app->router->post('/employeeRegistration', [EmployeeRegistrationController::class, 'getRegistrationData']);
    $app->router->get('/onlinePayment', [SiteController::class, 'onlinePayment']);
    $app->router->post('/onlinePayment', [OnlinePaymentController::class, 'pay']);
    $app->router->get('/successfulRegistration', [SiteController::class, 'successfulRegistration']);

    $app->run();