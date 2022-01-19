<?php

    namespace app\models;

    class HotelAccount
    {
        private $accountNumber;
        private $balance;

        public function __construct($accountNumber, $balance)
        {
            $this->accountNumber = $accountNumber;
            $this->balance = $balance;
        }

        public function deposit($amount) {
            $this->balance += $amount;
        }
    }