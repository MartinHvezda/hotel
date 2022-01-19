<?php

    namespace app\core;
    use app\core\Request;
    use app\models\Calendar;
    use app\models\Reservation;

    class Application
    {
        public static $ROOT_DIR;
        public static $app;

        public $router;
        public $request;
        public $response;
        public $controller;
        public $calendar;


        public function getController()
        {
            return $this->controller;
        }

        public function setController($controller)
        {
            $this->controller = $controller;
        }


        public function __construct($rootPath)
        {
            self::$ROOT_DIR = $rootPath;
            self::$app = $this;
            $this->request = new Request();
            $this->response = new Response();
            $this->router = new Router($this->request, $this->response);
            $this->calendar = new Calendar(2022);

        }

        public function run() {
            echo $this->router->resolve();
            $rezervace = new Reservation('Martin', 14, '2021-12-01', '2021-12-05');
            print_r($rezervace);

            //$this->calendar->show();
        }
    }