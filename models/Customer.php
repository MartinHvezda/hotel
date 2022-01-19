<?php

    namespace app\models;

    class Customer
    {
        private $firstName;
        private $lastName;
        private $email;

        /**
         * @return mixed
         */
        public function getFirstName()
        {
            return $this->firstName;
        }

        /**
         * @return mixed
         */
        public function getLastName()
        {
            return $this->lastName;
        }

        /**
         * @return mixed
         */
        public function getEmail()
        {
            return $this->email;
        }
        //private $phoneNumber;

        /**
         * @param $firstName
         * @param $lastName
         * @param $email
         * @param $phoneNumber
         */
        public function __construct($firstName, $lastName, $email)
        {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            //$this->phoneNumber = $phoneNumber;
        }

        public function __toString()
        {
            return "$this->firstName $this->lastName, $this->email";
        }


    }