<?php

    namespace app\models;

    class Room
    {
        private static $pricePerBed;
        private static $roomsCount;
        private static $rooms = array();
        private $number;
        private $capacity;
        private $cleaned;
        private $pricePerNight;

        /**
         * @return mixed
         */
        public static function getRoomsCount()
        {
            return self::$roomsCount;
        }

        /**
         * @return mixed
         */
        public static function getPricePerBed()
        {
            return self::$pricePerBed;
        }

        /**
         * @param mixed $pricePerBed
         * + updatuje cenu za pokoj u každý instance
         */
        public static function setPricePerBed($pricePerBed)
        {
            self::$pricePerBed = $pricePerBed;
            foreach (self::$rooms as $room) {
                $room->pricePerNight = self::$pricePerBed * $room->capacity;
            }
        }

        /**
         * @return mixed
         */
        public function getNumber()
        {
            return $this->number;
        }

        /**
         * @return mixed
         */
        public function getCapacity()
        {
            return $this->capacity;
        }

        /**
         * @return mixed
         */
        public function getPricePerNight()
        {
            return $this->pricePerNight;
        }

        /**
         * @return mixed
         */
        public function isCleaned()
        {
            return $this->cleaned;
        }

        /**
         * @param mixed $cleaned
         */
        public function setCleaned($cleaned)
        {
            $this->cleaned = $cleaned;
        }

        public function __construct($number, $capacity, $cleaned)
        {
            $this->number = $number;
            $this->capacity = $capacity;
            $this->cleaned = $cleaned;
            $this->pricePerNight = $this->capacity * self::$pricePerBed;
            self::$roomsCount++;
            self::$rooms[] = $this;
        }

        public function __toString()
        {
            return "$this->number";
        }

    }