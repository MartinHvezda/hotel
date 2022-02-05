<?php

    namespace app\controllers;

    use app\core\Application;
    use app\core\Controller;
    use app\core\form\Field;
    use app\models\Registration;
    use app\models\staff\Employee;



    class EmployeeRegistrationController extends Controller
    {
        use Field;

        public function createSelect() {
            $values = [Employee::JOB_MAID, Employee::JOB_RECEPTIONIST];
            $this->createSelectInput($values, 'job');
        }

        public function getRegistrationData($request) {
            $data = $request->getBody();
            $return = Registration::registerEmployee($data);
            $this->evaluateRegistration($return);
        }

        private function evaluateRegistration($status) {
            if ($status) {
                header('Location: successfulRegistration');
            } else header('Location: employeeRegistration');
        }

    }