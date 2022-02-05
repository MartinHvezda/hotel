<?php

    namespace app\models;

    use app\core\Application;
    use app\core\Database\DbConnection;
    use app\models\staff\Employee;

    class Registration
    {
        public static function registerEmployee($data) {
            if ($data['job'] === Employee::JOB_MAID) {
                DbConnection::registerEmployee(Application::$app->DbConnection, $data['firstname'], $data['lastname'], $data['email'], $data['phonenumber'],
                    $data['job'], $data['hoursrate']);

                $return = true;
            } else if($data['job'] === Employee::JOB_RECEPTIONIST) {
                DbConnection::registerEmployee(Application::$app->DbConnection, $data['firstname'], $data['lastname'], $data['email'], $data['phonenumber'],
                    $data['job'], $data['hoursrate']);

                $return = true;
            } else $return = false;
            return $return;
        }

    }