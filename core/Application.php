<?php

    namespace app\core;
    use app\core\Request;
    use app\models\Calendar;
    use app\models\staff\Maid;
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
        public $maids;




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
            $this->maids = [new Maid('Růžena', 'Svatošová', 'ruzena.svatosova@gmail.com',
                '123456789', 'maid', 0, 120, 0.5),
                new Maid('Emílie', 'Hrbáčová', 'emilie.hrbacova@gmail.com',
                    '987654321', 'maid', 0, 120, 0.5)];

        }

        public function run() {
            echo $this->router->resolve();
            echo self::$ROOT_DIR.'\\jsonObjects\\calendar.json';

            echo '<br>';

            $this->calendar = FileManager::load(self::$ROOT_DIR.'\\jsonObjects\\calendar.json');

            //$this->calendar->show();
        }
    }