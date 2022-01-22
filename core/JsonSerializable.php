<?php

    namespace app\core;

    interface JsonSerializable
    {
        public function jsonSerialize();
        public function jsonDeserialize();

    }