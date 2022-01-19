<?php

    namespace app\models;

    class HotelRooms
    {
        private $rooms = [];

        /**
         * @return array
         */
        public function getRooms()
        {
            return $this->rooms;
        }

        public function __construct()
        {
            for ($i = 1; $i < 30; $i++) {

                if ($i < 10) {
                    $floor = '1';
                    $roomNum = $i;
                    array_push($this->rooms, new Room($floor.$roomNum, rand(1, 4), true));

                }
                if ($i >= 10 && $i < 20) {
                    $floor = '2';
                    $roomNum = $i - 10;
                    array_push($this->rooms, new Room($floor.$roomNum, rand(1, 4), true));
                }
                if ($i >= 20 && $i < 30) {
                    $floor = '3';
                    $roomNum = $i - 20;
                    array_push($this->rooms, new Room($floor.$roomNum, rand(1, 4), true));
                }
            }
        }
    }