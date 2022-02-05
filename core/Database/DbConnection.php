<?php

    namespace app\core\Database;

    class DbConnection
    {
        private static $host = "localhost";
        private static $user = "root";
        private static $pass = "";
        private static $database = "hotel";

        public static function connectDb() {
            $connection = mysqli_connect(self::$host, self::$user, self::$pass, self::$database);

            if($connection){
                return $connection;
            } else{
                die("Connection failed.");
            }
        }

        public static function registerEmployee($connection, $firstname, $lastName, $email, $phoneNumber, $job, $hoursRate) {
            $query = "CALL register_employee('$firstname', '$lastName', '$email', '$phoneNumber', '$job', '$hoursRate')";
            $return = mysqli_query($connection, $query);
            if($return){
                return $return;
            } else{
                die("Registration failed.");
            }
        }
    }