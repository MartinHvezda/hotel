<?php

    namespace app\core;

     class FileManager
    {

        public static function save($object, $path) {
            $json = json_encode($object);
            file_put_contents($path, $json);

        }

        public static function load($path) {
            $json = file_get_contents($path);
            json_decode($json, false);
        }

    }