<?php

    namespace app\controllers;

    use app\core\form\Field;

    class CleaningController
    {
        use Field;

        public function createSelect($values, $id) {
            $this->createSelectInput($values, $id);
        }

        
    }