<?php

    namespace app\models;

    class Maid extends Employee
    {
        private $hoursToCleanRoom;

        public function __construct($firstName, $lastName, $email, $phoneNum, $job,
                                    $hoursWorkedLastMonth, $hourRate, $hoursToCleanRoom)
        {
            parent::__construct($firstName, $lastName, $email, $phoneNum, $job, $hoursWorkedLastMonth, $hourRate);
            $this->hoursToCleanRoom = $hoursToCleanRoom;
        }

        protected function work($rooms, $hours)
        {
            $cleanedRooms = 0;
            foreach ($rooms as $room) {
                if (!$room->isCleaned) {
                    $room->setCleaned(true);
                    $cleanedRooms++;
                }
                if (($cleanedRooms * $this->hoursToCleanRoom) >= $hours) {
                    break;
                }
            }
            return $cleanedRooms * $this->hoursToCleanRoom;
        }
    }