<?php



    namespace app\core;
    use app\core\Database\DbConnection;
    use app\core\Request;
    use app\models\Calendar;
    use app\models\Customer;
    use app\models\HotelRooms;
    use app\models\Room;
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
        public $reservations;
        public $receptionists;
        public $DbConnection;




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
            if(empty($this->calendar)) {
                $this->calendar = unserialize($_SESSION['calendar']);
            }else $this->calendar = new Calendar(2022);
            $this->maids = $this->maids = unserialize($_SESSION['maids']);
            $this->reservations = $this->reservations = unserialize($_SESSION['reservations']);
            $this->DbConnection = DbConnection::connectDb();

            //$this->receptionists = $this->maids = $_SESSION['receptionists'];


        }

        public function run() {
            echo $this->router->resolve();


            $this->calendar = unserialize($_SESSION['calendar']);
            $this->maids = unserialize($_SESSION['maids']);
            $this->reservations = unserialize($_SESSION['reservations']);

            //$this->receptionists = $_SESSION['receptionists'];

        }


    }

