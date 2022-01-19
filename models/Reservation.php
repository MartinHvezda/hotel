<?php

    namespace app\models;

    class Reservation
    {
        private $room;
        private $customer;
        private $firstDate;
        private $lastDate;
        private $dateLength;
        private $paid;

        /**
         * @return mixed
         */
        public function getPaid()
        {
            return $this->paid;
        }

        /**
         * @param mixed $paid
         */
        public function setPaid($paid)
        {
            $this->paid = $paid;
        }

        /**
         * @return mixed
         */
        public function getRoom()
        {
            return $this->room;
        }

        /**
         * @return mixed
         */
        public function getCustomer()
        {
            return $this->customer;
        }

        /**
         * @return \DateTime|false
         */
        public function getFirstDate()
        {
            return $this->firstDate;
        }

        /**
         * @return \DateTime|false
         */
        public function getLastDate()
        {
            return $this->lastDate;
        }

        /**
         * @return int
         */
        public function getDateLength()
        {
            return $this->dateLength;
        }


        public function __construct($customer, $room, $firstDate, $lastDate)
        {
            $this->customer = $customer;
            $this->room = $room;
            $this->firstDate = date_create($firstDate);
            $this->lastDate = date_create($lastDate);
            $this->dateLength = $this->countDateLength();
        }


        private function getDatePeriod() {
            return new \DatePeriod($this->firstDate, date_interval_create_from_date_string('1 day'),$this->lastDate);
        }

        private function countDateLength () {
            $count = 0;
            foreach ($this->getDatePeriod() as $key) {
                $count++;
            }
            $count++;
            return $count;
        }

        public function __toString()
        {
            $firstDate = $this->firstDate->format('Y-m-d');
            $lastDate = $this->lastDate->format('Y-m-d');
            return "$this->customer, $this->room, $firstDate, $lastDate, $this->dateLength";
        }

    }

