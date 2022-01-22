<?php

    namespace app\models;
    use app\models\HotelRooms;

    class Calendar implements \JsonSerializable
    {
        private static $currentYear;
        private $year;
        private $calendar = [];

        /**
         * @return mixed
         */
        public static function getCurrentYear()
        {
            return self::$currentYear;
        }

        /**
         * @return mixed
         */
        public function getYear()
        {
            return $this->year;
        }

        /**
         * @return array
         */
        public function getCalendar()
        {
            return $this->calendar;
        }

        public function __construct($year) {
            $rooms = new HotelRooms();
            if (!self::$currentYear) {
                self::$currentYear = $year;
            }
            $this->year = self::$currentYear;
            $wholeYear = new \DatePeriod(
                new \DateTime("$this->year-01-01"),
                \DateInterval::createFromDateString('1 day'),
                new \DateTime("$this->year-12-31")
            );
            foreach ($wholeYear as $key => $value) {
                $month = $value->format('m');
                $day = $value->format('d');
                $this->calendar[$key][$this->year][$month][$day] = (array) $rooms->getRooms();
            }
            if(($this->year % 4) !== 0) {
                $this->calendar[364][$this->year]['12'] = ['31'];
            } else $this->calendar[365][$this->year]['12'] = ['31'];
            $this->currentYearIncrement();
        }

        public function currentYearIncrement() {
            self::$currentYear++;
        }

        public function show() {
            echo '<br> <hr>';
            foreach ($this->calendar as $key => $value) {
                foreach ($this->calendar[$key][$this->year] as $key2 => $value2) {
                    foreach ($this->calendar[$key][$this->year][$key2] as $key3 => $value3) {
                        echo "<br> <h2> $key - $this->year . $key2 . $key3 </h2> <br>";
                        foreach ( $this->calendar[$key][$this->year][$key2][$key3] as $key4 => $value4) {
                            echo "$key4 <br>";
                            foreach ( $this->calendar[$key][$this->year][$key2][$key3][$key4] as $key5 ) {
                                echo 'Rezervation: ' . $key5->getCustomer()->getFirstName() . ' ' . $key5->getCustomer()->getLastName(). '<br>';

                            }
                        }
                    }
                }
            }
        }

        /**
         * @param array $calendar
         */
        public function setCalendar($calendar)
        {
            $this->calendar = $calendar;
        }

        public function jsonSerialize()
        {

            return [
            'private_static_currentYear' => self::$currentYear,
            'private_year' => $this->getYear(),
            'private_calendar' => $this->getCalendar()
        ];
        }
    }