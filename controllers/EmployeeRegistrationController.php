<?php

    namespace app\controllers;

    use app\core\Application;
    use app\core\form\Field;
    use app\models\Customer;
    use app\models\Reservation;
    use app\models\staff\Employee;
    use app\models\staff\Maid;

    class EmployeeRegistrationController
    {
        use Field;

        public function createSelect() {
            $values = [Employee::JOB_MAID, Employee::JOB_RECEPTIONIST];
            $this->createSelectInput($values, 'job');
        }

        public  function registerEmployee($request) {
            $this->getRegistrationData($request);
        }

        private function getRegistrationData($request) {
            $body = $request->getBody();
            if ($body['job'] === Employee::JOB_MAID) {
                $maid = new Maid($body['firstname'], $body['lastname'], $body['email'], $body['phonenumber'],
                    $body['job'], 0, $body['hoursrate'], 0.5);

                $array = unserialize($_SESSION['maids']);
                array_push($array, $maid);
                $_SESSION['maids'] = serialize($array);

                echo $maid . ' je nyní naším zaměstnancem';
            } else if($body['job'] === Employee::JOB_RECEPTIONIST) {
                $receptionist = new Maid($body['firstname'], $body['lastname'], $body['email'], $body['phonenumber'],
                    $body['job'], 0, $body['hoursrate']);

                $array = unserialize($_SESSION['receptionists']);
                array_push($array, $receptionist);
                $_SESSION['receptionists'] = serialize($array);

                echo $receptionist . ' e nyní naším zaměstnancem';
            } else echo 'Zadali jste něco špatně (nechápu jak je to možný';
        }
    }