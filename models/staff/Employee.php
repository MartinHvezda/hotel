<?php

    namespace app\models\staff;

    abstract class Employee
    {
        private $firstName;
        private $lastName;
        private $email;
        private $phoneNum;
        private $job;
        private $hoursWorkedLastMonth;
        private $hourRate;


        /**
         * @param $firstName
         * @param $lastName
         * @param $email
         * @param $phoneNum
         * @param $job
         * @param $hoursWorkedLastMonth
         * @param $hourRate
         */
        public function __construct($firstName, $lastName, $email, $phoneNum, $job, $hoursWorkedLastMonth, $hourRate)
        {
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->phoneNum = $phoneNum;
            $this->job = $job;
            $this->hoursWorkedLastMonth = $hoursWorkedLastMonth;
            $this->hourRate = $hourRate;
        }

        /**
         * @return mixed
         */
        protected function getFirstName()
        {
            return $this->firstName;
        }

        /**
         * @param mixed $firstName
         */
        protected function setFirstName($firstName)
        {
            $this->firstName = $firstName;
        }

        /**
         * @return mixed
         */
        protected function getLastName()
        {
            return $this->lastName;
        }

        /**
         * @param mixed $lastName
         */
        protected function setLastName($lastName)
        {
            $this->lastName = $lastName;
        }

        /**
         * @return mixed
         */
        protected function getEmail()
        {
            return $this->email;
        }

        /**
         * @param mixed $email
         */
        protected function setEmail($email)
        {
            $this->email = $email;
        }

        /**
         * @return mixed
         */
        protected function getPhoneNum()
        {
            return $this->phoneNum;
        }

        /**
         * @param mixed $phoneNum
         */
        protected function setPhoneNum($phoneNum)
        {
            $this->phoneNum = $phoneNum;
        }

        /**
         * @return mixed
         */
        protected function getJob()
        {
            return $this->job;
        }

        /**
         * @param mixed $job
         */
        protected function setJob($job)
        {
            $this->job = $job;
        }

        /**
         * @return mixed
         */
        protected function getHoursWorkedLastMonth()
        {
            return $this->hoursWorkedLastMonth;
        }

        /**
         * @param mixed $hoursWorkedLastMonth
         */
        protected function setHoursWorkedLastMonth($hoursWorkedLastMonth)
        {
            $this->hoursWorkedLastMonth = $hoursWorkedLastMonth;
        }

        /**
         * @return mixed
         */
        protected function getHourRate()
        {
            return $this->hourRate;
        }

        /**
         * @param mixed $hourRate
         */
        protected function setHourRate($hourRate)
        {
            $this->hourRate = $hourRate;
        }

        abstract protected function work($params, $params2);

        protected function returnWorkStats() {
            $payroll = $this->hourRate * $this->hoursWorkedLastMonth;
            echo "$this->getFirstName() $this->getLastName() <br>
            Job: $this->getJob() <br>
            Hours: $this->getWorkedHoursLastMonth()<br>
            Payroll: $payroll <br>
             ";

        }

        public function __toString()
        {
            return "$this->firstName $this->lastName";
        }

    }