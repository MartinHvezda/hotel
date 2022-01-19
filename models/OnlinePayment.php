<?php

    namespace app\models;

    class OnlinePayment implements Payment
    {
        private $reservation;
        private $hotelAccount;
        private $cardNumber;

        /**
         * @param $reservation
         * @param $hotelAccount
         * @param $cardNumber
         */
        public function __construct($reservation, $hotelAccount, $cardNumber)
        {
            $this->reservation = $reservation;
            $this->hotelAccount = $hotelAccount;
            $this->cardNumber = $cardNumber;
        }

        public function pay()
        {
            if (!$this->reservation->isPaid()) {
                $this->reservation->setPaid(true);
                $this->hotelAccount->deposit($this->reservation->getRoom()->getPricePerNight()
                    * $this->reservation->getDateLength());
                return 'Payment success';
            } else return 'Payment failed';
        }
    }