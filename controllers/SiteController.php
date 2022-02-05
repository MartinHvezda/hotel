<?php
namespace app\controllers;
    use app\core\Application;
    use app\core\Controller;

    class SiteController extends Controller
    {
        public function home(){
            $params = [];
            return $this->render('home', $params);
        }

        public function reservation(){
            return $this->render('reservation',$params = []);
        }

        public function roomsView(){
            return $this->render('roomsView', $params = []);
        }

        public function cleaning(){
            return $this->render('cleaning', $params = []);
        }

        public function cleaningView(){
            return $this->render('cleaningView', $params = []);
        }

        public function employeeRegistration(){
            return $this->render('employeeRegistration', $params = []);
        }

        public function onlinePayment(){
            return $this->render('onlinePayment', $params = []);
        }

        public function successfulRegistration(){
            return $this->render('successfulRegistration', $params = []);
        }

        public function handleReservation($request){
            $body = $request->getBody();
            var_dump($body);
            return 'Handling data <br>';
        }
    }