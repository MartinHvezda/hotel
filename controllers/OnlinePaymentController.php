<?php

    namespace app\controllers;

    use app\core\Application;
    use app\models\staff\Employee;
    use app\models\staff\Maid;

    class OnlinePaymentController
    {
        public function createSelect() {
            $values = Application::$app->reservations;
            $this->createSelectInput($values, 'reservations');
        }

        public  function pay($request) {
            $this->getPaymentData($request);
        }

        private function getPaymentData($request) {
            $body = $request->getBody();
            $reservation = $body['reservation'];
            $cardNumber = $body['cardnumber'];
        }

    }