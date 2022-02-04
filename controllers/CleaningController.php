<?php

    namespace app\controllers;

    use app\core\form\Field;
    use app\core\Application;

    class CleaningController
    {
        use Field;

        public function createSelect() {
            $values = Application::$app->maids;
            $this->createSelectInput($values, 'maid');
        }




    }