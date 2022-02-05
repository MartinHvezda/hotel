<?php

    namespace app\controllers;

    use app\core\Controller;
    use app\core\Application;
    use app\core\FileManager;
    use app\models\Customer;
    use app\models\Reservation;

    class ReservationController extends Controller
    {
        public  function createReservation($request) {
            $this->getRegistrationData($request);
        }

        private function getRegistrationData($request) {
            $body = $request->getBody();
            $customer = new Customer($body['firstname'], $body['lastname'], $body['email']);
            $reservation = new Reservation($customer, $body['room'], $body['firstDate'], $body['lastDate']);
            $this->validateReservation($this->calendar()->getCalendar(), $reservation);
        }

        private function validateReservation($calendar, $reservation) {
            $year = $this->calendar()->getYear();
            $month = $reservation->getFirstDate()->format('m');
            $day = $reservation->getFirstDate()->format('d');
            $room = $reservation->getRoom();
            $firstIndex = 0;
            foreach ($calendar as $key => $value) {
                if ((key($calendar[$key][$year]) == $month) && (key($calendar[$key][$year][$month]) == $day)) {
                    $firstIndex = $key;
                    break;
                }
            }
            $lastIndex = $firstIndex + $reservation->getDateLength();

            $done = false;
            for ($i = $firstIndex; $i < $lastIndex; $i++) {
                foreach ($calendar[$i][$year] as $key2 => $value2) {
                    foreach ($calendar[$i][$year][$key2] as $key3 => $value3) {
                        foreach ($calendar[$i][$year][$key2][$key3] as $key4 => $value4) {
                                if (($key4 == $room)) {
                                    $calendar[$i][$year][$key2][$key3][$key4] = [$reservation];
                                    $done = true;
                                }


                        }
                    }
                }
                }
                $this->finalize($done, $calendar, $reservation);
            }


        private function finalize($status, $calendar, $reservation)
        {
            if ($status) {
                echo '<br>';
                $this->calendar()->show();
                $this->calendar()->setCalendar($calendar);
                $_SESSION['calendar'] = serialize($this->calendar());


                $array = unserialize($_SESSION['reservations']);
                array_push($array, $reservation);
                $_SESSION['reservations'] = serialize($array);
            } else echo 'Zabraný termín';
        }
        private function calendar() {
            return Application::$app->calendar;
        }

    }